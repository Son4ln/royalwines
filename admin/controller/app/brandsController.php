<?php
	/**
	* 
	*/
	class BrandsController
	{
	  function showBrands() {
	  	include '../view/brands/listBrands.php';
	  }

	  // thêm nhãn hiệu
	  function addBrandsAction() {
	  	$name = $_POST['brandname'];
      $file_ext=strtolower(end(explode('.',$_FILES['brandlogo']['name'])));
      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions) === false || $_FILES['brandlogo']['error'] > 0){
        $mess = 'Hình ảnh chỉ hỗ trợ jpg, jpeg, png và kích thước < 5mb';
        $action = "listBrands";
        $lv = 'danger';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
        die();
      }

	  	$logo = time().'-'.$_FILES['brandlogo']['name'];
	  	$public = $_POST['status'];
	  	$brands = new Brands();
	  	$checkName = $brands -> checkBrandName($name);

	  	if(!empty($checkName['brand_id'])) {
	  	  $mess = 'Đã có nhãn hiệu này';
    	  $action = "listBrands";
    	  $lv = 'danger';
    	  BasicLibs::setAlert($mess, $lv);
    	  BasicLibs::redirect($action);
    	  die();
	  	}

	  	try {
	  	  $brands -> addBrands($name, $logo, $public);
	  	} catch(PDOException $e) {
          $mess = 'Thêm nhãn hiệu thất bại';
	  	  $action = 'listBrands';
	  	  $lv = 'danger';
	  	  BasicLibs::setAlert($mess, $lv);
	  	  BasicLibs::redirect($action);
	  	  die();
      	}

	  	  $source = $_FILES['brandlogo']['tmp_name'];
	  	  $path = $GLOBALS['UPLOADBRANDSLOGO'];
	  	  $target = $path.$logo;
	  	  move_uploaded_file($source, $target);

	  	  $mess = 'Thêm nhãn hiệu thành công';
	  	  $action = 'listBrands';
	  	  $lv = 'success';
	  	  BasicLibs::setAlert($mess, $lv);
	  	  BasicLibs::redirect($action);
	  }

	  // xóa nhãn hiệu
	  function deleteBrands() {
	  	$brands = new Brands();
	  	$id = $_POST['id'];
	  	$img = $_POST['img'];
	  	$path = $GLOBALS['UPLOADBRANDSLOGO'];
	  	try {
	  		$brands -> deleteBrands($id);
	  	} catch(PDOException $e) {
	  		die('fail');
	  	}
	  	BasicLibs::deleteFile($img,$path);
	  }

	  // sữa nhãn hiệu
	  function updateBrandsAction () {
	  	$brands = new Brands();
	  	$brandId = $_POST['ebrandId'];
	  	$name = $_POST['ebrandname'];
	  	$checkName = $brands -> checkBrandName($name);

	  	if(!empty($checkName['brand_id']) && $checkName['brand_id'] != $brandId) {
      	die('unique');
	  	}

	  	if(empty($_FILES['ebrandlogo']['name'])) {
	  	  $logo = $_POST['eoldImg'];
	  	} else {
  			$file_ext=strtolower(end(explode('.',$_FILES['ebrandlogo']['name'])));
        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions) === false || $_FILES['ebrandlogo']['error'] > 0){
          die('file_not_valid');
        }

	  	  $logo = time().'-'.$_FILES['ebrandlogo']['name'];
	  	}
	  	
	 	try {
	  	  $brands -> updateBrands($brandId, $name, $logo);
	  	} catch(PDOException $e) {
	  	  die('fail');
      	}

      	//upload ảnh mới và xóa ảnh cũ
      	$source = $_FILES['ebrandlogo']['tmp_name'];
	  	  $path = $GLOBALS['UPLOADBRANDSLOGO'];
	  	  $target = $path.$logo;
	  	  move_uploaded_file($source, $target);

      	if (!empty($_FILES['ebrandlogo']['name'])) {
      		$currImg = $_POST['eoldImg'];
      	  BasicLibs::deleteFile($currImg,$path);
      	}

      	die('success');
	  }

	  // thay đổi trạng thái nhãn hiệu
	  function changeStatus() {
	  	$brandId = $_POST['id'];
	  	$public = $_POST['public'];
	  	$brands = new Brands();
	  	$brands -> changeStatus($brandId, $public);
	  }
	}
?>
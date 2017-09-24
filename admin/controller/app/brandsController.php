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

      	$mess = 'Sửa nhãn hiệu thành công';
	  	  $lv = 'success';
	  	  BasicLibs::setAlert($mess, $lv);

      	die('success');
	  }

	  // thay đổi trạng thái nhãn hiệu
	  function changeStatus() {
	  	$brandId = $_POST['id'];
	  	$public = $_POST['public'];
	  	$brands = new Brands();
	  	$brands -> changeStatus($brandId, $public);
	  	die('mợ rầu');
	  }
	}
?>
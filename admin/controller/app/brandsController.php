<?php
	/**
	* 
	*/
	class BrandsController
	{
	  function showBrands() {
	  	//thực hiện phân quyền
	  	Permission::isSeller();
	  	include '../view/brands/listBrands.php';
	  }

	  // thêm nhãn hiệu
	  function addBrandsAction() {
	  //thực hiện phân quyền
	  Permission::isSeller();
      usleep(500000);
	  $name = $_POST['brandname'];
      $file_ext=strtolower(end(explode('.',$_FILES['brandlogo']['name'])));
      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions) === false || $_FILES['brandlogo']['error'] > 0){
        die('file_error');
      }

	  	$logo = time().'-'.$_FILES['brandlogo']['name'];
	  	$public = $_POST['status'];
	  	$brands = new Brands();
	  	$checkName = $brands -> checkBrandName($name);
      //lấy id user
      $checkUser = new UsersModel();
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $user = $checkUser -> checkUser($email, $pass);

	  	if(!empty($checkName['brand_id'])) {
    	  die('unique');
	  	}

	  	try {
	  	  $brands -> addBrands($name, $logo, $public, $user['user_id']);
	  	} catch(PDOException $e) {
	  	  die('fail');
      	}

	  	  $source = $_FILES['brandlogo']['tmp_name'];
	  	  $path = $GLOBALS['UPLOADBRANDSLOGO'];
	  	  $target = $path.$logo;
	  	  move_uploaded_file($source, $target);

	  	  die('success');
	  }

	  // xóa nhãn hiệu
	  function deleteBrands() {
	  	//thực hiện phân quyền
	  	Permission::isSeller();

	  	$brands = new Brands();
	  	$uid = $_POST['uid'];
	  	$img = $_POST['img'];
	  	$path = $GLOBALS['UPLOADBRANDSLOGO'];
	  	try {
	  		$brands -> deleteBrands($uid);
	  	} catch(PDOException $e) {
	  		die('fail');
	  	}
	  	BasicLibs::deleteFile($img,$path);
	  }

	  // sữa nhãn hiệu
	  function updateBrandsAction () {
	  	//thực hiện phân quyền
	  	Permission::isSeller();
	  	$brands = new Brands();
	  	$brandUId = $_POST['ebrandUId'];
	  	$name = $_POST['ebrandname'];
	  	$checkName = $brands -> checkBrandName($name);

	  	if(!empty($checkName['uid']) && $checkName['uid'] != $brandUId) {
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
	  	  $brands -> updateBrands($brandUId, $name, $logo);
	  	} catch(PDOException $e) {
	  	  die('fail');
      	}

      	if (!empty($_FILES['ebrandlogo']['name'])) {
          //upload ảnh mới và xóa ảnh cũ
          $source = $_FILES['ebrandlogo']['tmp_name'];
          $path = $GLOBALS['UPLOADBRANDSLOGO'];
          $target = $path.$logo;
          move_uploaded_file($source, $target);

      		$currImg = $_POST['eoldImg'];
      	  BasicLibs::deleteFile($currImg,$path);
      	}

      	die('success');
	  }

	  // thay đổi trạng thái nhãn hiệu
	  function changeStatus() {
	  	//thực hiện phân quyền
	  	Permission::isSeller();
	  	$brandUid = $_POST['uid'];
	  	$public = $_POST['public'];
	  	$brands = new Brands();
	  	$brands -> changeStatus($brandUid, $public);
	  }

	  function getPublic() {
	  	//thực hiện phân quyền
	  	Permission::isSeller();
	  	$public = $_GET['public'];

	  	$table = 'table-unpublic';
	  	if ($public == 2) {
	  		$table = 'table-public';
	  	} else if ($public == 3) {
        $table = 'table-wait';
      }

    	$brands = new Brands();
      if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2) {
        $result = $brands -> getBrandsByPublic($public);
      } else {
        if ($public == 3) {
          die('wrong_permission');
        }

        $checkUser = new UsersModel();
        $email = $_SESSION["royalwines_user_login_ok"];
        $pass = $_SESSION["royalwines_pass_login_ok"];
        $user = $checkUser -> checkUser($email, $pass);
        $result = $brands -> getBrandsByPublicAndUser($public, $user['user_id']);
      }
    	
      usleep(500000);
    	include '../view/brands/view_brand.php';
	  }
	}
?>
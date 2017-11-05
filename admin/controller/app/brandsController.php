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
      $exploded = explode('.',$_FILES['brandlogo']['name']);
      $file_ext=strtolower(end($exploded));
      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions) === false || $_FILES['brandlogo']['error'] > 0){
        die('file_error');
      }

      $logo = time().'-'.$_FILES['brandlogo']['name'];

      if ($_SESSION["royalwines_permission_ok"] == 3) {
        $public = 3;
      } else {
          $public = $_POST['status'];
      }

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

        $content = 'Thêm nhãn hiệu "'.$name.'"';
        BasicLibs::addMess($content);
        die('success');
    }

    // xóa nhãn hiệu
    function deleteBrands() {
      //thực hiện phân quyền
      Permission::isSuperUser();

      $brands = new Brands();
      $uid = $_POST['uid'];
      $img = $_POST['img'];
      $path = $GLOBALS['UPLOADBRANDSLOGO'];

      try {
        $brand = $brands -> getBrandById($uid);
        $brands -> deleteBrands($uid);
      } catch(PDOException $e) {
        die('fail');
      }

      BasicLibs::deleteFile($img,$path);

      $brandName = $brand['brand_name'];
      $content = "Đã xóa nhãn hiệu $brandName";
      BasicLibs::addMess($content);
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
        $exploded = explode('.',$_FILES['ebrandlogo']['name']);
        $file_ext=strtolower(end($exploded));
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

      //thêm tin nhắn quản lý
      $content = 'Chỉnh sửa nhãn hiệu "'.$name.'"';
      BasicLibs::addMess($content);
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
      //lấy brand để sử dụng cho tin nhắn người dùng
      $brand = $brands -> getBrandById($brandUid);
      $brandName = $brand['brand_name'];

      $status = 'public';
      if ($public == 1) {
        $status = 'unpublic';
      }

      $content = "Đã thay đổi trạng thái của nhãn hiệu $brandName thành $status";
      BasicLibs::addMess($content);
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
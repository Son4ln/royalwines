<?php
  class CateController {
    function viewCate() {
      include '../view/cate/categories.php';
    }

    function getCateByPubic() {
      Permission::isSeller();
      $public = $_GET['public'];
      $table = 'table-unpublic';
      if ($public == 2) {
        $table = 'table-public';
      } else if ($public == 3){
        $table = 'table-wait';
      }
      $users = new UsersModel();
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $result = $users -> checkUser($email, $pass);

      $cate = new CategoriesModel();
      if ($_SESSION["royalwines_permission_ok"] == 3) {
        $data = $cate -> getCateByPublicAndUser($public, $result['user_id']);
      } else if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2) {
        $data = $cate -> getCateByPublic($public);
      }

      include '../view/cate/view_public.php'; 
    }

    function changeStatus() {
      Permission::isSeller();
      $status = $_GET['public'];
      $uid = $_GET['uid'];
      $public = 2;
      $mess = 'public';
      if ($status == 2) {
        $public = 1;
        $mess = 'unpublic';
      }

      $cate = new CategoriesModel();
      $cate -> updatePublic($public, $uid);

      $result = $cate -> getCateByUid($uid);

      $content = 'Thay đổi trạng thái của loại sản phẩm"'.$result['category_name'].'" thành '.$mess;
      BasicLibs::addMess($content);
    }

    function delCate() {
      Permission::isSuperUser();
      $uid = $_GET['uid'];
      $cate = new CategoriesModel();
      $result = $cate -> getCateByUid($uid);

      try {
        $cate -> delCate($uid);
      } catch (PDOException $e) {
        die('fail');
      }

      $content = 'Xóa loại sản phẩm "'.$result['category_name'].'"';
      BasicLibs::addMess($content);
    }

    function updateCate() {
      Permission::isSeller();
      $uid = $_POST['uid'];
      $name = $_POST['name'];
      $cate = new CategoriesModel();
      $checkCate = $cate -> checkCateByName($name);
      if ($checkCate && $checkCate['uid'] != $uid) {
        die('unique');
      }
      $result = $cate -> getCateByUid($uid);
      $cate -> updateCate($uid, $name);

      $content = 'Cập nhập thông tin của loại sản phẩm "'.$result['category_name'].'"'.' thành '.$name;
      BasicLibs::addMess($content);
    }

    function addCate() {
      Permission::isSeller();
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $name = $_POST['name'];
      if ($_SESSION["royalwines_permission_ok"] == 3) {
        $status = 3;
      } else {
        $status = $_POST['status'];
      }

      $users = new UsersModel();
      $result = $users -> checkUser($email, $pass);
      $userId = $result['user_id'];
      $cate = new CategoriesModel();
      $checkCate = $cate -> checkCateByName($name);
      if ($checkCate) {
        die('unique');
      }
      $cate -> addCate($name, $status, $userId);
      $content = 'Thêm loại sản phẩm "'.$name.'"';
      BasicLibs::addMess($content);
    }
  }
?>
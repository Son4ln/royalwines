<?php
  include '../../config.php';
  include '../../database/database.php';

  //include admin model
  include $ROOT.'admin/model/brandsModel.php';
  include $ROOT.'admin/model/usersModel.php';

  //include client model
  session_start();

  class CheckUserActive {
    function get() {
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $users = new UsersModel();
      $result = $users -> checkUser($email, $pass);

      if ($result['is_active'] == 1) {
        die('deactive_user');
      }
    }
  }

  class checkPermission {
    function put() {
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $users = new UsersModel();
      $result = $users -> checkUser($email, $pass);

      if ($result['permission'] != $_SESSION["royalwines_permission_ok"]) {
        $_SESSION["royalwines_permission_ok"] = $result['permission'];
        die('permission_change');
      }
    }
  }
?>
<?php
  class UsersController {
    function listUsers() {
      include '../view/users/list_users.php';
    }

    function usersByActive() {
      $active = $_GET['active'];
      $tableName = 'users-active';
      if ($active == 1) {
        $tableName = 'users-deactive';
      }
      $users = new UsersModel();
      $data = $users -> getUsersByActive($active);
      include '../view/users/users_active.php';
      usleep(500000);
    }

    function userSetActive() {
      $id = $_POST['user_id'];
      $active = $_POST['active'];
      $users = new UsersModel();
      $users -> setActive($id, $active);
      exit('success');
    }

    function userPermission() {
      $id = $_POST['user_id'];
      $permis = $_POST['permis'];
      $users = new UsersModel();
      $users -> setPermis($id, $permis);
      usleep(500000);
      exit('success');
    }

    function login() {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] == 5) {
          include '../../../public/template/404.html';
          session_destroy();
          exit();
        }

        $action = 'home';
        BasicLibs::redirect($action);
        exit();
      }

      if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $users = new UsersModel();
        $result = $users -> checkUser($email, $pass);
        if($result) {
          if ($result['is_active'] == 2) {
            $_SESSION["royalwines_user_login_ok"] = $email;
            $_SESSION["royalwines_pass_login_ok"] = $pass;
            if ($result['permission'] == 5) {
              session_destroy();
              exit('valid_permission');
            } else {
              $_SESSION["royalwines_permission_ok"] = $result['permission'];
            }
          } else {
            session_destroy();
            exit('account_locked');
          }
        } else {
          exit('login_fail');
        }
      } else {
        include '../view/login.php';
      }
    }
  }
?>
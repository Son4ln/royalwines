<?php
  class UsersController {
    function listUsers() {
      Permission::isManager();
      include '../view/users/list_users.php';
    }

    function usersByActive() {
      Permission::isManager();
      $active = $_GET['active'];
      $tableName = 'users-active';
      if ($active == 1) {
        $tableName = 'users-deactive';
      }
      $users = new UsersModel();
      $data = $users -> getUsersByActive($active);

      //kiểm tra user;
      $user_uid = $_SESSION["royalwines_user_uid_ok"];
      $permis = $_SESSION["royalwines_permission_ok"];

      include '../view/users/users_active.php';
      usleep(500000);
    }

    function userSetActive() {
      Permission::isManager();
      $uid = $_POST['user_uid'];
      $active = $_POST['active'];
      $users = new UsersModel();
      $users -> setActive($uid, $active);

      //lấy thông tin của user
      $status = 'Active';
      if ($active == 1) {
        $status = 'De-Active';
      }

      $user = $users -> getUserByUid($uid);
      $userEmail = $user['email'];
      $content = "Đã $status $userEmail";
      BasicLibs::addMess($content);
      exit('success');
    }

    function userPermission() {
      Permission::isManager();
      $uid = $_POST['user_uid'];
      $permis = $_POST['permis'];

      if ($permis == 1) {
        die('wrong_permission');
      }

      $users = new UsersModel();
      $users -> setPermis($uid, $permis);

      $status = 'Admin';
      if ($permis == 3) {
        $status = 'Seller';
      } else if ($permis == 4) {
        $status = 'Bloger';
      } else if ($permis == 5) {
        $status = 'Normal User';
      }

      $user = $users -> getUserByUid($uid);
      $userEmail = $user['email'];
      $content = "Đã phân quyền $userEmail thành $status";
      BasicLibs::addMess($content);
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
              $_SESSION["royalwines_user_uid_ok"] = $result['uid'];
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

    // sữa thông tin
    function settingShow() {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] == 5) {
          include '../../../public/template/404.html';
          session_destroy();
          exit();
        }

        $email = $_SESSION["royalwines_user_login_ok"];
        $pass = $_SESSION["royalwines_pass_login_ok"];
        $users = new UsersModel();
        $data = $users -> checkUser($email, $pass);
        $result = $users -> getUserByUid($data['uid']);
        include '../view/users/edit_user.php';
      }
    }

    function settingAction() {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] == 5) {
          include '../../../public/template/404.html';
          session_destroy();
          exit();
        }

        $users = new UsersModel();
        $userUID = $_POST['uid'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $rePass = $_POST['rePass'];
        $passMD5 = md5($oldPass);

        if(empty($_FILES['avatar']['name'])) {
          $avatar = $_POST['oldImg'];
        } else {
          $exploded = explode('.',$_FILES['avatar']['name']);
          $file_ext=strtolower(end($exploded));
          $expensions= array("jpeg","jpg","png");

          if(in_array($file_ext,$expensions) === false || $_FILES['avatar']['error'] > 0) {
            die('file_not_valid');
          }

          $avatar = time().'-'.$_FILES['avatar']['name'];
        }

        if (empty($newPass) && empty($oldPass)) {
          $passMD5 = $_SESSION["royalwines_pass_login_ok"];
        } else {
          if ($passMD5 != $_SESSION["royalwines_pass_login_ok"]) {
            die('pass_not_valid');
          } else if ($newPass != $rePass) {
            die('pass_not_match');
          } else if ($newPass != $oldPass) {
            $passMD5 = md5($newPass);
          }
        }
        
        try {
          $users -> updateProfile($userUID, $name, $address, $phone, $passMD5, $avatar);
          $_SESSION["royalwines_pass_login_ok"] = $passMD5;
        } catch(PDOException $e) {
          die('fail');
        }

        if (!empty($_FILES['avatar']['name'])) {
          //upload ảnh mới và xóa ảnh cũ
          $source = $_FILES['avatar']['tmp_name'];
          $path = $GLOBALS['UPLOADUSER'];
          $target = $path.$avatar;
          move_uploaded_file($source, $target);

          $currImg = $_POST['oldImg'];
          BasicLibs::deleteFile($currImg,$path);
        }

        die('success');
      }
    }
  }
?>
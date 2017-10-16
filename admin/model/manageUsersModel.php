<?php 
  class ManageUsersModel extends DataBase {
    function getManageUser() {
      $query = 'SELECT * FROM manage_user ORDER BY notify_id DESC LIMIT 10';
      $result = parent::getList($query);
      return $result;
    }

    function getAllManagment() {
      $query = 'SELECT * FROM manage_user ORDER BY date_input DESC';
      $result = parent::getList($query);
      return $result;
    }

    function seenStatus($id) {
      $query = "UPDATE manage_user SET status = 2 WHERE notify_id = $id";
      parent::exec($query);
    }

    function addMessManager($content) {
      $user = new UsersModel();
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $getUser = $user -> checkUser($email, $pass);
      $userId = $getUser['user_id'];
      $date = date("Y-m-d H:i:s");
      $query = "INSERT INTO manage_user VALUES('', '$content', '$date', '$userId')";
      parent::exec($query);
    }
  }
?>
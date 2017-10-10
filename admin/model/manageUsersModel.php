<?php 
  class ManageUsersModel extends DataBase {
    function addManage() {

    }

    function getManageByStatus() {
      $query = 'SELECT * FROM manage_user WHERE status = 1 ORDER BY notify_id DESC';
      $result = parent::getList($query);
      return $result;
    }

    function getAllManagment() {
      $query = 'SELECT * FROM manage_user';
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
      $query = "INSERT INTO manage_user VALUES('', '$content', '$date', 1, '$userId')";
      parent::exec($query);
    }
  }
?>
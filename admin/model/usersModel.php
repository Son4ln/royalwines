<?php
  class UsersModel extends DataBase {
    function getUsersByActive($active) {
      $query = "SELECT * FROM users WHERE is_active = '$active' AND permission != 1";
      $result = parent::getList($query);
      return $result;
    }

    function setActive($uid, $active) {
      $query = "UPDATE users SET is_active = '$active' WHERE uid = '$uid'";
      parent::exec($query);
    }

    function setPermis($uid, $permis) {
      $query = "UPDATE users SET permission = '$permis' WHERE uid = '$uid'";
      parent::exec($query);
    }

    function checkUser($email, $pass) {
      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
      $result = parent::getInstance($query);
      return $result;
    }

    function getUserById($id) {
      $query = "SELECT * FROM users WHERE user_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }
  }

?>
<?php
  class UsersModel extends DataBase {
    function getUsersByActive($active) {
      $query = "SELECT * FROM users WHERE is_active = '$active' AND permission != 1";
      $result = parent::getList($query);
      return $result;
    }

    function setActive($id, $active) {
      $query = "UPDATE users SET is_active = '$active' WHERE user_id = '$id'";
      parent::exec($query);
    }

    function setPermis($id, $permis) {
      $query = "UPDATE users SET permission = '$permis' WHERE user_id = '$id'";
      parent::exec($query);
    }

    function checkUser($email, $pass) {
      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
      $result = parent::getInstance($query);
      return $result;
    }
  }

?>
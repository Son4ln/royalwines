<?php
  class CategoriesModel extends DataBase {
    function getCateByPublic ($public) {
      $query = "SELECT * FROM categories WHERE category_public = '$public' ORDER BY category_id DESC";
      $result = parent::getList($query);
      return $result;
    }

    function getCateByPublicAndUser($public, $user) {
      $query = "SELECT * FROM categories WHERE category_public = '$public' and user_id ='$user' ORDER BY category_id DESC";
      $result = parent::getList($query);
      return $result;
    }

    function updatePublic ($public, $uid) {
      $query = "UPDATE categories SET category_public = $public WHERE uid = '$uid'";
      parent::exec($query);
    }

    function delCate ($uid) {
      $query = "DELETE FROM categories WHERE uid = '$uid'";
      parent::exec($query);
    }

    function updateCate ($uid, $name) {
      $query = "UPDATE categories SET category_name = '$name' WHERE uid = '$uid'";
      parent::exec($query);
    }

    function checkCateByName($name) {
      $query = "SELECT * FROM categories WHERE category_name = '$name'";
      $result = parent::getInstance($query);
      return $result;
    }

    function getCateByUid($uid) {
      $query = "SELECT * FROM categories WHERE uid = '$uid'";
      $result = parent::getInstance($query);
      return $result;
    }

    function addCate($name, $status, $user) {
      $query = "INSERT INTO categories VALUES('', UUID(), '$name', '$status', '$user')";
      parent::exec($query);
    }

  }
?>
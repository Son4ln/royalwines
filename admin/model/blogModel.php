<?php
  class BlogModel extends DataBase {
    function getAllBlogPublic($public) {
      $query = "SELECT * FROM news WHERE news_public = '$public' ORDER BY news_id DESC";
      $result = parent::getList($query);
      return $result;
    }

    function getAllBlogPublicAndUser() {
      $user = new UsersModel();
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $getUser = $user -> checkUser($email, $pass);
      $userId = $getUser['user_id'];

      $query = "SELECT * FROM news WHERE news_public = 2 AND user_id = $userId ORDER BY news_id DESC";
      $result = parent::getList($query);
      return $result;
    }

    function changeStatus($id) {
      $query = "UPDATE news SET news_public = 2 WHERE news_id = '$id'";
      parent::exec($query);
    }

    function UpdateBlog($id, $date, $title, $img, $detail) {
      $query = "UPDATE news SET news_date = '$date', news_title = '$title',
      news_image = '$img', news_detail = '$detail' WHERE news_id = '$id'";
      parent::exec($query);
    }

    function addBlog($date, $title, $img, $detail) {
      $user = new UsersModel();
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $getUser = $user -> checkUser($email, $pass);
      $userId = $getUser['user_id'];
      $query = "INSERT INTO news VALUES('', '$date', '$title', '$img', '$detail' , 1, '$userId')";
      parent::exec($query);
    }

    function delBlog($id) {
      $query = "DELETE FROM news WHERE news_id = '$id'";
      parent::exec($query);
    }

    function getBlogById($id) {
      $query = "SELECT * FROM news WHERE news_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }
  }
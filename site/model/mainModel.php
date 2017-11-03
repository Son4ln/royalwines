<?php
  class MainModel extends DataBase {

    // dùng cho trang chủ
    function getNewProduct() {
      $query = "SELECT * FROM products WHERE product_public = 2 AND discount = 0 ORDER BY product_id DESC LIMIT 8";
      $result = parent::getList($query);
      return $result;
    }

    function getProductsDiscountLimit() {
      $query = "SELECT * FROM products WHERE product_public = 2 AND discount > 0 ORDER BY product_id DESC LIMIT 4";
      $result = parent::getList($query);
      return $result;
    }

    function getBanner() {
      $query = "SELECT * FROM slide_show ORDER BY slide_id DESC";
      $result = parent::getList($query);
      return $result;
    }

    function getOneBlog() {
      $query = "SELECT * FROM news WHERE news_public = 2 ORDER BY news_id DESC LIMIT 1";
      $result = parent::getInstance($query);
      return $result;
    }

    function getRandomBrand() {
      $query = "SELECT * FROM brands WHERE brand_public = 2 ORDER BY RAND() LIMIT 3";
      $result = parent::getList($query);
      return $result;
    }

    function getProductById($id) {
      $query = "SELECT * FROM products WHERE product_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

    function getProductByUid($uid) {
      $query = "SELECT * FROM products WHERE uid = '$uid'";
      $result = parent::getInstance($query);
      return $result;
    }

    function checkUser($email, $pass) {
      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
      $result = parent::getInstance($query);
      return $result;
    }

    function addWish($uid) {
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $result = $this -> checkUser($email, $pass);
      $user = $result['user_id'];

      $result = $this -> getProductByUid($uid);
      $product_id = $result['product_id'];
      $query = "INSERT INTO wishlist VALUES(' ','$user', '$product_id')";
      parent::exec($query);
    }

    function getWishListByUser() {
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $result = $this -> checkUser($email, $pass);
      $user = $result['user_id'];
      $query = "SELECT * FROM wishlist WHERE user_id = $user";
      $result = parent::getList($query);
      return $result;
    }

    function delWish($prod_uid) {
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $result = $this -> checkUser($email, $pass);
      $user = $result['user_id'];
      $result = $this -> getProductByUid($prod_uid);
      $product_id = $result['product_id'];
      $query = "DELETE FROM wishlist WHERE user_id = '$user' AND product_id = '$product_id'";
      parent::exec($query);
    }

    // end homepage
  }

  ?>

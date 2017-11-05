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

    function getCate() {
      $query = 'SELECT * FROM categories WHERE category_public = 2';
      $result = parent::getList($query);
      return $result;
    }

    function getProductByCate($id, $limit) {
      $query = "SELECT * FROM products WHERE category_id = '$id' AND product_public = 2 LIMIT $limit";
      $result = parent::getList($query);
      return $result;
    }

    function getAllProductPublic($limit) {
      $query = "SELECT * FROM products WHERE product_public = 2 ORDER BY product_id DESC LIMIT $limit";
      $result = parent::getList($query);
      return $result;
    }

    function getProductDiscount($limit) {
      $query = "SELECT * FROM products WHERE discount > 0 AND product_public = 2 LIMIT $limit";
      $result = parent::getList($query);
      return $result;
    }

    function searchProducts($key, $limit) {
      $query = "SELECT * FROM products WHERE product_name LIKE '%$key%' AND product_public = 2 LIMIT $limit";
      $result = parent::getList($query);
      return $result;
    }

    function getRandomNews() {
      $query = 'SELECT * FROM news WHERE news_public = 2 ORDER BY RAND() LIMIT 3';
      $result = parent::getList($query);
      return $result;
    }

    function getAllNewsPublic($records) {
      $query = "SELECT * FROM news WHERE news_public = 2 ORDER BY news_id DESC LIMIT $records, 4";
      $result = parent::getList($query);
      return $result;
    }

    function searchNews($key, $limit) {
      $query = "SELECT * FROM news WHERE news_title LIKE '%$key%' AND news_public = 2 LIMIT $limit, 4";
      $result = parent::getList($query);
      return $result;
    }

    function getBrands() {
      $query = "SELECT * FROM brands WHERE brand_public = 2";
      $result = parent::getList($query);
      return $result;
    }

    function getProductsByBrand($brand, $limit) {
      $query = "SELECT * FROM products WHERE product_public = 2 AND brand_id = '$brand' ORDER BY product_id DESC LIMIT $limit";
      $result = parent::getList($query);
      return $result;
    }

    function addClient($full_name, $email, $address, $phone, $note) {
      $query = "INSERT INTO clients VALUES('', '$full_name', '$email', '$address', '$phone', '$note')";
      parent::exec($query);
    }

    function getCurClient() {
      $query = "SELECT * FROM clients ORDER BY client_id DESC LIMIT 1";
      $result = parent::getInstance($query);
      return $result;
    }

    function addOrder($date, $total, $order_status, $client_id) {
      $query = "INSERT INTO orders (order_id, uid, order_date, total, order_status, client_id) VALUES('', UUID(), '$date', '$total', '$order_status', '$client_id')";
      parent::exec($query);
    }

    function getCurOrder() {
      $query = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
      $result = parent::getInstance($query);
      return $result;
    }

    function addOrderDetail($order_id, $product_id, $quantity, $detail_total) {
      $query = "INSERT INTO order_detail VALUES('', '$order_id', '$product_id', '$quantity', '$detail_total')";
      parent::exec($query);
    }
  }

  ?>

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

    // end homepage
  }

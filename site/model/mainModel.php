<?php
  class MainModel extends DataBase {
    function getNewProduct() {
      $query = "SELECT * FROM products WHERE product_public = 2 AND discount = 0 LIMIT 8";
      $result = parent::getList($query);
      return $result;
    }

    function getProductsDiscountLimit() {
      $query = "SELECT * FROM products WHERE product_public = 2 AND discount > 0 LIMIT 4";
      $result = parent::getList($query);
      return $result;
    }
  }

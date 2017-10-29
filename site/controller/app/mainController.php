<?php
  class MainController {
    function getNewProducts() {
      $model = new MainModel();
      $products = $model -> getNewProduct();
      $data = array();

      foreach ($products as $item) {
        $product = json_encode(array(
          'uid' => $item['uid'],
          'product_name' => $item['product_name'],
          'featured_img' => $item['featured_img'],
          'price' => $item['price']
        ));

        array_push($data, $product);
      }

      $data_return = json_encode($data);

      die($data_return);
    }

    function getProductsDiscountLimit() {
      $model = new MainModel();
      $products = $model -> getProductsDiscountLimit();
      $data = array();

      foreach ($products as $item) {
        $product = json_encode(array(
          'uid' => $item['uid'],
          'product_name' => $item['product_name'],
          'featured_img' => $item['featured_img'],
          'price' => $item['price'],
          'discount' => $item['discount']
        ));

        array_push($data, $product);
      }

      $data_return = json_encode($data);

      die($data_return);
    }
  }
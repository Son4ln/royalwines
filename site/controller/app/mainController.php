<?php
  class MainController {
    //dùng cho trang chủ
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

    function getBanner() {
      $model = new MainModel();
      $banners = $model -> getBanner();
      $data = array();

      foreach ($banners as $item) {
        $banner = json_encode(array(
          'slide_title' => $item['slide_title'],
          'slide_description' => $item['slide_description'],
          'link' => $item['link']
        ));

        array_push($data, $banner);
      }

      $data_return = json_encode($data);

      die($data_return);
    }

    function getOneBlog() {
      $model = new MainModel();
      $blog = $model -> getOneBlog();

      $data = json_encode(array(
        'news_date' => $blog['news_date'],
        'news_title' => $blog['news_title'],
        'short_desc' => $blog['short_desc'],
        'news_image' => $blog['news_image']
      ));

      die($data);
    }

    function getRandomBrand() {
      $model = new MainModel();
      $brands = $model -> getRandomBrand();
      $data = array();

      foreach ($brands as $item) {
        $brand = json_encode(array(
          'uid' => $item['uid'],
          'brand_logo' => $item['brand_logo']
        ));

        array_push($data, $brand);
      }

      $data_return = json_encode($data);

      die($data_return);
    }

    function getProductById() {
      $uid = $_GET['uid'];
      $model = new MainModel();
      $product = $model -> getProductByUid($uid);

      $data = json_encode(array(
        'uid' => $product['uid'],
        'product_name' => $product['product_name'],
        'featured_img' => $product['featured_img'],
        'price' => $product['price'],
        'discount' => $product['discount'],
        'in_stock' => $product['in_stock'],
        'product_time' => $product['product_time'],
        'product_detail' => $product['product_detail']
      ));

      die($data);
    }

    // end homepage
  }

?>
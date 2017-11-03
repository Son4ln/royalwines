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
        'product_volume' => $product['product_volume'],
        'product_detail' => $product['product_detail']
      ));

      die($data);
    }

    function login() {
      $data = json_decode(file_get_contents("php://input"), true);
      $email = $data['email'];
      $pass = md5($data['pass']);
      $users = new mainModel();
      $result = $users -> checkUser($email, $pass);
      if($result) {
        if ($result['is_active'] == 2) {
          $_SESSION["royalwines_user_login_ok"] = $email;
          $_SESSION["royalwines_pass_login_ok"] = $pass;
          $_SESSION["royalwines_permission_ok"] = $result['permission'];
          $_SESSION["royalwines_user_uid_ok"] = $result['uid'];
          die('login_success');
        } else {
          die('account_locked');
        }
      } else {
        die('login_fail');
      }
    }

    function checkLogin() {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        $email = $_SESSION["royalwines_user_login_ok"];
        $pass = $_SESSION["royalwines_pass_login_ok"];
        $users = new mainModel();
        $result = $users -> checkUser($email, $pass);
        if($result) {
          $data = json_encode(array(
            'uid' => $result['uid'],
            'full_name' => $result['full_name'],
            'email' => $result['email'],
            'address' => $result['address'],
            'phone' => $result['phone'],
            'avatar' => $result['avatar']
          ));

          die($data);
        }
      }
      die('not_login');
    }

    function addWish() {
      $data = json_decode(file_get_contents("php://input"), true);
      $product_uid = $data['uid'];
      $model = new mainModel();
      $model -> addWish($product_uid);
    }

    function getWishList() {
      if(isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        $model = new mainModel();
        $result = $model -> getWishListByUser();
        $get_data = array();
        foreach ($result as $key) {
          $product_id = $key['product_id'];
          $data_product = $model -> getProductById($product_id);
          $data = json_encode(array(
            'uid' => $data_product['uid'],
            'product_name' => $data_product['product_name'],
            'featured_img' => $data_product['featured_img'] 
          ));

          array_push($get_data, $data);
        }

        $data_return = json_encode($get_data);

        die($data_return);
      } else {
        die('not_login');
      }
      
    }

    function delWish() {
      $data = json_decode(file_get_contents("php://input"), true);
      $product_uid = $data['uid'];
      $model = new mainModel();
      $model -> delWish($product_uid);
    }

    // end homepage
  }

?>
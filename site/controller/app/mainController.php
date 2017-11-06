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
        'news_id' => $blog['news_id'],
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
          'brand_id' => $item['brand_id'],
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
        'product_detail' => $product['product_detail'],
        'category_id' => $product['category_id']
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
            'avatar' => $result['avatar'],
            'permission' => $result['permission']
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

    //start product page
    function getCate() {
      $model = new mainModel();
      $cates = $model -> getCate();
      $data = array();

      foreach ($cates as $item) {
        $cate = json_encode(array(
          'category_id' => $item['category_id'],
          'uid' => $item['uid'],
          'category_name' => $item['category_name']
        ));

        array_push($data, $cate);
      }

      $data_return = json_encode($data);
      die($data_return);
    }

    function getAllProductPublic() {
      $limit = $_GET['limit'];
      $model = new mainModel();
      $products = $model -> getAllProductPublic($limit);

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

    function getProductByCate() {
      $limit = $_GET['limit'];
      $model = new mainModel();
      $cate_id = $_GET['cate_id'];
      $products = $model -> getProductByCate($cate_id, $limit);

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

    function getProductDiscount() {
      $limit = $_GET['limit'];
      $model = new mainModel();
      $products = $model -> getProductDiscount($limit);

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

    function searchProducts() {
      $model = new MainModel();
      $limit = $_GET['limit'];
      $key = $_GET['key'];
      $products = $model -> searchProducts($key, $limit);

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

    //start news
    function randomNews() {
      $model = new MainModel();
      $news = $model -> getRandomNews();

      $data = array();

      foreach ($news as $item) {
        $blog = json_encode(array(
          'news_id' => $item['news_id'],
          'news_date' => $item['news_date'],
          'news_title' => $item['news_title']
        ));

        array_push($data, $blog);
      }

      $data_return = json_encode($data);

      die($data_return);
    }

    function getAllNews() {
      $limit = $_GET['limit'];
      $model = new MainModel();
      $news = $model -> getAllNewsPublic($limit);

      $data = array();

      foreach ($news as $item) {
        $blog = json_encode(array(
          'news_id' => $item['news_id'],
          'news_date' => $item['news_date'],
          'news_title' => $item['news_title'],
          'short_desc' => $item['short_desc'],
          'news_image' => $item['news_image']
        ));

        array_push($data, $blog);
      }

      $data_return = json_encode($data);

      die($data_return);
    }

    function searchNews() {
      $limit = $_GET['limit'];
      $key = $_GET['key'];
      $model = new MainModel();
      $news = $model -> searchNews($key, $limit);

      $data = array();

      foreach ($news as $item) {
        $blog = json_encode(array(
          'news_id' => $item['news_id'],
          'news_date' => $item['news_date'],
          'news_title' => $item['news_title'],
          'short_desc' => $item['short_desc'],
          'news_image' => $item['news_image']
        ));

        array_push($data, $blog);
      }

      $data_return = json_encode($data);

      die($data_return);
    }

    function getBrands() {
      $model = new MainModel();
      $brands = $model -> getBrands();

      $data = array();

      foreach ($brands as $item) {
        $brand = json_encode(array(
          'brand_id' => $item['brand_id'],
          'brand_name' => $item['brand_name'],
          'brand_logo' => $item['brand_logo']
        ));

        array_push($data, $brand);
      }

      $data_return = json_encode($data);

      die($data_return);
    }

    function getProductsByBrand() {
      $model = new MainModel();
      $brand = $_GET['brand-id'];
      $limit = $_GET['limit'];
      $products = $model -> getProductsByBrand($brand, $limit);

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

    function checkout() {
      $data = json_decode(file_get_contents("php://input"), true);
      $full_name = $data['full_name'];
      $email = $data['email'];
      $address = $data['addr'];
      $phone = $data['phone'];
      $note = $data['note'];
      $date = date("Y-m-d");
      $total = $data['total'];
      $order_status = 1;
      $model = new MainModel();
      $model -> addClient($full_name, $email, $address, $phone, $note);
      $curClient = $model -> getCurClient();
      $model -> addOrder($date, $total, $order_status, $curClient['client_id']);
      $curOrder = $model -> getCurOrder();

      foreach ($data['listProduct'] as $key) {
        $item = json_encode($key);
        $item_decode = json_decode($item);
        $uid = $item_decode -> uid;
        $quantity = $item_decode -> qty;
        $detail_total = $item_decode -> total;
        $product = $model -> getProductByUid($uid);
        $model -> addOrderDetail($curOrder['order_id'], $product['product_id'], $quantity, $detail_total);
      }
      die('success');
    }

    function getNewsById() {
      $id = $_GET['id'];
      $model = new MainModel();
      $news = $model -> getBlogById($id);

      $data = json_encode(array(
        'news_date' => $news['news_date'],
        'news_title' => $news['news_title'],
        'news_image' => $news['news_image'],
        'news_detail' => $news['news_detail']
      ));

      die($data);
    }


    function contactInfo() {
      $model = new MainModel();
      $contact = $model -> getContactInfo();

      $data = json_encode(array(
        'info_id' => $contact['info_id'],
        'store_name' => $contact['store_name'],
        'address' => $contact['address'],
        'branch' => $contact['branch'],
        'phone' => $contact['phone'],
        'email' => $contact['email'],
        'introduce' => $contact['introduce'],
        'event' => $contact['event'],
        'rules' => $contact['rules'],
        'logo' => $contact['logo'],
        'slogan' => $contact['slogan']
      ));

      die($data);
    }

    function submitForm() {
      $data = json_decode(file_get_contents("php://input"), true);
      $fullname = $data['fullname'];
      $email = $data['email'];
      $subject = $data['subject'];
      $content = $data['content'];
      $date = date("Y-m-d");
      $model = new MainModel();
      $model -> addContactForm($fullname, $email, $date, $subject, $content);
      die('success');
    }

    function updateAvatar() {
      $exploded = explode('.',$_FILES['avatar']['name']);
      $file_ext=strtolower(end($exploded));
      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions) === false || $_FILES['avatar']['error'] > 0){
        die('file_error');
      }

      $avatar = time().'-'.$_FILES['avatar']['name'];
      $model = new MainModel();
      $model -> updateAvatar($avatar);

      $source = $_FILES['avatar']['tmp_name'];
      $path = $GLOBALS['UPLOADUSER'];
      $target = $path.$avatar;
      move_uploaded_file($source, $target);

      $currImg = $_POST['old-avatar'];
      BasicLibs::deleteFile($currImg,$path);

      die('success');
    }

    function updateUser() {
      $model = new MainModel();
      $data = json_decode(file_get_contents("php://input"), true);

      $name = $data['name'];
      $addr = $data['addr'];
      $phone = $data['phone'];
      if ($data['pass'] != '') {
        if ($data['pass'] == $data['retype']) {
          $pass = md5($data['pass']);
        } else {
          die('retype_wrong');
        }
      } else {
        $pass = $_SESSION["royalwines_pass_login_ok"];
      }

      $model -> updateUser($name, $addr, $phone, $pass);
      $_SESSION["royalwines_pass_login_ok"] = $pass;
      die('success');
    }

    function signUp() {
      if (!isset($_SESSION["royalwines_user_login_ok"]) && !isset($_SESSION["royalwines_pass_login_ok"])) {
      $model = new MainModel();
      $data = json_decode(file_get_contents("php://input"), true);

      $name = $data['fullname'];
      $address = $data['address'];
      $phone = $data['phone'];
      $email = $data['email'];
      $pass = $data['pass'];
      $rePass = $data['rePass'];
      $result = $model -> checkEmail($email);

      if ($name != '' && $address != '' && $phone != '' && $email != '' && $pass != '') {
        if ($pass != $rePass) {
          die('rePass_wrong');
        } elseif ($result) {
          die('email_exists');
        } else {
          $pass = md5($data['pass']);
        }
      } else {
        die('empty_val');
      }

      $permission = 5;
      $active = 2;

      $model -> addUser($name, $email, $address, $phone, $pass, $permission, $active);
      die('success');
    }
  }
}
?>
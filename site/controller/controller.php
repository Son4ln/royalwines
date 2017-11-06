<?php

  //thêm các modul & controller
  include 'include.php';

  //sử dụng thư viện trait
  //gọi function bằng cú pháp <Tên Trait>::<Tên function> thay thế cho phương thức extends
  //Session start
  session_start();

  // lấy action
  if(isset($_GET["action"])){
    $action=$_GET["action"]; }
  elseif (isset($_POST['action']))
  {
    $action=$_POST["action"];
  }
  //khởi tạo action
  switch ($action) {
    case 'getNewProducts':
      $action = new MainController();
      $action -> getNewProducts();
      break;

    case 'getProductsDiscountLimit':
      $action = new MainController();
      $action -> getProductsDiscountLimit();
      break;

    case 'getBanner':
      $action = new MainController();
      $action -> getBanner();
      break;

    case 'getOneBlog':
      $action = new MainController();
      $action -> getOneBlog();
      break;

    case 'getRandomBrand':
      $action = new MainController();
      $action -> getRandomBrand();
      break;

    case 'getProductById':
      $action = new MainController();
      $action -> getProductById();
      break;

    case 'login':
      $action = new MainController();
      $action -> login();
      break;

    case 'logout':
      session_destroy();
      header('location:/');
      break;

    case 'checkLogin':
      $action = new MainController();
      $action -> checkLogin();
      break;

    case 'addWish':
      $action = new MainController();
      $action -> addWish();
      break;

    case 'getWishList':
      $action = new MainController();
      $action -> getWishList();
      break;

    case 'delWish':
      $action = new MainController();
      $action -> delWish();
      break;

    case 'getCate':
      $action = new MainController();
      $action -> getCate();
      break;

    case 'getAllProductPublic':
      $action = new MainController();
      $action -> getAllProductPublic();
      break;

    case 'getProductByCate':
      $action = new MainController();
      $action -> getProductByCate();
      break;

    case 'getProductDiscount':
      $action = new MainController();
      $action -> getProductDiscount();
      break;

    case 'searchProducts':
      $action = new MainController();
      $action -> searchProducts();
      break;

    case 'randomNews':
      $action = new MainController();
      $action -> randomNews();
      break;

    case 'getAllNews':
      $action = new MainController();
      $action -> getAllNews();
      break;

    case 'searchNews':
      $action = new MainController();
      $action -> searchNews();
      break;

    case 'getBrands':
      $action = new MainController();
      $action -> getBrands();
      break;

    case 'getProductsByBrand':
      $action = new MainController();
      $action -> getProductsByBrand();
      break;

    case 'checkout':
      $action = new MainController();
      $action -> checkout();
      break;

    case 'getProductDetail':
      $action = new MainController();
      $action -> getProductDetail();
      break;

    case 'getNewsById':
      $action = new MainController();
      $action -> getNewsById();

    case 'contactInfo':
      $action = new MainController();
      $action -> contactInfo();
      break;

    case 'submitForm':
      $action = new MainController();
      $action -> submitForm();
      break;

    case 'updateAvatar':
      $action = new MainController();
      $action -> updateAvatar();
      break;

    case 'updateUser':
      $action = new MainController();
      $action -> updateUser();
      break;

    case 'signUp':
      $action = new MainController();
      $action -> signUp();
      break;
    default:
      break;
  }
?>

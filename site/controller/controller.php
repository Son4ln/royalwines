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

    default:
      //include giao diện lỗi 404 không tìm thấy link website vào đây
      break;
  }
?>

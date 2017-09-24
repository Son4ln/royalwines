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
  else{
    $action="home";
  }
  //khởi tạo action
  switch ($action) {
    case 'home':
      $brands = new BrandsController();
      $brands -> getBrands();
      include '../view/home.php';
      var_dump(http_response_code());
      break;

    default:
      //include giao diện lỗi 404 không tìm thấy link website vào đây
      break;
  }
?>

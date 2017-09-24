<?php

  //session start
  session_start();

  //thêm các modul & controller
  include 'include.php';

  //sử dụng thư viện trait
  //gọi function bằng cú pháp <Tên Trait>::<Tên function> thay thế cho phương thức extends

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
      include '../view/home.php';
      break;

    case 'contactInfo':
      $contact = new ContactInfoController();
      $contact -> showContactInfo();
      break;

    case 'updateContactInfo':
      $contact = new ContactInfoController();
      $contact -> updateContactInfo();
      
      break;

    case 'listBrands':
      $brands = new BrandsController();
      $brands -> showBrands();
      break;

    case 'addBrandsAction':
      $brands = new BrandsController();
      $brands -> addBrandsAction();
      break;

    case 'deleteBrands':
      $brands = new BrandsController();
      $brands -> deleteBrands();
      break;

    case 'updateBrandsAction':
      $brands = new BrandsController();
      $brands -> updateBrandsAction();
      break;

    case 'changeStatus':
      $brands = new BrandsController();
      $brands -> changeStatus();
      break;

    default:
      //include lỗi 404 vào đây
    include $GLOBALS['ROOT'].'public/template/404.html';
      break;
  }
?>

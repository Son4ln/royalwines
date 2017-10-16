<?php

  //session start
  session_start();

  //thêm các modul & controller
  include 'include.php';

  //sử dụng thư viện trait
  //gọi function bằng cú pháp <Tên Trait>::<Tên function> thay thế cho phương thức extends

  // lấy action
  $action = 'login';
  if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
    if(isset($_GET["action"])){
      $action=$_GET["action"]; }
    elseif (isset($_POST['action']))
    {
      $action=$_POST["action"];
    }
    else{
      $action="home";
    }
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

    case 'getPublic':
      $brands = new BrandsController();
      $brands -> getPublic();
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

    case 'listUsers':
      $users = new UsersController();
      $users -> listUsers();
      break;

    case 'usersActive':
      $users = new UsersController();
      $users -> usersByActive();
      break;

    case 'usersSetActive':
      $users = new UsersController();
      $users -> userSetActive();
      break;

    case 'permisUser':
      $users = new UsersController();
      $users -> userPermission();
      break;

    case 'login':
      $users = new UsersController();
      $users -> login();
      break;

    case 'logout':
      session_destroy();
      $action = 'login';
      BasicLibs::redirect($action);
      break;

    case 'listMessManage':
      $manage = new ManageUsersController();
      $manage -> getMess();
      break;

    case 'viewAll':
      $manage = new ManageUsersController();
      $manage -> viewAllMess();
      break;

    case 'viewAllContact':
      $contact = new ContactController();
      $contact -> getAllContact();
      break;

    case 'viewContactDetail':
      $contact = new ContactController();
      $contact -> getContactById();
      break;

    case 'delContactForm':
      $contact = new ContactController();
      $contact -> delContact();
      break;

    case 'viewAllOrder':
      $order = new OrderController();
      $order -> getAllOrder();
      break;

    case 'viewOrderDetail':
      $order = new OrderController();
      $order -> getOrderById();
      break;

    case 'changeStatusOrder':
      $order = new OrderController();
      $order -> changeStatusOrder();
      break;

    case 'showAllOrder':
      $order = new OrderController();
      $order -> showAllOrder();
      break;

    default:
      //include lỗi 404 vào đây
    include $GLOBALS['ROOT'].'public/template/404.html';
      break;
  }
?>

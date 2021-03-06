<?php
  //nhúng file cấu hình hệ thống
  include '../../config.php';

  //nhúng kết nối database
  include $ROOT.'database/database.php';

  //nhúng thư viện
  include $ROOT.'system/libs/basic_libs.php';

   // thêm class phân quyền
  include 'is_manager.php';

  //thêm các modul
  include '../model/contactInfoModel.php';
  include '../model/brandsModel.php';
  include '../model/usersModel.php';
  include '../model/manageUsersModel.php';
  include '../model/contactModel.php';
  include '../model/orders_model.php';
  include '../model/categoriesModel.php';
  include '../model/sliderModel.php';
  include '../model/blogModel.php';
  include '../model/products_model.php';

  //thêm controller
  include 'app/contactInfoController.php';
  include 'app/brandsController.php';
  include 'app/usersController.php';
  include 'app/manageUsersController.php';
  include 'app/contactController.php';
  include 'app/orders_controller.php';
  include 'app/cateController.php';
  include 'app/slideController.php';
  include 'app/blogController.php';
  include 'app/products_controller.php';
?>
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

  //thêm controller
  include 'app/contactInfoController.php';
  include 'app/brandsController.php';
  include 'app/usersController.php';
  include 'app/manageUsersController.php';
  include 'app/contactController.php';
  include 'app/orders_controller.php';
?>
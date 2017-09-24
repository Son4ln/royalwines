<?php
  //nhúng file cấu hình hệ thống
  include '../../config.php';

  //nhúng kết nối database
  include $ROOT.'database/database.php';

  //nhúng thư viện
  include $ROOT.'system/libs/basic_libs.php';

  //thêm các modul
  include '../model/contactInfoModel.php';
  include '../model/brandsModel.php';

  //thêm controller
  include 'app/contactInfoController.php';
  include 'app/brandsController.php';
 
?>
<?php
	
  //khởi tạo table
  include 'migrations/Brands.php';
  include 'migrations/Categories.php';
  include 'migrations/ContactForm.php';
  include 'migrations/ContactInfo.php';
  include 'migrations/ManageUsers.php';
  include 'migrations/News.php';
  include 'migrations/Clients.php';
  include 'migrations/OrderDetail.php';
  include 'migrations/Orders.php';
  include 'migrations/Products.php';
  include 'migrations/SlideShow.php';
  include 'migrations/Users.php';
  include 'migrations/WishList.php';

  //thêm dữ liệu mẫu
  include 'seeds/UsersSeeder.php';
  include 'seeds/BrandsSeeder.php';
  include 'seeds/CateSeeder.php';
  include 'seeds/ProductsSeeder.php';
  include 'seeds/ContactInfoSeeder.php';

  // thêm quan hệ
  include 'relationship.php';
?>
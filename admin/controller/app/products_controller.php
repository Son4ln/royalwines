<?php
  /**
  * 
  */
  class ProductsController
  {
    function showProducts() {
      //thực hiện phân quyền
      Permission::isSeller();
      include '../view/products/list_products.php';
    }

    function showAllBrands() {
      Permission::isSeller();
      $products = new Products();
      $brands = $products -> showBrands();
      include '../view/products/show_all_brands.php';
    }

    function showAllCategories() {
      Permission::isSeller();
      $products = new Products();
      $categories = $products -> showCategories();
      include '../view/products/show_all_categories.php';
    }

    // thêm sản phẩm
    function addProductsAction() {
    //thực hiện phân quyền
      Permission::isSeller();
      usleep(500000);
      $name = $_POST['productName'];
      $file_ext=strtolower(end(explode('.',$_FILES['productImg']['name'])));
      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions) === false || $_FILES['productImg']['error'] > 0){
        die('file_error');
      }

      $img = time().'-'.$_FILES['productImg']['name'];
      $price = $_POST['price'];
      $discount = $_POST['discount'];
      if ($discount == 0) {
        $discount = null;
      }

      $inStock = $_POST['inStock'];
      $volume = $_POST['volume'];
      $detail = $_POST['detail'];
      $create = date('Y-m-d');
      $public = 3;
      $brandId = $_POST['brandId'];
      $categoryId = $_POST['categoryId'];

      $products = new Products();
      $checkName = $products -> checkProductName($name, $volume, $brandId, $categoryId);
      //lấy id user
      $checkUser = new UsersModel();
      $email = $_SESSION["royalwines_user_login_ok"];
      $pass = $_SESSION["royalwines_pass_login_ok"];
      $user = $checkUser -> checkUser($email, $pass);

      if(!empty($checkName['product_id'])) {
        die('unique');
      }

      try {
        $products -> addProducts($name, $img, $price, $discount, $inStock, $volume, $detail, $create, $public,
          $brandId, $categoryId, $user['user_id']);
      } catch(PDOException $e) {
        die('fail');
      }

      $source = $_FILES['productImg']['tmp_name'];
      $path = $GLOBALS['UPLOADPRODUCTSIMG'];
      $target = $path.$img;
      move_uploaded_file($source, $target);

      $content = 'Thêm sản phẩm "'.$name.'"';
      BasicLibs::addMess($content);
      die('success');
    }

    // xóa nhãn hiệu
    function deleteProducts() {
      //thực hiện phân quyền
      Permission::isSuperUser();

      $products = new Products();
      $uid = $_POST['uid'];
      $img = $_POST['img'];
      $path = $GLOBALS['UPLOADPRODUCTSIMG'];

      try {
        $product = $products -> getProductById($uid);
        $products -> deleteProducts($uid);
      } catch(PDOException $e) {
        die('fail');
      }

      BasicLibs::deleteFile($img, $path);

      $productName = $product['product_name'];
      $content = "Đã xóa nhãn hiệu $productName";
      BasicLibs::addMess($content);
    }

    // sửa sản phẩm
    function updateProductsAction () {
      //thực hiện phân quyền
      Permission::isSeller();
      $products = new Products();
      $uid = $_POST['eproductId'];
      $name = $_POST['eproductName'];
      $price = $_POST['eprice'];
      $discount = $_POST['ediscount'];
      $inStock = $_POST['einStock'];
      $volume = $_POST['evolume'];
      $detail = $_POST['edetail'];
      $update = date('Y-m-d');
      $brandId = $_POST['ebrandId'];
      $categoryId = $_POST['ecategoryId'];

      $checkName = $products -> checkProductName($name, $volume, $brandId, $categoryId);

      if(!empty($checkName['uid']) && $checkName['uid'] != $uid) {
        die('unique');
      }

      if(empty($_FILES['eproductImg']['name'])) {
        $img = $_POST['eoldImg'];
      } else {
        $file_ext=strtolower(end(explode('.',$_FILES['eproductImg']['name'])));
        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions) === false || $_FILES['eproductImg']['error'] > 0){
          die('file_not_valid');
        }

        $img = time().'-'.$_FILES['eproductImg']['name'];
      }

      print($img);
      
      try {
        $products -> updateProducts($uid, $name, $img, $price, $discount, $inStock, $volume, $detail, $update,
          $brandId, $categoryId);
      } catch(PDOException $e) {
        die('fail');
      }

      if (!empty($_FILES['eproductImg']['name'])) {
        //upload ảnh mới và xóa ảnh cũ
        $source = $_FILES['eproductImg']['tmp_name'];
        $path = $GLOBALS['UPLOADPRODUCTSIMG'];
        $target = $path.$img;
        move_uploaded_file($source, $target);

        $currImg = $_POST['eoldImg'];
        BasicLibs::deleteFile($currImg,$path);
      }

      //thêm tin nhắn quản lý
      $content = 'Chỉnh sửa sản phẩm "'.$name.'"';
      BasicLibs::addMess($content);
      die('success');
    }

    // thay đổi trạng thái sản phẩm
    function changeStatus() {
      //thực hiện phân quyền
      Permission::isSeller();
      $uid = $_POST['uid'];
      $public = $_POST['public'];
      echo $public;
      $products = new Products();
      $products -> changeStatus($uid, $public);
      //lấy product để sử dụng cho tin nhắn người dùng
      $product = $products -> getProductById($uid);
      $productName = $product['product_name'];

      $status = 'public';
      if ($public == 2) {
        $status = 'unpublic';
      }

      $content = "Đã thay đổi trạng thái của nhãn hiệu $productName thành $status";
      BasicLibs::addMess($content);
    }

    function getPublic() {
      //thực hiện phân quyền
      Permission::isSeller();
      $public = $_GET['public'];

      $table = 'table-unpublic';
      if ($public == 2) {
        $table = 'table-public';
      } else if ($public == 3) {
        $table = 'table-wait';
      }

      $products = new Products();
      if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2) {
        $result = $products -> getProductsByPublic($public);
      } else {
        if ($public == 3) {
          die('wrong_permission');
        }

        $checkUser = new UsersModel();
        $email = $_SESSION["royalwines_user_login_ok"];
        $pass = $_SESSION["royalwines_pass_login_ok"];
        $user = $checkUser -> checkUser($email, $pass);
        $result = $products -> getProductsByPublicAndUser($public, $user['user_id']);
      }
      
      usleep(500000);
      include '../view/products/view_product.php';
    }
  }
?>
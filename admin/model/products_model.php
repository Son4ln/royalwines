<?php
  /**
  * 
  */
  class Products extends DataBase
  {
    // lấy dữ liệu products
  	function getProducts() {
      $query = "select * from products";
      $result = parent::getList($query);
      return $result;
  	}

    // thêm dữ liệu products
  	function addProducts($name, $img, $price, $discount, $inStock, $time, $detail, $create, $public, $brandId,
      $categoryId, $user) {
      $query = "insert into products
        values('', UUID(), '$name', '$img', '$price', '$discount', '$inStock', '$time', ''$detail', '$create', Null,
        '$public', '$brandId', '$categoryId', '$user')";
      parent::exec($query);
  	}

    // update dữ liệu brands
  	function updateProducts($uid, $name, $img, $price, $discount, $inStock, $time, $detail, $update, $public,
      $brandId,$categoryId) {
      $query = "update products set product_name = '$name', featured_img = '$img', price = '$price',
        discount = '$discount', in_stock = '$inStock', product_time = '$time', product_detail = '$detail',
        update_date = '$update', product_public = '$public', brand_id = '$brandId',
        category_id = '$categoryId' where uid = '$uid'";
      parent::exec($query);
  	}

    // xóa dữ liệu products
  	function deleteProducts($uid) {
  		$query = "delete from products where uid = '$uid'";
      parent::exec($query);
  	}

    function getProductById ($uid) {
      $query = "select * from products where uid = '$uid'";
      $result = parent::getInstance($query);
      return $result;
    }

    // kiểm tra trùng dữ liệu
    function checkProductName($name, $time, $brandId, $categoryId) {
      $query = "SELECT * FROM products WHERE product_name = '$name' and product_time = '$time'
        and brand_id = '$brandId' and category_id = '$categoryId'";
      $result = parent::getInstance($query);
      return $result;
    }

    //update status
    function changeStatus($uid, $status) {
      $query = "update products set product_public = $status where uid = '$uid'";
      parent::exec($query);
    }

    //lấy danh sách products theo trạng thái
    function getProductsByPublic($public) {
      $query = "SELECT * from products where product_public = '$public'";
      $result = parent::getList($query);
      return $result;
    }

    //lấy danh sách products theo trạng thái và người tạo
    function getProductsByPublicAndUser($public, $user) {
      $query = "SELECT * from products where product_public = '$public' AND user_id = '$user'";
      $result = parent::getList($query);
      return $result;
    }

    //đếm số products theo trạng thái
    function countProductsByPublic($public){
      $query = "SELECT COUNT(*) FROM products WHERE product_public = '$public'";
      $result = parent::getInstance($query);
      return $result;
    }

    //đếm tổng số products
    function countProducts(){
      $query = "SELECT COUNT(*) FROM products";
      $result = parent::getInstance($query);
      return $result;
    }
  }
?>
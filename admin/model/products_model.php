<?php
  /**
  * 
  */
  class Products extends DataBase
  {
    // lấy dữ liệu products
  	function getProducts() {
      $query = "SELECT * FROM products ORDER BY product_id DESC";
      $result = parent::getList($query);
      return $result;
  	}

    // lấy dữ liệu brands
    function showBrands() {
      $query = "SELECT * FROM brands";
      $result = parent::getList($query);
      return $result;
    }

    // lấy dữ liệu categories
    function showCategories() {
      $query = "SELECT * FROM categories";
      $result = parent::getList($query);
      return $result;
    }

    // thêm dữ liệu products
  	function addProducts($name, $img, $price, $discount, $inStock, $volume, $detail, $create, $public, $brandId,
      $categoryId, $user) {
      $query = "INSERT INTO products
        VALUES('', UUID(), '$name', '$img', '$price', '$discount', '$inStock', '$volume', '$detail', '$create', null,
        '$public', '$brandId', '$categoryId', '$user')";
      parent::exec($query);
  	}

    // update dữ liệu brands
  	function updateProducts($uid, $name, $img, $price, $discount, $inStock, $volume, $detail, $update,
      $brandId, $categoryId) {
      $query = "UPDATE products SET product_name = '$name', featured_img = '$img', price = '$price',
        discount = '$discount', in_stock = '$inStock', product_volume = '$volume', product_detail = '$detail',
        update_date = '$update', brand_id = '$brandId',
        category_id = '$categoryId' WHERE uid = '$uid'";
      parent::exec($query);
  	}

    // xóa dữ liệu products
  	function deleteProduct($uid) {
  		$query = "DELETE FROM products WHERE uid = '$uid'";
      parent::exec($query);
  	}

    function getProductById($uid) {
      $query = "SELECT * FROM products WHERE uid = '$uid'";
      $result = parent::getInstance($query);
      return $result;
    }

    // kiểm tra trùng dữ liệu
    function checkProductName($name, $volume, $brandId, $categoryId) {
      $query = "SELECT * FROM products WHERE product_name = '$name' AND product_volume = '$volume'
        AND brand_id = '$brandId' AND category_id = '$categoryId'";
      $result = parent::getInstance($query);
      return $result;
    }

    //update status
    function changeStatus($uid, $status) {
      $query = "UPDATE products SET product_public = $status WHERE uid = '$uid'";
      parent::exec($query);
    }

    //lấy danh sách products theo trạng thái
    function getProductsByPublic($public) {
      $query = "SELECT * FROM products WHERE product_public = '$public'";
      $result = parent::getList($query);
      return $result;
    }

    //lấy danh sách products theo trạng thái và người tạo
    function getProductsByPublicAndUser($public, $user) {
      $query = "SELECT * FROM products WHERE product_public = '$public' AND user_id = '$user'";
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
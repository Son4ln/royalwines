<?php
  /**
  * 
  */
  class Brands extends DataBase
  {
    // lấy dữ liệu brands
  	function getBrands() {
      $query = "select * from brands";
      $result = parent::getList($query);
      return $result;
  	}

    // thêm dữ liệu brands
  	function addBrands($brandName, $brandLogo, $brandPublic) {
      $query = "insert into brands values('', '$brandName', '$brandLogo', '$brandPublic')";
      parent::exec($query);
  	}

    // update dữ liệu brands
  	function updateBrands($brandId, $brandName, $brandLogo) {
      $query = "update brands set brand_name = '$brandName', brand_logo = '$brandLogo' where brand_id = '$brandId'";
      parent::exec($query);
  	}

    // xóa dữ liệu brands
  	function deleteBrands($id) {
  		$query = "delete from brands where brand_id = $id";
      parent::exec($query);
  	}

    function getBrandById ($id) {
      $query = "select * from brands where brand_id = $id";
      $result = parent::getInstance($query);
      return $result;
    }

    // kiểm tra trùng tên
    function checkBrandName($name) {
      $query = "SELECT * FROM brands WHERE brand_name = '$name'";
      $result = parent::getInstance($query);
      return $result;
    }

    //update status
    function changeStatus($brandId, $status) {
      $query = "update brands set brand_public = $status where brand_id = '$brandId'";
      parent::exec($query);
    }

    //lấy danh sách brands theo trạng thái
    function getBrandsByPublic($public) {
      $query = "SELECT * from brands where brand_public = '$public'";
      $result = parent::getList($query);
      return $result;
    }

    //đếm số brands theo trạng thái
    function countBrandsByPublic($public){
      $query = "SELECT COUNT(*) FROM brands WHERE brand_public = '$public'";
      $result = parent::getInstance($query);
      return $result;
    }

    //đếm tổng số brands
    function countBrands(){
      $query = "SELECT COUNT(*) FROM brands";
      $result = parent::getInstance($query);
      return $result;
    }
  }
?>
<?php
  /**
  * 
  */
  class Brands extends DataBase
  {
    // lấy dữ liệu brands
  	function getBrands() {
      $query = "select * from brands order by brand_id desc";
      $result = parent::getList($query);
      return $result;
  	}

    // thêm dữ liệu brands
  	function addBrands($brandName, $brandLogo, $brandPublic, $user) {
      $query = "insert into brands values('', UUID(), '$brandName', '$brandLogo', '$brandPublic', '$user')";
      parent::exec($query);
  	}

    // update dữ liệu brands
  	function updateBrands($brandUId, $brandName, $brandLogo) {
      $query = "update brands set brand_name = '$brandName', brand_logo = '$brandLogo' where uid = '$brandUId'";
      parent::exec($query);
  	}

    // xóa dữ liệu brands
  	function deleteBrands($uid) {
  		$query = "delete from brands where uid = '$uid'";
      parent::exec($query);
  	}

    function getBrandById ($uid) {
      $query = "select * from brands where uid = '$uid'";
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
    function changeStatus($uid, $status) {
      $query = "update brands set brand_public = $status where uid = '$uid'";
      parent::exec($query);
    }

    //lấy danh sách brands theo trạng thái
    function getBrandsByPublic($public) {
      $query = "SELECT * from brands where brand_public = '$public' order by brand_id desc";
      $result = parent::getList($query);
      return $result;
    }

    //lấy danh sách brands theo trạng thái
    function getBrandsByPublicAndUser($public, $user) {
      $query = "SELECT * from brands where brand_public = '$public' AND user_id = '$user' order by brand_id desc";
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
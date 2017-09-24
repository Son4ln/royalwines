<?php
  /**
  * 
  */
  class BrandsModel extends DataBase
  {
  	function getAllBrands () {
      $query = "select brand_public from brands";
      $result = parent::getList($query);
      return $result;
    }
  }
?>
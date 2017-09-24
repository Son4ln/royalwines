<?php
  include '../config.php';
  include '../database/database.php';

  //include admin model
  include $ROOT.'admin/model/brandsModel.php';

  //include client model


  class BrandById
  {
   	function get () {
      $brandId = $_GET['brandId'];
  		$public = $_GET['status'];
  		$getBrand = new Brands();
  		$editResult = $getBrand -> getBrandById($brandId);
      $brand = array(
                  'id' => $brandId,
                  'public' => $public,
                  'name' => $editResult['brand_name'],
                  'logo' => $editResult['brand_logo']
                );
  		$data = json_encode($brand);
      sleep(1);
  		die($data);
   	}
  }

  class BrandByName
  {
    function get () {
      $brandName = $_GET['brandName'];
      $brandId = $_GET['brandId'];
      $getBrand =  new Brands();
      $result = $getBrand -> checkBrandName($brandName);

      if (!empty($result['brand_id']) && $result['brand_id'] != $brandId)
        die('1');
      else if ($result['brand_id'] == $brandId)
        die('3');
      else
        die('2');
    }
  }
?>
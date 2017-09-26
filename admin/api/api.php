<?php
  include '../../config.php';
  include '../../database/database.php';

  //include admin model
  include $ROOT.'admin/model/brandsModel.php';

  //include client model


  class BrandApi {
    function get () {
      $public = $_GET['public'];
      $brands = new Brands();
      $result = $brands -> getBrandsByPublic($public);
      $arr = array();
      foreach ($result as $key) {
        $brandArr = array('id' => $key['brand_id'], 'name' => $key['brand_name'], 'logo' => $key['brand_logo']);
        $json = json_encode($brandArr);
        array_push($arr, $json);
      }
      $data = json_encode($arr);
      usleep(500000);
      die($data);
    } 
  }
?>
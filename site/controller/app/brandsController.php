<?php
  class BrandsController
  {
  	function getBrands() {
      $brandsModel = new BrandsModel();
      $all = $brandsModel -> getAllBrands();

      if(isset($all)){
        foreach ($all as $key) {
          echo $key['brand_public'];
        }
      }
      
    }
  }
?>
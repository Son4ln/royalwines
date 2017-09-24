<?php
	class Brands extends ConnectMySql{
		function createBrands (){
		  parent::setConnect();
		  try {
			$createBrands = "Create table brands (
							 brand_id		int(11)		Auto_increment	Not null,
							 brand_name		varchar(255)				Not null,
							 brand_logo		varchar(255)				Null,
							 brand_public		tinyint(1)				Not null,
							 Primary key (brand_id)
							 );
							";
			$this->db->exec($createBrands);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
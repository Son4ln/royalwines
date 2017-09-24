<?php
	class BrandsSeeder extends ConnectMySql{
		function createBrandsSeeder (){
		  parent::setConnect();	
		  try {
			$createBrandsSeeder = "INSERT INTO brands VALUES ('', 'Wine 1', 'wine1.jpg', 0),
															  ('', 'Wine 2', 'wine2.jpg', 0)";
			$this->db->exec($createBrandsSeeder);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
<?php
	class BrandsSeeder extends ConnectMySql{
		function createBrandsSeeder (){
		  parent::setConnect();	
		  try {
			$createBrandsSeeder = "INSERT INTO brands VALUES ('', UUID(), 'Wine 1', '1.jpg', 1, 1),
															  ('', UUID(), 'Wine 2', '2.jpg', 2, 1),
															  ('', UUID(), 'Wine 2', '3.jpg', 3, 1)";
			$this->db->exec($createBrandsSeeder);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
<?php
	class ProductsSeeder extends ConnectMySql{
		function createProductsSeeder (){
		  parent::setConnect();	
		  try {
			$createProductsSeeder = "INSERT INTO products
			VALUES
			  ('', UUID(), 'Product Wine 1', '1.jpg', 10000000, 9000000, 100, 10,
			    'Chi tiet san pham 1', '2017-10-30', null, 1, 1, 1, 1),
			  ('', UUID(), 'Product Wine 2', '2.jpg', 20000000, null, 5, 20,
			    'Chi tiet san pham 2', '2017-10-30', null, 2, 2, 2, 1),
			  ('', UUID(), 'Product Wine 3', '3.jpg', 30000000, null, 50, 30,
			    'Chi tiet san pham 3', '2017-10-30', null, 3, 3, 3, 1)";
			$this->db->exec($createProductsSeeder);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
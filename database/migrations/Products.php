<?php
	class Products extends ConnectMySql{
		function createProducts (){
		  parent::setConnect();	
		  try {
			$createProducts = "Create table products (
							   product_id		int(11)		Auto_increment	Not null,
							   uid 				text 					Not Null,
							   product_name	text					Not null,
							   featured_img		text					Not null,
							   price			int(11)					Not null,
							   discount		int(11)					Null,
							   in_stock		tinyint(4)					Not null,
							   product_time		tinyint(4)				Not null,
							   product_detail	text					Null,
							   create_date		date					Not null,
							   update_date		date					Null,
							   product_public	tinyint(1)				Not null,
							   product_status	tinyint(1)				Not null,
							   brand_id		int(11)					Not null,
							   category_id		int(11)					Not null,
							   user_id		int(11)					Not null,
							   Primary key (product_id)
							   );
							 ";
			$this->db->exec($createProducts);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
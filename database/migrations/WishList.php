<?php
	class WishList extends ConnectMySql{
		function createWishList (){
		  parent::setConnect();	
		  try {
			$createWishList = "Create table wishlist (
						 wishlist_id		int(11)		Auto_increment	Not null,
						 user_id		int(11)					Not null, 
						 product_id		int(11)					Not null, 
						 Primary key (wishlist_id)
						 );
						";
			$this->db->exec($createWishList);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
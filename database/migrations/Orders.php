<?php
	class Orders extends ConnectMySql{
		function createOrders (){
		  parent::setConnect();	
		  try {
			$createOrders = "Create table orders (
							 order_id		int(11)		Auto_increment	Not null,
							 order_date		date					Not null,
							 received_date	date					Not null,
							 total			int(11)					Not null,
							 order_status		tinyint(1)				Not null,
							 order_note		text					Null,
							 user_id		int(11)					Not null,
							 Primary key (order_id)
							 );
							";
			$this->db->exec($createOrders);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
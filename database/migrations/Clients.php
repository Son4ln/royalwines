<?php
	class Clients extends ConnectMySql{
		function createClients (){
		  parent::setConnect();	
		  try {
		  	parent::setConnect();
			$createClients = "Create table clients (
	 					  client_id		int(11)		Auto_increment	Not null,
						  full_name		varchar(255)				Not null,
						  email			varchar(128)				Null,
						  address		text						Not Null,
						  phone			varchar(50)					Not null,
						  note 			text 						Null,
						  Primary key (client_id)
						 );
						";
			$this->db->exec($createClients);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
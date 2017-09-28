<?php
	class Users extends ConnectMySql{
		function createUsers (){
		  parent::setConnect();	
		  try {
		  	parent::setConnect();
			$createUsers = "Create table users (
	 					  user_id		int(11)		Auto_increment	Not null,
						  full_name		varchar(255)				Not null,
						  email			varchar(128)				Not null,
						  address		text					Null,
						  phone			varchar(50)				Not null,
						  password		varchar(255)				Not null,
						  avatar			text					Not null,
						  permission		tinyint(1)				Not null,
						  is_active		tinyint(1)				Not null,
						  Primary key (user_id)
						 );
						";
			$this->db->exec($createUsers);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
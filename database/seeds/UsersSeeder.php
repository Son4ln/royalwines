<?php
	class UsersSeeder extends ConnectMySql{
		function createUsersSeeder (){
		  parent::setConnect();	
		  try {
			$createUsersSeeder = "INSERT INTO users VALUES ('', UUID(), 'Full Name', 'son4ln@gmail.com', 'qwerty', '0909445408', MD5('123456'), '1.jpg', 1, 2)";
			$this->db->exec($createUsersSeeder);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
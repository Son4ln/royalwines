<?php
	class ContactInfoSeeder extends ConnectMySql{
		function createContactInfoSeeder (){
		  parent::setConnect();	
		  try {
			$createContactInfoSeeder = "INSERT INTO contact_info VALUES ('', 'Royal Wines', '391 Nam Ky Khoi Nghia', 'Quan 3', '0969922871', 'toby.nguyen2905@gmail.com', 'Konnichiwa', '1.jpg', 'Description')";
			$this->db->exec($createContactInfoSeeder);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
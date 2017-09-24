<?php
	class ContactInfoSeeder extends ConnectMySql{
		function createContactInfoSeeder (){
		  parent::setConnect();	
		  try {
			$createContactInfoSeeder = "INSERT INTO contact_info VALUES ('', 'Royal Wines', '391 Nam Kỳ Khởi Nghĩa', 'Quận 3', '0969922871', 'toby.nguyen2905@', 'Konnichiwa', '1500711440-10625036_573521152752100_8655394363803063823_n.jpg', 'Tui chếch cho mấy người zừa!!!')";
			$this->db->exec($createContactInfoSeeder);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
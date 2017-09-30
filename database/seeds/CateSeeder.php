
<?php
	class CatesSeeder extends ConnectMySql{
		function createCatesSeeder (){
		  parent::setConnect();	
		  try {
			$createCatesSeeder = "INSERT INTO categories VALUES ('', UUID(), 'Wine 1', 1, 1),
															  ('', UUID(), 'Wine 2', 2, 1),
															  ('', UUID(), 'Wine 3', 3, 1)";
			$this->db->exec($createCatesSeeder);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
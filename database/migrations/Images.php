<?php
	class Images extends ConnectMySql{
		function createImages (){
		  parent::setConnect();	
		  try {
			$createImages = "Create table images (
							 image_id		int(11)		Auto_increment	Not null,
							 image		text							Null, 
							 product_id		int(11)						Not null,
							 Primary key (image_id)
						     );
							";
			$this->db->exec($createImages);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
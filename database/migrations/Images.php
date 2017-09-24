<?php
	class Images extends ConnectMySql{
		function createImages (){
		  parent::setConnect();	
		  try {
			$createImages = "Create table images (
							 image_id		int(11)		Auto_increment	Not null,
							 image1		text					Null, 
							 image2		text					Null,
							 image3		text					Null, 
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
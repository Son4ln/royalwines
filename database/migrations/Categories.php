<?php
	class Categories extends ConnectMySql{
		function createCategories (){
		  parent::setConnect();
		  try {
		  	
			$createCategories = "Create table categories (
								 category_id		int(11)		Auto_increment	Not null,
								 category_name	varchar(255)				Not null,
								 category_public	tinyint(1)				Not null,
								 Primary key (category_id)
								 );
								";
			$this->db->exec($createCategories);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
<?php
	class SlideShow extends ConnectMySql{
		function createSlideShow (){
		  parent::setConnect();
		  try {
		  	parent::setConnect();
			$createSlideShow = "Create table slide_show (
								slide_id		int(11)		Auto_increment	Not null, 
								slide_title		varchar(255)				Null,
								slide_description	text					Null,
								link			text					Null,
								Primary key (slide_id)
							   );
							  ";
			$this->db->exec($createSlideShow);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
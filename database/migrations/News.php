<?php
	class News extends ConnectMySql{
		function createNews (){
		  parent::setConnect();
		  try {
		  	
			$createNews = "Create table news (
						   news_id		int(11)		Auto_increment	Not null, 
						   news_date		date					Not null,
						   news_title		varchar(255)				Not null,
						   news_image		text					Not null,
						   news_detail		text					Not null,
						   news_public		tinyint(1)				Not null,
						   user_id		int(11)					Not null,
						   Primary key (news_id)
						   );
						  ";
			$this->db->exec($createNews);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
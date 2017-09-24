<?php
	class Evaluation extends ConnectMySql{
		function createEvaluation (){
		  parent::setConnect();	
		  try {
			$createEvaluation = "Create table evaluation (
								 evaluation_id		int(11)		Auto_increment	Not null,
								 user_id		int(11)					Not null, 
								 product_id		int(11)					Not null,
								 point			tinyint(1)				Null,
								 evaluation_report	 text					Null,
								 Primary key (evaluation_id)
								 );
								";
			$this->db->exec($createEvaluation);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
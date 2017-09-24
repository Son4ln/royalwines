<?php
	class ContactForm extends ConnectMySql{
		function createContactForm (){
		  parent::setConnect();
		  try {
			$createContactForm = "Create table contact_form (
								  form_id		int(11)		Auto_increment	Not null,
								  full_name		varchar(255)				Not null,
								  email			varchar(128)				Not null,
								  send_date		date					Not null,
								  subject		text					Not null,
								  message		text					Not null,
								  Primary key (form_id)
								  );
								";
			$this->db->exec($createContactForm);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>
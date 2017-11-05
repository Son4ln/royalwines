<?php

  /**
  * 
  */
  class ContactInfo extends DataBase
  {
  	//show contact info
  	function getContactInfo()
  	{
  	  $query = "select * from contact_info where info_id = 1";
  	  $result = parent::getInstance($query);
  	  return $result;
  	}

  	//update contact info
  	function updateContactInfo($address, $branch, $phone, $email, $intro, $event, $rules, $logo, $slogan)
  	{
  	  $query = "update contact_info set address = '$address', branch = '$branch', phone = '$phone', 
  	  email = '$email', introduce = '$intro', event = '$event', rules = '$rules', logo = '$logo', slogan = '$slogan' where info_id = 1";
  	  parent::exec($query);
  	}

  }

?>
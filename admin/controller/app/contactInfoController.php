<?php
  /**
    * 
    */
    class ContactInfoController
    {	
    	function showContactInfo()
    	{
        $contactInfo = new ContactInfo();
        $resultContactInfo = $contactInfo -> getContactInfo();
    		include '../view/contact/contactInfo.php';
    	}

    	function updateContactInfo()
    	{
        sleep(1);
    		$path = $GLOBALS['UPLOADIMG'];
    		$address = $_POST['address'];

    		if(empty($_FILES['logo']['name'])){
    		  $logoName = $_POST['oldImg'];
    		} else {
          $file_ext=strtolower(end(explode('.',$_FILES['logo']['name'])));
          $expensions= array("jpeg","jpg","png");

          if(in_array($file_ext,$expensions) === false || $_FILES['logo']['error'] > 0){
            die('file_not_valid');
          }

    		  $logoName = time().'-'.$_FILES['logo']['name'];
    		}

      		$branch = $_POST['branch'];
      		$phone = $_POST['phone'];
      		$email = $_POST['email'];
      		$slogan = $_POST['slogan'];
      		$intro = $_POST['intro'];
      		$update = new ContactInfo();

      		try {
      		  $update -> updateContactInfo($address, $branch, $phone, $email, $intro, $logoName, $slogan);
      		} catch(PDOException $e) {
            die('fail');
      	  }

    	  	if(!empty($_FILES['logo']['name'])) {
    	  	  $currentImg = $_POST['oldImg'];
  		      BasicLibs::deleteFile($currentImg,$path);
            $fileLogo = $_FILES['logo'];
            $source = $_FILES['logo']['tmp_name'];
            $target = $path.$logoName;
            move_uploaded_file($source, $target);
    	  	}

          die('success');
    	}
    }  
?>
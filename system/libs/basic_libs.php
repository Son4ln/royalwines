<?php
  trait BasicLibs {

    // upload file
    function uploadFile($file,$path){
      $fileName = time().'-'.$file['name'];
      $source = $file['tmp_name'];
      $target = $path.DIRECTORY_SEPARATOR.$fileName;
      move_uploaded_file($source, $target);
    }

    //delete file
    function deleteFile ($file,$path){
      if(file_exists($path.DIRECTORY_SEPARATOR.$file)){
        unlink($path.DIRECTORY_SEPARATOR.$file);
      }
    }

    // redirect by action
    function redirect ($action){
      header("location:?action=$action");
    }

    // set alert message
    function setAlert ($mes, $alertLv) {
      $_SESSION['rwMessage'] = $mes;
      $_SESSION['rwAlertLv'] = $alertLv;
    }

    //get alert message with class boostrap
    function getAlert (){
      if(isset($_SESSION['rwMessage']) && isset($_SESSION['rwAlertLv'])){
          echo '<div class="alert alert-'.$_SESSION['rwAlertLv'].'">'.$_SESSION['rwMessage'].'<a href="" class="close" data-dismiss="alert" aria-label="close" title="close"><i class="fa fa-times"></i></a>'.'</div>';
          unset($_SESSION['rwAlertLv']);
          unset($_SESSION['rwMessage']);
        }
    }

  }
?>
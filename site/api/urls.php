<?php
  include 'api.php';

  $verb = $_SERVER['REQUEST_METHOD'];

  if(isset($_GET["url"])){
    $url=$_GET["url"]; }
  elseif (isset($_POST['url']))
  {
    $url=$_POST["url"];
  }
  
  //Phương thức get
  if ($verb == 'GET') {
    //tạo link api với phương thức get
    switch ($url) {
      case 'brandById':
        $brand = new BrandById();
        $brand -> get();
        break;

      case 'brandByName':
        $brand = new BrandByName();
        $brand -> get();
        break;

      default:
      break;
    }

    //Phương thức Post
  } elseif ($verb == 'POST') {
      //tạo link api với phương thức post
      switch ($url) {
        case '':
          
        break;

        default:
        break;
      }

  //Phương thức PUT
  } elseif ($verb == 'PUT') {
      //tạo link api với phương thức Put
      switch ($url) {
        case 'brand':
           echo "put";
        break;

        default:
        break;
    }

    //Phương thức DELETE
  } elseif ($verb == 'DELETE') {
      //tạo link api với phương thức DELETE
      switch ($url) {
        case 'brand':
           echo "Delete";
        break;

        default:
        break;
    }
  }
?>
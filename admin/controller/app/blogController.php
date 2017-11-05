<?php
  class BlogController {
    function blogList() {
      Permission::isBloger();
      include '../view/blog/blog_list.php';
    }

    function showBlogByPublic() {
      Permission::isBloger();
      $public = $_GET['public'];

      $table = 'tb-unpublic';
      if ($_GET['public'] == 2) {
        $table = 'tb-public';
      }

      $blog = new BlogModel();
      if ($_SESSION["royalwines_permission_ok"] < 3) {
        $data = $blog -> getAllBlogPublic($public);
      } else if ($_SESSION["royalwines_permission_ok"] == 4){
        $data = $blog -> getAllBlogPublicAndUser();
      }
      
      include '../view/blog/blog_public.php';
    }

    function delBlog() {
      Permission::isBloger();
      $id = $_GET['id'];
      $blog = new BlogModel();
      $blog -> delBlog($id);
      die('success');
    }

    function getBlogById() {
      Permission::isBloger();
      $id = $_GET['id'];
      $blog = new BlogModel();
      $item = $blog -> getBlogById($id);
      include '../view/blog/get_blog.php';
    }

    function updateBlog() {
      Permission::isBloger();
      $id = $_GET['id'];
      $date = date("Y-m-d");
      $title = $_POST['title'];
      $short_desc = $_POST['shortdesc'];
      $detail = $_POST['detail'];

      if(empty($_FILES['eblogImg']['name'])) {
        $img = $_POST['curImg'];
      } else {
        $exploded = explode('.',$_FILES['eblogImg']['name']);
        $file_ext=strtolower(end($exploded));
        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions) === false || $_FILES['eblogImg']['error'] > 0){
          die('file_not_valid');
        }

        $img = time().'-'.$_FILES['eblogImg']['name'];
      }

      $blog = new BlogModel();
      $blog -> UpdateBlog($id, $date, $title, $short_desc, $img, $detail);

      if (!empty($_FILES['eblogImg']['name'])) {
        //upload ảnh mới và xóa ảnh cũ
        $source = $_FILES['eblogImg']['tmp_name'];
        $path = $GLOBALS['UPLOADBLOG'];
        $target = $path.$img;
        move_uploaded_file($source, $target);

        $currImg = $_POST['curImg'];
        BasicLibs::deleteFile($currImg,$path);
      }

      die('success');
    }

    function updateStatus() {
      Permission::isBloger();
      $id = $_GET['id'];
      $blog = new BlogModel();
      $blog -> changeStatus($id);
      die('success');
    }

    function addBlog() {
      Permission::isBloger();
      $blog = new BlogModel();
      $date = date("Y-m-d");

      $exploded = explode('.',$_FILES['blogImg']['name']);
      $file_ext=strtolower(end($exploded));
      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions) === false || $_FILES['blogImg']['error'] > 0){
        die('file_error');
      }

      $title = $_POST['title'];
      $short_desc = $_POST['shortdesc'];
      
      $img = time().'-'.$_FILES['blogImg']['name'];
      $detail = $_POST['detail'];
      $blog -> addBlog($date, $title, $short_desc, $img, $detail);

      $source = $_FILES['blogImg']['tmp_name'];
      $path = $GLOBALS['UPLOADBLOG'];
      $target = $path.$img;
      move_uploaded_file($source, $target);
      
      die('success');
    }
  }

?>
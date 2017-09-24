<?php include $GLOBALS['ROOT'].'public/template/site/header.php' ?>
<?php include $GLOBALS['ROOT'].'public/template/site/nav.php' ?>
    <h1>
      Đây là home
    </h1>
    <form action="?action=homeAct" method="post" enctype="multipart/form-data">
    	<input type="file" name="file" />
    	<button type="submit">Ok</button>	
    </form>
<?php include $GLOBALS['ROOT'].'public/template/site/footer.php' ?>    
 
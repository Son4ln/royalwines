<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php 
  include $GLOBALS['ROOT'].'public/template/admin/header.php';

  $user = new UsersModel();
  $email = $_SESSION["royalwines_user_login_ok"];
  $pass = $_SESSION["royalwines_pass_login_ok"];
  $getUser = $user -> checkUser($email, $pass);
?>

<style type="text/css">
  .db-icon {
    text-align: center;
  }

  .db-icon a {
    font-size: 5rem;
    color: white;
  }
</style>

<!-- START PAGE CONTENT WRAPPER -->
<div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 text-center">
          <h1><b>Chúc Một Ngày Tốt Lành <?php echo $getUser['full_name']; ?>!</b></h1>
        </div>
      </div>
      <?php  if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2) { ?>
       <div class="row">
        <div class="col-md-4 m-b-10 m-t-20">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="panel-heading top-left top-right">
                    <div class="panel-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Thành Viên 
                        <i class="fa fa-chevron-right"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-xs-height">
                <div class="col-xs-height col-top relative">
                  <div class="row">
                    <div class="col-sm-12 db-icon">
                      <a href="?action=listUsers"><i class="fa fa-users" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>

        <div class="col-md-4 m-b-10 m-t-20">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="panel-heading top-left top-right">
                    <div class="panel-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Liên Hệ
                        <i class="fa fa-chevron-right"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-xs-height">
                <div class="col-xs-height col-top relative">
                  <div class="row">

                    <div class="col-sm-12 db-icon">
                      <a href="?action=viewAllContact"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>

        <div class="col-md-4 m-b-10 m-t-20">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="panel-heading top-left top-right">
                    <div class="panel-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Banner
                        <i class="fa fa-chevron-right"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-xs-height">
                <div class="col-xs-height col-top relative">
                  <div class="row">

                    <div class="col-sm-12 db-icon">
                      <a href="?action=listBanner#banner"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
      </div>  
      <?php } ?>

      <?php 
        if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2
          || $_SESSION["royalwines_permission_ok"] == 3) {
      ?>
      <div class="row">
        <div class="col-md-4 m-b-10 m-t-20">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="panel-heading top-left top-right">
                    <div class="panel-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Hóa đơn
                        <i class="fa fa-chevron-right"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-xs-height">
                <div class="col-xs-height col-top relative">
                  <div class="row">

                    <div class="col-sm-12 db-icon">
                      <a href="?action=viewAllOrder"><i class="fa fa-gavel" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
    
        <div class="col-md-4 m-b-10 m-t-20">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="panel-heading top-left top-right">
                    <div class="panel-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Nhãn Hiệu Sản Phẩm
                        <i class="fa fa-chevron-right"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-xs-height">
                <div class="col-xs-height col-top relative">
                  <div class="row">

                    <div class="col-sm-12 db-icon">
                      <a href="?action=listBrands"><i class="fa fa-database" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>

        <div class="col-md-4 m-b-10 m-t-20">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="panel-heading top-left top-right">
                    <div class="panel-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Xuất xứ
                        <i class="fa fa-chevron-right"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-xs-height">
                <div class="col-xs-height col-top relative">
                  <div class="row">

                    <div class="col-sm-12 db-icon">
                      <a href="?action=getCate"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
      </div>
      <?php } ?>

      <div class="row">
      <?php 
      if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2
        || $_SESSION["royalwines_permission_ok"] == 3) {
      ?>
        <div class="col-md-4 m-b-10 m-t-20">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="panel-heading top-left top-right">
                    <div class="panel-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Sản phẩm
                        <i class="fa fa-chevron-right"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-xs-height">
                <div class="col-xs-height col-top relative">
                  <div class="row">

                    <div class="col-sm-12 db-icon">
                      <a href="?action=viewAllOrder"><i class="fa fa-cubes" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>


      <?php } ?>

      <?php 
      if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2
        || $_SESSION["royalwines_permission_ok"] == 4) {
      ?>
        <div class="col-md-4 m-b-10 m-t-20">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="panel-heading top-left top-right">
                    <div class="panel-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Tin Tức
                        <i class="fa fa-chevron-right"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-xs-height">
                <div class="col-xs-height col-top relative">
                  <div class="row">

                    <div class="col-sm-12 db-icon">
                      <a href="?action=listBlog#public"><i class="fa fa-newspaper-o" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>

        <?php 
      if ($_SESSION["royalwines_permission_ok"] == 1) {
      ?>

        <div class="col-md-4 m-b-10 m-t-20">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="panel-heading top-left top-right">
                    <div class="panel-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Thông tin cửa hàng
                        <i class="fa fa-chevron-right"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-xs-height">
                <div class="col-xs-height col-top relative">
                  <div class="row">

                    <div class="col-sm-12 db-icon">
                      <a href="?action=contactInfo"><i class="fa fa-info" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
      <?php } ?>

        <?php } ?>
      </div>
    </div>    
  </div>
</div>
<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>  
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar-right.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/scripts.php'; ?>
<!-- START SCRIPT BLOCK -->
<script type="text/javascript">

</script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
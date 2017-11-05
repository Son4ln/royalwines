<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
<style type="text/css">
  tr {
    cursor: pointer;
  }

  #review-img {
    cursor: pointer;
  }
</style>

<!-- START PAGE CONTENT WRAPPER -->
<div class="page-content-wrapper">
<!-- START PAGE CONTENT -->
  <div class="content ">
    <!-- START JUMBOTRON -->
    <div class="jumbotron" data-pages="parallax">
      <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
          <!-- START BREADCRUMB -->
          <ul class="breadcrumb">
            <li>
              <a href="?action=home">Pages</a>
            </li>
            <li><a href="#" class="active">Cài đặt</a>
            </li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>
    <!-- END JUMBOTRON -->
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <div class="row">
        <div class="col-sm-12">
          <h5>CÀI ĐẶT</h5>
          <br>
          <br>
          <?php
            BasicLibs::getAlert();
          ?>
          <div class="panel panel-transparent ">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
              <li class="active">
                <a data-toggle="tab" href="#add"><span>Sửa thông tin</span></a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane slide-left active" id="add">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-body">
                    <form id="form-editProfile" method="" enctype="multipart/form-data">
                      <div class="alert alert-danger hidden" id="alert-add"></div>
                      <input type="text" name="user-id" id="user-id" class="hidden">
                      <input type="text" name="old-img" id="old-img" class="hidden">
                      <div class="row">
                        <div class="col-md-6">
                          <center><img src="../../upload/brands/logo.png" width="250" id="review-img"></center>
                          <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
                          <center>
                            <input type="file" class="form-control hidden" name="avatar" id="avatar">
                            <button type="button" id="ecancel-img" class="btn btn-primary hidden"><i class="fa fa-times"></i></button>
                          </center>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group form-group-default required">
                            <label>Họ và tên</label>
                            <input type="text" class="form-control" name="fullname">
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address">
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="phone">
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Mật khẩu cũ</label>
                            <input type="password" class="form-control" name="oldPass">
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="newPass">
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="rePass">
                          </div>
                   
                          <div class="clearfix"></div>
                          <button class="btn btn-success" id="add-brands" type="submit">sửa thông tin</button>
                        </div>
                      </div>                                          
                    </form>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END PLACE PAGE CONTENT HERE -->
    </div>
    <!-- END CONTAINER FLUID -->
  </div>
<!-- END PAGE CONTENT -->
</div>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>  
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar-right.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/scripts.php'; ?>
<!-- START SCRIPT BLOCK -->

<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
<style type="text/css">
  tr {
    cursor: pointer;
  }

  #review-img {
    cursor: pointer;
  }

  .jumbotron {
    margin-bottom: 0;
  }
</style>

<!-- START PAGE CONTENT WRAPPER -->
<div class="page-content-wrapper">
<!-- START PAGE CONTENT -->
  <div class="content ">
    <div class="jumbotron" data-pages="parallax">
      <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
          <!-- START BREADCRUMB -->
          <ul class="breadcrumb">
            <li>
              <a href="?action=home">Pages</a>
            </li>
            <li><a href="#" class="active">Thông tin công ty</a>
            </li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>THÔNG TIN CÔNG TY</h5>
      </div>

      <div class="panel-body">
        <form id="info-form" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <center><img src="../../upload/<?php echo $resultContactInfo['logo']; ?>" width="300" id="review-img"></center>
              <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
              <center><input type="file" class="form-control hidden" name="logo" id="logo"></center>
              <input type="hidden" name="currImg" id="oldImg" value="<?php echo $resultContactInfo['logo']; ?>">
              <center><button type="button" id="cancel-img" class="btn btn-success hidden"><i class="fa fa-times"></i></button></center>
            </div>

            <div class="col-md-6">
              <div class="form-group form-group-default required">
                <label>Tên cửa hàng</label>
                <input type="text" class="form-control" name="ctyName" 
                value="<?php echo $resultContactInfo['store_name']; ?>" disabled>
              </div>

              <div class="form-group form-group-default required">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" name="address" id="address"
                value="<?php echo $resultContactInfo['address']; ?>">
              </div>

              <div class="form-group form-group-default">
                <label>Chi nhánh</label>
                <input type="text" class="form-control" name="branch" id="branch"
                value="<?php echo $resultContactInfo['branch']; ?>">
              </div>

              <div class="form-group form-group-default required">
                <label>SĐT</label>
                <input type="text" class="form-control" name="sdt" id="sdt"
                value="<?php echo $resultContactInfo['phone']; ?>">
              </div>

              <div class="form-group form-group-default required">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email"
                value="<?php echo $resultContactInfo['email']; ?>">
              </div>

              <div class="form-group form-group-default required">
                <label>Khẩu hiệu</label>
                <input type="text" class="form-control" name="slogan" id="slogan"
                value="<?php echo $resultContactInfo['slogan']; ?>">
              </div>

              <div class="form-group form-group-default required">
                <label>Giới thiệu</label>
                <textarea class="form-control" name="intro" id="intro"><?php echo $resultContactInfo['introduce']; ?></textarea>
              </div>

              <div class="clearfix"></div>
              <button class="btn btn-success" id="update" type="submit">Cập nhập</button>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>  
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar-right.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/scripts.php'; ?>
<!-- START SCRIPT BLOCK -->
<script src="../../public/assets/js/contact.js" type="text/javascript"></script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/searchbox.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
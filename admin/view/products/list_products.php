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
            <li><a href="#" class="active">Sản phẩm</a>
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
          <h5>SẢN PHẨM</h5>
          <br>
          <br>
          <?php
            BasicLibs::getAlert();
          ?>
          <div class="panel panel-transparent ">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
              <li class="active">
                <a data-toggle="tab" href="#add"><span>Thêm sản phẩm</span></a>
              </li>

              <li>
                <a data-toggle="tab" data-public="2" data-table="table-public" data-product="show-product-public" data-show="products-public" class="public" id="tab-public" href="#public"><span>Public</span></a>
              </li>

              <li>
                <a data-toggle="tab" data-public="1" data-table="table-unpublic" data-product="show-product-unpublic" data-show="products-unpublic" class="public" id="tab-unpublic" href="#unpublic"><span>Unpublic</span></a>
              </li>
              <?php 
                if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2) {
              ?>
                <li>
                  <a data-toggle="tab" data-public="1" data-table="table-unpublic" data-product="show-product-unpublic" data-show="products-unpublic" class="public" id="tab-wait" href="#wait"><span>Chờ phê duyệt</span></a>
                </li>
              <?php
                }
              ?>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane slide-left active" id="add">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-body">
                    <form id="form-addproduct" method="post" enctype="multipart/form-data" action="">
                      <div class="alert alert-danger hidden" id="add-alert"></div>
                      <div class="row">
                        <div class="col-md-6">
                          <center><img src="../../upload/products/logo.png" width="250" id="review-img"></center>
                          <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
                          <center>
                            <input type="file" class="form-control hidden" name="productImg" id="brand-logo">
                            <button type="button" id="cancel-img" class="btn btn-success hidden"><i class="fa fa-times"></i></button>
                          </center><br/>

                          <div class="form-group form-group-default required">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="productName">
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Giá gốc</label>
                            <input type="text" class="form-control" name="price">
                          </div>

                          <div class="form-group form-group-default">
                            <label>Giảm giá</label>
                            <input type="text" class="form-control" name="discount">
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Hàng trong kho</label>
                            <input type="text" class="form-control" name="inStock">
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Năm sản phẩm</label>
                            <input type="text" class="form-control" name="time">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group form-group-default required">
                            <label>Thương hiệu</label>
                            <select name="brandId" class="form-control">
                              <?php
                                foreach ($brand as $brands) {
                              ?>
                                <option value="<?php echo $brand['brand_id']; ?>">
                                  <?php echo $brand['brand_name']; ?>
                                </option>
                              <?php
                                }
                              ?>
                            </select>
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Loại sản phẩm</label>
                            <select name="categoryId" class="form-control">
                              <?php
                                foreach ($category as $categories) {
                              ?>
                                <option value="<?php echo $category['category_id']; ?>">
                                  <?php echo $category['category_name']; ?>
                                </option>
                              <?php
                                }
                              ?>
                            </select>
                          </div>

                          <div class="form-group form-group-default required">
                            <label>Chi tiết sản phẩm</label>
                            <input type="text" class="form-control" name="detail">
                          </div>

                          <div class="clearfix"></div>
                          <button class="btn btn-success" id="add-products" type="submit">Thêm sản phẩm</button>
                        </div>
                      </div>                                          
                    </form>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>

              <div class="tab-pane slide-left" id="public">
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Thao tác với sản phẩm đang hiển thị
                      <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
                    </div>

                    <div class="pull-right">
                      <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="panel-body" id="products-public">
                    
                  </div>
                </div>
              </div>

              <div class="tab-pane slide-left" id="unpublic">
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Thao tác với sản phẩm chưa hiển thị 
                      <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
                    </div>

                    <div class="pull-right">
                      <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                      </div>
                    </div>

                    <div class="clearfix"></div>
                  </div>

                  <div class="panel-body" id="products-unpublic">
                    
                  </div>
                </div>
              </div>

              <?php 
                if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2) {
              ?>
              <div class="tab-pane slide-left" id="wait">
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Thao tác với sản phẩm đang chờ phê duyệt
                      <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
                    </div>

                    <div class="pull-right">
                      <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                      </div>
                    </div>

                    <div class="clearfix"></div>
                  </div>

                  <div class="panel-body" id="products-wait">
                    
                  </div>
                </div>
              </div>
              <?php } ?>
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

<div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
          <button type="button" id="close-edit" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
          </button>
          <h5>Sửa <span class="semi-bold">nhãn hiệu</span></h5>
        </div>
        
        <div class="modal-body">
          <form id="form-editproduct" method="" enctype="multipart/form-data">
            <div class="alert alert-danger hidden" id="alert-add"></div>
            <input type="text" name="product-id" id="eproduct-id" class="hidden">
            <input type="text" name="old-img" id="eold-img" class="hidden">
            <div class="row">
              <div class="col-md-6">
                <center><img src="../../upload/products/logo.png" width="250" id="ereview-img"></center>
                <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
                <center>
                  <input type="file" class="form-control hidden" name="eproductlogo" id="eproduct-logo">
                  <button type="button" id="ecancel-img" class="btn btn-primary hidden"><i class="fa fa-times"></i></button>
                </center>
              </div>

              <div class="col-md-6">
                <div class="form-group form-group-default required">
                  <label>Tên nhãn hiệu</label>
                  <input type="text" class="form-control" name="eproductname" id="eproductname">
                </div>

                <div class="clearfix"></div>
                <button class="btn btn-success" id="add-btn" type="submit">Sửa nhãn hiệu</button>
              </div>
            </div>                                          
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>  
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar-right.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/scripts.php'; ?>
<!-- START SCRIPT BLOCK -->
<script src="../../public/assets/js/list_product.js" type="text/javascript"></script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
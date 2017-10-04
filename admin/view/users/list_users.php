<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

<div class="page-content-wrapper">
  <div class="content">
    <div class="jumbotron" data-pages="parallax">
      <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
          <!-- START BREADCRUMB -->
          <ul class="breadcrumb">
            <li>
              <a href="?action=home">Pages</a>
            </li>
            <li><a href="#" class="active">Users</a>
            </li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>Quản lý người dùng</h5>
      </div>

      <div class="panel-body">
        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
          <li class="active">
            <a data-toggle="tab" href="#list" id="list-users"><span>Danh sách người dùng</span></a>
          </li>

          <li>
            <a data-toggle="tab" href="#list-lock" id="list-users-lock"><span>Danh sách người dùng bị khóa</span></a>
          </li>
        </ul>

        <div class="tab-content">

          <div class="tab-pane slide-left active" id="list">
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">Quản lý người dùng
                  <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden" id="active-users-loading" style="font-size: 16px;"></i>
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>

              <div class="panel-body" id="show-active-user">
                
              </div>
            </div>
          </div>

          <div class="tab-pane slide-left" id="list-lock">
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">Người dùng đã bị khóa
                  <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden" id="deactive-users-loading" style="font-size: 16px;"></i>
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body" id="show-user-lock">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>  
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar-right.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/scripts.php'; ?>
<!-- START SCRIPT BLOCK -->
<script src="../../public/assets/js/list_users.js" type="text/javascript"></script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
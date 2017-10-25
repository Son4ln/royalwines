<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

<div class="page-content-wrapper ">
  <div class="content">
    <div class="jumbotron" data-pages="parallax">
      <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
          <!-- START BREADCRUMB -->
          <ul class="breadcrumb">
            <li>
              <a href="?action=home">Pages</a>
            </li>
            <li><a href="#" class="active">Quản lý người dùng</a>
            </li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>

    <div class="container-fluid container-fixed-lg">
      <h5>QUẢN LÝ NGƯỜI DÙNG</h5>
      <br>
      <br>

      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">Xem những gì người dùng đã thao tác
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
          </div>

          <div class="pull-right">
            <div class="col-xs-12">
              <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
            </div>
          </div>
          
          <div class="clearfix"></div>
        </div>

        <div class="panel-body" id="brands-unpublic">
          <table class="table table-hover demo-table-search" id="view-mess">
            <thead>
              <tr>
                <th>User</th>
                <th>Thời gian</th>
                <th>Hành động</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($resultManage as $key) {?>
              <tr>
                <td>
                  <?php
                    $user = new UsersModel();
                    $getUser = $user -> getUserById($key['user_id']);
                    echo $getUser['full_name'].'('.$getUser['email'].')';
                  ?> 
                 </td>
                <td><?php echo date("d-m-Y H:i:s", strtotime($key['date_input'])); ?></td>
                <td><?php echo $key['content']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>  
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar-right.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/scripts.php'; ?>
<!-- START SCRIPT BLOCK -->
<script type="text/javascript">
  $(document).ready(function() {
    dataTable();
  });

  function dataTable() {
    let responsiveHelper = undefined;
    let breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };

    // Initialize datatable showing a search box at the top right corner
    let initTableWithSearch = function() {
      let table = $('#view-mess');

      let settings = {
        "sDom": "<'table-responsive't><'row'<p i>>",
        "destroy": true,
        "scrollCollapse": true,
        "bFilter": true,
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        },
        "iDisplayLength": 10
      };

      table.dataTable(settings);

      // search box for table
      $('#search-table').keyup(function() {
          table.fnFilter($(this).val());
      });
    }

    initTableWithSearch();
}
</script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
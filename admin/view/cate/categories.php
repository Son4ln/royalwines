<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

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
            <li><a href="#" class="active">Loại sản phẩm</a>
            </li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>

    <div class="container-fluid container-fixed-lg">
      <h5>LOẠI SẢN PHẨM</h5>
      <br>
      <br>
      <?php
        BasicLibs::getAlert();
      ?>
      <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
        <li class="active">
          <a data-toggle="tab" id="tab-add" href="#add"><span>Thêm loại sản phẩm</span></a>
        </li>

        <li>
          <a data-toggle="tab" id="tab-public" href="#public"><span>Public</span></a>
        </li>

        <li>
          <a data-toggle="tab" id="tab-unpublic" href="#unpublic"><span>Unpublic</span></a>
        </li>
        <?php 
          if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2) {
        ?>
          <li>
            <a data-toggle="tab" id="tab-wait" href="#wait"><span>Chờ phê duyệt</span></a>
          </li>
        <?php
          }
        ?>
      </ul>

      <div class="tab-content">
        <div class="tab-pane slide-left active" id="add">
                <!-- START PANEL -->
          <div class="panel panel-transparent">
            <div class="panel-body">
              <form id="form-addCate" method="post">
                <div class="alert alert-danger hidden" id="add-alert"></div>
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group form-group-default required">
                      <label>Tên loại sản phẩm</label>
                      <input type="text" class="form-control" name="catename">
                    </div>
             
                    <?php if ($_SESSION["royalwines_permission_ok"] < 3) { ?>
                    <div class="form-group form-group-default">
                      <label>Trạng thái</label>
                      <select name="status" class="form-control">
                        <option value="1">Unpublic</option>
                        <option value="2">Public</option>
                      </select>
                    </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                    <button class="btn btn-success" id="add-brands" type="submit">Thêm loại sản phẩm</button>
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
              <div class="panel-title">Thao tác loại sản phẩm đang hiển thị
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
              </div>

              <div class="pull-right">
                <div class="col-xs-12">
                  <input type="text" id="search-table-public" class="form-control pull-right" placeholder="Search">
                </div>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="panel-body" id="public-cate">
              
            </div>
          </div>
        </div>

        <div class="tab-pane slide-left" id="unpublic">
          <div class="panel panel-transparent">
            <div class="panel-heading">
              <div class="panel-title">Thao tác loại sản phẩm đã ngưng hiển thị
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
              </div>

              <div class="pull-right">
                <div class="col-xs-12">
                  <input type="text" id="search-table-unpublic" class="form-control pull-right" placeholder="Search">
                </div>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="panel-body" id="unpublic-cate">
              
            </div>
          </div>
        </div>

        <div class="tab-pane slide-left" id="wait">
          <div class="panel panel-transparent">
            <div class="panel-heading">
              <div class="panel-title">Thao tác loại sản phẩm đang chờ phê duyệt
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
              </div>

              <div class="pull-right">
                <div class="col-xs-12">
                  <input type="text" id="search-table-wait" class="form-control pull-right" placeholder="Search">
                </div>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="panel-body" id="wait-cate">
             
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
          <button type="button" id="close-edit" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
          </button>
          <h5>Sửa <span class="semi-bold">nhãn hiệu</span></h5>
        </div>
        
        <div class="modal-body">
          <form id="form-editCate" method="" enctype="multipart/form-data">
            <div class="alert alert-danger" id="alert-edit"></div>
            <input type="text" name="ecate-id" id="ecate-id" class="hidden">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group form-group-default required">
                  <label>Tên loại sản phẩm</label>
                  <input type="text" class="form-control" name="ecateName" id="ecateName">
                </div>

                <div class="clearfix"></div>
                <button class="btn btn-success" id="add-btn" type="submit">Sửa</button>
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
<script type="text/javascript">
  let cateState = {
    status: ''
  }

  $(document).ready(() => {
    let locationHash = [];
    if (location.hash) {
      locationHash = location.hash.split('/');
      routerCate(locationHash);
    }

    $(window).on('hashchange', function() {
      locationHash = location.hash.split('/');
      routerCate(locationHash);
    });

    $('#tab-add').click(() => {
      location.hash = 'addCate';
    });

    $('#tab-public').click(() => {
      location.hash = 'public-categories';
    });

    $('#tab-unpublic').click(() => {
      location.hash = 'unpublic-categories';
    });

    $('#tab-wait').click(() => {
      location.hash = 'wait-cate';
    });

    validateEditForm();
    validateAddForm();
  });

  function dataTable(whatTable, whatSearch) {
    let responsiveHelper = undefined;
    let breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };

  // Initialize datatable showing a search box at the top right corner
    let initTableWithSearch = function() {
      let tb = `#${whatTable}`;
      let search = `#${whatSearch}`;
      let table = $(tb);

      let settings = {
        "sDom": "<'table-responsive't><'row'<p i>>",
        "destroy": true,
        "scrollCollapse": true,
        "ordering": false,
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        },
        "iDisplayLength": 5
      };

      table.dataTable(settings);

      // search box for table
      $(search).keyup(function() {
          table.fnFilter($(this).val());
      });
    }

    initTableWithSearch();
  }

  function routerCate(locationHash) {
    let url = locationHash[0];
    switch (url) {
      case '#addCate':
        $('#tab-add').click();
        break;

      case '#public-categories':
        $('#tab-public').click();
        publicCate();
        break;

      case '#unpublic-categories':
        $('#tab-unpublic').click();
        unpublicCate();
        break;

      case '#wait-cate':
        $('#tab-wait').click();
        waitCate();
        break;
    }
  }

  function publicCate() {
    $('.loading').removeClass('hidden');
    cateState.status = 'public';
    $.ajax({
      url: '?action=getCateByStatus',
      type: 'get',
      dataType: 'text',
      data: {
        public: 2
      },
      success: function(result) {
        $('#public-cate').html(result);
        $('.loading').addClass('hidden');
        dataTable('table-public', 'search-table-public');

        $('.change-status').click((e) => {
          let target = $(e.target);
          if (target.is('i')) {
            target = $(e.target).parent();
          }

          changeStatus(target);
        });

        $('.del-cate').click((e) => {
          let target = $(e.target);
          if (target.is('i')) {
            target = $(e.target).parent();
          }
          delCate(target);
        });
        
        $('.edit-cate').click((e) => {
          let target = $(e.target);
          if (target.is('i')) {
            target = $(e.target).parent();
          }
          updateCate(target);
        });
      }
    });
  }

  function unpublicCate() {
    cateState.status = 'unpublic';
    $('.loading').removeClass('hidden');
    $.ajax({
      url: '?action=getCateByStatus',
      type: 'get',
      dataType: 'text',
      data: {
        public: 1
      },
      success: function(result) {
        $('#unpublic-cate').html(result);
        $('.loading').addClass('hidden');
        dataTable('table-unpublic', 'search-table-unpublic');

        $('.change-status').click((e) => {
          let target = $(e.target);
          if (target.is('i')) {
            target = $(e.target).parent();
          }

          changeStatus(target);
        });

        $('.del-cate').click((e) => {
          let target = $(e.target);
          if (target.is('i')) {
            target = $(e.target).parent();
          }
          delCate(target);
        });
        
        $('.edit-cate').click((e) => {
          let target = $(e.target);
          if (target.is('i')) {
            target = $(e.target).parent();
          }
          updateCate(target);
        });
      }
    });
  }

  function waitCate() {
    cateState.status = 'wait';
    $('.loading').removeClass('hidden');
    $.ajax({
      url: '?action=getCateByStatus',
      type: 'get',
      dataType: 'text',
      data: {
        public: 3
      },
      success: function(result) {
        $('#wait-cate').html(result);
        $('.loading').addClass('hidden');
        dataTable('table-wait', 'search-table-wait');

        $('.change-status').click((e) => {
          let target = $(e.target);
          if (target.is('i')) {
            target = $(e.target).parent();
          }

          changeStatus(target);
        });

        $('.del-cate').click((e) => {
          let target = $(e.target);
          if (target.is('i')) {
            target = $(e.target).parent();
          }
          delCate(target);
        });

        $('.edit-cate').click((e) => {
          let target = $(e.target);
          if (target.is('i')) {
            target = $(e.target).parent();
          }
          updateCate(target);
        });
        
      }
    });
  }

  function changeStatus(target) {
    let uid = target.attr('data-id');
    let status = target.attr('data-status');
    $.ajax({
      url: '?action=changeCateStatus',
      type: 'get',
      dataType: 'text',
      data: {
        public: status,
        uid: uid
      },
      success: function(result) {
        target.parents('tr').fadeOut();
        let mess = 'Loại sản phẩm đã được hiển thị';
        if (status === '3') {
          mess = 'Loại sản phẩm đã được phê duyệt';
        } else if (status === '2') {
          mess = 'Loại sản phẩm đã ngưng hiển thị';
        }
        
        let lv = 'success';
        notification(mess, lv);

        if (cateState.status === 'public') {
          publicCate();
        } else if (cateState.status === 'unpublic') {
          unpublicCate();
        } else {
          waitCate();
        }
      }
    });
  }

  function delCate(target) {
    let uid = target.attr('data-id');
    $.confirm({
      title: 'XÓA LOẠI SẢN PHẨM',
      content: 'Bạn có chắc muốn xóa loại sản phẩm này',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        ok: {
          text: 'Xóa',
          btnClass: 'btn-orange',
          action: function() {
            $.ajax({
              url: '?action=delCate',
              type: 'get',
              dataType: 'text',
              data: {
                uid: uid
              },
              success: function(result) {
                let mess = 'Đã xóa loại sản phẩm thành công';
                let lv = 'success';
                if (result === 'fail') {
                  mess = `Bạn không thể xóa loại sản phẩm này do có liên kết với sản phẩm.
                  Vui lòng xóa hết sản phẩm hoặc ngừng hiển thị`;
                  lv = 'danger';
                }
                notification(mess, lv);
                target.parents('tr').fadeOut();

                if (cateState.status === 'public') {
                  publicCate();
                } else if (cateState.status === 'unpublic') {
                  unpublicCate();
                } else {
                  waitCate();
                }
              }
            });
          }
        },
        cancel: {
          text: 'Hủy'
        }
      }
    });
  }

  function updateCate(target) {
    let uid = target.attr('data-id');
    let name = target.attr('data-name');
    $('#ecateName').val(name);
    $('#ecate-id').val(uid);
    $('#modalSlideUp').modal();
    $('#alert-edit').addClass('hidden');
  }

  function updateCateAct() {
    let uid = $('#ecate-id').val();
    let name = $('#ecateName').val();
    $.ajax({
      url: '?action=updateCate',
      type: 'post',
      dataType: 'text',
      data: {
        uid: uid,
        name: name,
      },
      success: function(result) {
        if (result === 'unique') {
          $('#alert-edit').html('Loại sản phẩm đã tồn tại');
          $('#alert-edit').removeClass('hidden');
          return;
        }

        let mess = 'Đã cập nhật loại sản phẩm thành công';
        let lv = 'success';
        notification(mess, lv);
        $('#modalSlideUp').modal('hide');

        if (cateState.status === 'public') {
          publicCate();
        } else if (cateState.status === 'unpublic') {
          unpublicCate();
        } else {
          waitCate();
        }
      }
    });
    return false;
  }

  function addCate() {
    let name = $('[name="catename"]').val();
    let status = 3;
    if ($('[name="status"]')) {
      status = $('[name="status"]').val();
    }
    
    $.ajax({
      url: '?action=addCate',
      dataType: 'text',
      type: 'post',
      data: {
        name: name,
        status: status
      },
      success: function(result) {
        if (result == 'unique') {
          $('#add-alert').html('Loại sản phẩm đã tồn tại');
          $('#add-alert').removeClass('hidden');
          return;
        }

        if (status === '1') {
          $('#tab-unpublic').click();
        } else if (status === '2'){
          $('#tab-public').click();
        }

        let mess = 'Đã thêm loại sản phẩm thành công, nếu là seller hãy đợi admin phê duyệt';
        let lv = 'success';
        notification(mess, lv);
        $('#form-addCate')[0].reset();
        $('#add-alert').addClass('hidden');
      }
    });
    return false;
  }

  function validateAddForm() {
    $('#form-addCate').validate({
      rules: {
        catename: 'required',
      },
      messages: {
        catename: 'Vui lòng nhập tên loại sản phẩm'
      },
      submitHandler: function(form) {
        addCate();
      }
    });
  }

  function validateEditForm() {
  $('#form-editCate').validate({
    rules: {
      ecateName: 'required',
    },
    messages: {
      ecateName: 'Vui lòng nhập tên loại sản phẩm'
    },
    submitHandler: function(form) {
      updateCateAct();
    }
  });
}
</script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
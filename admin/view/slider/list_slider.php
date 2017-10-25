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
            <li><a href="#" class="active">Banner</a>
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
          <a data-toggle="tab" id="tab-add" href="#add"><span>Thêm banner</span></a>
        </li>

        <li>
          <a data-toggle="tab" id="tab-banner" href="#banner-list"><span>Banner</span></a>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane slide-left active" id="add">
                <!-- START PANEL -->
          <div class="panel panel-transparent">
            <div class="panel-body">
              <form id="form-addBanner" method="">
                <div class="alert alert-danger hidden" id="alert-add"></div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-group-default required">
                      <label>Tiêu đề</label>
                      <input type="text" class="form-control" name="title" id="title">
                    </div>

                    <div class="form-group form-group-default required">
                      <label>Mô tả</label>
                      <input type="text" class="form-control" name="desc" id="desc">
                    </div>

                    <div class="form-group form-group-default required">
                      <label>Link</label>
                      <input type="text" class="form-control" name="link" id="link">
                    </div>

                    <div class="clearfix"></div>
                    <button class="btn btn-success" id="add-btn" type="submit">Thêm</button>
                  </div>
                </div>                                          
              </form>
            </div>
          </div>
          <!-- END PANEL -->
        </div>

        <div class="tab-pane slide-left" id="banner-list">
          <div class="panel panel-transparent">
            <div class="panel-heading">
              <div class="panel-title">Thao tác với banner
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
              </div>

              <div class="pull-right">
                <div class="col-xs-12">
                  <input type="text" id="search-table-banner" class="form-control pull-right" placeholder="Search">
                </div>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="panel-body" id="banner">
              
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
          <h5>Sửa <span class="semi-bold">Banner</span></h5>
        </div>
        
        <div class="modal-body">
          <form id="form-editBanner" method="">
            <input type="hidden" class="form-control" name="e-id" id="e-id">
            <div class="alert alert-danger hidden" id="alert-edit"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group form-group-default required">
                  <label>Tiêu đề</label>
                  <input type="text" class="form-control" name="e_title" id="e-title">
                </div>

                <div class="form-group form-group-default required">
                  <label>Mô tả</label>
                  <input type="text" class="form-control" name="e_desc" id="e-desc">
                </div>

                <div class="form-group form-group-default required">
                  <label>Link</label>
                  <input type="text" class="form-control" name="e_link" id="e-link">
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
  $(document).ready(() => {
    let locationHash = [];
    if (location.hash) {
      locationHash = location.hash.split('/');
      routerBanner(locationHash);
    }

    $(window).on('hashchange', function() {
      locationHash = location.hash.split('/');
      routerBanner(locationHash);
    });

    $('#tab-add').click(() => {
      location.hash = 'addBanner';
    });

    $('#tab-banner').click(() => {
      location.hash = 'banner';
    });

    $('#form-addBanner').validate({
      rules: {
        title: 'required',
        desc: 'required',
        link: 'required'
      },
      messages: {
        title: 'Vui lòng nhập tiêu đề',
        desc: 'Vui lòng nhập mô tả',
        link: 'Vui lòng nhập link'
      },
      submitHandler: function(form) {
        addBanner();
      }
    });

    $('#form-editBanner').validate({
      rules: {
        e_title: 'required',
        e_desc: 'required',
        e_link: 'required'
      },
      messages: {
        e_title: 'Vui lòng nhập tiêu đề',
        e_desc: 'Vui lòng nhập mô tả',
        e_link: 'Vui lòng nhập link'
      },
      submitHandler: function(form) {
        editBanner();
      }
    });

  });

  function routerBanner(locationHash) {
    let url = locationHash[0];
    switch (url) {
      case '#addBanner':
        $('#tab-add').click();
        break;

      case '#banner':
        $('#tab-banner').click();
        getSlider();
        break;
    }
  }

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

  function getSlider() {
    $('.loading').removeClass('hidden');
    $.ajax({
      url: '?action=getAllBanner',
      success: function(result) {
        $('.loading').addClass('hidden');
        $('#banner').html(result);
        dataTable('slider-table', 'search-table-banner');
        $('.del-banner').click((e) => {
          let target = $(e.target);
          if (target.is('I')) {
            target = $(e.target).parents('BUTTON');
          }

          delSlider(target);
        });

        $('.edit-banner').click((e) => {
          let target = $(e.target);
          if (target.is('I')) {
            target = $(e.target).parents('BUTTON');
          }
          dataForm(target);
        });
      }
    });
  }

  function delSlider(target) {
    let id = target.attr('data-id');
    $.confirm({
      title: 'XÓA BANNER',
      content: 'Bạn có chắc muốn xóa banner này',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        ok: {
          text:'XÓA',
          btnClass: 'btn-orange',
          action: function() {
            $.ajax({
              url: `?action=delBanner&id=${id}`,
              success: function(result) {
                target.parents('TR').fadeOut();
                let mess = 'Xóa banner thành công';
                let lv = 'success';
                notification(mess, lv);
                getSlider();
              }
            });
          }
        },
        cancel: {
          text:'HỦY',
        }
      }
    });
  }

  function dataForm(target) {
    let id = $('#e-id');
    let title = $('#e-title');
    let desc = $('#e-desc');
    let link = $('#e-link');
    id.val(target.attr('data-id'));
    title.val(target.attr('data-title'));
    desc.val(target.attr('data-desc'));
    link.val(target.attr('data-link'));
    $('#modalSlideUp').modal();
  }

  function editBanner() {
    let id = $('#e-id').val();
    let title = $('#e-title').val();
    let desc = $('#e-desc').val();
    let link = $('#e-link').val();
    $.ajax({
      url: `?action=editBanner`,
      type: 'post',
      dataType: 'text',
      data: {
        id: id,
        title: title,
        desc: desc,
        link: link
      },
      success: function(result) {
        $('#modalSlideUp').modal('hide');
        let mess = 'Sửa banner thành công';
        let lv = 'success';
        notification(mess, lv);
        getSlider();
      }
    });

    return false;
  }

  function addBanner() {
    $('#add-btn').html('Đang thực hiện...');
    $('#add-btn').attr("disabled", true);
    let title = $('#title').val();
    let desc = $('#desc').val();
    let link = $('#link').val();
    $.ajax({
      url: `?action=addBanner`,
      type: 'post',
      dataType: 'text',
      data: {
        title: title,
        desc: desc,
        link: link
      },
      success: function(result) {
        let mess = 'Thêm banner thành công';
        let lv = 'success';
        notification(mess, lv);
        
        $('#tab-banner').click();
        $('#form-addBanner')[0].reset();
        $('#add-btn').html('Thêm');
        $('#add-btn').attr("disabled", false);
      }
    });
    return false;
  }
</script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
<style type="text/css">
  .order-hover {
    cursor: pointer;
  }
</style>

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
            <li><a href="#" class="active">Hóa Đơn</a>
            </li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>

    <div class="container-fluid container-fixed-lg">
      <div class="row">
        <div class="col-md-6 col-sm-7 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">
                Hóa Đơn
              </div>
            </div>
            <div class="panel-body">
              <div class="scrollable">
                <div class="demo-portlet-scrollable" style="height: 400px;">
                  <div id="order-box">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="text-master">Ngày đặt</th>
                          <th class="text-master">Ngày giao</th>
                          <th class="text-master hidden-xs">Tổng tiền</th>
                          <th class="text-master">Trạng thái</th>
                        </tr>
                      </thead>

                      <tbody id="show-all">
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-5 col-xs-12">
          <div class="panel panel-default" id="order-detail" style="height: 480px">
            <h1 class="text-center">Chưa Chọn Hóa Đơn<h1>
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
<script type="text/javascript">
  $(document).ready(() => {
    showAllOrder();

    let locationHash = [];
    if (location.hash) {
      locationHash = location.hash.split('/');
      orderRouter(locationHash);
    }

    $(window).on('hashchange', function() {
      locationHash = location.hash.split('/');
      orderRouter(locationHash);
    });
  });

  function orderRouter (locationHash) {
    let id = locationHash[0].replace('#', '');
    $.ajax({
      url: '?action=viewOrderDetail',
      type: 'get',
      dataType: 'text',
      data: {
        id: id
      },
      success: function(result) {
        $('#order-detail').html(result);

        $('.change-status').click((e) => {
          let target = $(e.target);
          if (target.is('I')) {
            target = $(e.target).parents('button');
          }

          changeStatusOrder(id);

        });
      },
      error: function() {

      }
    });

    function changeStatusOrder(id) {
      $.confirm({
        title: 'CHỈNH SỬA TRẠNG THÁI',
        content: 'Bạn có chắc muốn chỉnh sửa trạng thái này',
        type: 'orange',
        typeAnimated: true,
        buttons: {
          confirm: {
            text: 'sửa',
            btnClass: 'btn-orange',
            action: function(){
              $.ajax({
                url: '?action=changeStatusOrder',
                type: 'get',
                dataType: 'text',
                data: {
                  id: id
                },
                success: function(result) {
                  $('.order-link').each(function() {
                    let link = $(this).attr('href').replace('#', '');
                    if (link === id) {
                      $(this).parent().slideUp().remove();
                    }
                  });

                  showAllOrder();

                  $.ajax({
                    url: '?action=viewOrderDetail',
                    type: 'get',
                    dataType: 'text',
                    data: {
                      id: id
                    },
                    success: function(result) {
                      $('#order-detail').html(result);

                      $('.change-status').click((e) => {
                        let target = $(e.target);
                        if (target.is('I')) {
                          target = $(e.target).parents('button');
                        }

                        changeStatusOrder(id);

                      });
                    },
                    error: function() {

                    }
                  });
                  
                  let mess = 'Chỉnh sửa thành công';
                  let lv = 'success';
                  notification(mess, lv);
                },
                error: function() {}
              });
            }
          },
          cancel: {
            text: 'Hủy',
          }
        }
      });
    }
  }

  function showAllOrder() {
    $.ajax({
      url: '?action=showAllOrder',
      success: function(result) {
        $('#show-all').html(result);

        $('.order-hover').click((e) => {
          let target = $(e.target);
          if (target.not('TR')) {
            target = $(e.target).parents('TR');
          }

          let hashId = target.attr('data-link');
          location.hash = hashId;
        });

        countOrder();
      }
    })
  }

  function countOrder() {
    if ($('.alert-list').length == 0) {
      $('#order-box').html('<h1 class="text-center">Hiện chưa có hóa đơn nào<h1>');
    }
  }
</script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
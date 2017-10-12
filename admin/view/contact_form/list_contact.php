<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

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
            <li><a href="#" class="active">Liên hệ</a>
            </li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>

    <div class="container-fluid container-fixed-lg">
      <div class="row">
        <div class="col-xs-5">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">
                Liên Hệ
              </div>
            </div>
            <div class="panel-body">
              <div class="scrollable">
                <div class="demo-portlet-scrollable" style="height: 400px">
                  <div id="contact-box">
                    <?php 
                      foreach ($data as $key) {
                    ?>
                    <li class="alert-list" style="margin: 10px; list-style: none; border-bottom: solid 1px lightgrey;">
                      <a class="contact-link" href="#<?php echo $key['form_id']; ?>">
                        <p>
                          <span class="text-master"><?php echo $key['full_name']; ?></span>
                          <span class="text-master">(<?php echo $key['email']; ?>)</span>
                        </p>

                        <p>
                          <span class="text-master"><?php echo $key['subject']; ?></span>
                        </p>

                         <p>
                          <span class="text-warning"><?php echo $key['send_date']; ?></span>
                        </p>
                      </a>
                    </li>
                    <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-7">
          <div class="panel panel-default" id="contact-detail" style="height: 480px">
            <h1 class="text-center">Chưa Chọn Liên Hệ<h1>
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
    countContact();

    let locationHash = [];
    if (location.hash) {
      locationHash = location.hash.split('/');
      contactRouter(locationHash);
    }

    $(window).on('hashchange', function() {
      locationHash = location.hash.split('/');
      contactRouter(locationHash);
    }); 
  });

   function contactRouter (locationHash) {
      let id = locationHash[0].replace('#', '');
      $.ajax({
        url: '?action=viewContactDetail',
        type: 'get',
        dataType: 'text',
        data: {
          id: id
        },
        success: function(result) {
          $('#contact-detail').html(result);

          $('.del-mess').click((e) => {
            let target = $(e.target);
            if (target.is('I')) {
              target = $(e.target).parents('button');
            }

            let id = target.attr('data-id');
            delContact(id);
          });
        },
        error: function() {

        }
      });

      function delContact(id) {
        $.confirm({
          title: 'XÓA LIÊN HỆ',
          content: 'Bạn có chắc muốn xóa liên hệ này',
          type: 'orange',
          typeAnimated: true,
          buttons: {
            confirm: {
              text: 'Xóa',
              btnClass: 'btn-orange',
              action: function(){
                $.ajax({
                  url: '?action=delContactForm',
                  type: 'get',
                  dataType: 'text',
                  data: {
                    id: id
                  },
                  success: function(result) {
                    $('#contact-detail').html('<h1 class="text-center">Chưa Chọn Liên Hệ<h1>');
                    $('.contact-link').each(function() {
                      let link = $(this).attr('href').replace('#', '');
                      if (link === id) {
                        $(this).parent().slideUp().remove();
                      }
                    });
                    
                    let mess = 'Xóa liên hệ thành công';
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

    function countContact() {
      if ($('.alert-list').length == 0) {
        $('#contact-box').html('<h1 class="text-center">Hiện chưa có liên hệ nào<h1>');
      }
    }
</script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
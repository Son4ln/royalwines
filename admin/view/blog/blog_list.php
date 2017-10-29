<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
<style type="text/css">
  tr, img {
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
            <li><a href="#" class="active">TIN TỨC</a>
            </li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>

    <div class="container-fluid container-fixed-lg">
      <div class="row">
        <div class="col-xs-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">
                TIN TỨC
              </div>
            </div>
            <div class="panel-body">
              <div id="blog-box">
                <div class="panel panel-transparent ">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
                    <li class="active">
                      <a data-toggle="tab" id="tab-public" href="#public"><span>Bài viết</span></a>
                    </li>

                    <?php if ($_SESSION["royalwines_permission_ok"] < 3) { ?>
                    <li>
                      <a data-toggle="tab" id="tab-unpublic" href="#unpublic"><span>Unpublic</span></a>
                    </li>
                    <?php } ?>

                    <li>
                      <a data-toggle="tab" id="tab-add" href="#add-blog"><span>Thêm bài viết</span></a>
                    </li>
                  </ul>
                </div>

                <div class="tab-content">
                  <div class="tab-pane slide-left active" id="public">
                    <div class="panel panel-transparent">
                      <div class="panel-heading">
                        <div class="panel-title">Public
                          <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
                        </div>

                        <div class="pull-right">
                          <div class="col-xs-12">
                            <input type="text" id="search-table-public" class="form-control pull-right" placeholder="Search">
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>

                      <div class="panel-body" id="blog-public">
                       
                      </div>
                    </div>
                  </div>

                  <?php if ($_SESSION["royalwines_permission_ok"] < 3) { ?>
                  <div class="tab-pane slide-left" id="unpublic">
                    <div class="panel panel-transparent">
                      <div class="panel-heading">
                        <div class="panel-title">Unpublic
                          <i class="fa fa-spinner fa-pulse fa-3x fa-fw hidden loading" style="font-size: 16px;"></i>
                        </div>

                        <div class="pull-right">
                          <div class="col-xs-12">
                            <input type="text" id="search-table-unpublic" class="form-control pull-right" placeholder="Search">
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>

                      <div class="panel-body" id="blog-unpublic">
                       
                      </div>
                    </div>
                  </div>
                  <?php } ?>

                  <div class="tab-pane slide-left" id="add-blog">
                    <div class="panel panel-transparent">
                      <div class="panel-body">
                        <form id="form-addBlog" method="post" style="padding: 10px">
                          <div class="alert alert-danger hidden" id="addblog-alert"></div>
                          <div class="row">
                            <div class="col-xs-12">
                              <center><img src="/upload/blog/logo.png" width="250" id="review-img"></center>
                              <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
                              <center>
                                <input type="file" class="form-control hidden" name="blogImg" id="blogImg">
                              </center>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group form-group-default required">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="blogTitle">
                              </div>

                              <div class="form-group form-group-default required">
                                <label>Mô tả ngắn</label>
                                <textarea class="form-control" name="shortDesc" id="shortDesc"></textarea>
                              </div>

                              <div class="form-group form-group-default">
                                <label>Nội dung</label>
                                <textarea class="form-control" id="content-blog" name="blogDetail"></textarea>
                              </div>

                              <div class="clearfix"></div>
                              <button class="btn btn-success" id="insert-blog" type="submit">Thêm</button>
                            </div>
                          </div>                                          
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-6">
          <div class="panel panel-default" id="blog-detail">
            <h1 class="text-center">Chưa Chọn Tin Tức<h1>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>  
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar-right.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/scripts.php'; ?>
<script type="text/javascript" src="/public/plugin/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/public/plugin/ckfinder/ckfinder.js"></script>
<!-- START SCRIPT BLOCK -->
<script type="text/javascript">
  let state_blog = {
    oldimg: ''
  }
  $(document).ready(() => {
    //tích họp editor
    CKEDITOR.replace('content-blog');
    //
    $('#tab-public').click(() => {
      location.hash = 'public';
    });

    $('#tab-unpublic').click(() => {
      location.hash = 'unpublic';
    });

    $('#tab-add').click(() => {
      location.hash = 'add-blog';
    });

    let locationHash = [];
    if (location.hash) {
      locationHash = location.hash.split('/');
      blogRouter(locationHash);
    }

    $(window).on('hashchange', function() {
      locationHash = location.hash.split('/');
      blogRouter(locationHash);
    });

    $('#review-img').click(() => {
      $('#blogImg').click();
    });

    reviewImg();

    $('#form-addBlog').validate({
      rules: {
        blogImg: 'required',
        blogTitle: 'required',
        shortDesc: 'required'
      },
      messages: {
        blogImg: 'Vui lòng chọn hình ảnh',
        blogTitle: 'Vui lòng nhập tiêu đề',
        shortDesc: 'Vui lòng nhập mô tả ngắn'
      },
      submitHandler: function(form) {
        addBlog();
      }
    });

    state_blog.oldimg = $('#review-img').attr('src');
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

  function blogRouter(locationHash) {
    let hash = locationHash[0].replace('#', '');
    switch(hash) {
      case 'public':
        showPublic(2);
        $('#tab-public').click();
        break;

      case 'unpublic':
        showPublic(1);
        $('#tab-unpublic').click();
        break;

      case 'add-blog':
        $('#tab-add').click();
        break;
    }
  }

  function showPublic(public) {
    $('.loading').removeClass('hidden');
    $.ajax({
      url: `?action=publicBlog&public=${public}`,
      success: function(result) {
        $('.loading').addClass('hidden');
        if(public === 2) {
          $('#blog-public').html(result);
          dataTable('tb-public', 'search-table-public');
        } else {
          $('#blog-unpublic').html(result);
          dataTable('tb-unpublic', 'search-table-unpublic');
        }

        $('.g-blog').click((e) => {
          let target = $(e.target);
          if(target.not('TR')) {
            target = $(e.target).parents('TR');
          }
          
          getBlog(target);
        });
      }
    });
  }

  function getBlog(target) {
    let id = target.attr('data-id');
    $.ajax({
      url: `?action=getBlogById&id=${id}`,
      success: function(result) {
        $('#blog-detail').html(result);
        CKEDITOR.replace('eblogDetail');
        ecancelImg();

        $('#ereview-img').click(() => {
          $('#eblogImg').click();
        });

        ereviewImg();
        $('#form-editBlog').validate({
          rules: {
            eblogTitle: 'required',
            eshortDesc: 'required'
          },
          messages: {
            eblogTitle: 'Vui lòng nhập tiêu đề',
            eshortDesc: 'Vui lòng nhập mô tả ngắn'
          },
          submitHandler: function(form) {
            updateBlog(id);
          }
        });

        $('#del-blog').click((e) => {
          delBlog(e);
        });

        if ($('#accept-blog')) {
          $('#accept-blog').click((e) => {
            changeStatus(e);
          });
        }
      }
    });
  }

  function updateBlog(id) {
    $('#update-blog').html('Đang thực hiện...');
    $('#update-blog').attr('disabled', true);
    let blogImg = $('#eblogImg').prop('files')[0];
    let curImg = $('#curImg').val().trim();
    let title = $('[name="eblogTitle"]').val().trim();
    let short_desc = $('[name="eshortDesc"]').val().trim();
    let content = $('[name="eblogDetail"]').val();
    let data = new FormData();
    data.append('eblogImg', blogImg);
    data.append('curImg', curImg);
    data.append('title', title);
    data.append('shortdesc', short_desc);
    data.append('detail', content);

    $.ajax({
      url: `?action=updateBlog&id=${id}`,
      type: 'post',
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: data,
      success: function(result) {
        if (location.hash === '#public') {
          showPublic(2);
        } else {
          showPublic(1);
        }

        if (result === 'success') {
          let mess = 'Cập nhập bài viết thành công';
          let lv = 'success';
          notification(mess, lv);
        }

        $('#update-blog').html('Sửa');
        $('#update-blog').attr('disabled', false);
      }
    });
    return false;
  }

  function changeStatus(e) {
    let id = $(e.target).attr('data-id');
    $.confirm({
      title: 'PHÊ DUYỆT BÀI VIẾT',
      content: 'Bạn có chắc muốn phê duyệt bài viết này',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        ok: {
          text: 'Phê duyệt',
          btnClass: 'btn-orange',
          action: function() {
            $.ajax({
              url: `?action=updateStatusBlog&id=${id}`,
              success: function(result) {
                if(result === 'success') {
                  if (result === 'success') {
                    let mess = 'Phê duyệt bài viết thành công';
                    let lv = 'success';
                    notification(mess, lv);
                  }

                  $('#blog-detail').html('<h1 class="text-center">Chưa Chọn Tin Tức<h1>');
                  if (location.hash === '#public') {
                    showPublic(2);
                  } else {
                    showPublic(1);
                  }
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

  function delBlog(e) {
    let id = $(e.target).attr('data-id');
    $.confirm({
      title: 'XÓA BÀI VIẾT',
      content: 'Bạn có chắc muốn xóa bài viết này',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        ok: {
          text: 'Xóa',
          btnClass: 'btn-orange',
          action: function() {
            $.ajax({
              url: `?action=delBlog&id=${id}`,
              success: function(result) {
                if (result === 'success') {
                  let mess = 'Xóa bài viết thành công';
                  let lv = 'success';
                  notification(mess, lv);
                }

                $('#blog-detail').html('<h1 class="text-center">Chưa Chọn Tin Tức<h1>');
                if (location.hash === '#public') {
                  showPublic(2);
                } else {
                  showPublic(1);
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

  function addBlog() {
    $('#insert-blog').attr('disabled', true);
    $('#insert-blog').html('Đang thêm...');
    let img = $('#blogImg').prop('files')[0];
    let title = $('[name="blogTitle"]').val().trim();
    let short_desc = $('[name="shortDesc"]').val().trim();
    let desc = $('[name="blogDetail"]').val();
    let data = new FormData();
    data.append('blogImg', img);
    data.append('title', title);
    data.append('shortdesc', short_desc);
    data.append('detail', desc);
    $.ajax({
      url: '?action=addBlog',
      type: 'post',
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: data,
      success: function(result) {
        if (result === 'success') {
          let mess = 'Thêm bài viết thành công. Nếu là Bloger hãy đợi admin phê duyệt';
          let lv = 'success';
          notification(mess, lv);
          $('#form-addBlog')[0].reset();
          //xóa nội dung của editor khi đã add xong
          CKEDITOR.instances['content-blog'].setData('');
          //
          if ($('#tab-unpublic')) {
            $('#tab-unpublic').click();
          }

          $('#addblog-alert').html('');
          $('#addblog-alert').addClass('hidden');
          $('#review-img').attr('src', state_blog.oldimg);
          $('#blogImg').val('');

          $('#insert-blog').attr('disabled', false);
          $('#insert-blog').html('Thêm');
        } else if (result === 'file_error') {
          let alertMess = 'Ảnh chỉ hỗ trợ png, jpg, jpeg. Dung lượng tối đa 5mb';
          $('#addblog-alert').html(alertMess);
          $('#addblog-alert').removeClass('hidden');
        }
      }

    });
    return false;
  }

  function reviewImg() {
    let uploadImg = document.querySelector('[name="blogImg"]');
    uploadImg.addEventListener('change', () => {
      let review = document.getElementById('review-img');
      let input = document.querySelector('[name="blogImg"]');
      let file = input.files[0];
      let reader = new FileReader();
      reader.onload = (e) => {
        review.src = e.target.result;
      }
      reader.readAsDataURL(file);
    });
  }

  function ereviewImg() {
    let uploadImg = document.querySelector('[name="eblogImg"]');
    uploadImg.addEventListener('change', () => {
      let review = document.getElementById('ereview-img');
      let input = document.querySelector('[name="eblogImg"]');
      let file = input.files[0];
      let reader = new FileReader();
      reader.onload = (e) => {
        review.src = e.target.result;
      }
      reader.readAsDataURL(file);
      $('#ecancel-img').removeClass('hidden');
    });
  }

  function ecancelImg() {
    let btn = $('#ecancel-img');
    let old = $('#ereview-img').attr('src');
    btn.click(() => {
      $('#ereview-img').attr('src', old);
      $('#ecancel-img').addClass('hidden');
      $('#eblogImg').val('');
    });
  }
</script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
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
            <li><a href="#" class="active">Sửa thông tin</a>
            </li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>SỬA THÔNG TIN</h5>
      </div>

      <div class="panel-body">
        <form id="user-form" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <input type="text" class="hidden" id="uid" name="uid" value="<?php echo $result['uid']; ?>">
              <center><img src="../../upload/users/<?php echo $result['avatar']; ?>" width="300" id="review-img"></center>
              <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
              <center><input type="file" class="form-control hidden" name="avatar" id="avatar"></center>
              <input type="hidden" name="currImg" id="oldImg" value="<?php echo $result['avatar']; ?>">
              <center><button type="button" id="cancel-img" class="btn btn-success hidden"><i class="fa fa-times"></i></button></center>
            </div>

            <div class="col-md-6">
              <div class="form-group form-group-default required">
                <label>Họ và tên</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['full_name']; ?>">
              </div>

              <div class="form-group form-group-default required">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $result['address']; ?>">
              </div>

              <div class="form-group form-group-default required">
                  <label>Số điện thoại</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $result['phone']; ?>">
              </div>

              <div class="form-group form-group-default">
                <label>Mật khẩu cũ</label>
                <input type="password" class="form-control" id="old-pass" name="oldPass">
              </div>

              <div class="form-group form-group-default">
                <label>Mật khẩu mới</label>
                <input type="password" class="form-control" id="new-pass" name="newPass">
              </div>

              <div class="form-group form-group-default">
                <label>Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="re-pass" name="rePass">
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

<script type="text/javascript">
  $(document).ready(() => {
    $('#review-img').click(() => {
      $('#avatar').click();
    });

    reviewImg();
    validUser();
    cancelImg();
  });
  
  function reviewImg() {
    let uploadImg = document.querySelector('[name="avatar"]');
    uploadImg.addEventListener('change', () => {
      let review = document.getElementById('review-img');
      let input = document.querySelector('[name="avatar"]');
      let file = input.files[0];
      let reader = new FileReader();
      reader.onload = (e) => {
        review.src = e.target.result;
      }
      reader.readAsDataURL(file);
      $('#cancel-img').removeClass('hidden');
    });
  }

  function validUser() {
    $('#user-form').validate({
      rules: {
        name: 'required',
        address: 'required',
        phone: 'required'
      },
      messages: {
        name: 'Vui lòng nhập họ tên',
        address: 'Vui lòng nhập địa chỉ',
        phone: 'Vui lòng nhập số điện thoại'
      },
      submitHandler: function(form) {
        updateUser();
      }
    });
  }

  function updateUser() {
    let updateBtn = $('#update');
    updateBtn.attr('disabled','disabled');
    updateBtn.html('Loading...');
    let uid = $('#uid').val();
    let avatar = $('#avatar').prop('files')[0];
    let name = $('#name').val().trim();
    let address = $('#address').val().trim();
    let oldImg = $('#oldImg').val();
    let phone = $('#phone').val();
    let oldPass = $('#old-pass').val();
    let newPass = $('#new-pass').val();
    let rePass = $('#re-pass').val();
    let form_data = new FormData();
    form_data.append('uid', uid);
    form_data.append('name', name);
    form_data.append('address', address);
    form_data.append('phone', phone);
    form_data.append('oldPass', oldPass);
    form_data.append('newPass', newPass);
    form_data.append('rePass', rePass);
    form_data.append('oldImg', oldImg);
    form_data.append('avatar', avatar);

    $.ajax({
      url: '?action=settingAction',
      type: 'post',
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      success: function(result) {
        let mess = 'Cập nhập thông tin thành công';
        let lv = 'success';
        if (result === 'file_not_valid') {
          mess = 'Hình ảnh chỉ hỗ trợ jpg, jpeg, png và kích thước < 5mb';
          lv = 'warning';
        } else if (result === 'fail') {
          mess = 'Lỗi kết nối cơ sở dữ liệu';
          lv = 'danger';
        } else if (result === 'pass_not_valid') {
          mess = 'Mật khẩu cũ không chính xác';
          lv = 'danger';
        } else if (result === 'pass_not_match') {
          mess = 'Mật khẩu nhập lại không trùng khớp';
          lv = 'danger';
        }

        updateBtn.removeAttr('disabled');
        updateBtn.html('Cập nhập');
        notification(mess, lv);
      },
      error: function() {
        let mess = 'Không thể kết nối đến server';
        let lv = 'danger';
        notification(mess, lv);
        updateBtn.removeAttr('disabled');
        updateBtn.html('Cập nhập');
      }

    });

    return false;
  }

  function cancelImg() {
    let btn = $('#cancel-img');
    let old = $('#review-img').attr('src');
    btn.click(() => {
      $('#review-img').attr('src', old);
      $('#cancel-img').addClass('hidden');
      $('#avatar').val('');
    });
  }
</script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
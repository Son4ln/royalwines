<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pages - Admin Dashboard UI Kit - Lock Screen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link href="../../public/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="../../public/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../public/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../public/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../public/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../public/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../public/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="../../public/pages/css/pages.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
        <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
  </head>
  <body class="fixed-header ">
    <div class="login-wrapper ">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="../../public/assets/img/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" data-src="../../public/assets/img/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" data-src-retina="../../public/assets/img/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
          <h2 class="semi-bold text-white">
					Royalwines Đăng nhập Admin</h2>
          <p class="small">
            develop by <b>STUN</b> TEAM <i class="fa fa-heart"></i>
          </p>
        </div>
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->
      <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          <img src="../../public/assets/img/logo.png" alt="logo" data-src="../../public/assets/img/logo.png" data-src-retina="../../public/assets/img/logo_2x.png" width="78" height="22">
          <!-- START Login Form -->
          <form id="form-login" class="p-t-15" role="form" method="post" action="?action=login">
            <div class="login-alert alert alert-danger hidden"></div>
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Login</label>
              <div class="controls">
                <input type="text" name="email" placeholder="Email" class="form-control" required>
              </div>
            </div>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Password</label>
              <div class="controls">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
            </div>
            <!-- END Form Control-->
            <button class="btn btn-primary btn-cons m-t-10 login-btn" type="submit">Log in</button>
          </form>
          <!--END Login Form-->
        </div>
      </div>
      <!-- END Login Right Container-->
    </div>
    <!-- START OVERLAY -->
    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
    <script src="../../public/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="../../public/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="../../public/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="../../public/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../../public/assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../public/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="../../public/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="../../public/assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="../../public/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="../../public/assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="../../public/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="../../public/assets/plugins/bootstrap-select2/select2.min.js"></script>
    <script type="text/javascript" src="../../public/assets/plugins/classie/classie.js"></script>
    <script src="../../public/assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="../../public/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <script src="../../public/pages/js/pages.min.js"></script>
    <script>
    $(function()
    {
      $('#form-login').validate({
        rules: {
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 6
          }
        },
        messages: {
          password: {
            required: "Vui lòng nhập mật khẩu",
            minlength: "Mật khẩu ít nhất là 6 ký tự"
          },
          email: {
            required: "Vui lòng nhập đúng cú pháp Email",
            email: 'Vui lòng nhập đúng cú pháp email'
          } 
        },
        submitHandler: function() {
          login();
          return false;
        }
      });
    });

    function login() {
      $('.login-btn').attr('disabled', 'disabled');
      let email = $('[name="email"]').val();
      let pass = $('[name="password"]').val();
      $.ajax({
        url: '?action=login',
        type: 'post',
        dataType: 'text',
        data: {
          email: email,
          password: pass
        },
        success: function(result) {
          if (result == 'login_fail') {
            $('.login-alert').removeClass('hidden');
            $('.login-alert').html('Sai tên đăng nhập hoặc mật khẩu');
          } else if (result == 'account_locked') {
            $('.login-alert').removeClass('hidden');
            $('.login-alert').html('Tài khoản của bạn đã bị khóa, vui lòng liên hệ quản trị viên để biết thêm chi tiết');
          } else if (result == 'valid_permission') {
            $('.login-alert').removeClass('hidden');
            $('.login-alert').html('Bạn không có quyền hạn để truy cập Admin page, liên hệ quản trị viên để biết thêm chi tiết');
          } else {
            window.location.href = '?action=home';
          }

          $('.login-btn').removeAttr('disabled');
        },
        error: function() {
          let mess = 'Lỗi kết nối';
          let lv = 'danger';
          notification(mess, lv);
          $('.login-btn').removeAttr('disabled');
        }
      });
    }
    </script>
  </body>
</html>
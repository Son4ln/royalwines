    <div class="page-container ">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
          <!-- LEFT SIDE -->
          <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                <span class="icon-set menu-hambuger"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
          <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
              <div class="brand inline">
                <img src="../../public/assets/img/logo2.png" alt="logo" data-src="../../public/assets/img/logo2.png" data-src-retina="../../public/assets/img/logo2.png" width="120">
              </div>
            </div>
          </div>
          <!-- RIGHT SIDE -->
          <div class="pull-right full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block" data-toggle="quickview" data-toggle-element="#quickview">
                <span class="fa fa-bell seen-bell" style="font-size: 20px;"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table hidden-xs hidden-sm">
          <div class="header-inner">
            <div class="brand inline">
              <img src="../../public/assets/img/logo2.png" alt="logo" data-src="../../public/assets/img/logo2.png" data-src-retina="../../public/assets/img/logo2.png" width="120">
            </div>
          </div>
        </div>
        <div class=" pull-right">
          <div class="header-inner">
            <a href="#" class="btn-link fa fa-bell m-l-20 sm-no-margin hidden-sm hidden-xs seen-bell" data-toggle="quickview" data-toggle-element="#quickview" style="font-size: 20px;"></a>
          </div>
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
              <span class="semi-bold">
                <?php
                  $email = $_SESSION["royalwines_user_login_ok"];
                  $pass = $_SESSION["royalwines_pass_login_ok"];
                  $users = new UsersModel();
                  $result = $users -> checkUser($email, $pass);
                  echo $result['full_name'];
                ?>  
              </span>
            </div>
            <div class="dropdown pull-right">
              <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="../../upload/users/<?php echo $result['avatar']; ?>" alt="" data-src="../../upload/users/<?php echo $result ['avatar']; ?>" data-src-retina="../../upload/users/<?php echo $result['avatar']; ?>" width="32" height="32">
            </span>
              </button>
              <ul class="dropdown-menu profile-dropdown" role="menu">
                <li><a href="#"><i class="pg-settings_small"></i> Settings</a>
                </li>
                <li class="bg-master-lighter">
                  <a href="?action=logout" class="clearfix">
                    <span class="pull-left">Đăng xuất</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- END User Info-->
        </div>
      </div>
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <!-- <div class="page-content-wrapper "> -->
        <!-- START PAGE CONTENT -->
        <!-- <div class="content sm-gutter"> -->
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pages - Admin Dashboard UI Kit - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="../../public/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="../../public/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../public/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../public/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../public/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../public/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../public/assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../public/assets/plugins/mapplic/css/mapplic.css" rel="stylesheet" type="text/css" />
<!--     <link href="../../public/assets/plugins/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="../../public/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="../../public/assets/plugins/jquery-metrojs/MetroJs.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../public/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="../../public/pages/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="../../public/assets/plugins/jquery-confirm/jquery-confirm.min.css" rel="stylesheet" type="text/css" media="screen" />
    <!--[if lte IE 9]>
	<link href="assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
  </head>
  <body class="fixed-header dashboard">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="../../public/assets/img/logo3.png" alt="logo" class="brand" data-src="../../public/assets/img/logo3.png" data-src-retina="../../public/assets/img/logo3.png" width="120">
        <div class="sidebar-header-controls">
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30">
            <a href="?action=home" class="detailed">
              <span class="title">Trang Chủ</span>
            </a>
            <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
          </li>

          <?php 
            if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2) {
          ?>
          <li class="">
            <a href="?action=listUsers" class="detailed">
              <span class="title">Thành Viên</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
          </li>

          <li class="">
            <a href="?action=listBanner#banner" class="detailed">
              <span class="title">Banner</span>
            </a>
            <span class="icon-thumbnail">B</span>
          </li>
          <?php
            }
          ?>

          <?php 
            if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2
              || $_SESSION["royalwines_permission_ok"] == 3) {
          ?>
          <li class="">
            <a href="?action=listBrands" class="detailed">
              <span class="title">Nhãn Hiệu</span>
            </a>
            <span class="icon-thumbnail">N</span>
          </li>

          <li class="">
            <a href="?action=getCate" class="detailed">
              <span class="title">Loại Hàng</span>
            </a>
            <span class="icon-thumbnail">L</i></span>
          </li>
          
          <li class="">
            <a href="?action=viewAllOrder" class="detailed">
              <span class="title">Hóa Đơn</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-shopping-cart"></i></span>
          </li>
          <?php
            }
          ?>

          <?php 
            if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2
              || $_SESSION["royalwines_permission_ok"] == 4) {
          ?>
          <li class="">
            <a href="?action=listBlog#public" class="detailed">
              <span class="title">Tin Tức</span>
            </a>
            <span class="icon-thumbnail">T</span>
          </li>

          <?php
            }
          ?>

          <?php 
            if ($_SESSION["royalwines_permission_ok"] == 1 || $_SESSION["royalwines_permission_ok"] == 2) {
          ?>
          <li class="">
            <a href="?action=viewAllContact" class="detailed">
              <span class="title">Liên hệ</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-mail"></i></span>
          </li>
          <?php
            }
          ?>

          <?php 
            if ($_SESSION["royalwines_permission_ok"] == 1) {
          ?>
          <li class="">
            <a href="?action=contactInfo"><span class="title">Thông tin</span></a>
            <span class="icon-thumbnail"><i class="fa fa-info"></i></span>
          </li>
          <?php
            }
          ?>
        
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
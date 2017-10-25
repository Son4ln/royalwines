<?php
  class SliderController {
    function showBanner() {
      include '../view/slider/list_slider.php';
    }

    function getBanner() {
      $slider = new SliderModel();
      $data = $slider -> getAllSlider();
      include '../view/slider/slider_items.php';
    }

    function delBanner() {
      $id = $_GET['id'];
      $slider = new SliderModel();
      $slider -> delSlider($id);
      $content = 'Đã xóa một banner';
      BasicLibs::addMess($content);
    }

    function editBanner() {
      $id = $_POST['id'];
      $title = $_POST['title'];
      $desc = $_POST['desc'];
      $link = $_POST['link'];
      $slider = new SliderModel();
      $slider -> updateSlider($id, $title, $desc, $link);
      $content = 'Đã xóa chỉnh sửa một banner';
      BasicLibs::addMess($content);
    }

    function addBanner() {
      $title = $_POST['title'];
      $desc = $_POST['desc'];
      $link = $_POST['link'];
      $slider = new SliderModel();
      $slider -> addSlider($title, $desc, $link);
       $content = 'Đã thêm một banner';
      BasicLibs::addMess($content);
    }
  }
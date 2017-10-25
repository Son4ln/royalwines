<?php
  class SliderModel extends DataBase {
    function getAllSlider() {
      $query = 'SELECT * FROM slide_show ORDER BY slide_id DESC';
      $result = parent::getList($query);
      return $result;
    }

    function getSliderById($id) {
      $query = "SELECT * FROM slide_show WHERE slide_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

    function delSlider($id) {
      $query = "DELETE FROM slide_show WHERE slide_id = '$id'";
      parent::exec($query);
    }

    function updateSlider($id, $title, $desc, $link) {
      $query = "UPDATE slide_show SET slide_title = '$title', slide_description = '$desc', link = '$link' WHERE slide_id = '$id'";
      parent::exec($query);
    }

    function addSlider($title, $desc, $link) {
      $query = "INSERT INTO slide_show VALUES('', '$title', '$desc', '$link')";
      parent::exec($query);
    }
  }
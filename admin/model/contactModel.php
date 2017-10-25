<?php
  class contactModel extends DataBase {
    function getAllMess() {
      $query = 'SELECT * FROM contact_form ORDER BY form_id DESC';
      $result = parent::getList($query);
      return $result;
    }

    function getContactById($id) {
      $query = "SELECT * FROM contact_form WHERE form_id = $id";
      $result = parent::getInstance($query);
      return $result;
    }

    function delContactForm($id) {
      $query = "DELETE FROM contact_form WHERE form_id = $id";
      parent::exec($query);
    }
  }
?>
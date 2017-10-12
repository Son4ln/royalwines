<?php
  class ContactController {
    function getAllContact() {
      Permission::isManager();
      $contacts = new contactModel();
      $data = $contacts -> getAllMess();
      include '../view/contact_form/list_contact.php';
    }

    function getContactById() {
      Permission::isManager();
      $id = $_GET['id'];
      $contacts = new contactModel();
      $data = $contacts -> getContactById($id);
      include '../view/contact_form/contact_detail.php';
    }

    function delContact() {
      Permission::isSuperUser();
      $id = $_GET['id'];
      $contacts = new contactModel();
      $data = $contacts -> delContactForm($id);
      $content = 'Đã xóa một liên hệ từ người dùng';
      BasicLibs::addMess($content);
    }
  }
?>
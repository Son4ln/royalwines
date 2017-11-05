<?php
  class OrderController {
    function getAllOrder() {
      Permission::isSeller();
      include '../view/orders/list_order.php';
    }

    function showAllOrder() {
      Permission::isSeller();
      $orders = new orderModel();
      $data = $orders -> getAllOrders();
      include '../view/orders/show_all.php';
    }

    function getOrderById() {
      Permission::isSeller();
      $id = $_GET['id'];
      $orders = new orderModel();
      $data = $orders -> getClientByOrderId($id);
      $detail = $orders -> getOrderDetail($id);
      include '../view/orders/order_detail.php';
    }

    function changeStatusOrder() {
      Permission::isSuperUser();
      $id = $_GET['id'];
      $orders = new orderModel();
      $data = $orders -> getOrderById($id);
      $val = $data['order_status'];
      $date = null;
      $statusVal = 1;
      if ($val == 1) {
        $statusVal = 2;
        $date = date('Y-m-d');
      }

      $update = $orders -> changeStatusOrder($id, $date, $statusVal);

      $status = 'chưa nhận hàng';
      if ($statusVal == 2) {
        $status = 'đã nhận hàng';
      }

      $content = "Đã thay đổi trạng thái của hóa đơn thành $status";
      BasicLibs::addMess($content);
    }
  }
?>
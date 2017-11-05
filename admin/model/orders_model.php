<?php
  class orderModel extends DataBase {
    function getAllOrders() {
      $query = 'SELECT * FROM orders ORDER BY order_status ASC';
      $result = parent::getList($query);
      return $result;
    }

    function getOrderById($id) {
      $query = "SELECT * FROM orders WHERE uid = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

    function getOrderDetail($id) {
      $query = "SELECT * FROM order_detail JOIN products on order_detail.product_id = products.product_id
        JOIN orders on order_detail.order_id = orders.order_id 
        WHERE order_detail.order_id = (SELECT order_id FROM orders WHERE uid = '$id')";
      $result = parent::getList($query);
      return $result;
    }

    function getClientByOrderId($id) {
      $query = "SELECT * FROM orders JOIN clients on orders.client_id = clients.client_id WHERE uid = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

    function changeStatusOrder($id, $date, $status) {
      $query = "UPDATE orders SET received_date = '$date', order_status = '$status' WHERE uid = '$id'";
      parent::exec($query);
    }
  }
?>
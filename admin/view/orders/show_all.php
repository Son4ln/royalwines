 <?php 
    foreach ($data as $key) {
  ?>
  <tr class="alert-list order-hover" data-link="#<?php echo $key['uid']; ?>">
    <td class="text-master">
      <?php echo date_format(date_create_from_format('Y-m-d', $key['order_date']), 'd/m/Y'); ?>
    </td>
    <td class="text-master">
      <?php echo date_format(date_create_from_format('Y-m-d', $key['received_date']), 'd/m/Y'); ?>
    </td>
    <td class="text-master">
      <?php echo number_format($key['total']).'đ'; ?>
    </td>
    <td class="text-warning">
      <?php if ($key['order_status'] == 1) {
        echo '<span class="hidden-xs">Chưa nhận hàng</span>
        <span class="hidden-lg hidden-md hidden-sm">Chưa</span>';
      } else {
        echo '<span class="hidden-xs">Đã nhận hàng</span>
        <span class="hidden-lg hidden-md hidden-sm">Xong</span>';
      }
      ?>
    </td>
  </tr>
  <?php
    }
  ?>
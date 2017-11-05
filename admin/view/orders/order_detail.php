<?php if ($data) { ?>
  <div class="panel-heading">
    <div class="panel-title">
      Chi tiết hóa đơn
    </div>
  </div>
  <div class="panel-body">
    <div class="scrollable">
      <div class="demo-portlet-scrollable" style="height: 385px">
        <div>
          <p>Khách hàng: 
            <b><?php echo $data['full_name']; ?></b>
          </p>
          <p>Thông tin liên hệ: 
            <b><?php echo $data['phone']; if ($data['email'] != '') { echo ' - '.$data['email'];} ?></b>
          </p>
          <p>Nơi nhận hàng: 
            <b><?php echo $data['address']; ?></b>
          </p>
          <p>Ngày đặt: 
            <b><?php echo date_format(date_create_from_format('Y-m-d', $data['order_date']), 'd/m/Y'); ?></b>
          </p>
          <p>Ngày giao: 
            <b><?php
              if (isset($data['received_date']) && $data['order_status'] != 1) {
                echo date_format(date_create_from_format('Y-m-d', $data['received_date']), 'd/m/Y'); 
              } else {
                echo 'Đang chờ';
              }
              ?></b>
          </p>
          <p><?php if ($data['note'] != '') {
            echo 'Ghi chú: '.$data['note']; } ?>
          </p>
          <p>
            <?php if ($_SESSION["royalwines_permission_ok"] == 1) { ?>
              <span class="btn btn-warning change-status" data-id="<?php echo $data['uid']; ?>">
            <?php
              } else {
            ?>
              Trang thái: <span class="text-warning">
            <?php
              }

              if ($data['order_status'] == 1) {
                  echo '<b>Chưa nhận hàng</b>';
                } else {
                  echo '<b>Đã nhận hàng</b>';
                }
              ?>
            </span>
          </p>
        </div>

        <table class="table table-hover">
          <thead class="text-master">
            <tr>
              <th>Tên SP</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Giảm giá</th>
              <th class="hidden-xs">Thành tiền</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
              foreach ($detail as $value) {
            ?>
            <tr>
              <td><?php echo $value['product_name']; ?></td>
              <td><?php echo $value['quantity']; ?></td>
              <td><?php echo number_format($value['price']).'đ'; ?></td>
              <td><?php if ($value['discount'] == null) {
                 echo '0đ';
                } else {
                  echo number_format($value['discount']).'đ';
                }; ?>
              </td>
              <td><?php echo number_format($value['detail_total']).'đ'; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php 
} else {
  echo '<h1 class="text-center">Hóa đơn này không tồn tại<h1>';
}
?>
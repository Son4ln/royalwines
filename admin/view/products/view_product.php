<table class="table table-hover demo-table-search" id="<?php echo $table; ?>">
  <thead>
    <tr>
      <th>Tên sản phẩm</th>
      <th width="60px">Hình ảnh</th>
      <th>Giá</th>
      <th>Public/ Unpublic</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($result as $key) {
    ?>
      <tr>
        <td class="v-align-middle">
          <p><?php echo $key['product_name']; ?></p>
        </td>
        <td class="v-align-middle" width="60px">
          <img src="../../upload/products/<?php echo $key['featured_img']; ?>" width="50px"/>
        </td>
        <td class="v-align-middle">
          <p><?php echo number_format($key['price']).'đ'; ?></p>
        </td>
        <td class="v-align-middle">
          <?php 
            if ($public == 1) {
              echo '<a class="change-status btn btn-success" data-id="'.$key['uid'].'" data-status="1"><i class="fa fa-eye"></i></a>';
            } else if ($public == 2) {
              echo '<a class="change-status btn btn-success" data-id="'.$key['uid'].'" data-status="2"><i class="fa fa-eye-slash"></i></a>';
            } else {
              echo '<a class="change-status btn btn-success" data-id="'.$key['uid'].'" data-status="3"><i class="fa fa-check"></i></a>';
            }
          ?>
        </td>
        <td class="v-align-middle">
          <button data-toggle="modal" data-target="#modalSlideUp" class="edit-product btn btn-primary"
            data-id="<?php echo $key['uid']; ?>"
            data-img="<?php echo $key['featured_img']; ?>"
            data-name="<?php echo $key['product_name']; ?>"
            data-price="<?php echo $key['price']; ?>"
            data-discount="<?php echo $key['discount']; ?>"
            data-stock="<?php echo $key['in_stock']; ?>"
            data-volume="<?php echo $key['product_volume']; ?>"
            data-detail="<?php echo $key['product_detail']; ?>"
            data-create="<?php echo $key['create_date']; ?>"
            data-update="<?php echo $key['update_date']; ?>"
            data-brand="<?php echo $key['brand_id']; ?>"
            data-category="<?php echo $key['category_id']; ?>">
            <i class="fa fa-pencil-square-o"></i>
          </button>

          <?php if ($_SESSION["royalwines_permission_ok"] == 1) { ?>
          <button data-id="<?php echo $key['uid']; ?>" data-img="<?php echo $key['featured_img']; ?>" class="del-product btn btn-danger">
            <i class="fa fa-trash"></i>
          </button>
          <?php } ?>
        </td>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>
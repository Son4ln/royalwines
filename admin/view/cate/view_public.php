<table class="table table-hover demo-table-search" id="<?php echo $table; ?>">
  <thead>
    <tr>
      <th>Xuất xứ sản phẩm</th>
      <th>Public/ Unpublic</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($data as $key) {
    ?>
    <tr>
      <td><?php echo $key['category_name']; ?></td>
      <td>
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
      <td>
        <button class="edit-cate btn btn-primary"
          data-id="<?php echo $key['uid']; ?>" data-name="<?php echo $key['category_name']; ?>">
            <i class="fa fa-pencil-square-o"></i>
        </button>
        
        <?php if ($_SESSION["royalwines_permission_ok"] == 1) { ?>
          <button data-id="<?php echo $key['uid']; ?>" class="del-cate btn btn-danger">
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
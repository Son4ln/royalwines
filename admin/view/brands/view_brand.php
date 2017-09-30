<table class="table table-hover demo-table-search" id="<?php echo $table; ?>">
  <thead>
    <tr>
      <th>Tên nhãn hiệu</th>
      <th>Logo</th>
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
          <p><?php echo $key['brand_name']; ?></p>
        </td>
        <td class="v-align-middle">
          <img src="../../upload/brands/<?php echo $key['brand_logo']; ?>" width="50px"/>
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
          <button data-toggle="modal" data-target="#modalSlideUp" class="edit-brand btn btn-primary"
          data-id="<?php echo $key['uid']; ?>" data-img="<?php echo $key['brand_logo']; ?>" data-name="<?php echo $key['brand_name']; ?>">
            <i class="fa fa-pencil-square-o"></i>
          </button>
          <button data-id="<?php echo $key['uid']; ?>" data-img="<?php echo $key['brand_logo']; ?>" class="del-brand btn btn-danger">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<table class="table table-hover demo-table-search" id="slider-table">
  <thead>
    <tr>
      <th>Tiêu đề</th>
      <th>Mô tả</th>
      <th>Link</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($data as $key) {
    ?>
      <tr>
        <td><?php echo $key['slide_title']; ?></td>
        <td><?php echo $key['slide_description']; ?></td>
        <td><?php echo $key['link']; ?></td>
        <td>
          <button class="btn btn-primary edit-banner" data-id="<?php echo $key['slide_id']; ?>" 
            data-title="<?php echo $key['slide_title']; ?>" data-desc="<?php echo $key['slide_description']; ?>" '
            data-link="<?php echo $key['link']; ?>">
            <i class="fa fa-pencil-square-o"></i>
          </button>

          <button class="btn btn-danger del-banner" data-id="<?php echo $key['slide_id']; ?>">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>
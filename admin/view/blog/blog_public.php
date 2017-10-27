<table class="table table-hover demo-table-search" id="<?php echo $table; ?>">
  <thead>
    <tr>
      <th>Hình ảnh</th>
      <th>Ngày cập nhật</th>
      <th>Tiêu đề</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $key) { ?>
    <tr class="g-blog" data-id="<?php echo $key['news_id'] ?>">
      <td><img src="/upload/blog/<?php echo $key['news_image'] ?>" width="50"></td>
      <td><?php echo date_format(date_create_from_format('Y-m-d', $key['news_date']), 'd/m/Y'); ?></td>
      <td><?php echo $key['news_title'] ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
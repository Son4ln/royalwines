<form id="form-editBlog" method="post" style="padding: 10px">
  <div class="alert alert-danger hidden" id="add-alert"></div>
  <div class="row">
    <div class="col-xs-12">
      <center><img src="/upload/blog/<?php echo $item['news_image']; ?>" width="250" id="ereview-img"></center>
      <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
      <center>
        <input type="file" class="form-control hidden" name="eblogImg" id="eblogImg">
        <input type="text" class="form-control hidden" name="curImg" id="curImg" value="<?php echo $item['news_image']; ?>">
        <button type="button" id="ecancel-img" class="btn btn-success hidden"><i class="fa fa-times"></i></button>
      </center>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group form-group-default required">
        <label>Tiêu đề</label>
        <input type="text" class="form-control" name="eblogTitle" value="<?php echo $item['news_title']; ?>">
      </div>

      <div class="form-group form-group-default required">
        <label>Nội dung</label>
        <textarea class="form-control" name="eblogDetail" id="eblogDetail"><?php echo $item['news_detail']; ?></textarea>
      </div>

      <div class="clearfix"></div>
      <button class="btn btn-success" id="update-blog" type="submit">Sửa</button>
      <button class="btn btn-danger" data-id="<?php echo $item['news_id']; ?>" id="del-blog" type="button">Xóa</button>
      <?php 
        if ($item['news_public'] == 1) {
          echo '<button class="btn btn-primary" data-id="'.$item['news_id'].'" id="accept-blog" type="button">Phê duyệt</button>';
        }
      ?>
    </div>
  </div>                                          
</form>
<?php if ($data) { ?>
  <div class="panel-heading">
    <span style="font-size: 20px;">Chi tiết liên hệ</span>
    <?php if ($_SESSION["royalwines_permission_ok"] == 1) { ?>
    <button class="btn btn-warning del-mess pull-right" data-id="<?php echo $data['form_id']; ?>">
    <?php } ?>
      <i class="fa fa-trash"></i>
    </button>
  </div>
  <div class="panel-body">
    <div class="scrollable">
      <div class="demo-portlet-scrollable" style="height: 385px">
        <div>
          <h5><?php echo $data['full_name'].'('.$data['email'].')'; ?></h5>
          <h5><b><?php echo $data['subject']; ?></b></h5>
          <p><?php echo $data['message']; ?></p>
        </div>
      </div>
    </div>
  </div>
<?php 
} else {
  echo '<h1 class="text-center">Liên hệ này không tồn tại<h1>';
}
?>
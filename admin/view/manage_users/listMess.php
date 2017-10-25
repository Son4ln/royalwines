<?php 
  foreach ($result as $key) {
  $users = new UsersModel();
  $user = $users -> getUserById($key['user_id']);
?>
<li class="alert-list">
  <a href="javascript:;" class="seen-mess" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
    <p>
      <span class="text-master">(<?php echo $user['email']; ?>) <?php echo $key['content'] ?></span>
    </p>
     <p>
      <span class="text-warning"><?php echo $key['date_input']; ?></span>
    </p>
  </a>
</li>

<?php
  }
?>
  <?php 
    foreach ($categories as $category) {
  ?>
      <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
  <?php
    }
  ?>
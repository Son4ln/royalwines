  <?php 
    foreach ($brands as $brand) {
  ?>
      <option value="<?php echo $brand['brand_id']; ?>" class="index-brand">
        <?php echo $brand['brand_name']; ?>
      </option>
  <?php
    }
  ?>
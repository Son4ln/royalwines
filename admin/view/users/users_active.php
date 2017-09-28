<table class="table table-hover demo-table-search find-table" id="<?php echo $tableName; ?>">
  <thead>
    <tr>
      <th>Họ và tên</th>
      <th>Email</th>
      <th>SĐT</th>
      <th>Active/Deactive</th>
      <th>Phân quyền</th>
    </tr>
  </thead>

  <tbody id="show-users-active">
    <?php
      foreach ($data as $key) {
    ?>
    <tr>
      <td class="v-align-middle">
        <img src="../../upload/users/<?php echo $key['avatar'] ?>" width="50">
        <?php echo $key['full_name']; ?>
      </td>

      <td class="v-align-middle">
        <?php echo $key['email'] ?>
      </td>

      <td class="v-align-middle">
        <?php echo $key['phone'] ?>
      </td>

      <td class="v-align-middle">
        <?php 
          if($key['is_active'] == 2) {
            echo '<button class="btn btn-warning lock-user" data-id="'.$key['user_id'].'" data-active="1" 
            id="lock-user"><i class="fa fa-lock"></i></button>';
          } else {
            echo '<button class="btn btn-warning lock-user" data-id="'.$key['user_id'].'" data-active="2" 
            id="lock-user"><i class="fa fa-unlock-alt"></i></button>';
          }
        ?>
        
      </td>

      <td class="v-align-middle">
        <?php 
          if ($key['is_active'] == 1) {
            echo 'Active tài khoản để thực hiện chức năng';
          } else {
        ?>
        <form class="permis-form">
          <input type="hidden" name="user-id" value="<?php echo $key['user_id'] ?>">
          <div class="form-group">
            <div class="input-group">
              <div class="form-group has-feedback has-clear">
                <select class="form-control" name="permis">
                  <option <?php $key['permission'] == 2 ? print "selected" : ''; ?> value="2">Admin</option>
                  <option <?php $key['permission'] == 3 ? print "selected" : ''; ?> value="3">Người bán</option>
                  <option <?php $key['permission'] == 4 ? print "selected" : ''; ?> value="4">Người viết tin tức</option>
                  <option <?php $key['permission'] == 5 ? print "selected" : ''; ?> value="5">Người dùng bình thường</option>
                </select>
              </div>

              <span class="input-group-btn">
                <button type="submit" class="btn btn-success">
                  <i class="fa fa-floppy-o" aria-hidden="true"></i>
                </button>
              </span>
            </div>
          </div>
        </form>
        <?php
          }
        ?>
      </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
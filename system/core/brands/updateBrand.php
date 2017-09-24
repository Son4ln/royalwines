<?php
  include_once '../../../database/database.php';
  include_once '../../../admin/model/brandsModel.php';
  $brandId = $_POST['brandId'];
  $public = $_POST['status'];
  $brandEdit = new Brands();
  $editResult = $brandEdit -> getBrandById($brandId);

?>

  <div class="row">
            <div class="col-md-8 col-xs-12 col-md-offset-2">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Sửa nhãn hiệu</h4>
                        
                    </div>
                    <div class="card-content">
                        <form enctype="multipart/form-data" method="post" action="?action=updateBrandsAction&id=<?php echo $brandId; ?>&public=<?php echo $public; ?>">

                            <center><img src="../../upload/brands/<?php echo $editResult['brand_logo']; ?>" width="80" id="review-img"></center>
                            <input type="hidden" name="curr-img" value="<?php echo $editResult['brand_logo']; ?>">
                            <div class="row text-center">
                              <label class="btn btn-file btn-primary">
                                <i class="fa fa-folder"></i> <input type="file" class="form-control" name="brand-logo" id="brand-logo" style="display: none">
                              </label>

                              <button type="button" class="btn btn-primary" id="clear-img"><i class="fa fa-times"></i></button>
                                
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-offset-1">
                                    <label for="brand-name">Tên nhãn hiệu</label>                           
                                </div>

                                <div class="col-xs-8">
                                    <input type="text" class="form-control" name="brand-name" id="brand-name" value="<?php echo $editResult['brand_name']; ?>">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
          //hiển thị ảnh để xem trước
          document.querySelector('[name="brand-logo"]').addEventListener('change', () => {
            let review = document.getElementById('review-img');
            let input = document.querySelector('[name="brand-logo"]');
            let file = input.files[0];
            let reader = new FileReader();
            reader.onload = (e) => {
              review.src = e.target.result;
            }
            reader.readAsDataURL(file);
          });

          //trả lại ảnh ban đầu
          document.getElementById('clear-img').addEventListener('click', () => {
            let review = document.getElementById('review-img');
            let input = document.querySelector('[name="brand-logo"]');
            review.src = '../../upload/brands/'+document.querySelector('[name="curr-img"]').value;
            input.value = '';
          });
          
          // document.querySelector('[name="brand-name"]').focus();
        </script>



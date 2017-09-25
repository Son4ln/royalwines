<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
<style type="text/css">
  tr {
    cursor: pointer;
  }

  #review-img {
    cursor: pointer;
  }
</style>
	<div class="content">
	  <div class="container-fluid">
	    <div class="row">
          <div class="col-md-12">
                  <div class="card-header" data-background-color="purple">
                      <h4 class="title">Thông tin liên hệ</h4>
					<p class="category">Xem và chỉnh sửa</p>
                  </div>
                  <div class="card-content">
                      <form enctype="multipart/form-data" method="post" action="?action=updateContactInfo"> 
                      	<center><img id="review-img" src="../../upload/<?php echo $resultContactInfo['logo']; ?>" width="150"></center>
                      	<input type="hidden" name="current-img" value="<?php echo $resultContactInfo['logo']; ?>">
                          <div class="row">
                          	<div class="col-xs-8 col-sm-offset-2 text-center">
                          		<label class="btn btn-file btn-primary">
              								  <i class="fa fa-folder"></i> <input class="change-input" type="file" style="display: none;" name="logo">
              								</label>
                              <button type="button" class="btn btn-primary" id="clear-img"><i class="fa fa-times"></i></button>
                          	</div>
                          </div>

                          <?php
                            BasicLibs::getAlert();
                          ?>

                          <div class="row form-group">
                          	<div class="col-xs-3 col-sm-offset-1">
                          		<label for="store-name">Tên cửa hàng:</label>                      		
                          	</div>

                          	<div class="col-xs-7">
                          		<p><?php echo $resultContactInfo['store_name']; ?></p>         		
                          	</div>

                          </div>

                          <div class="row form-group">
                          	<div class="col-xs-3 col-sm-offset-1">
                          		<label for="address">Địa chỉ:</label>                      		
                          	</div>

                          	<div class="col-xs-6">
                          		<input type="text" class="form-control change-input" name="address" id="address" value="<?php echo $resultContactInfo['address']; ?>">                    		
                          	</div>

                            <div class="col-xs-2 hidden">
                                <i class="fa fa-times close-btn"></i>
                            </div>
                          </div>

                          <div class="row form-group">
                          	<div class="col-xs-3 col-sm-offset-1">
                          		<label for="branch">Chi nhánh:</label>                      		
                          	</div>

                          	<div class="col-xs-6">
                          		<input type="text" class="form-control change-input" name="branch" id="branch" value="<?php echo $resultContactInfo['branch']; ?>">                    		
                          	</div>

                            <div class="col-xs-2 hidden">
                                <i class="fa fa-times close-btn"></i>
                            </div>
                          </div>

                          <div class="row form-group">
                          	<div class="col-xs-3 col-sm-offset-1">
                          		<label for="phone">SĐT:</label>                      		
                          	</div>

                          	<div class="col-xs-6">
                          		<input type="text" class="form-control change-input" name="phone" id="phone" value="<?php echo $resultContactInfo['phone']; ?>">
                          	</div>

                            <div class="col-xs-2 hidden">
                                <i class="fa fa-times close-btn"></i>
                            </div>
                          </div>

                          <div class="row form-group">
                          	<div class="col-xs-3 col-sm-offset-1">
                          		<label for="email">Email:</label>                      		
                          	</div>

                          	<div class="col-xs-6">
                          		<input type="text" class="form-control change-input" name="email" id="email" value="<?php echo $resultContactInfo['email']; ?>">                    		
                          	</div>

                            <div class="col-xs-2 hidden">
                                <i class="fa fa-times close-btn"></i>
                            </div>
                          </div>

                          <div class="row form-group">
                          	<div class="col-xs-3 col-sm-offset-1">
                          		<label for="slogan">Khẩu hiệu:</label>                      		
                          	</div>

                          	<div class="col-xs-6">
                          		<input type="text" class="form-control change-input" name="slogan" id="slogan" value="<?php echo $resultContactInfo['slogan']; ?>">                    		
                          	</div>

                            <div class="col-xs-2 hidden">
                                <i class="fa fa-times close-btn"></i>
                            </div>
                          </div>

                          <div class="row form-group">
                          	<div class="col-xs-3 col-sm-offset-1">
                          		<label for="intro">Giới thiệu:</label>                      		
                          	</div>

                          	<div class="col-xs-6">
                          		<textarea class="form-control change-input" name="intro" id="intro"><?php echo $resultContactInfo['introduce']; ?></textarea>                    		
                          	</div>

                            <div class="col-xs-2 hidden">
                                <i class="fa fa-times close-btn"></i>
                            </div>
                          </div>
						
						<div class="row form-group">
							<div class="col-sm-6 col-sm-offset-4">
                          	<button type="submit" disabled="disabled" class="btn btn-primary pull-left">Update Profile</button>
                          </div>
                          <div class="clearfix"></div>
                      </form>
                  </div>
              </div>
        </div>
	  </div>
	</div>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>  
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar-right.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/scripts.php'; ?>

    <script type="text/javascript">
        // lấy giá trị gốc trong input
        let dataImg = document.querySelector('[name="current-img"]').value;
        let dataAddress = document.querySelector('[name="address"]').value;
        let dataBranch = document.querySelector('[name="branch"]').value;
        let dataPhone = document.querySelector('[name="phone"]').value;
        let dataEmail = document.querySelector('[name="email"]').value;
        let dataSlogan = document.querySelector('[name="slogan"]').value;
        let dataIntro = document.querySelector('[name="intro"]').innerHTML;
        let count = 0;

        //hiển thị ảnh để xem trước
        let uploadImg = document.querySelector('[name="logo"]');
        uploadImg.addEventListener('change', () => {
          let review = document.getElementById('review-img');
          let input = document.querySelector('[name="logo"]');
          let file = input.files[0];
          let reader = new FileReader();
          reader.onload = (e) => {
            review.src = e.target.result;
          }
          reader.readAsDataURL(file);
        });

        //trả hình ảnh lại giá trị ban đầu
        let clearImg = document.getElementById('clear-img');
        clearImg.addEventListener('click', () => {
          let review = document.getElementById('review-img');
          let input = document.querySelector('[name="logo"]');
          review.src = '../../upload/'+dataImg;
          input.value = '';
        });

        // lấy  tất cả thẻ input và set laioj giá trị ban đầu khi nhấn giấu x
        let allInput = document.querySelectorAll('.change-input');
        for (let selectInput of allInput) {
          selectInput.addEventListener('keyup', (e) => {
            let keyCode = event.keyCode;

            if (keyCode != 13 && keyCode != 9 && keyCode != 17) {

              let nameInput = selectInput.getAttribute('name');
              let ancient = e.target.parentElement.parentElement;
              let closeBtn = ancient.children[2];
              closeBtn.classList.remove("hidden");


              //hành động khi bấm dấu nhân
              ancient.children[2].addEventListener('click', () => {

                  // trả giá trị lại ban đầu
                if(nameInput == 'address'){
                  selectInput.value = dataAddress;
                  closeBtn.classList.add("hidden");
                }

                if(nameInput == 'branch') {
                  selectInput.value = dataBranch;
                  closeBtn.classList.add("hidden");
                }

                if(nameInput == 'phone') {
                  selectInput.value = dataPhone;
                  closeBtn.classList.add("hidden");
                }

                if(nameInput == 'email') {
                  selectInput.value = dataEmail;
                  closeBtn.classList.add("hidden");
                }

                if(nameInput == 'slogan') {
                  selectInput.value = dataSlogan;
                  closeBtn.classList.add("hidden");
                }

                if(nameInput == 'intro') {
                  selectInput.value = dataIntro;
                  closeBtn.classList.add("hidden");
                }
                  
              });
            }
        
          });
        }

        //đặt 0.5s để nhận kết quả và xét điều kiện nút submit
        setInterval(() => {
          let newImg = document.querySelector('[name="logo"]').value;
          let newAddress = document.querySelector('[name="address"]').value.trim();
          let newBranch = document.querySelector('[name="branch"]').value.trim();
          let newPhone = document.querySelector('[name="phone"]').value.trim();
          let newEmail = document.querySelector('[name="email"]').value.trim();
          let newSlogan = document.querySelector('[name="slogan"]').value.trim();
          let newIntro = document.querySelector('[name="intro"]').value.trim();

          if(newAddress != dataAddress || newBranch != dataBranch || newPhone != dataPhone || newEmail != dataEmail
            || newSlogan != dataSlogan || newIntro != dataIntro || newImg != '') {
            document.querySelector('[type="submit"]').disabled = false;
          } else {
            document.querySelector('[type="submit"]').disabled = true;
          }
        },500);

    </script>
<?php include $GLOBALS['ROOT'].'public/template/admin/searchbox.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
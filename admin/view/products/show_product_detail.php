<form id="form-editproduct" method="" enctype="multipart/form-data">
  <div class="alert alert-danger hidden" id="alert-add"></div>
  <input type="text" name="productId" id="eproduct-id" class="hidden">
  <input type="text" name="oldImg" id="eold-img" class="hidden">
  <div class="row">
    <div class="col-md-6">
      <center><img src="../../upload/products/logo.png" width="135" id="ereview-img"></center>
      <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
      <center>
        <input type="file" class="form-control hidden" name="eproductImg" id="eproduct-img">
        <button type="button" id="ecancel-img" class="btn btn-success hidden"><i class="fa fa-times"></i></button>
      </center><br/>

      <div class="form-group form-group-default required">
        <label>Tên sản phẩm</label>
        <input type="text" class="form-control" name="eproductName" id="eproduct-name">
      </div>

	  <div class="form-group form-group-default required">
	    <label>Giá gốc</label>
	    <input type="number" min="0" step="500" class="form-control" name="eprice" id="eprice">
      </div>

      <div class="form-group form-group-default">
        <label>Giảm giá</label>
        <input type="number" min="0" step="500" class="form-control" name="ediscount"  id="ediscount">
      </div>

      <div class="form-group form-group-default required">
        <label>Hàng trong kho</label>
        <input type="number" min="0" class="form-control" name="einStock" id="ein-stock">
      </div>

      <div class="form-group form-group-default required">
        <label>Năm sản phẩm</label>
        <input type="number" min="0" class="form-control" name="etime" id="etime" value="<?php echo $data['product_time']; ?>">
      </div>

      <div class="form-group form-group-default required">
        <label>Thương hiệu</label>
        <select name="ebrandId" id="show-brands" class="form-control">
        </select>
      </div>

      <div class="form-group form-group-default required">
        <label>Loại sản phẩm</label>
        <select name="ecategoryId" id="show-categories" class="form-control">
        </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group form-group-default">
        <label>Chi tiết sản phẩm</label>
        <textarea class="form-control" id="eproduct-detail" name="edetail"><?php echo $data['product_detail']; ?></textarea>
      </div>

      <div class="form-group form-group-default required">
        <label>Cập nhật ngày</label>
        <p id="date"></p>
      </div>
      <div class="clearfix"></div>
      <button class="btn btn-success" id="add-products" type="submit">Sửa sản phẩm</button>
    </div>
  </div>                                         
</form>
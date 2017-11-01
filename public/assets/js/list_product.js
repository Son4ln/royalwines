let product_state = {
    status: 0,
    oldImg: ''
  };

$(document).ready(function() {
  validateAddForm();
  validateEditForm();
  reviewImg();
  ereviewImg();
  cancelImg();

  let olImg = $('#review-img').attr('src');
  product_state.oldImg = olImg;

  $('#review-img').click(() => {
    $('#product-img').click();
  });

  $('#ereview-img').click(() => {
    $('#eproduct-img').click();
  });

  // show product wait khi bấm vào tab public
  $('#tab-wait').click(() => {
    showPublic(3);
    product_state.status = 3;
  });

  // show product đã public khi bấm vào tab public
  $('#tab-public').click(() => {
    showPublic(2);
    product_state.status = 2;
  });

  // show product unpublic khi bấm vào tab public
  $('#tab-unpublic').click(() => {
    showPublic(1);
    product_state.status = 1;
  });
});

/*hàm tạo datatable của template với tham số WhatTable 
để xác định table nào khi sử dụng trong hàm showPublic() và showUnpublic()*/
function dataTable(whatTable, whatSearch) {
    let responsiveHelper = undefined;
    let breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };

  // Initialize datatable showing a search box at the top right corner
    let initTableWithSearch = function() {
      let tb = `#${whatTable}`;
      let search = `#${whatSearch}`;
      let table = $(tb);

      let settings = {
        "sDom": "<'table-responsive't><'row'<p i>>",
        "destroy": true,
        "scrollCollapse": true,
        "ordering": false,
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        },
        "iDisplayLength": 5
      };

      table.dataTable(settings);

      // search box for table
      $(search).keyup(function() {
          table.fnFilter($(this).val());
      });
    }

    initTableWithSearch();
  }

//hàm thêm nhãn hiệu mới.
function addProduct() {
  let addBtn = $('#add-products');
  addBtn.attr('disabled', 'disabled');
  addBtn.html('Loading...');
  let productImg = $('#product-img').prop('files')[0];
  let productName = $('[name="productName"]').val();
  let price = $('[name="price"]').val();
  let discount = $('[name="discount"]').val();
  if (discount == 0 || discount == '') {
    discount = null;
  }
  let inStock = $('[name="inStock"]').val();
  let volume = $('[name="volume"]').val();
  let detail = CKEDITOR.instances['product-detail'].getData();
  let brandId = $('[name="brandId"]').val();
  let categoryId = $('[name="categoryId"]').val();

  let status = 3;
  if ($('[name="public"]')) {
    status = $('[name="status"]').val();
  }

  let form_data = new FormData();
  form_data.append('productName', productName);
  form_data.append('productImg', productImg);
  form_data.append('price', price);
  form_data.append('discount', discount);
  form_data.append('inStock', inStock);
  form_data.append('volume', volume);
  form_data.append('detail', detail);
  form_data.append('status', status);
  form_data.append('brandId', brandId);
  form_data.append('categoryId', categoryId);

  $.ajax({
    url: '?action=addProductsAction',
    type: 'post',
    dataType: 'text',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(result) {
      console.log(result);
      if (result === 'file_error') {
        $('#add-alert').removeClass('hidden');
        $('#add-alert').html('Ảnh chỉ hỗ trợ định dạng jpg, jpeg, png và kích thước < 5mb');
      } else if (result === 'unique') {
        $('#add-alert').removeClass('hidden');
        $('#add-alert').html('Sản phẩm đã tồn tại');
      } else if (result === 'fail') {
        $('#add-alert').removeClass('hidden');
        $('#add-alert').html('Lỗi kết nối cơ sở dữ liệu');
      } else {
        let mess = `Đã thêm sản phẩm ${productName} thành công. Nếu là seller hãy chờ admin phê duyệt`;
        let lv = 'success';
        notification(mess, lv);

        if (status === '1') {
          $('#tab-unpublic').click();
        } else if (status === '2') {
          $('#tab-public').click();
        }

        $('#add-alert').addClass('hidden');
        $('#form-addproduct')[0].reset();
        $('#review-img').attr('src', product_state.oldImg);
        $('#cancel-img').addClass('hidden');
        $('#product-img').val('');
      }

      addBtn.removeAttr('disabled');
      addBtn.html('Thêm sản phẩm');
    },
    error: function() {
      let mess = 'Lỗi kết nôi';
      let lv = 'warning';
      notification(mess, lv);
    }
  });
  return false;
}

// hàm lấy danh sác các products public
function showPublic (status) {
  let panel = 'products-unpublic';
  let table = 'table-unpublic';
  let search = 'search-table-unpublic';
  if (parseInt(status) === 2) {
    panel = 'products-public';
    table = 'table-public';
    search = 'search-table-public';
  } else if (parseInt(status) === 3) {
    panel = 'products-wait';
    table = 'table-wait';
    search = 'search-table-wait';
  }

  let panelBody = `#${panel}`;
  $('.loading').removeClass('hidden');
  $.ajax({
    url: '?action=getPublicProduct',
    type: 'get',
    dataType: 'text',
    data: {
      public: status,
    },
    success: function(data) {
      if (data === 'wrong_permission') {
        let mess = 'Bạn đang cố gắng làm gì vậy';
        let lv = 'danger';
        notification(mess, lv);
      }
      $(panelBody).html(data);
      $('.loading').addClass('hidden');

      dataTable(table, search);

      $('.change-status').click((e) => {
        changeStatus(e);
      });
      
      delproduct();

      $('.edit-product').click((e) => {
        showproduct(e);
      });
    },
    error: function(data) {
      body.innerHTML = 'Lỗi kết nối';
    }
  });
}

function changeStatus (e) {
  let target = $(e.target);
  if (target.is('i')) {
    target = $(e.target).parent();
  }

  let status = target.attr('data-status');
  let publicStt = 2;
  if (status === '2') {
    publicStt = 1;
  }

  let uid = target.attr('data-id');
  $.ajax({
    url: '?action=changeStatusProducts',
    type: 'post',
    dataType: 'text',
    data: {
      uid: uid,
      public: publicStt
    },
    success: function(result) {
      let mess = 'Nhãn hiệu đã ngưng hiển thị';
      if (status === '1' || status === '3') {
        mess = 'Nhãn hiệu đã được hiển thị';
      };
      showPublic(status);
      let lv = 'success';
      notification(mess, lv);
      target.parents('tr').fadeOut();
    },
    error: function() {
      let mess = 'Không thể kết nối đến server';
      let lv = 'danger';
      notification(mess, lv)
    }
  });
}

function delproduct() {
  let del = $('.del-product');
  del.unbind().on('click', (e) => {
    $.confirm({
      title: 'XÓA SẢN PHẨM',
      content: 'Bạn có chắc muốn xóa sản phẩm này',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        confirm: {
          text: 'Xóa',
          btnClass: 'btn-orange',
          action: function(){
            let product = $(e.target);
            if (product.is('i')) {
              product = $(e.target).parent();
            }

            let uid = product.attr('data-id');
            let img = product.attr('data-img');

            $.ajax({
              url: '?action=deleteProduct',
              type: 'post',
              dataType: 'text',
              data: {
                uid: uid,
                img: img
              },
              success: function(result) {
                console.log(result);
                let mess = `Không thể xóa sản phẩm này do đã có liên kết với hóa đơn liên kết, vui lòng ngừng hiển thị`;
                let lv = 'warning';
                if (result != 'fail') {
                  product.parents('tr').fadeOut();
                  mess = 'Đã xóa sản phẩm';
                  lv = 'success';
                }
                notification(mess, lv);
                showPublic(product_state.status);
              },
              error: function() {
                let mess = 'Không thể kết nối đến server';
                let lv = 'danger';
                notification(mess, lv);
              }
            });
          }
        },
        close: {
          text: 'Đóng'
        }
      }
    });
  });
}

function showproduct(e) {
  let target = $(e.target);
  if (target.is('i')) {
    target = $(e.target).parent();
  };

  let alertAdd = document.getElementById('alert-add');
  alertAdd.classList.add('hidden');

  let uid = document.querySelector('[name="productId"]');
  uid.value = target.attr('data-id');
  let oldImg = document.querySelector('[name="oldImg"]');
  oldImg.value = target.attr('data-img');
  let name = document.querySelector('[name="eproductName"]');
  name.value = target.attr('data-name');
  let eprice = document.querySelector('[name="eprice"]');
  eprice.value = target.attr('data-price');
  let ediscount = document.querySelector('[name="ediscount"]');
  if (target.attr('data-discount') == null || target.attr('data-discount') == '') {
    ediscount.value = 0;
  } else {
    ediscount.value = target.attr('data-discount');
  }
  
  let einStock = document.querySelector('[name="einStock"]');
  einStock.value = target.attr('data-stock');
  let evolume = document.querySelector('[name="evolume"]');
  evolume.value = target.attr('data-volume');
  CKEDITOR.instances['eproduct-detail'].setData(target.attr('data-detail'));
  let date = document.getElementById('date');
  let dateVal = '';
  if (target.attr('data-update') == null || target.attr('data-update') == '') {
    dateVal = new Date(target.attr('data-create'));
  } else {
    dateVal = new Date(target.attr('data-update'));
  }

  date.textContent = dateVal.toLocaleDateString("vi");

  $.ajax({
    url: '?action=showAllBrands',
    success: function(result) {
      $('#show-brands').html(result);
      $('#show-brands option').each(function() {
        if($(this).val() == target.attr('data-brand')) {
          $(this).prop("selected", true);
        }
      });
    }
  });

  $.ajax({
    url: '?action=showAllCategories',
    success: function(result) {
      $('#show-categories').html(result);
      $('#show-categories option').each(function() {
        if($(this).val() == target.attr('data-category')) {
          $(this).prop("selected", true);
        }
      });
    }
  });

  let review = document.getElementById('ereview-img');
  review.src = `../../upload/products/${target.attr('data-img')}`;
  ecancelImg();
}

function editProduct() {
  let addBtn = document.getElementById('add-btn');
  let alertAdd = document.getElementById('alert-add');
  let fileData = $('#eproduct-img').prop('files')[0];
  let productId = $('#eproduct-id').val();
  let productName = $('#eproduct-name').val().trim();;
  let oldImg = $('#eold-img').val();
  let price = $('#eprice').val();
  let discount = $('#ediscount').val();
  let inStock = $('#ein-stock').val();
  let volume = $('#evolume').val();
  let detail = CKEDITOR.instances['eproduct-detail'].getData();
  console.log(detail);
  let brandId = $('#show-brands').val();
  let categoryId = $('#show-categories').val();
  var form_data = new FormData();
  addBtn.disabled = true;
  form_data.append('eproductImg', fileData);
  form_data.append('eproductId', productId);
  form_data.append('eproductName', productName);
  form_data.append('eoldImg', oldImg);
  form_data.append('eprice', price);
  form_data.append('ediscount', discount);
  form_data.append('einStock', inStock);
  form_data.append('evolume', volume);
  form_data.append('edetail', detail);
  form_data.append('ebrandId', brandId);
  form_data.append('ecategoryId', categoryId);
  $.ajax({
    url: '?action=updateProductsAction',
    type: 'post',
    dataType: 'text',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(result) {
      if (result === 'unique') {
        alertAdd.classList.remove('hidden');
        addBtn.disabled = false;
        alertAdd.textContent = 'Sản phẩm đã được sử dụng';
      } else if (result === 'fail') {
        alertAdd.classList.remove('hidden');
        addBtn.disabled = false;
        alertAdd.textContent = 'Lỗi kết nối cơ sở dữ liệu';
      } else if (result === 'file_not_valid') {
        alertAdd.classList.remove('hidden');
        addBtn.disabled = false;
        alertAdd.textContent = 'Hình ảnh chỉ hỗ trợ jpg, jpeg, png và kích thước < 5mb';
      } else {
        showPublic(product_state.status);
        addBtn.disabled = false;
        $('#close-edit').click();
        let mess = 'Cập nhập sản phẩm thành công';
        let lv = 'success';
        notification(mess, lv);
      }
    },
    error: function() {
      addBtn.disabled = false;
      let mess = 'Không thể kết nối đến server';
      let lv = 'danger';
      notification(mess, lv);
    }
  });

  return false;
}

function reviewImg() {
  let uploadImg = document.querySelector('[name="productImg"]');
  uploadImg.addEventListener('change', () => {
    let review = document.getElementById('review-img');
    let input = document.querySelector('[name="productImg"]');
    let file = input.files[0];
    let reader = new FileReader();
    reader.onload = (e) => {
      review.src = e.target.result;
    }
    reader.readAsDataURL(file);
    $('#cancel-img').removeClass('hidden');
  });
}

function ereviewImg() {
  let uploadImg = document.querySelector('[name="eproductImg"]');
  uploadImg.addEventListener('change', () => {
    let review = document.getElementById('ereview-img');
    let input = document.querySelector('[name="eproductImg"]');
    let file = input.files[0];
    let reader = new FileReader();
    reader.onload = (e) => {
      review.src = e.target.result;
    }
    reader.readAsDataURL(file);
    $('#ecancel-img').removeClass('hidden');
  });
}

function validateAddForm() {
  $('#form-addproduct').validate({
    rules: {
      productImg: 'required',
      productName: 'required',
      price: 'required',
      inStock: 'required',
      volume: 'required',
      brandId: 'required',
      categoryId: 'required'
    },
    messages: {
      productImg: 'Vui lòng chọn ảnh đại diện',
      productName: 'Vui lòng nhập tên sản phẩm',
      price: 'Vui lòng nhập giá',
      inStock: 'Vui lòng nhập số lượng sản phẩm hiện có',
      volume: 'vui lòng nhập thể tích sản phẩm',
      brandId: 'Vui lòng chọn thương hiệu',
      categoryId: 'Vui lòng chọn loại sản phẩm'
    },
    submitHandler: function(form) {
      addProduct();
    }
  });
}

function validateEditForm() {
  $('#form-editproduct').validate({
    rules: {
      eproductName: 'required',
      eprice: 'required',
      evolume: 'required',
      einStock: 'required',
      ebrandId: 'required',
      ecategoryId: 'required'
    },
    messages: {
      eproductName: 'Vui lòng nhập tên sản phẩm',
      eprice: 'Vui lòng nhập giá',
      einStock: 'Vui lòng nhập số lượng sản phẩm hiện có',
      evolume: 'vui lòng nhập năm sản phẩm',
      ebrandId: 'Vui lòng chọn thương hiệu',
      ecategoryId: 'Vui lòng chọn loại sản phẩm'
    },
    submitHandler: function(form) {
      editProduct();
    }
  });
}

function cancelImg() {
  let btn = $('#cancel-img');
  let old = $('#review-img').attr('src');
  btn.click(() => {
    $('#review-img').attr('src', old);
    $('#cancel-img').addClass('hidden');
    $('#product-img').val('');
  });
}

function ecancelImg() {
  let btn = $('#ecancel-img');
  let old = $('#ereview-img').attr('src');
  btn.click(() => {
    $('#ereview-img').attr('src', old);
    $('#ecancel-img').addClass('hidden');
    $('#eproduct-img').val('');
  });
}
let brand_state = {
    status: 0
  };

$(document).ready(function() {
  validateAddForm();
  validateEditForm();
  reviewImg();
  ereviewImg();
  cancelImg();

  $('#review-img').click(() => {
    $('#brand-logo').click();
  });

  $('#ereview-img').click(() => {
    $('#ebrand-logo').click();
  });

  // show brand wait khi bấm vào tab public
  $('#tab-wait').click(() => {
    showPublic(3);
    brand_state.status = 3;
  });

  // show brand đã public khi bấm vào tab public
  $('#tab-public').click(() => {
    showPublic(2);
    brand_state.status = 2;
  });

  // show brand unpublic khi bấm vào tab public
  $('#tab-unpublic').click(() => {
    showPublic(1);
    brand_state.status = 1;
  });
});

/*hàm tạo datatable của template với tham số WhatTable 
để xác định table nào khi sử dụng trong hàm showPublic() và showUnpublic()*/
function dataTable(whatTable) {
  let responsiveHelper = undefined;
  let breakpointDefinition = {
      tablet: 1024,
      phone: 480
  };

  // Initialize datatable showing a search box at the top right corner
  let initTableWithSearch = function() {
    let tb = `#${whatTable}`;
    let table = $(tb);

    let settings = {
      "sDom": "<'table-responsive't><'row'<p i>>",
      "destroy": true,
      "scrollCollapse": true,
      "oLanguage": {
          "sLengthMenu": "_MENU_ ",
          "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
      },
      "iDisplayLength": 5
    };

    table.dataTable(settings);

    // search box for table
    $('#search-table').keyup(function() {
        table.fnFilter($(this).val());
    });
  }

  initTableWithSearch();
}

//hàm thêm nhãn hiệu mới.
function addBrand() {
  let addBtn = $('#add-brands');
  addBtn.attr('disabled','disabled');
  addBtn.html('Loading...');
  let brandlogo = $('#brand-logo').prop('files')[0];
  let brandName = $('[name="brandname"]').val();
  let status = $('[name="status"]').val();
  let form_data = new FormData();
  form_data.append('brandname', brandName);
  form_data.append('brandlogo', brandlogo);
  form_data.append('status', status);

  $.ajax({
    url: '?action=addBrandsAction',
    type: 'post',
    dataType: 'text',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(result) {
      if (result === 'file_error') {
        $('#add-alert').removeClass('hidden');
        $('#add-alert').html('Ảnh chỉ hỗ trợ định dạng jpg, jpeg, png và kích thước < 5mb');
      } else if (result === 'unique') {
        $('#add-alert').removeClass('hidden');
        $('#add-alert').html('Nhãn hiệu đã tồn tại');
      } else if (result === 'fail') {
        $('#add-alert').removeClass('hidden');
        $('#add-alert').html('Lỗi kết nối cơ sở dữ liệu');
      } else {
        let mess = `Đã thêm nhãn hiệu ${brandName} thành công`;
        let lv = 'success';
        notification(mess, lv);
        if (status === '1') {
          $('#tab-unpublic').click();
        } else if (status === '2') {
          $('#tab-public').click();
        }

        $('#add-alert').addClass('hidden');
      }

      addBtn.removeAttr('disabled');
      addBtn.html('Thêm nhãn hiệu');
    },
    error: function() {
      let mess = 'Lỗi kết nôi';
      let lv = 'warning';
      notification(mess, lv);
    }
  });
  return false;
}

// hàm lấy danh sác các brands public
function showPublic (status) {
  let panel = 'brands-unpublic';
  let table = 'table-unpublic';
  if (parseInt(status) === 2) {
    panel = 'brands-public';
    table = 'table-public';
  } else if (parseInt(status) === 3) {
    panel = 'brands-wait';
    table = 'table-wait';
  }

  let panelBody = `#${panel}`;
  $('.loading').removeClass('hidden');
  $.ajax({
    url: '?action=getPublic',
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

      dataTable(table);

      $('.change-status').click((e) => {
        changeStatus(e);
      });
      
      delBrand();

      $('.edit-brand').click((e) => {
        showBrand(e);
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
  } else if (status === '3') {
    publicStt = 2;
  };

  let uid = target.attr('data-id');
  $.ajax({
    url: '?action=changeStatus',
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

function delBrand() {
  let del = $('.del-brand');
  del.unbind().on('click', (e) => {
    $.confirm({
      title: 'XÓA NHÃN HIỆU',
      content: 'Bạn có chắc muốn xóa nhãn hiệu này',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        confirm: {
          text: 'Xóa',
          btnClass: 'btn-orange',
          action: function(){
            let brand = $(e.target);
            if (brand.is('i')) {
              brand = $(e.target).parent();
            }

            let uid = brand.attr('data-id');
            let img = brand.attr('data-img');

            $.ajax({
              url: '?action=deleteBrands',
              type: 'post',
              dataType: 'text',
              data: {
                uid: uid,
                img: img
              },
              success: function(result) {
                console.log(result);
                let mess = `Không thể xóa nhãn hiệu này do đã có sản phẩm liên kết, vui lòng xóa toàn bộ sản phẩm liên quan
                  hoặc ngừng hiển thị`;
                let lv = 'warning';
                if (result != 'fail') {
                  brand.parents('tr').fadeOut();
                  mess = 'Đã xóa nhãn hiệu';
                  lv = 'success';
                }
                notification(mess, lv);
                showPublic(brand_state.status);
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

function showBrand(e) {
  let target = $(e.target);
  if (target.is('i')) {
    target = $(e.target).parent();
  };

  let alertAdd = document.getElementById('alert-add');
  alertAdd.classList.add('hidden');
  let uid = document.querySelector('[name="brand-id"]');
  uid.value = target.attr('data-id');
  let oldImg = document.querySelector('[name="old-img"]');
  oldImg.value = target.attr('data-img');
  let name = document.querySelector('[name="ebrandname"]');
  name.value = target.attr('data-name');
  let review = document.getElementById('ereview-img');
  review.src = `../../upload/brands/${target.attr('data-img')}`;
  ecancelImg();
}

function editBrand() {
  let addBtn = document.getElementById('add-btn');
  let alertAdd = document.getElementById('alert-add');
  let fileData = $('#ebrand-logo').prop('files')[0];
  let brandUId = $('#ebrand-id').val();
  let brandName = $('#ebrandname').val();
  let oldimg = $('#eold-img').val();
  var form_data = new FormData();
  addBtn.disabled = true;
  form_data.append('ebrandlogo', fileData);
  form_data.append('ebrandUId', brandUId);
  form_data.append('ebrandname', brandName);
  form_data.append('eoldImg', oldimg);

  $.ajax({
    url: '?action=updateBrandsAction',
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
        alertAdd.textContent = 'Nhãn hiệu đã được sử dụng';
      } else if (result === 'fail') {
        alertAdd.classList.remove('hidden');
        addBtn.disabled = false;
        alertAdd.textContent = 'Lỗi kết nối cơ sở dữ liệu';
      } else if (result === 'file_not_valid') {
        alertAdd.classList.remove('hidden');
        addBtn.disabled = false;
        alertAdd.textContent = 'Hình ảnh chỉ hỗ trợ jpg, jpeg, png và kích thước < 5mb';
      } else {
        showPublic(brand_state.status);
        addBtn.disabled = false;
        $('#close-edit').click();
        let mess = 'Cập nhập nhãn hiệu thành công';
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
  let uploadImg = document.querySelector('[name="brandlogo"]');
  uploadImg.addEventListener('change', () => {
    let review = document.getElementById('review-img');
    let input = document.querySelector('[name="brandlogo"]');
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
  let uploadImg = document.querySelector('[name="ebrandlogo"]');
  uploadImg.addEventListener('change', () => {
    let review = document.getElementById('ereview-img');
    let input = document.querySelector('[name="ebrandlogo"]');
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
  $('#form-addBrand').validate({
    rules: {
      brandlogo: 'required',
      brandname: 'required',
    },
    messages: {
      brandlogo: 'Vui lòng chọn logo',
      brandname: 'Vui lòng nhập tên nhãn hiệu'
    },
    submitHandler: function(form) {
      addBrand();
    }
  });
}

function validateEditForm() {
  $('#form-editBrand').validate({
    rules: {
      ebrandname: 'required',
    },
    messages: {
      ebrandname: 'Vui lòng nhập tên nhãn hiệu'
    },
    submitHandler: function(form) {
      editBrand();
    }
  });
}

function cancelImg() {
  let btn = $('#cancel-img');
  let old = $('#review-img').attr('src');
  btn.click(() => {
    $('#review-img').attr('src', old);
    $('#cancel-img').addClass('hidden');
    $('#brand-logo').val('');
  });
}

function ecancelImg() {
  let btn = $('#ecancel-img');
  let old = $('#ereview-img').attr('src');
  btn.click(() => {
    $('#ereview-img').attr('src', old);
    $('#ecancel-img').addClass('hidden');
    $('#ebrand-logo').val('');
  });
}
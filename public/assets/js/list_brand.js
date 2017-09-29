$(document).ready(function() {
  // showBrandPublic(1, 'brands-public', 'show-brand-public');
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
    showWait();
  });

  // show brand đã public khi bấm vào tab public
  $('#tab-public').click(() => {
    showPublic();
  });

  // show brand unpublic khi bấm vào tab public
  $('#tab-unpublic').click(() => {
    showUnpublic();
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

//hàm lấy danh sách các nhãn hiệu đang chờ phê duyệt
function showWait () {
  let table = 'table-wait';
  let body = document.getElementById('brands-wait');
  $('#wait-loading').removeClass('hidden');
  $.ajax({
    url: '../api/urls.php?url=getBrandByPublic',
    type: 'get',
    dataType: 'json',
    data: {
      public: 3,
    },
    success: function(data) {
      body.innerHTML = `
        <table class="table table-hover demo-table-search" id="${table}">
          <thead>
            <tr>
              <th>Tên nhãn hiệu</th>
              <th>Logo</th>
              <th>Public/ Unpublic</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody id="show-wait">
            
          </tbody>
        </table>
      `;
      // lấy id của tbody ngay phía trên
      let show = document.getElementById('show-wait');
      let html = [];
      for (let key of data) {
        let item = JSON.parse(key);
        let content = `
          <tr>
            <td class="v-align-middle">
              <p>${item.name}</p>
            </td>
            <td class="v-align-middle">
              <img src="../../upload/brands/${item.logo}" width="50px"/>
            </td>
            <td class="v-align-middle">
              <a class="change-status btn btn-success" data-id="${item.id}" data-status="3">Chấp nhận</a>
            </td>
            <td class="v-align-middle">
              <button data-toggle="modal" data-target="#modalSlideUp" class="edit-brand btn btn-primary"
              data-id="${item.id}" data-img="${item.logo}" data-name="${item.name}">
                <i class="fa fa-pencil-square-o"></i>
              </button>
              <button data-id="${item.id}" data-img="${item.logo}" class="del-brand btn btn-danger">
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
        `;

        html.push(content);
      }
      
      let inner = '';
      for (let item of html) {
        inner += item;
      }
      
      show.innerHTML = inner;
      $('#wait-loading').addClass('hidden');
      dataTable(table);
      changeStatus();
      delBrand();
      showBrand();
    },
    error: function(data) {
      tbody.innerHTML = 'Lỗi kết nối';
    }
  });
}

// hàm lấy danh sác các brands public
function showPublic () {
  let table = 'table-public';
  let body = document.getElementById('brands-public');
  $('#public-loading').removeClass('hidden');
  $.ajax({
    url: '../api/urls.php?url=getBrandByPublic',
    type: 'get',
    dataType: 'json',
    data: {
      public: 2,
    },
    success: function(data) {
      body.innerHTML = `
        <table class="table table-hover demo-table-search" id="${table}">
          <thead>
            <tr>
              <th>Tên nhãn hiệu</th>
              <th>Logo</th>
              <th>Public/ Unpublic</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody id="show-public-brand">
            
          </tbody>
        </table>
      `;
      // lấy id của tbody ngay phía trên
      let show = document.getElementById('show-public-brand');
      let html = [];
      for (let key of data) {
        let item = JSON.parse(key);
        let content = `
          <tr>
            <td class="v-align-middle">
              <p>${item.name}</p>
            </td>
            <td class="v-align-middle">
              <img src="../../upload/brands/${item.logo}" width="50px"/>
            </td>
            <td class="v-align-middle">
              <a class="change-status btn btn-success" data-id="${item.id}" data-status="2">Unpublic</a>
            </td>
            <td class="v-align-middle">
              <button data-toggle="modal" data-target="#modalSlideUp" class="edit-brand btn btn-primary"
              data-id="${item.id}" data-img="${item.logo}" data-name="${item.name}">
                <i class="fa fa-pencil-square-o"></i> 
              </button>
              <button data-id="${item.id}" data-img="${item.logo}" class="del-brand btn btn-danger">
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
        `;

        html.push(content);
      }
      
      let inner = '';
      for (let item of html) {
        inner += item;
      }
      
      show.innerHTML = inner;
      $('#public-loading').addClass('hidden');
      dataTable(table);
      changeStatus();
      delBrand();
      showBrand();
    },
    error: function(data) {
      tbody.innerHTML = 'Lỗi kết nối';
    }
  });
}

// hàm lấy danh sác các brands unpublic
function showUnpublic () {
  let table = 'table-unpublic';
  let body = document.getElementById('brands-unpublic');
  $('#unpublic-loading').removeClass('hidden');
  $.ajax({
    url: '../api/urls.php?url=getBrandByPublic',
    type: 'get',
    dataType: 'json',
    data: {
      public: 1,
    },
    success: function(data) {
      body.innerHTML = `
        <table class="table table-hover demo-table-search" id="${table}">
          <thead>
            <tr>
              <th>Tên nhãn hiệu</th>
              <th>Logo</th>
              <th>Public/ Unpublic</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody id="show-unpublic-brand">
            
          </tbody>
        </table>
      `;

      // lấy id của tbody ngay phía trên
      let show = document.getElementById('show-unpublic-brand');
      let html = [];
      for (let key of data) {
        let item = JSON.parse(key);
        let content = `
          <tr>
            <td class="v-align-middle">
              <p>${item.name}</p>
            </td>
            <td class="v-align-middle">
              <img src="../../upload/brands/${item.logo}" width="50px"/>
            </td>
            <td class="v-align-middle">
              <a class="change-status btn btn-success" data-id="${item.id}" data-status="1">Public</a>
            </td>
            <td class="v-align-middle">
              <button data-toggle="modal" data-target="#modalSlideUp" class="edit-brand btn btn-primary"
              data-id="${item.id}" data-img="${item.logo}" data-name="${item.name}">
                <i class="fa fa-pencil-square-o"></i> 
              </button>
              <a data-id="${item.id}" data-img="${item.logo}" class="del-brand btn btn-danger">
                <i class="fa fa-trash"></i>
              </a>
            </td>
          </tr>
        `;

        html.push(content);
      }

      let inner = '';
      for (let item of html) {
        inner += item;
      }

      show.innerHTML = inner;

      $('#unpublic-loading').addClass('hidden');
      dataTable(table);
      changeStatus();
      delBrand();
      showBrand();
    },
    error: function(data) {
      tbody.innerHTML = 'Lỗi kết nối';
    }
  });
}

function changeStatus () {
  let change = document.querySelectorAll('.change-status');
  for (let item of change) {
    item.addEventListener('click', (e) => {
      let ancestor = e.target.parentElement.parentElement;
      let status = e.target.getAttribute('data-status');
      let publicStt = 2;
      if (status === '2') {
        publicStt = 1;
      } else if (status === '3') {
        publicStt = 2;
      };

      let id = e.target.getAttribute('data-id');
      $.ajax({
        url: '?action=changeStatus',
        type: 'post',
        dataType: 'text',
        data: {
          id: id,
          public: publicStt
        },
        success: function(result) {
          let mess = 'Nhãn hiệu đã ngưng hiển thị';
          if (status === '1' || status === '3') {
            mess = 'Nhãn hiệu đã được hiển thị';
          };
          showPublic();
          showUnpublic();
          let lv = 'success';
          notification(mess, lv);
          ancestor.remove();
        },
        error: function() {
          let mess = 'Không thể kết nối đến server';
          let lv = 'danger';
          notification(mess, lv)
        }
      });
    }, false);
  }
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
            let brand = e.target;
            if (e.target.getAttribute('data-id') === null) {
              brand = e.target.parentElement;
            }

            let id = brand.getAttribute('data-id');
            let img = brand.getAttribute('data-img');

            let ancestor =  brand.parentElement.parentElement;

            $.ajax({
              url: '?action=deleteBrands',
              type: 'post',
              dataType: 'text',
              data: {
                id: id,
                img: img
              },
              success: function(result) {
                let mess = `Không thể xóa nhãn hiệu này do đã có sản phẩm liên kết, vui lòng xóa toàn bộ sản phẩm liên quan
                  hoặc ngừng hiển thị`;
                let lv = 'warning';
                if (result != 'fail') {
                  ancestor.classList.add('hidden');
                  mess = 'Đã xóa nhãn hiệu';
                  lv = 'success';
                }
                notification(mess, lv);
                showPublic();
                showUnpublic();
                showWait();
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

function showBrand() {
  let edit = document.querySelectorAll('.edit-brand');
  for (let editItem of edit) {
    editItem.addEventListener('click', (e) => {
      let target = e.target;
      if (e.target.getAttribute('class') != 'edit-brand') {
        target = e.target.parentElement;
      };

      let alertAdd = document.getElementById('alert-add');
      alertAdd.classList.add('hidden');
      let id = document.querySelector('[name="brand-id"]');
      id.value = target.getAttribute('data-id');
      let oldImg = document.querySelector('[name="old-img"]');
      oldImg.value = target.getAttribute('data-img');
      let name = document.querySelector('[name="ebrandname"]');
      name.value = target.getAttribute('data-name');
      let review = document.getElementById('ereview-img');
      review.src = `../../upload/brands/${target.getAttribute('data-img')}`;
      ecancelImg();
    });
  };
}

function editBrand() {
  let addBtn = document.getElementById('add-btn');
  let alertAdd = document.getElementById('alert-add');
  let fileData = $('#ebrand-logo').prop('files')[0];
  let brandId = $('#ebrand-id').val();
  let brandName = $('#ebrandname').val();
  let oldimg = $('#eold-img').val();
  var form_data = new FormData();
  addBtn.disabled = true;
  form_data.append('ebrandlogo', fileData);
  form_data.append('ebrandId', brandId);
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
        showUnpublic();
        showPublic();
        showWait();
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
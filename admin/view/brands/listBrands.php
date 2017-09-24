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

<!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li>
                    <a href="?action=home">Pages</a>
                  </li>
                  <li><a href="#" class="active">Nhãn hiệu</a>
                  </li>
                </ul>
                <!-- END BREADCRUMB -->
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <div class="row">
              <div class="col-sm-12">
                <h5>NHÃN HIỆU</h5>
                <br>
                <br>
                <?php
                  BasicLibs::getAlert();
                ?>
                <div class="panel panel-transparent ">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
                    <li class="active">
                      <a data-toggle="tab" href="#add"><span>Thêm nhãn hiệu</span></a>
                    </li>

                    <li>
                      <a data-toggle="tab" data-public="2" data-table="table-public" data-brand="show-brand-public" data-show="brands-public" class="public" href="#public"><span>Public</span></a>
                    </li>

                    <li>
                      <a data-toggle="tab" data-public="1" data-table="table-unpublic" data-brand="show-brand-unpublic" data-show="brands-unpublic" class="public" href="#unpublic"><span>Unpublic</span></a>
                    </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane slide-left active" id="add">
                      <!-- START PANEL -->
                      <div class="panel panel-transparent">
                        <div class="panel-body">
                          <form id="form-addBrand" method="post" enctype="multipart/form-data" action="?action=addBrandsAction">
                            <div class="row">
                              <div class="col-md-6">
                                <center><img src="../../upload/brands/logo.png" width="250" id="review-img"></center>
                                <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
                                <center><input type="file" class="form-control hidden" name="brandlogo" id="brand-logo"></center>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group form-group-default required">
                                  <label>Tên nhãn hiệu</label>
                                  <input type="text" class="form-control" name="brandname">
                                </div>
                         
                          
                                <div class="form-group form-group-default">
                                  <label>Trạng thái</label>
                                  <select name="status" class="form-control">
                                    <option value="1">Unpublic</option>
                                    <option value="2">Public</option>
                                  </select>
                                </div>

                                <div class="clearfix"></div>
                                <button class="btn btn-primary" type="submit">Thêm nhãn hiệu</button>
                              </div>
                            </div>                                          
                          </form>
                        </div>
                      </div>
                      <!-- END PANEL -->
                    </div>

                    <div class="tab-pane slide-left" id="public">
                      <div class="panel panel-transparent">
                        <div class="panel-heading">
                          <div class="panel-title">Thao tác với nhãn hiệu sản phẩm
                          </div>
                          <div class="pull-right">
                            <div class="col-xs-12">
                              <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>

                        <div class="panel-body" id="brands-public">
                          
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane slide-left" id="unpublic">
                      <div class="panel panel-transparent">
                        <div class="panel-heading">
                          <div class="panel-title">Thao tác với nhãn hiệu sản phẩm
                          </div>
                          <div class="pull-right">
                            <div class="col-xs-12">
                              <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>

                        <div class="panel-body" id="brands-unpublic">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->

        <div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                  <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Sửa <span class="semi-bold">Nhãn hiệu</span></h5>
                  </div>
                  <div class="modal-body">
                    <form id="form-editBrand" method="post" enctype="multipart/form-data">
                      <div class="alert alert-danger hidden" id="alert-add"></div>
                      <input type="text" name="brand-id" id="ebrand-id" class="hidden">
                      <input type="text" name="old-img" id="eold-img" class="hidden">
                      <div class="row">
                        <div class="col-md-6">
                          <center><img src="../../upload/brands/logo.png" width="250" id="ereview-img"></center>
                          <center><i>Nhấp vào ảnh để chọn ảnh mới</i></center>
                          <center><input type="file" class="form-control hidden" name="ebrandlogo" id="ebrand-logo"></center>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group form-group-default required">
                            <label>Tên nhãn hiệu</label>
                            <input type="text" class="form-control" name="ebrandname" id="ebrandname">
                          </div>

                          <div class="clearfix"></div>
                          <button class="btn btn-primary" id="add-btn" type="submit">Sửa nhãn hiệu</button>
                        </div>
                      </div>                                          
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>  
<?php include $GLOBALS['ROOT'].'public/template/admin/sidebar-right.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/scripts.php'; ?>
<!-- START SCRIPT BLOCK -->
<script type="text/javascript">

  $(document).ready(function() {
    // showBrandPublic(1, 'brands-public', 'show-brand-public');
    validateAddForm();
    validateEditForm();
    reviewImg();
    ereviewImg();

    let status = document.querySelectorAll('.public');
    for (let statusId of status) {
      statusId.addEventListener('click', (e) => {
        let target = e.target;
        if (!e.target.getAttribute('class')) {
          target = e.target.parentElement;
        }
        let dataPublic = target.getAttribute('data-public');
        let showPosition = target.getAttribute('data-show');
        let dataShow = target.getAttribute('data-brand');
        let table = target.getAttribute('data-table');
        showBrandPublic(dataPublic, showPosition, dataShow, table);
      });
    };

    $('#review-img').click(() => {
      $('#brand-logo').click();
    });

    $('#ereview-img').click(() => {
      $('#ebrand-logo').click();
    });
  });

  function dataTable(whatTable) {
    var responsiveHelper = undefined;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };

    // Initialize datatable showing a search box at the top right corner
    var initTableWithSearch = function() {
        let tb = `#${whatTable}`;
        var table = $(tb);

        var settings = {
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

  function showBrandPublic (public, target, dataShow, table) {
    let showing = target;
    let status = public;
    let tbody = document.getElementById(showing);
    tbody.innerHTML = `
      <center><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
      <span class="sr-only">Loading...</span></center>
    `;
    $.ajax({
      url: '../api/urls.php?url=getBrandByPublic',
      type: 'get',
      dataType: 'json',
      data: {
        public: status,
      },
      success: function(data) {
        tbody.innerHTML = `
          <table class="table table-hover demo-table-search" id="${table}">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên nhãn hiệu</th>
                <th>Logo</th>
                <th>Public/ Unpublic</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody id="${dataShow}">
              
            </tbody>
          </table>
        `;

        let show = document.getElementById(dataShow);
        let html = [];
        for (let key of data) {
          let item = JSON.parse(key);
          let content = `
            <tr>
              <td class="v-align-middle semi-bold">
                <p>${item.id}</p>
              </td>
              <td class="v-align-middle">
                <p>${item.name}</p>
              </td>
              <td class="v-align-middle">
                <img src="../../upload/brands/${item.logo}" width="50px"/>
              </td>
              <td class="v-align-middle">
                <a class="change-status" data-id="${item.id}" data-status="${status}">Thay đổi</a>
              </td>
              <td class="v-align-middle">
                <a data-toggle="modal" data-target="#modalSlideUp" class="edit-brand"
                data-id="${item.id}" data-img="${item.logo}" data-name="${item.name}">
                  <i class="fa fa-pencil-square-o"></i> Sửa 
                </a>
                <a data-id="${item.id}" data-img="${item.logo}" class="del-brand"><i class="fa fa-trash"></i> Xóa</a>
              </td>
            </tr>
          `;

          html.push(content);
        }
        show.innerHTML = html;
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
            ancestor.classList.add('hidden');
            let mess = 'Nhãn hiệu đã ngưng hiển thị';
            if (status === '1') {
              mess = 'Nhãn hiệu đã được hiển thị';
            };

            let lv = 'success';
            notification(mess, lv)
          },
          error: function() {
            let mess = 'Không thể kết nối đến server';
            let lv = 'danger';
            notification(mess, lv)
          }
        });
      });
    }
  }

  function delBrand() {
    let del = document.querySelectorAll('.del-brand');
    for (let delItem of del) {
      delItem.addEventListener('click', (e) => {
        let brand = e.target;
        if (e.target.getAttribute('class') != 'del-brand') {
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
          },
          error: function() {
            let mess = 'Không thể kết nối đến server';
            let lv = 'danger';
            notification(mess, lv);
          }
        });
      });
    }
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
        if (result == 'unique') {
          alertAdd.classList.remove('hidden');
          addBtn.disabled = false;
          alertAdd.textContent = 'Nhãn hiệu đã được sử dụng';
        } else if (result == 'fail') {
          alertAdd.classList.remove('hidden');
          addBtn.disabled = false;
          alertAdd.textContent = 'Lỗi kết nối cơ sở dữ liệu';
        } else {
          location.reload();
        }
      },
      error: function() {
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

</script>
<!-- END SCRIPT BLOCK -->
<?php include $GLOBALS['ROOT'].'public/template/admin/searchbox.php'; ?>
<?php include $GLOBALS['ROOT'].'public/template/admin/endpage.php'; ?>
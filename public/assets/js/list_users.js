$(document).ready(() => {
  showActive();
  $('#list-users').unbind().on('click', {}, showActive);
  $('#list-users-lock').unbind().on('click', {}, showDeactive);
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

function showActive() {
  $('#active-users-loading').removeClass('hidden');
  $.ajax({
    url: '?action=usersActive',
    type: 'get',
    dataType: 'text',
    data: {
      active: 2
    },
    success: function(result) {
      $('#show-active-user').html(result);
      $('#active-users-loading').addClass('hidden');
      dataTable('users-active');

      $('.lock-user').click((e) => {
        let target = $(e.target);
        if (target.is('i')) {
          target = $(e.target).parent();
        }

        setActive(target);
      });

      $('.permis-form').submit((e) => {
        e.preventDefault();

        let target = $(e.target);
        if (target.is('i')) {
          target = $(e.target).parent();
        }
        permis(target);
      });
    },
    error: function() {
      let mess = 'Lỗi kết nỗi';
      let lv = 'danger';
      notification(mess, lv);
    }
  });
}

function showDeactive() {
  $('#deactive-users-loading').removeClass('hidden');
  $.ajax({
    url: '?action=usersActive',
    type: 'get',
    dataType: 'text',
    data: {
      active: 1
    },
    success: function(result) {
      $('#show-user-lock').html(result);
      $('#deactive-users-loading').addClass('hidden');
      dataTable('users-deactive');

      $('.lock-user').click((e) => {
        let target = $(e.target);
        if (target.is('i')) {
          target = $(e.target).parent();
        }

        setActive(target);
      });
    },
    error: function() {
      let mess = 'Lỗi kết nỗi';
      let lv = 'danger';
      notification(mess, lv);
    }
  });
}

function setActive(target) {
  $.confirm({
    title: 'Active/Deactive user',
    content: 'Bạn có chắc muốn thực hiện hành động này',
    type: 'orange',
    buttons: {
      confirm: {
        text: 'Ok',
        btnClass: 'btn-orange',
        action: function(){
          let user_uid = target.attr('data-id');
          let user_active = parseInt(target.attr('data-active'));
          $.ajax({
            url: '?action=usersSetActive',
            type: 'post',
            dataType: 'text',
            data: {
              user_uid: user_uid,
              active: user_active
            },
            success: function(result) {
              if (result === 'success') {
                target.parents('tr').fadeOut();
              }

              let mess = 'User đã bị khóa';
              let lv = 'warning';

              if (user_active === 1) {
                showActive();
              } else {
                showDeactive();
                mess = 'User đã được kích hoạt lại';
                lv = 'success';
              }

              notification(mess, lv);
            },
            error: function() {

            }
          });
        }
      },
      cancel: {
        text: 'Hủy'
      }
    }
  });
}

function permis(target) {
  $.confirm({
    title: 'Phân quyền người dùng',
    content: 'Bạn có chắc muốn thực hiện hành động này',
    type: 'orange',
    buttons: {
      confirm: {
        text: 'Ok',
        btnClass: 'btn-orange',
        action: function(){
          $('#active-users-loading').removeClass('hidden');
          // lấy toàn bộ dự liêu form = serializeArray();
          let data = target.serializeArray();
          let user_uid = data[0].value;
          let user_permis = data[1].value;
          $.ajax({
            url: '?action=permisUser',
            type: 'post',
            dataType: 'text',
            data: {
              user_uid: user_uid,
              permis: user_permis,
            },
            success: function(result) {
              let mess = 'Lỗi: Không thể thực hiện hành động này, vui lòng thử lại';
              let lv = 'warning';
              if (result === 'success') {
                mess = 'Phân quyền thành công';
                lv = 'success';
              } else if (result === 'wrong_permission') {
                mess = 'Bạn không thể ủy quyền superuser';
                lv = 'warning';
              }

              notification(mess, lv);
              $('#active-users-loading').addClass('hidden');
            },
            error: function() {

            }
          });
        }
      },
      cancel: {
        text: 'Hủy'
      }
    }
  });
}
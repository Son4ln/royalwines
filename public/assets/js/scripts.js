(function($) {

    'use strict';

    $(document).ready(function() {
        checkUserActive();
        checkPermission();
        // Initializes search overlay plugin.
        // Replace onSearchSubmit() and onKeyEnter() with 
        // your logic to perform a search and display results
        $(".list-view-wrapper").scrollbar();

        $('[data-pages="search"]').search({
            // Bind elements that are included inside search overlay
            searchField: '#overlay-search',
            closeButton: '.overlay-close',
            suggestions: '#overlay-suggestions',
            brand: '.brand',
             // Callback that will be run when you hit ENTER button on search box
            onSearchSubmit: function(searchString) {
                console.log("Search for: " + searchString);
            },
            // Callback that will be run whenever you enter a key into search box. 
            // Perform any live search here.  
            onKeyEnter: function(searchString) {
                console.log("Live search for: " + searchString);
                var searchField = $('#overlay-search');
                var searchResults = $('.search-results');

                /* 
                    Do AJAX call here to get search results
                    and update DOM and use the following block 
                    'searchResults.find('.result-name').each(function() {...}'
                    inside the AJAX callback to update the DOM
                */

                // Timeout is used for DEMO purpose only to simulate an AJAX call
                clearTimeout($.data(this, 'timer'));
                searchResults.fadeOut("fast"); // hide previously returned results until server returns new results
                var wait = setTimeout(function() {

                    searchResults.find('.result-name').each(function() {
                        if (searchField.val().length != 0) {
                            $(this).html(searchField.val());
                            searchResults.fadeIn("fast"); // reveal updated results
                        }
                    });
                }, 500);
                $(this).data('timer', wait);

            }
        })

    });

    
    $('.panel-collapse label').on('click', function(e){
        e.stopPropagation();
    })
    
})(window.jQuery);

function notification(mess, lv) {
  $('body').pgNotification({
    style: 'flip',
    message: mess,
    position: 'top-right',
    timeout: 7000,
    type: lv
  }).show();
}

function checkUserActive() {
  let checkUser = setInterval(() => {
    $.ajax({
      url: '../../admin/api/urls.php?url=activeUser',
      success: function(results) {
        if (results) {
          if (results === 'deactive_user') {
            $.confirm({
              title: 'THÔNG BÁO',
              content: `Tài khoản của bạn đã bị khóa,
              vui lòng liên hệ quản trị viên để biết thêm chi tiết.
              Bạn sẽ đăng xuất trong vòng 10 giây`,
              type: 'red',
              typeAnimated: true,
              autoClose: 'ok|10000',
              buttons: {
                ok: {
                  text: 'OK',
                  btnClass: 'btn-red',
                  action: function(){
                    window.location.href = '?action=logout';
                  }
                }
              }
            });

            window.clearInterval(checkUser);
          }
        }
      },
      error: function() {

      }
    });
  }, 3000);
}

function checkPermission() {
  let checkPermission = setInterval(() => {
    $.ajax({
      url: '../../admin/api/urls.php?url=checkPermission',
      success: function(results) {
        if (results) {
          if (results === 'permission_change') {
            $.confirm({
              title: 'THÔNG BÁO',
              content: 'Quyền hạn của bạn đã bị thay đổi. Bấm "OK" để thay đổi',
              type: 'orange',
              autoClose: 'ok|10000',
              typeAnimated: true,
              buttons: {
                ok: {
                  text: 'OK',
                  btnClass: 'btn-orange',
                  action: function(){
                    window.location.href = '?action=home';
                  }
                }
              }
            });

            window.clearInterval(checkPermission);
          }
        }
      },
      error: function() {

      }
    });
  }, 3000);
}

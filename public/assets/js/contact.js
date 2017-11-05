$(document).ready(() => {
	$('#review-img').click(() => {
    $('#logo').click();
  });

  reviewImg();
  validInfo();
  cancelImg();
});

function reviewImg() {
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
    $('#cancel-img').removeClass('hidden');
  });
}

function validInfo() {
  $('#info-form').validate({
    rules: {
      address: 'required',
      sdt: 'required',
      email: {
        required: true,
        email: true
      },
      slogan: 'required',
      intro: 'required'
    },
    messages: {
      address: 'Vui lòng nhập địa chỉ',
      sdt: 'Vui lòng nhập số điện thoại',
      email: 'Vui lòng nhập đúng Email',
      slogan: 'Vui lòng nhập slogan',
      intro: 'Vui lòng nhập giới thiệu'
    },
    submitHandler: function(form) {
      updateInfo();
    }
  });
}

function updateInfo() {
  let updateBtn = $('#update');
  updateBtn.attr('disabled','disabled');
  updateBtn.html('Loading...');
  let logo = $('#logo').prop('files')[0];
  let address = $('#address').val();
  let oldImg = $('#oldImg').val();
  let branch = $('#branch').val();
  let phone = $('#sdt').val();
  let email = $('#email').val();
  let slogan = $('#slogan').val();
  let intro = CKEDITOR.instances['intro'].getData();
  let event = CKEDITOR.instances['event'].getData();
  let rules = CKEDITOR.instances['rules'].getData();
  let form_data = new FormData();
  form_data.append('address', address);
  form_data.append('oldImg', oldImg);
  form_data.append('logo', logo);
  form_data.append('branch', branch);
  form_data.append('phone', phone);
  form_data.append('email', email);
  form_data.append('slogan', slogan);
  form_data.append('intro', intro);
  form_data.append('event', event);
  form_data.append('rules', rules);

  $.ajax({
    url: '?action=updateContactInfo',
    type: 'post',
    dataType: 'text',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(result) {
      let mess = 'Cập nhập thông tin thành công';
      let lv = 'success';
      if (result === 'file_not_valid') {
        mess = 'Hình ảnh chỉ hỗ trợ jpg, jpeg, png và kích thước < 5mb';
        lv = 'warning';
      } else if (result === 'fail') {
        mess = 'Lỗi kết nối cơ sở dữ liệu';
        lv = 'danger';
      }

      updateBtn.removeAttr('disabled');
      updateBtn.html('Cập nhập');
      notification(mess, lv);
    },
    error: function() {
      let mess = 'Không thể kết nối đến server';
      let lv = 'danger';
      notification(mess, lv);
      updateBtn.removeAttr('disabled');
      updateBtn.html('Cập nhập');
    }

  });

  return false;
}

function cancelImg() {
  let btn = $('#cancel-img');
  let old = $('#review-img').attr('src');
  btn.click(() => {
    $('#review-img').attr('src', old);
    $('#cancel-img').addClass('hidden');
    $('#logo').val('');
  });
}
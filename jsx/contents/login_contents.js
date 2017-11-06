import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript, isValidName, isValidPhone, isValidEmail } from '../utils';

class LoginContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('login-script-blog');
    renderMainScript(scriptBlock);

    $('#submit-btn').click((e) => {
      this.submitForm(e);
    });
  }

  submitForm(e) {
  	e.preventDefault();
    if ($('#full-name').val() === '') {
      $('#full-name').focus();
      $('#checkout-alert').html('Vui lòng nhập họ và tên.');
      return;
    } else if (!isValidName($('#full-name').val())) {
      $('#full-name').focus();
      $('#checkout-alert').html('Họ và tên không đúng.');
      return;
    }

    if ($('#address').val() === '') {
      $('#address').focus();
      $('#checkout-alert').html('Vui lòng nhập địa chỉ.');
      return;
    }

    if ($('#phone').val() === '') {
      $('#phone').focus();
      $('#checkout-alert').html('Vui lòng nhập số điện thoại.');
      return;
    } else if (!isValidPhone($('#phone').val())) {
      $('#phone').focus();
      $('#checkout-alert').html('Số điện thoại không đúng.');
      return;
    }

    if ($('#email').val() !== '' && !isValidEmail($('#email').val())) {
      $('#email').focus();
      $('#checkout-alert').html('Vui lòng nhập đúng email.');
      return;
    }

    if ($('#pass').val() !== '' && $('#pass').val().length < 6) {
      $('#pass').focus();
      $('#checkout-alert').html('Mật khẩu phải trên 6 ký tự.');
      return;
    }

    if ($('#pass').val() !== $('#re-pass').val()) {
      $('#re-pass').focus();
      $('#checkout-alert').html('Mật khẩu không trùng khớp.');
      return;
    }

    $('#checkout-alert').html('');

    $('#submit-btn').html('Đang gửi thư...');
    axios.post('/site/controller/controller.php?action=signUp', {
      fullname: $('#full-name').val(),
      address: $('#address').val(),
      phone: $('#phone').val(),
      email: $('#email').val(),
      pass: $('#pass').val(),
      rePass: $('#re-pass').val()
    })
    .then(res => {
      if (res.data === 'success') {
      	$('#full-name').val('');
      	$('#address').val('');
      	$('#phone').val('');
      	$('#email').val('');
      	$('#pass').val('');
      	$('#re-pass').val('');

        $('#checkout-alert').html('Đăng ký thành công.<br/>Bạn đã có thể đăng nhập vào Royalwines.');
        let scriptBlock = document.getElementById('login-script-blog');
        renderMainScript(scriptBlock);
      } else if (res.data === 'empty_val') {
      	$('#checkout-alert').html('Vui lòng nhập đầy đủ thông tin.');
      	$('#submit-btn').html('Đăng ký');
      } else if (res.data === 'rePass_wrong') {
      	$('#checkout-alert').html('Mật khẩu không trùng khớp.');
      	$('#re-pass').focus();
      	$('#submit-btn').html('Đăng ký');
      } else if (res.data === 'email_exists') {
      	$('#checkout-alert').html('Email đã tồn tại.<br/>Vui lòng nhập email khác.');
      	$('#email').focus();
      	$('#submit-btn').html('Đăng ký');
      }
    });
  }

  render() {
  	let style_alert = {
      color: 'red'
    }
    return(
      <section className="ct-content ct-full-height ct-u-displayTable">
        <div className="ct-register">
          <div className="item">
            <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" 
            data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
            <h2 className="ct-u-font2 text-uppercase animated ct-u-paddingBottom15" data-fx="flipInY">đăng ký</h2>
            <div id="checkout-alert" style={style_alert}></div>
            <form className="ct-login ct-u-colorDark ct-u-font2 ct-u-size18">
              <div className="form-group">
                <input type="text" placeholder="Họ & tên:" id="full-name" className="ct-register-input" required />
              </div>
              <div className="form-group">
                <input type="text" placeholder="SĐT:" id="phone" className="ct-register-input ct-register-phone" required />
                <input type="text" placeholder="Địa chỉ:" id="address" className="ct-register-input ct-register-address" required />
              </div>
              <div className="form-group">
                <input type="email" placeholder="Email:" id="email" className="ct-register-input ct-u-marginTop15" required />
              </div>
              <div className="form-group">
                <input type="password" placeholder="Mật khẩu:" id="pass" className="ct-register-input ct-register-pass" required />
                <input type="password" placeholder="Nhập lại mật khẩu:" id="re-pass" className="ct-register-input ct-register-repass" required />
              </div>
              <button id="submit-btn" className="btn btn-lg btn-button--dark btn-register ct-u-marginTop15 animated" data-fx="fadeIn">Đăng ký</button>
            </form>
            <hr className="hr-custom ct-js-background ct-u-paddingTop15 animated ct-u-paddingTop40" 
            data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          </div>
        </div>
        
        <div id="login-script-blog"></div>
      </section>
    );
  }
}

export default LoginContents
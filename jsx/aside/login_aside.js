import React from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import {isValidEmail} from '../utils';


class LoginAside extends React.Component {
  constructor() {
    super();
    this.login = this.login.bind(this);
    this.checkLogin = this.checkLogin.bind(this);
  }

  componentDidMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);
    $('#form-login').submit(this.login);
  }

  login(e) {
    e.preventDefault();
    let email = $('#lg-email').val();
    let pass = $('#lg-pass').val();

    if (email === '') {
      $('#login-alert').html('Vui lòng nhập email');
      return;
    }

    if (email && !isValidEmail(email)) {
      $('#login-alert').html('Vui lòng nhập đúng cú pháp email');
      return;
    }

    if (pass === '') {
      $('#login-alert').html('Vui lòng nhập mật khẩu');
      return;
    }

    if (pass.length < 6) {
      $('#login-alert').html('Mật khẩu phải có it nhất 6 ký tự');
      return;
    }

    axios.post('/site/controller/controller.php?action=login', {
      email: email,
      pass: pass
    })
    .then((res) => {
      this.checkLogin(res.data);
    });
  }

  checkLogin(data) {
    if (data === 'login_success') {
      window.location.href = '/';
    } else if (data === 'account_locked') {
      $('#login-alert').html('Tài khoản của bạn đã bị khóa');
    } else if (data === 'login_fail') {
      $('#login-alert').html('Sai tên tài khoản hoặc mật khẩu');
    }
  }

  render() {
    if (this.props.rw_user.uid !== undefined) {
      window.location.href = '/';
    }

    let style_alert = {
      color: 'red'
    }
    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" 
      data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner">
          <div className="item">
            <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" 
            data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
            <h2 className="ct-u-font2 text-uppercase animated " data-fx="flipInY">đăng nhập</h2>
            <form className="ct-login ct-u-colorDark ct-u-font2 ct-u-size18" id="form-login">
              <div class="form-group">
                <input type="text" name="email" placeholder="Email:" id="lg-email" className="ct-login-input"/>
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Mật khẩu:" id="lg-pass" className="ct-login-input"/>
              </div>
              <div id="login-alert" style={style_alert}></div>
              <button className="btn btn-lg btn-default animated" data-fx="fadeIn" data-hover="Đăng nhập">
                <span>Đăng nhập</span>
              </button>
            </form>
            <hr className="hr-custom ct-js-background ct-u-paddingTop15 animated ct-u-paddingTop40" 
            data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          </div>
        </div>
      </section>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    rw_user: state.rw_user
  }
}

export default connect(mapStateToProps)(LoginAside)
import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class LoginContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('login-script-blog');
    renderMainScript(scriptBlock);
  }

  render() {
    return(
      <section className="ct-content ct-full-height ct-u-displayTable">
        <div className="ct-register">
          <div className="item">
            <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" 
            data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
            <h2 className="ct-u-font2 text-uppercase animated ct-u-paddingBottom15" data-fx="flipInY">đăng ký</h2>
            <form className="ct-login ct-u-colorDark ct-u-font2 ct-u-size18">
              <div className="form-group">
                <input type="text" placeholder="Họ & tên:" className="ct-register-input" required />
              </div>
              <div className="form-group">
                <input type="text" placeholder="Tên đăng nhập:" className="ct-register-input" required />
              </div>
              <div className="form-group">
                <input type="text" placeholder="SĐT:" className="ct-register-input ct-register-phone" required />
                <input type="text" placeholder="Địa chỉ:" className="ct-register-input ct-register-address" required />
              </div>
              <div className="form-group">
                <input type="email" placeholder="Email:" className="ct-register-input ct-u-marginTop15" required />
              </div>
              <div className="form-group">
                <input type="password" placeholder="Mật khẩu:" className="ct-register-input ct-register-pass" required />
                <input type="password" placeholder="Nhập lại mật khẩu:" className="ct-register-input ct-register-repass" required />
              </div>
              <button className="btn btn-lg btn-button--dark btn-register ct-u-marginTop15 animated" data-fx="fadeIn">Đăng ký</button>
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
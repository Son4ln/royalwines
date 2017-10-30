import React from 'react';
import ReactDOM from 'react-dom';


class LoginAside extends React.Component {
  constructor() {
    super();
  }

  componentWillMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);
  }

  render() {
    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" 
      data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner">
          <div className="item">
            <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" 
            data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
            <h2 className="ct-u-font2 text-uppercase animated " data-fx="flipInY">đăng nhập</h2>
            <form className="ct-login ct-u-colorDark ct-u-font2 ct-u-size18">
              <div class="form-group">
                <input type="text" placeholder="Tên đăng nhập:" className="ct-login-input" required />
              </div>
              <div class="form-group">
                <input type="password" placeholder="Mật khẩu:" className="ct-login-input" required />
              </div>
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

export default LoginAside
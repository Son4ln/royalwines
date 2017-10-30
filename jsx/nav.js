import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';

class Menu extends React.Component {
  constructor() {
    super();
  }

  render() {
    let logo_style = {
      width: '85%'
    };

    return(
      <div className="ct-mainNav ct-js-background" data-bg="/public/assets/site/images/menu-pattern.jpg">
        <div className="ct-mainNav-inner">
          <nav>
            <a className="ct-mainNav-logo" href="/">
              <img src="/public/assets/site/images/content/logo.png" style={logo_style} />
            </a>
            <hr className="hr-custom ct-js-background" data-bg="/public/assets/site/images/hr1.png" />
            <ul className="ct-mainNav-nav text-uppercase animated" data-fx="fadeIn">
              <li className="active">
                <a href="/">Trang Chủ</a>
              </li>
              <li>
                <Link to="/nhan-hieu">Nhãn Hiệu</Link>
              </li>
              <li>
                <Link to="/san-pham">Sản Phẩm</Link>
              </li>
              <li>
                <a href="#">Blog</a>
              </li>
              <li>
                <a href="#">Giới Thiệu</a>
              </li>
              <li>
                <a href="#">Liên Hệ</a>
              </li>
              <hr className="hr-custom ct-js-background" data-bg="/public/assets/site/images/hr1.png" />
              <li className="ct-u-paddingTop5">
                <Link to="/dang-nhap">Đăng Nhập</Link>
              </li>
              <li className="dropdown ct-profile">
                  <img src="/public/assets/site/images/profile.png" className="ct-profile-img"/>
                  <p className="ct-u-colorMotive">Nguyện Hựu Thiện</p>
                  <ul className="dropdown-menu">
                      <li><a href="#">chỉnh sửa</a></li>
                      <li><a href="#">đăng xuất</a></li>
                  </ul>
              </li>
            </ul>
            
          </nav>
        </div>
      </div>
    );
  }
}

export default Menu

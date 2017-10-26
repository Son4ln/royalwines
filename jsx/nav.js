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
            <a className="ct-mainNav-logo" href="index.html">
              <img src="/public/assets/site/images/content/logo.png" site={logo_style}/>
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
              <li className="ct-u-paddingTop10">
                <a href="#">Đăng Nhập</a>
              </li>
            </ul>
            
          </nav>
          <div className="ct-mainNav-sidebar">
            <ul className="list-unstyled list-inline ct-socials">
              <li>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook">
                <i className="fa fa-fw fa-facebook"></i></a>
              </li>
              <li>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Google +">
                <i className="fa fa-fw fa-google-plus"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    );
  }
}

export default Menu

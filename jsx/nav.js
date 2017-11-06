import React from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import { Link } from 'react-router-dom';
import * as actions from './store/actions';

class Menu extends React.Component {
  constructor() {
    super();

    this.state = {
      login_btn: null,
      currentPage: '',
      pathLogo: '../upload/'
    }
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=checkLogin').then(res => this.checkUser(res.data));
    axios.get('/site/controller/controller.php?action=getWishList').then(res => this.getWish(res.data));
    axios.get('/site/controller/controller.php?action=contactInfo').then(res => this.contactInfo(res.data));
  }

  componentWillReceiveProps(nextProps) {
    this.setState({
      currentPage: nextProps.currentPage
    });

  }

  getWish(data) {
    let arr = [];
    if (data != 'not_login') {
      if (data.length > 0) {
        for (let item of data) {
        arr.push(JSON.parse(item));
        }
      this.setWish(arr);
      }
    }
  }

  contactInfo(data) {
    let path = this.state.pathLogo + data.logo;
    document.getElementById('logo-store').src = path;
  }

  setWish(arr) {
    let addWish = this.props.onShowWish;
    addWish(arr);
  }

  checkUser(data) {
    let content = (
      <li className="ct-u-paddingTop5" id="nav-login">
        <Link to="/dang-nhap">Đăng Nhập</Link>
      </li>
    );

    let admin_content = null;

    if (data !== 'not_login') {
      let user = this.props.onSaveUser;
      user(data);

      let img_url = `/upload/users/${data.avatar}`;

      let full_name = data.full_name.split(' ');
      let name = data.full_name;

      if (full_name.length > 3) {
        name = full_name.shift() + ' ' + full_name.pop();
      }

      if (data.permission != 5) {
        admin_content = (
          <li><a href="/admin">Trang quản lý</a></li>
        );
      }

      content = (
        <li className="dropdown ct-profile">
          <img src={img_url} className="ct-profile-img"/>
          <p className="ct-u-colorMotive">{name}</p>
          <ul className="dropdown-menu">
            {admin_content}
            <li><a href="#">chỉnh sửa</a></li>
            <li><a href="/site/controller/controller.php?action=logout">đăng xuất</a></li>
          </ul>
        </li>
      );
    }

    this.setState({
      login_btn: content
    });
  }

  render() {
    let logo_style = {
      width: '85%'
    };

    if (this.state.currentPage === 'home') {
      $('#nav-home').addClass('active');
      $('#nav-brands').removeClass('active');
      $('#nav-products').removeClass('active');
      $('#nav-blog').removeClass('active');
      $('#nav-about').removeClass('active');
      $('#nav-contact').removeClass('active');
      $('#nav-login').removeClass('active');
    } else if (this.state.currentPage === 'brands') {
      $('#nav-home').removeClass('active');
      $('#nav-brands').addClass('active');
      $('#nav-products').removeClass('active');
      $('#nav-blog').removeClass('active');
      $('#nav-about').removeClass('active');
      $('#nav-contact').removeClass('active');
      $('#nav-login').removeClass('active');
    } else if (this.state.currentPage === 'products') {
      $('#nav-home').removeClass('active');
      $('#nav-brands').removeClass('active');
      $('#nav-products').addClass('active');
      $('#nav-blog').removeClass('active');
      $('#nav-about').removeClass('active');
      $('#nav-contact').removeClass('active');
      $('#nav-login').removeClass('active');
    } else if (this.state.currentPage === 'blog') {
      $('#nav-home').removeClass('active');
      $('#nav-brands').removeClass('active');
      $('#nav-products').removeClass('active');
      $('#nav-blog').addClass('active');
      $('#nav-about').removeClass('active');
      $('#nav-contact').removeClass('active');
      $('#nav-login').removeClass('active');
    } else if (this.state.currentPage === 'blog-detail') {
      $('#nav-home').removeClass('active');
      $('#nav-brands').removeClass('active');
      $('#nav-products').removeClass('active');
      $('#nav-blog').addClass('active');
      $('#nav-about').removeClass('active');
      $('#nav-contact').removeClass('active');
      $('#nav-login').removeClass('active');
    } else if (this.state.currentPage === 'about') {
      $('#nav-home').removeClass('active');
      $('#nav-brands').removeClass('active');
      $('#nav-products').removeClass('active');
      $('#nav-blog').removeClass('active');
      $('#nav-about').addClass('active');
      $('#nav-contact').removeClass('active');
      $('#nav-login').removeClass('active');
    } else if (this.state.currentPage === 'contact') {
      $('#nav-home').removeClass('active');
      $('#nav-brands').removeClass('active');
      $('#nav-products').removeClass('active');
      $('#nav-blog').removeClass('active');
      $('#nav-about').removeClass('active');
      $('#nav-contact').addClass('active');
      $('#nav-login').removeClass('active');
    } else if (this.state.currentPage === 'login') {
      $('#nav-home').removeClass('active');
      $('#nav-brands').removeClass('active');
      $('#nav-products').removeClass('active');
      $('#nav-blog').removeClass('active');
      $('#nav-about').removeClass('active');
      $('#nav-contact').removeClass('active');
      $('#nav-login').addClass('active');
    } else if (this.state.currentPage === 'cart' || this.state.currentPage === 'wishlist' ||
      this.state.currentPage === 'checkout' || this.state.currentPage === 'product-detail' || 
      this.state.currentPage === 'product-detail') {
      $('#nav-home').removeClass('active');
      $('#nav-brands').removeClass('active');
      $('#nav-products').removeClass('active');
      $('#nav-blog').removeClass('active');
      $('#nav-about').removeClass('active');
      $('#nav-contact').removeClass('active');
      $('#nav-login').removeClass('active');
    }

    
    return(
      <div className="ct-mainNav ct-js-background" data-bg="/public/assets/site/images/menu-pattern.jpg">
        <div className="ct-mainNav-inner">
          <nav>
            <a className="ct-mainNav-logo" href="/">
              <img id="logo-store" style={logo_style} />
            </a>
            <hr className="hr-custom ct-js-background" data-bg="/public/assets/site/images/hr1.png" />
            <ul className="ct-mainNav-nav text-uppercase animated" data-fx="fadeIn">
              <li id="nav-home">
                <a href="/">Trang Chủ</a>
              </li>
              <li id="nav-brands">
                <Link to="/nhan-hieu/0">Nhãn Hiệu</Link>
              </li>
              <li id="nav-products">
                <Link to="/san-pham/0">Sản Phẩm</Link>
              </li>
              <li id="nav-blog">
                <Link to="/bai-viet">Bài Viết</Link>
              </li>
              <li id="nav-about">
                <Link to="/thong-tin">Giới Thiệu</Link>
              </li>
              <li id="nav-contact">
                <Link to="/lien-he">Liên Hệ</Link>
              </li>
              <hr className="hr-custom ct-js-background" data-bg="/public/assets/site/images/hr1.png" />
              
              {this.state.login_btn}
            </ul>
            
          </nav>
        </div>
      </div>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    rw_user: state.rw_user
  }
}

const mapDispatchToProps = (dispatch) => {
  return {
    onSaveUser: (user) => {dispatch(actions.save_user(user))},
    onShowWish: (item) => {dispatch(actions.show_wish_item(item))}
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(Menu);

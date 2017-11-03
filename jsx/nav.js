import React from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import { Link } from 'react-router-dom';
import * as actions from './store/actions';

class Menu extends React.Component {
  constructor() {
    super();

    this.state = {
      login_btn: null
    }
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=checkLogin').then(res => this.checkUser(res.data));
    axios.get('/site/controller/controller.php?action=getWishList').then(res => this.getWish(res.data));
  }

  componentDidMount() {
    
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

  setWish(arr) {
    let addWish = this.props.onShowWish;
    addWish(arr);
  }

  checkUser(data) {
    let content = (
      <li className="ct-u-paddingTop5">
        <Link to="/dang-nhap">Đăng Nhập</Link>
      </li>
    );

    if (data !== 'not_login') {
      let user = this.props.onSaveUser;
      user(data);

      let img_url = `/upload/users/${data.avatar}`;

      let full_name = data.full_name.split(' ');
      let name = data.full_name;

      if (full_name.length > 3) {
        name = full_name.shift() + ' ' + full_name.pop();
      }

      content = (
        <li className="dropdown ct-profile">
          <img src={img_url} className="ct-profile-img"/>
          <p className="ct-u-colorMotive">{name}</p>
          <ul className="dropdown-menu">
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
                <Link to="/san-pham/0">Sản Phẩm</Link>
              </li>
              <li>
                <Link to="/bai-viet">Bài Viết</Link>
              </li>
              <li>
                <a href="#">Giới Thiệu</a>
              </li>
              <li>
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

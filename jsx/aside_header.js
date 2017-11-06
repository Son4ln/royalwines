import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
import {connect} from 'react-redux';
import { formatCurrency } from './utils';
import * as actions from './store/actions'

class AsideHeader extends React.Component {
  constructor() {
    super();
    this.renderCartItem = this.renderCartItem.bind(this);
    this.onDeleteCartItem = this.onDeleteCartItem.bind(this);
    this.onDeleteWishItem = this.onDeleteWishItem.bind(this);
  }

  componentDidMount() {
    $("#wishlist").on("click", function() {
      $("#cart-popup").fadeOut("fast")
      $("#wishlist-popup").fadeToggle("fast");
    });

    $("#cart").on("click", function() {
      $("#wishlist-popup").fadeOut("fast")
      $("#cart-popup").fadeToggle("fast");
    });

    $('#cart-items').click((e) => {
      this.onDeleteCartItem(e);
    });

    $('#wish-item').click((e) => {
      this.onDeleteWishItem(e);
    });
  }

  renderWishList() {
    let renderList = [];
    let content = null;
    let count = 0;
    if (this.props.rw_wish.length > 0) {
      for (let item of this.props.rw_wish) {
        let img_url = `/upload/products/${item.featured_img}`;
        content = (
          <div>
            <div className="row">
              <div className="col-xs-3">
                <img className="img-responsive" src={img_url} />
              </div>
              <div className="col-xs-7">
                <a href="#">
                  <h3 className="ct-u-colorDark ct-u-margin0 ct-u-marginLeft10 ct-u-size18 ct-u-maxWidth150">{item.product_name}</h3>
                </a>
              </div>
              <div className="col-xs-1">
                <button className="x-btn" data-index={count}><i className="fa fa-times"></i></button>
              </div>
            </div>
            <hr/>
          </div>
        );
        count ++;
        renderList.push(content);
      }

      return renderList;
    } else {
      content = (
        <div><h3>CHƯA CÓ SẢN PHẨM!</h3></div>
      );

      return content;
    }
  }

  onDeleteWishItem(e) {
    let delWish = this.props.onDeleteWishItem;
    let delegate = e.target;
    let index = 0;
    if (delegate.nodeName === 'BUTTON') {
      index = delegate.getAttribute('data-index');
    } else if (delegate.nodeName === 'I') {
      index = delegate.parentNode.getAttribute('data-index');
    } else {
      return;
    }

    delWish(index);
    
  }

  renderCartItem() {
    let renderItem = [];
    let content = null;
    let count = 0;
    if (this.props.rw_cart.length > 0) {
      for (let item of this.props.rw_cart) {
        let img_url = `/upload/products/${item.featured_img}`;
        content = (
          <div>
            <div className="row">
              <div className="col-xs-3">
                <img className="img-responsive" src={img_url} />
              </div>
              <div className="col-xs-7">
                <h4 className="ct-u-colorDark ct-u-margin0 ct-u-marginLeft10">{item.product_name}</h4>
                <p className="ct-u-marginLeft10">{formatCurrency(item.price)} vnđ x {item.qty}</p>
              </div>
              <div className="col-xs-1">
                <button className="x-btn btn-del-cart" data-index={count}><i className="fa fa-times"></i></button>
              </div>
            </div>
            <hr/>
          </div>
        );
        renderItem.push(content);
        count ++;
      }

      return renderItem;
    } else {
      content = (
        <div><h3>CHƯA CÓ SẢN PHẨM!</h3></div>
      );

      return content;
    }
  }

  totalPrice() {
    let totalPrice = 0;
    if (this.props.rw_cart.length > 0) {
      for (let item of this.props.rw_cart) {
        let total = item.price * item.qty;
        totalPrice += total;
      }
    }

    return totalPrice;
  }

  onDeleteCartItem(e) {
    let delegate = e.target;
    let index = 0;
    if (delegate.nodeName === 'BUTTON') {
      index = delegate.getAttribute('data-index');
    } else if (delegate.nodeName === 'I') {
      index = delegate.parentNode.getAttribute('data-index');
    } else {
      return;
    }
    
    let delete_cart = this.props.onDeleteCartItem;
    delete_cart(index);
  }

  render() {
    return(
      <div>
        <div className="ct-wishlist-title ct-u-marginTop10 ct-u-marginLeft10 ct-u-font2 ct-u-size18 text-uppercase list-inline">
          <li className="dropdown wishlist pull-left">
            <a href="#" className="btn visible-lg hidden-md hidden-sm hidden-xs" type="button" id="wishlist">yêu thích</a>
            <div className="dropdown-menu wishlist-popup ct-frame-custom hidden-md hidden-sm hidden-xs animated" data-fx="fadeIn" id="wishlist-popup">
              <div className="wishlist-border col-xs-8">
                <div className="container-fluid" id="wish-item">
                  <h3 className="ct-u-margin0 ct-u-marginBottom10">Sản Phẩm Yêu Thích:</h3>
                  
                  {this.renderWishList()}
                  
                </div>
              </div>

              <div className="btn-wishlist col-xs-4 ct-u-colorWhite ct-js-background" 
                data-bg="/public/assets/site/images/menu-pattern.jpg">
                <Link to="/yeu-thich" className="btn btn-sm btn-button--white ct-u-marginBottom10 ct-u-marginTop5 wishlist-btn">xem toàn bộ</Link>
              </div>
            </div>
          </li>
          
          <li className="visible-lg hidden-md hidden-sm hidden-xs pull-left">|</li>
          <li className="wishlist pull-left">
            <a href="#" className="btn visible-lg hidden-md hidden-sm hidden-xs" type="button" id="cart">giỏ hàng  
              <i className="fa fa-shopping-cart" aria-hidden="true"></i></a>
            <div className="dropdown-menu cart-popup ct-frame-custom hidden-md hidden-sm hidden-xs animated" data-fx="fadeIn" id="cart-popup">
              <div className="row">
                <div className="col-xs-7">
                  <div className="cart-item-border">
                    <div className="container-fluid" id="cart-items">
                      <h3 className="ct-u-margin0 ct-u-marginBottom10">Giỏ hàng:</h3>
                      
                      {this.renderCartItem()}

                    </div>
                  </div>
                </div>
                <div className="col-xs-5 total-cart ct-u-colorWhite ct-js-background" 
                data-bg="/public/assets/site/images/menu-pattern.jpg">
                  <h3 className="ct-u-marginBottom30">Tổng Cộng:</h3>
                  <h3>{formatCurrency(this.totalPrice())} VNĐ</h3>
                  <hr/>
                  <Link to="/gio-hang" className="btn btn-lg btn-button--white ct-u-marginBottom10 ct-u-marginTop5 cart-btn">đến giỏ hàng</Link>
                  <Link to="/thanh-toan" className="btn btn-lg btn-button--white ct-u-marginBottom10 cart-btn">thanh toán</Link>
                </div>
              </div>
            </div>
          </li>
        </div>
        <div className="ct-wishlist-title-media ct-u-font2 ct-u-size18 text-uppercase list-inline">
          <ul>
            <li className="wishlist pull-left">
              <Link to="/yeu-thich" className="hidden-lg" type="button">yêu thích</Link>
            </li>
            <li className="wishlist pull-left hidden-lg ct-u-marginHorizon5">|
            </li>
            <li className="wishlist pull-left">
              <Link to="/gio-hang" className="hidden-lg" type="button">giỏ hàng <i className="fa fa-shopping-cart" aria-hidden="true"></i></Link>
            </li>
          </ul>    
        </div>

        <div className="ct-navbarMobile ct-navbarMobile--inverse">
          <a className="navbar-brand" href="/">
            <img className="ct-miniNav-logo" src="/public/assets/site/images/content/logo3.png" />
          </a>
          <button type="button" className="navbar-toggle">
            <span className="sr-only">Toggle navigation</span>
            <span className="icon-bar"></span>
            <span className="icon-bar"></span>
            <span className="icon-bar"></span>
          </button>
        </div>
      </div>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    rw_cart: state.rw_cart,
    rw_wish: state.rw_wish
  }
}

const mapDispatchToProps = (dispatch) => {
  return {
    onDeleteCartItem: (index) => {dispatch(actions.remove_item_cart(index))},
    onDeleteWishItem: (index) => {dispatch(actions.delete_wish_item(index))}
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(AsideHeader)

import React from 'react';
import ReactDOM from 'react-dom';

class AsideHeader extends React.Component {
  constructor() {
    super();
  }

  render() {
    return(
      <div>
        <div id="ct-js-wrapper" className="ct-pageWrapper">
          <div className="ct-wishlist-title ct-u-marginTop10 ct-u-marginLeft10 ct-u-font2 ct-u-size18 text-uppercase list-inline">
            <li className="dropdown wishlist pull-left">
              <a href="#" className="btn dropdown-toggle visible-lg hidden-md hidden-sm hidden-xs" type="button" data-toggle="dropdown">yêu thích</a>
              <div className="dropdown-menu wishlist-popup ct-frame-custom hidden-md hidden-sm hidden-xs animated" data-fx="fadeIn">
                <div className="wishlist-border">
                  <div className="container-fluid">
                    <h3 className="ct-u-margin0 ct-u-marginBottom10">Sản Phẩm Yêu Thích:</h3>
                    <div className="row">
                      <div className="col-xs-3">
                        <img className="img-responsive" src="/public/assets/site/images/content/item.png" />
                      </div>
                      <div className="col-xs-7">
                        <h3 className="ct-u-colorDark ct-u-margin0 ct-u-marginLeft10">bourbon whiskey</h3>
                        <p className="ct-u-marginLeft10">Ham, green peppers, onions, on buttered croissant, with a mild chipotle sause</p>
                      </div>
                      <div className="col-xs-1">
                        <button className="x-btn"><i className="fa fa-times"></i></button>
                      </div>
                    </div>
                    <hr/>
                    <div className="row">
                      <div className="col-xs-3">
                        <img className="img-responsive" src="/public/assets/site/images/content/item.png" />
                      </div>
                      <div className="col-xs-7">
                        <h3 className="ct-u-colorDark ct-u-margin0 ct-u-marginLeft10">bourbon whiskey</h3>
                        <p className="ct-u-marginLeft10">Ham, green peppers, onions, on buttered croissant, with a mild chipotle sause</p>
                      </div>
                      <div className="col-xs-1">
                        <button className="x-btn"><i className="fa fa-times"></i></button>
                      </div>
                    </div>
                    <hr/>
                    <div className="row">
                      <div className="col-xs-3">
                        <img className="img-responsive" src="/public/assets/site/images/content/item.png" />
                      </div>
                      <div className="col-xs-7">
                        <h3 className="ct-u-colorDark ct-u-margin0 ct-u-marginLeft10">bourbon whiskey</h3>
                        <p className="ct-u-marginLeft10">Ham, green peppers, onions, on buttered croissant, with a mild chipotle sause</p>
                      </div>
                      <div className="col-xs-1">
                        <button className="x-btn"><i className="fa fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            
            <li className="visible-lg hidden-md hidden-sm hidden-xs pull-left">|</li>
            <li className="dropdown wishlist pull-left">
              <a href="#" className="btn dropdown-toggle visible-lg hidden-md hidden-sm hidden-xs" type="button" 
              data-toggle="dropdown">giỏ hàng  <i className="fa fa-shopping-cart" aria-hidden="true"></i></a>
              <div className="dropdown-menu cart-popup ct-frame-custom hidden-md hidden-sm hidden-xs animated" data-fx="fadeIn">
                <div className="row">
                  <div className="col-xs-7">
                    <div className="cart-item-border">
                      <div className="container-fluid">
                        <h3 className="ct-u-margin0 ct-u-marginBottom10">Giỏ hàng:</h3>
                        <div className="row">
                          <div className="col-xs-3">
                            <img className="img-responsive" src="/public/assets/site/images/content/item.png" />
                          </div>
                          <div className="col-xs-7">
                            <h4 className="ct-u-colorDark ct-u-margin0 ct-u-marginLeft10">bourbon whiskey</h4>
                            <p className="ct-u-marginLeft10">2.000.000 vnđ x 2</p>
                          </div>
                          <div className="col-xs-1">
                            <button className="x-btn"><i className="fa fa-times"></i></button>
                          </div>
                        </div>
                        <hr/>
                        <div className="row">
                          <div className="col-xs-3">
                            <img className="img-responsive" src="/public/assets/site/images/content/item.png" />
                          </div>
                          <div className="col-xs-7">
                            <h4 className="ct-u-colorDark ct-u-margin0 ct-u-marginLeft10">bourbon whiskey</h4>
                            <p className="ct-u-marginLeft10">2.000.000 vnđ x 2</p>
                          </div>
                          <div className="col-xs-1">
                            <button className="x-btn"><i className="fa fa-times"></i></button>
                          </div>
                        </div>
                        <hr/>
                        <div className="row">
                          <div className="col-xs-3">
                            <img className="img-responsive" src="/public/assets/site/images/content/item.png" />
                          </div>
                          <div className="col-xs-7">
                            <h4 className="ct-u-colorDark ct-u-margin0 ct-u-marginLeft10">bourbon whiskey</h4>
                            <p className="ct-u-marginLeft10">2.000.000 vnđ x 2</p>
                          </div>
                          <div className="col-xs-1">
                            <button className="x-btn"><i className="fa fa-times"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="col-xs-5 total-cart ct-u-colorWhite ct-js-background" 
                  data-bg="/public/assets/site/images/menu-pattern.jpg">
                    <h3 className="ct-u-marginBottom30">Tổng Cộng:</h3>
                    <h3>10.000.000 vnđ</h3>
                    <hr/>
                    <a href="#" className="btn btn-lg btn-button--white ct-u-marginBottom10 ct-u-marginTop5 cart-btn">đến giỏ hàng</a>
                    <a href="#" className="btn btn-lg btn-button--white ct-u-marginBottom10 cart-btn">thanh toán</a>
                  </div>
                </div>
              </div>
            </li>
          </div>
        </div>
        <div className="ct-wishlist-title-media ct-u-font2 ct-u-size18 text-uppercase list-inline">
          <ul>
            <li className="wishlist pull-left">
              <a href="#" className="hidden-lg" type="button">yêu thích</a>
            </li>
            <li className="wishlist pull-left hidden-lg ct-u-marginHorizon5">|
            </li>
            <li className="wishlist pull-left">
              <a href="#" className="hidden-lg" type="button">giỏ hàng <i className="fa fa-shopping-cart" aria-hidden="true"></i></a>
            </li>
          </ul>    
        </div>

        <div className="ct-navbarMobile ct-navbarMobile--inverse">
          <a className="navbar-brand" href="index.html">
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

export default AsideHeader

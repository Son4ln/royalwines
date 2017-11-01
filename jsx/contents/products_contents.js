import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';
import {connect} from 'react-redux';

class ProductsContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('products-script-blog');
    renderMainScript(scriptBlock);
  }

  render() {
    return(
      <section className="ct-content">
        <div className="row">
          <div className="col-sm-4 col-xs-6 animated" data-fx="flipInY">
            <div className="item ct-u-padding10">
              <div className="ct-u-item-hover">
                <div className="ct-u-hoverBox ct-item-border ct-imgHeigh40per">
                  <img className="img-responsive" src="/public/assets/site/images/content/chivas.png"/>
                  <div className="ct-u-hoverItem">
                    <h4 className="text-uppercase ct-u-font2 ct-u-colorWhite">hi</h4>
                    <h4 className="text-uppercase ct-u-font2 ct-u-colorBlack">1000vnđ</h4>
                    <a href="#" className="ct-u-hoverIcon pull-left "><i className="fa fa-shopping-cart"></i></a>
                    <a href="#" className="ct-u-hoverIcon ct-u-marginLeft40"><i className="fa fa-heart-o"></i></a>
                    <a href="#" className="btn btn-sm btn-default btn-item ct-u-colorMotive" data-fx="fadeIn" data-hover="Chi Tiết"><span>Chi Tiết</span></a>
                  </div>
                  <div className="ct-u-item-info ct-u-marginHorizon10">
                    <h4 className="text-uppercase ct-u-font2 ct-itemName">hi</h4>
                    <h4 className="text-uppercase ct-u-font2 ct-itemPrice">1000vnđ</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="col-sm-4 col-xs-6 animated" data-fx="flipInY">
            <div className="item ct-u-padding10">
              <div className="ct-u-item-hover">
                <div className="ct-u-hoverBox ct-item-border ct-imgHeigh40per">
                  <img className="img-responsive" src="/public/assets/site/images/content/chivas.png"/>
                  <div className="ct-u-hoverItem">
                    <h4 className="text-uppercase ct-u-font2 ct-u-colorWhite">hi</h4>
                    <h4 className="text-uppercase ct-u-font2 ct-u-colorBlack">1000vnđ</h4>
                    <a href="#" className="ct-u-hoverIcon pull-left "><i className="fa fa-shopping-cart"></i></a>
                    <a href="#" className="ct-u-hoverIcon ct-u-marginLeft40"><i className="fa fa-heart-o"></i></a>
                    <a href="#" className="btn btn-sm btn-default btn-item ct-u-colorMotive" data-fx="fadeIn" data-hover="Chi Tiết"><span>Chi Tiết</span></a>
                  </div>
                  <div className="ct-u-item-info ct-u-marginHorizon10">
                    <h4 className="text-uppercase ct-u-font2 ct-itemName">hi</h4>
                    <h4 className="text-uppercase ct-u-font2 ct-itemPrice">1000vnđ</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="col-sm-4 col-xs-6 animated" data-fx="flipInY">
            <div className="item ct-u-padding10">
              <div className="ct-u-item-hover">
                <div className="ct-u-hoverBox ct-item-border ct-imgHeigh40per">
                  <img className="img-responsive" src="/public/assets/site/images/content/chivas.png"/>
                  <div className="ct-u-hoverItem">
                    <h4 className="text-uppercase ct-u-font2 ct-u-colorWhite">hi</h4>
                    <h4 className="text-uppercase ct-u-font2 ct-u-colorBlack">1000vnđ</h4>
                    <a href="#" className="ct-u-hoverIcon pull-left "><i className="fa fa-shopping-cart"></i></a>
                    <a href="#" className="ct-u-hoverIcon ct-u-marginLeft40"><i className="fa fa-heart-o"></i></a>
                    <a href="#" className="btn btn-sm btn-default btn-item ct-u-colorMotive" data-fx="fadeIn" data-hover="Chi Tiết"><span>Chi Tiết</span></a>
                  </div>
                  <div className="ct-u-item-info ct-u-marginHorizon10">
                    <h4 className="text-uppercase ct-u-font2 ct-itemName">hi</h4>
                    <h4 className="text-uppercase ct-u-font2 ct-itemPrice">1000vnđ</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="col-sm-4 col-xs-6 animated" data-fx="flipInY">
            <div className="item ct-u-padding10">
              <div className="ct-u-item-hover">
                <div className="ct-u-hoverBox ct-item-border ct-imgHeigh40per">
                  <img className="img-responsive" src="/public/assets/site/images/content/chivas.png"/>
                  <div className="ct-u-hoverItem">
                    <h4 className="text-uppercase ct-u-font2 ct-u-colorWhite">hi</h4>
                    <h4 className="text-uppercase ct-u-font2 ct-u-colorBlack">1000vnđ</h4>
                    <a href="#" className="ct-u-hoverIcon pull-left "><i className="fa fa-shopping-cart"></i></a>
                    <a href="#" className="ct-u-hoverIcon ct-u-marginLeft40"><i className="fa fa-heart-o"></i></a>
                    <a href="#" className="btn btn-sm btn-default btn-item ct-u-colorMotive" data-fx="fadeIn" data-hover="Chi Tiết"><span>Chi Tiết</span></a>
                  </div>
                  <div className="ct-u-item-info ct-u-marginHorizon10">
                    <h4 className="text-uppercase ct-u-font2 ct-itemName">hi</h4>
                    <h4 className="text-uppercase ct-u-font2 ct-itemPrice">1000vnđ</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="products-script-blog"></div>
      </section>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    rw_cart: state.cart_item
  }
}

export default connect(mapStateToProps)(ProductsContents);
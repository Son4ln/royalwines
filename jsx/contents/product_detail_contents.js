import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
import { renderMainScript } from '../utils';

class ProductDetailContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('productdetail-script-block');
    renderMainScript(scriptBlock);
    this.renderInit();

    var findNumberField = function findNumberField(btn) {
    return btn.closest('.ct-product-detail').find('input[type=number]');
    };

    $('.js-form-number-dec2').on('click', function (e) {
      var $current = $(e.currentTarget),
          $input = findNumberField($current);

      var newValue = parseInt($input.val()) - 1;
      if (newValue >= $input.attr('min')) {
        $input.val(newValue);
      }
    });

    $('.js-form-number-inc2').on('click', function (e) {
      var $current = $(e.currentTarget),
          $input = findNumberField($current);

      var newValue = parseInt($input.val()) + 1;
      if (newValue <= $input.attr('max')) {
        $input.val(newValue);
      }
    });
  }

  renderInit() {
    let scriptBlog = document.getElementById('productdetail-script-block');
    const script = document.createElement('script');
    script.src = '/public/assets/site/plugins/owl/init.js';
    scriptBlog.appendChild(script);
  }

  render() {
    return(
      <section className="ct-content">
        <div className="row">
          <div className="col-sm-6 col-xs-12 ct-frame ct-frame--motive ct-u-backgroundWhite">
            <img className="ct-detail-img img-responsive center-block" src="/public/assets/site/images/content/chivas.png"/>
          </div>
          
          <div className="col-sm-6 col-xs-12 ct-u-size20">
            <h2 className="ct-u-font2 text-uppercase ct-u-marginTop10 ct-u-marginBottom30">chivas regal 25</h2>
            <p className="ct-fw-600">Trạng thái: <span className="ct-u-colorMotive">Còn hàng</span></p>
            <p className="ct-discount-price ct-u-marginBottom0">1.000.000VNĐ</p>
            <p className="ct-price ct-u-colorMotive ct-u-size24 ct-fw-600">999.999VNĐ</p>
            <div className="row ct-u-marginTop20">
              <div className="ct-product-detail col-sm-5 col-xs-12">
                <button className="js-form-number-dec2"><span>-</span></button>
                <input id="number" name="number" type="number" value="0" min="0" max="100" readonly className="ct-detail-number"/>
                <button className="js-form-number-inc2"><span>+</span></button>
              </div>
              <div className="col-sm-7 col-xs-12">
                <a href="#" className="btn btn-lg btn-default ct-detail-wishlist" data-hover="Add to wishlist">
                  <span>Add to wishlist</span></a>
              </div>
            </div>
            <a href="#" className="btn btn-lg btn-inverse ct-addcart" data-hover="Add to cart"><span>Add to cart</span></a>
          </div>
        </div>

        <div className="row">
          <section className="ct-frame ct-frame--white">
            <div id="toggables" className="section">
              <hr className="hr-custom ct-js-background" data-bg="assets/images/hr2.png" data-bgrepeat="no-repeat"/>
              <ul className="nav nav-tabs" role="tablist" id="myTab">
                <li role="presentation" className="active"><a href="#decription" aria-controls="decription" role="tab" data-toggle="tab">decription</a></li>
              </ul>

              <div className="tab-content">
                <div role="tabpanel" className="tab-pane fade in active" id="decription">
                  <p>Etiam nunc tortor, ultrices quis turpis, tempor lacinia ligula. Sed at odio vel est lobortis eleifend ac vitae enim.
                    Suspendisse est gravida nisi lectus, nisl ullamcorper et. Pellentesque volutpat felis ut nunc elit euismod sollicitudin.
                    Nam ullamcorper nibh eget sem consectetur, et semper elit suscipit.</p>
                  <p className="ct-u-paddingBottom20">
                    Cras interdum ante a efficitur dictum. Duis tincidunt non elit pellentesque. Curabitur set accumsan accumsan consectetur. Quisque et velit vestibulum quam condimentum consectetur.
                    Praesent ac elit molestie, commodo quam vel, laoreet amet elit lacinia lobortis pellentesque metus.
                  </p>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div className="row">
          <div className="col-xs-12 ct-js-masonryItem ct-u-clearBoth animated ct-u-paddingHorizon0" data-fx="pulse">
            <section className="ct-frame-nopadding ct-frame--motive ct-box4 ct-u-backgroundWhite ct-u-marginBottom30 animated" data-fx="pulse">
              <div className="ct-box4-child">
                <div className="row">
                  <div className="col-xs-12">
                    <h2 class="ct-u-font1 text-uppercase text-center ct-u-size28 ct-u-paddingTop20">Sản phẩm liên quan</h2>
                    <div className="ct-js-owl ct-owl-index ct-u-marginBoth20" data-items="4" data-single="false" data-navigation="true" data-pagination="false" data-lgItems="4" data-mdItems="3" data-smItems="2" data-xsItems="2">
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
                </div>
              </div>
            </section>
          </div>
        </div>

        <div id="productdetail-script-block"></div>
      </section>
    );
  }
}

export default ProductDetailContents
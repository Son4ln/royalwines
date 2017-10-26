import React from 'react';
import ReactDOM from 'react-dom';

class HomeContents extends React.Component {
  constructor() {
    super();
  }

  componentWillMount() {
    
  }

  render() {
    return(
      <section className="ct-content">
        <div className="row ct-js-masonry">
          <div className="col-sm-6 ct-js-masonryItem">
          </div>

          <div className="col-sm-12 ct-js-masonryItem">
            <div className="ct-imageBox hidden-xs animated" data-fx="pulse">
              <a href="#">
                <img src="/public/assets/site/images/content/promo1.png" alt="Breakfast menu" />
                <article className="ct-imageBox-inner">
                  <div className="ct-imageBox-innerAlign">
                    <div className="row">
                      <div className="col-sm-6 col-sm-offset-6 text-center">
                        <hr className="hr-custom ct-js-background" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
                        <h5 className="ct-u-colorMotive ct-u-font3 text-uppercase">cơ sở cung cấp rượu</h5>
                        <h3 className="ct-u-font2 text-uppercase">uy tín nhất</h3>
                      </div>
                    </div>
                  </div>
                </article>
              </a>
            </div>  
          </div>
          <div className="col-sm-6 col-xs-12 ct-js-masonryItem text-center ct-u-marginBottom30">
            <a href="#">
              <section className="ct-frame-nopadding ct-frame--motive ct-js-background ct-box2 animated" 
              data-bg="/public/assets/site/images/content/daniels.jpg" data-fx="pulse">
              </section>
            </a>
          </div>
          <div className="col-sm-6 col-xs-12 ct-js-masonryItem">
            <section className="ct-frame ct-frame--motive ct-u-backgroundWhite ct-box3 animated" data-fx="pulse">
              <div className="row">
                <div className="col-xs-5">
                  <img src="/public/assets/site/images/content/item.png" />
                </div>
                <div className="col-xs-7">
                  <h4 className="ct-u-font2 text-uppercase">lorem</h4>
                  <p className="animated ct-u-colorIngredients" data-fx="fadeIn">Vivamus iaculis placerat diam, laoreet posuere</p>
                </div>
              </div>
            </section>
          </div>
          <div className="col-sm-6 col-xs-12 ct-js-masonryItem">
            <section className="ct-frame ct-frame--motive ct-u-backgroundWhite ct-box3 animated" data-fx="pulse">
              <div className="row">
                <div className="col-xs-5 col-sm-push-7 col-xs-push-7">
                  <img src="/public/assets/site/images/content/item.png" />
                </div>
                <div className="col-xs-7 col-sm-pull-5 col-xs-pull-5">
                  <h4 className="ct-u-font2 text-uppercase">lorem</h4>
                  <p className="animated ct-u-colorIngredients" data-fx="fadeIn">Vivamus iaculis placerat diam, laoreet posuere</p>
                </div>
              </div>
            </section>
          </div>

          <div className="col-xs-12 ct-js-masonryItem">
            <section className="ct-frame-nopadding ct-frame--motive ct-js-background ct-box4 animated" data-fx="pulse" data-bg="/public/assets/site/images/content/header-index-bg.png">
              <div className="ct-u-absoluteCenter ct-box4-child">
                <div className="row">
                  <div className="col-sm-12 text-center">
                    <hr className="hr-custom ct-js-background" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
                    <h3 className="ct-u-font2 text-uppercase ct-u-colorWhite">sản phẩm mới</h3>
                  </div>
                </div>
              </div>
            </section>
          </div>

          <div className="col-xs-12 ct-js-masonryItem ct-u-clearBoth animated" data-fx="pulse">
            <section className="ct-frame-nopadding ct-frame--motive ct-box4 ct-u-backgroundWhite ct-u-marginBottom30 animated" data-fx="pulse">
              <div className="ct-box4-child">
                <div className="row">
                  <div className="col-xs-12">
                    <div className="ct-js-owl ct-owl-index ct-u-marginBoth20" data-items="4" data-single="false" data-navigation="true" data-pagination="false" data-lgItems="4" data-mdItems="3" data-smItems="2" data-xsItems="2">
                      <div className="item ct-u-padding10 ">
                        <a href="" className="ct-u-item-hover">
                        <div className="ct-item-border">                      
                          <img src="/public/assets/site/images/content/item.png" />                       
                          <div className="overlay"></div>
                        </div>
                        <div className="ct-u-item-info">
                          <h4 className="text-uppercase ct-u-font2 ct-itemName">Lorem ipsum dolor sit </h4>
                          <h4 className="text-uppercase ct-u-font2 ct-itemPrice">1.000.000vnđ</h4>
                        </div>
                      </a>
                      </div>
                      <div className="item ct-u-padding10 ">
                        <a href="" className="ct-u-item-hover">
                        <div className="ct-item-border">                      
                          <img src="/public/assets/site/images/content/item.png" />
                          <div className="overlay"></div>
                        </div>
                        <div className="ct-u-item-info">
                          <h4 className="text-uppercase ct-u-font2 ct-itemName">Lorem ipsum dolor sit </h4>
                          <h4 className="text-uppercase ct-u-font2 ct-itemPrice">1.000.000vnđ</h4>
                        </div>
                      </a>
                      </div>
                      <div className="item ct-u-padding10 ">
                        <a href="" className="ct-u-item-hover">
                        <div className="ct-item-border">                      
                          <img src="/public/assets/site/images/content/item.png" />
                          <div className="overlay"></div>
                        </div>
                        <div className="ct-u-item-info">
                          <h4 className="text-uppercase ct-u-font2 ct-itemName">Lorem ipsum dolor sit </h4>
                          <h4 className="text-uppercase ct-u-font2 ct-itemPrice">1.000.000vnđ</h4>
                        </div>
                      </a>
                      </div>
                      <div className="item ct-u-padding10 ">
                        <a href="" className="ct-u-item-hover">
                        <div className="ct-item-border">                      
                          <img src="/public/assets/site/images/content/item.png" />                       
                          <div className="overlay"></div>
                        </div>
                        <div className="ct-u-item-info">
                          <h4 className="text-uppercase ct-u-font2 ct-itemName">Lorem ipsum dolor sit </h4>
                          <h4 className="text-uppercase ct-u-font2 ct-itemPrice">1.000.000vnđ</h4>
                        </div>
                      </a>
                      </div>
                      <div className="item ct-u-padding10 ">
                        <a href="" className="ct-u-item-hover">
                        <div className="ct-item-border">                      
                          <img src="/public/assets/site/images/content/item.png" />                       
                          <div className="overlay"></div>
                        </div>
                        <div className="ct-u-item-info">
                          <h4 className="text-uppercase ct-u-font2 ct-itemName">Lorem ipsum dolor sit </h4>
                          <h4 className="text-uppercase ct-u-font2 ct-itemPrice">1.000.000vnđ</h4>
                        </div>
                      </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div className="col-sm-12 ct-js-masonryItem ct-u-clearBoth">
            <section className="ct-frame ct-frame--white animated" data-fx="pulse">
              <h3 className="ct-u-font1 text-uppercase text-center">bài viết mới</h3>
              <hr className="hr-custom ct-js-background" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
              <article className="ct-blogItem ct-formatPhoto ct-u-paddingBottom20">
                <a href="#" className="ct-frame-image" title="The Space"><img src="/public/assets/site/images/content/layer.jpg" width="170" /></a>
                <div className="ct-innerMargin">
                  <div className="ct-entryMeta">
                     <div className="ct-entryDateFirst">Oct 22, 2014</div>
                  </div>
                  <h3 className="ct-entryTitle ct-u-font2"><a href="blog-single.html">Standard Post Format with Preview Image</a></h3>
                <p className="ct-entryDescription">
                  Etiam nunc tortur, ultrices quis turpis, tempor lacinia ligula. Sed at odio vel est lobortis eleifend ac vitae enim. Maecenas mattis nibg.
                  Nulla sagittis ex et mauris ultrices, ut convallis nulla molestie. Ut efficitur cursus ipsum eget semper.
                </p>
                <div className="clearfix"></div>
                </div>
              </article>
            </section>
          </div>
        </div>
      </section>
    );
  }
}

export default HomeContents
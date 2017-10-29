import React from 'react';
import ReactDOM from 'react-dom';

import ProductNewItem from './components/product_new_item';
import ProductDiscount from './components/products_discount';

import {renderMainScript} from '../utils'

class HomeContents extends React.Component {
  constructor() {
    super();

    this.state = {
      new_product: [],
      products_discount: [],
      blog: {},
      blogImg: '',
      brand: [],
    }
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=getNewProducts').then(res => this.newProducts(res.data));
    axios.get('/site/controller/controller.php?action=getProductsDiscountLimit').then(res => this.productsDiscount(res.data));
    axios.get('/site/controller/controller.php?action=getRandomBrand').then(res => this.randomBrand(res.data));
    axios.get('/site/controller/controller.php?action=getOneBlog').then(res => this.getOneBlog(res.data));
  }

  componentDidMount() {
    //khai báo script đẻ sử dụng slider
    this.renderScript();
  }

  newProducts(data) {
    let productArr = [];
    for(let item of data) {
      let product = JSON.parse(item);
      productArr.push(product);
    }

    this.setState({
      new_product: productArr
    }); 
  }

  productsDiscount(data) {
    let productArr = [];
    for(let item of data) {
      let product = JSON.parse(item);
      productArr.push(product);
    }

    this.setState({
      products_discount: productArr
    });
  }

  getOneBlog(data) {
    this.setState({
      blog: data,
      blogImg: `/upload/blog/${data.news_image}`
    });
  }

  randomBrand(data) {
    let brandArr = [];
    for (let item of data) {
      let brand = JSON.parse(item);
      brandArr.push(brand);
    }

    this.setState({
      brand: brandArr
    });
  }

  renderBrands() {
    let data = this.state.brand;
    let brandArr = [];
    for (let item of data) {
      let img_url = `/upload/brands/${item.brand_logo}`;

      let content = (
        <div className="col-sm-6 col-xs-12 ct-js-masonryItem">
          <a href="#">
            <section className="ct-frame ct-frame--motive ct-u-backgroundWhite ct-box3 animated" data-fx="pulse" >
              <img src={img_url} />           
            </section>
          </a>
        </div>
      );

      brandArr.push(content);
    }

    return brandArr;
  }

  renderScript() {
    let scriptBlog = document.getElementById('home-script-block');
    const script = document.createElement('script');
    script.src = '/public/assets/site/plugins/owl/init.js';
    scriptBlog.appendChild(script);
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

          <div className="col-sm-6 col-xs-12 ct-js-masonryItem ct-u-marginBottom30">
            <section className="ct-frame-nopadding ct-frame--motive ct-box2 animated" data-fx="pulse">
              <h3 className="ct-u-colorMotive ct-u-font2 text-uppercase ct-u-margin0 ct-u-paddingTop50 text-center">sản phẩm giảm giá</h3>
              <hr className="hr-custom ct-js-background text-center" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
              <div className="ct-js-owl ct-owl-index ct-u-paddingBottom10" data-items="1" data-single="false" 
              data-navigation="true" data-pagination="false" data-lgItems="1" data-mdItems="1" data-smItems="1" data-xsItems="1">

                {this.state.products_discount.map((e, i) => <ProductDiscount key={i}
                  uid={e.uid} product_name={e.product_name} featured_img={e.featured_img} price={e.price} discount={e.discount}/>
                )}

              </div>
            </section>
          </div>

          {this.renderBrands()}

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
                    <div className="ct-js-owl ct-owl-index ct-u-marginBoth20" data-items="4" data-single="false" 
                    data-navigation="true" data-pagination="false" data-lgItems="4" data-mdItems="3" data-smItems="2" data-xsItems="2">

                      {this.state.new_product.map((e, i) => <ProductNewItem key={i}
                        uid={e.uid} product_name={e.product_name} featured_img={e.featured_img} price={e.price}/>
                      )}

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
                <a href="#" className="ct-frame-image" title="The Space"><img src={this.state.blogImg} width="170" /></a>
                <div className="ct-innerMargin">
                  <div className="ct-entryMeta">
                     <div className="ct-entryDateFirst">{this.state.blog.news_date}</div>
                  </div>
                  <h3 className="ct-entryTitle ct-u-font2"><a href="blog-single.html">{this.state.blog.news_title}</a></h3>
                <p className="ct-entryDescription">
                  {this.state.blog.short_desc}
                </p>
                <div className="clearfix"></div>
                </div>
              </article>
            </section>
          </div>
        </div>

        <div id="home-script-block"></div>
      </section>
    );
  }
}

export default HomeContents
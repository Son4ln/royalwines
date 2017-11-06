import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
import {connect} from 'react-redux';
import { renderMainScript, formatCurrency } from '../utils';
import ProductItems from './components/product_items';
import * as actions from '../store/actions';

class ProductDetailContents extends React.Component {
  constructor() {
    super();

    this.state = {
      product: {},
      img_url: '',
      renderProduct: null,
      qty: 0
    }

    this.onAddCart = this.onAddCart.bind(this);
    this.onAddWish = this.onAddWish.bind(this);
    this.changeAddCartBtn = this.changeAddCartBtn.bind(this);
    this.changeAddWishBtn = this.changeAddWishBtn.bind(this);
    this.onAddCartHere = this.onAddCartHere.bind(this);
  }

  componentWillMount() {
    axios.get(`/site/controller/controller.php?action=getProductById&uid=${this.props.match.params.id}`)
    .then(res => this.getProduct(res.data));
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

    $('#add-wish').click(() => {
      this.onAddWish(this.state.product.uid);
    });

  }

  getProduct(data) {
    this.setState({
      product: data,
      img_url: `/upload/products/${data.featured_img}`
    });

    // axios.get(`/site/controller/controller.php?action=getProductByCate&cate_id=${data.category_id}&limit=8`)
    // .then(res => this.getProductSameCate(res.data));
  }

  // getProductSameCate(data) {
  //   let arr = [];
  //   for (let item of data) {
  //     let item_encode = JSON.parse(item);
  //     arr.push(item_encode);
  //   }

  //   let content = (
  //     arr.map((e, i) => <ProductItems key={i} index={i} product={e} onAddCart={this.onAddCart} onAddWish={this.onAddWish}/>)
  //   );

  //   this.setState({
  //     renderProduct: content
  //   });
  // }

  renderInit() {
    let scriptBlog = document.getElementById('productdetail-script-block');
    const script = document.createElement('script');
    script.src = '/public/assets/site/plugins/owl/init.js';
    scriptBlog.appendChild(script);
  }

  renderPrice() {
    let content = null;
    if (this.state.product.discount > 0) {
      content = (
        <div>
          <p className="ct-discount-price ct-u-marginBottom0">{formatCurrency(this.state.product.price)}VNĐ</p>
          <p className="ct-price ct-u-colorMotive ct-u-size24 ct-fw-600">{formatCurrency(this.state.product.discount)}VNĐ</p>
        </div>
      );
    } else {
      content = (<p className="ct-u-marginBottom0">{formatCurrency(this.state.product.price)}VNĐ</p>);
    }

    return content;
  }

  renderStatus() {
    let content = null;
    if (this.state.product.in_stock > 0) {
      content = (
        <p className="ct-fw-600">Trạng thái: <span className="ct-u-colorMotive">Còn hàng</span></p>
      );
    } else if (this.state.product.in_stock = 0) {
      content = (
        <p className="ct-fw-600">Trạng thái: <span className="ct-u-colorMotive">Hêt hàng</span></p>
      );
    }

    return content;
  }

  onAddCart(uid) {
    let addCart = this.props.onAddCart;
    axios.get(`/site/controller/controller.php?action=getProductById&uid=${uid}`)
    .then(function(res) {
      let price = res.data.price;
      if (res.data.discount > 0) {
        price = res.data.discount;
      }

      let item = {
        uid: res.data.uid,
        product_name: res.data.product_name,
        featured_img: res.data.featured_img,
        price: price,
        qty: 1
      }
      
      addCart(item);
    });
  }

  onAddCartHere() {
    let qty = $('#number').val();
    let uid = this.state.product.uid;
    let addCart = this.props.onAddCart;
    axios.get(`/site/controller/controller.php?action=getProductById&uid=${uid}`)
    .then(function(res) {
      let price = res.data.price;
      if (res.data.discount > 0) {
        price = res.data.discount;
      }

      let item = {
        uid: res.data.uid,
        product_name: res.data.product_name,
        featured_img: res.data.featured_img,
        price: price,
        qty: qty
      }
      
      addCart(item);
    });
  }

  onAddWish(uid) {
    let addWish = this.props.onAddWish;

    axios.get(`/site/controller/controller.php?action=getProductById&uid=${uid}`)
    .then(function(res) {
      let item = {
        uid: res.data.uid,
        product_name: res.data.product_name,
        featured_img: res.data.featured_img
      }
      
     addWish(item);
    });
  }

  changeAddCartBtn() {
    let cart = this.props.rw_cart;
    let uid = this.state.product.uid;

    let content = (
      <a href="javascript:void(0)" onClick={this.onAddCartHere} className="btn btn-lg btn-inverse ct-addcart" data-hover="Thêm vào giỏ hàng">
        <span>Thêm vào giỏ hàng</span>
      </a>
    );

    if (cart.length > 0) {
      for (let item of cart) {
        if (item.uid === uid) {
          content = (
            <a href="javascript:void(0)" disabled="disabled" className="btn btn-lg btn-inverse ct-addcart" data-hover="Đã có trong giỏ hàng">
              <span>Đã có trong giỏ hàng</span>
            </a>
          );
        }
      }
    }

    return content;
  }

  changeAddWishBtn() {
    let wish = this.props.rw_wish;
    let uid = this.state.product.uid;

    let content = (
      <a href="javascript:void(0)" id="add-wish" className="btn btn-lg btn-default ct-detail-wishlist" data-hover="thích">
        <span className="fa fa-heart-o"></span>
      </a>
    );

    if (wish.length > 0) {
      for (let item of wish) {
        if (item.uid === uid) {
          content = (
            <a href="javascript:void(0)" disabled="disabled" className="btn btn-lg btn-default ct-detail-wishlist" data-hover="đã thích">
              <span className="fa fa-heart"></span>
            </a>
          );
        }
      }
    }

    return content;
  }

  render() {
    let margin_bot = {
      margin: '0 0 20px 0'
    }

    $('#decription').html(this.state.product.product_detail);

    return(
      <section className="ct-content">
        <div className="row" style={margin_bot}>
          <div className="col-sm-6 col-xs-12 ct-frame ct-frame--motive ct-u-backgroundWhite">
            <img className="ct-detail-img img-responsive center-block" src={this.state.img_url}/>
          </div>
          
          <div className="col-sm-6 col-xs-12 ct-u-size20">
            <h2 className="ct-u-font2 text-uppercase ct-u-marginTop10 ct-u-marginBottom30">{this.state.product.product_name}</h2>
            {this.renderStatus()}
            {this.renderPrice()}
            <div className="row ct-u-marginTop20">
              <div className="ct-product-detail col-sm-5 col-xs-12">
                <button className="js-form-number-dec2"><span>-</span></button>
                <input id="number" name="number" type="number" value="1" min="1" max="100" readonly className="ct-detail-number"/>
                <button className="js-form-number-inc2"><span>+</span></button>
              </div>
              <div className="col-sm-7 col-xs-12">
                {this.changeAddWishBtn()}
              </div>
            </div>
            {this.changeAddCartBtn()}
          </div>
        </div>

        <div className="row">
          <section className="ct-frame ct-frame--white">
            <div id="toggables" className="section">
              <hr className="hr-custom ct-js-background" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat"/>
              <ul className="nav nav-tabs" role="tablist" id="myTab">
                <li role="presentation" className="active"><a href="#decription" aria-controls="decription" role="tab" data-toggle="tab">decription</a></li>
              </ul>

              <div className="tab-content">
                <div role="tabpanel" className="tab-pane fade in active" id="decription">
                 
                </div>
              </div>
            </div>
          </section>
        </div>

        <div id="productdetail-script-block"></div>
      </section>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    rw_cart: state.rw_cart,
    rw_user: state.rw_user,
    rw_wish: state.rw_wish
  }
}

const mapDispatchToProps = (dispatch) => {
  return {
    onAddCart: (cart_item) => {dispatch(actions.add_cart(cart_item))},
    onAddWish: (item) => {dispatch(actions.save_wish_item(item))}
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(ProductDetailContents);
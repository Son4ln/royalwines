import React from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import { renderMainScript } from '../utils';
import ProductItems from './components/product_items';
import * as actions from '../store/actions';

class BrandsContents extends React.Component {
  constructor() {
    super();

    this.state = {
      renderProducts: null,
      limit: 9,
      curent_props: ''
    }

    this.onAddCart = this.onAddCart.bind(this);
    this.onAddWish = this.onAddWish.bind(this);
  }

  componentWillReceiveProps(nextProps) {

    if (this.state.curent_props !== nextProps.match.params.brand_id) {
      this.setState({
        limit: 9,
        curent_props: nextProps.match.params.brand_id
      });

      this.getProductsByBrand(nextProps);
      return;
    }

    this.getProductsByBrand(nextProps);
  }

  componentDidMount() {
    this.getProductsByBrand(this.props);

    $('#view-more-product').click(() => {
      this.pagination();
    });
  }

  getProductsByBrand(props) {
    $('#view-more-product').html('Đang tải...');
    $('#view-more-product').attr('disabled', true);
    let limit = this.state.limit;
    if (props.match.params.brand_id === '0') {
      axios.get(`/site/controller/controller.php?action=getAllProductPublic&limit=${limit}`)
      .then(res => this.getProducts(res.data));
      return;
    }

    axios.get(`/site/controller/controller.php?action=getProductsByBrand&brand-id=${props.match.params.brand_id}&limit=${limit}`)
    .then(res => this.getProducts(res.data));
  }

  pagination() {
    let limit = this.state.limit;
    this.setState({
      limit: limit + 6
    });

    this.getProductsByBrand(this.props);
  }

  getProducts(data) {
    $('#view-more-product').html('Xem thêm');
    $('#view-more-product').attr('disabled', false);
    let arr = [];
    let content = (
      <center><h2 className="ct-u-font2 text-uppercase animated  activate flipInY">Không tìm thấy sản phẩm</h2></center>
    );

    if (data.length > 0) {

      if (data.length < this.state.limit) {
        $('.ct-navigation-blog').addClass('hidden');
      }

      if (data.length === 9) {
        $('.ct-navigation-blog').removeClass('hidden');
      } else if(data.length < 9) {
        $('.ct-navigation-blog').addClass('hidden');
      }

      for (let item of data) {
        let item_encode = JSON.parse(item);
        arr.push(item_encode);
      }

      content = (
        arr.map((e, i) => <ProductItems key={i} index={i} product={e} onAddCart={this.onAddCart} onAddWish={this.onAddWish}/>)
      );
    } else {
      $('.ct-navigation-blog').addClass('hidden');
    }

    this.setState({
      renderProducts: content
    });

    let scriptBlock = document.getElementById('brands-script-blog');
    renderMainScript(scriptBlock);
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

  render() {
    return(
      <section className="ct-content">
        <div id="products-content" className="row">
          {this.state.renderProducts}
        </div>

        <div className="ct-navigation-blog row hidden">
          <center>
            <a href="javascript:void(0)" id="view-more-product" className="btn btn-lg btn-button--dark"></a>
          </center>
        </div>

        <div id="brands-script-blog"></div>
      </section>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    rw_cart: state.rw_cart
  }
}

const mapDispatchToProps = (dispatch) => {
  return {
    onAddCart: (cart_item) => {dispatch(actions.add_cart(cart_item))},
    onAddWish: (item) => {dispatch(actions.save_wish_item(item))}
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(BrandsContents);
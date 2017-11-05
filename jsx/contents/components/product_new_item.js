import React from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';
import {connect} from 'react-redux';
import { formatCurrency } from '../../utils';
import * as actions from '../../store/actions'

class ProductNewItem extends React.Component {
  constructor() {
    super();

    this.state = {
      img_url: '',
      url: ''
    }

    this.addCartItem = this.addCartItem.bind(this);
    this.changeButton = this.changeButton.bind(this);
    this.changeLikeBtn = this.changeLikeBtn.bind(this);
    this.addWishItem = this.addWishItem.bind(this);
    this.delWish = this.delWish.bind(this);
  }

  componentDidMount() {
    this.setState({
      img_url: `/upload/products/${this.props.featured_img}`,
      url: `/chi-tiet-san-pham/${this.props.uid}`
    });
    this.changeButton();
  }

  changeButton() {
    let cart = this.props.rw_cart;
    let uid = this.props.uid;
    let content = (
      <a href="javascript:void(0)" onClick={this.addCartItem} className="ct-u-hoverIcon pull-left">
        <i className="fa fa-shopping-cart"></i>
      </a>
    );
    if (cart.length > 0) {
      for (let item of cart) {
        if (item.uid === uid) {
          content = (
            <a href="javascript:void(0)" className="ct-u-hoverIcon pull-left">
              <i className="fa fa-check"></i>
            </a>
          );
        }
      }
    }

    return content;
  }

  changeLikeBtn() {
    let content = (
      <Link to="/dang-nhap" className="ct-u-hoverIcon ct-u-marginLeft40">
        <i className="fa fa-heart-o"></i>
      </Link>
    );
    if (this.props.rw_user.uid !== undefined) {
      content = (
        this.onChangeBtnWishLogin()
      );
    }

    return content;
  }

  onChangeBtnWishLogin() {
    let wish = this.props.rw_wish;
    let uid = this.props.uid;
    let content = (
      <a href="javascript:void(0)" onClick={this.addWishItem} className="ct-u-hoverIcon ct-u-marginLeft40">
        <i className="fa fa-heart-o"></i>
      </a>
    );

    if (wish.length > 0) {
      
      let count = 0;
      for (let item of wish) {
        if (item.uid === uid) {
          content = (
            <a href="javascript:void(0)" onClick={this.delWish} data-index={count} className="ct-u-hoverIcon ct-u-marginLeft40">
              <i className="fa fa-heart"></i>
            </a>
          );
        }

        count ++;
      }
    }

    return content;
  }

  delWish(e) {
    let target = $(e.target);
    if (target.is('I')) {
      target = $(e.target).parents('A');
    }
    let delWish = this.props.onDeleteWishItem;
    let index = target.attr('data-index');
    delWish(index);
  }

  addCartItem() {
    let cart = this.props.onAddCart;
    cart(this.props.uid);
  }

  addWishItem() {
    let wish = this.props.onAddWish;
    wish(this.props.uid);
  }

  render() {
    return(
      <div className="item ct-u-padding10">
        <div className="ct-u-item-hover">
          <div className="ct-u-hoverBox ct-item-border">
            <img src={this.state.img_url} />
            <div className="ct-u-hoverItem">
              <h4 className="text-uppercase ct-u-font2 ct-u-colorWhite">{this.props.product_name}</h4>
              <h4 className="text-uppercase ct-u-font2 ct-u-colorBlack">{formatCurrency(this.props.price)}vnđ</h4>
              {this.changeButton()}
              {this.changeLikeBtn()}
              <Link to={this.state.url} className="btn btn-sm btn-default btn-item" data-fx="fadeIn" data-hover="Chi Tiết"><span>Chi Tiết</span></Link>
            </div>
            <div className="ct-u-item-info ct-u-marginHorizon10">
              <h4 className="text-uppercase ct-u-font2 ct-itemName">{this.props.product_name}</h4>
              <h4 className="text-uppercase ct-u-font2 ct-itemPrice">{formatCurrency(this.props.price)}vnđ</h4>
            </div>
          </div>
        </div>
      </div>
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
    onDeleteWishItem: (index) => {dispatch(actions.delete_wish_item(index))}
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(ProductNewItem);
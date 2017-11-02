import React from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';
import {connect} from 'react-redux';
import { formatCurrency } from '../../utils';
import * as actions from '../../store/actions';

class ProductDiscount extends React.Component {
  constructor() {
    super();

    this.state = {
      img_url: ''
    }

    this.addCartItem = this.addCartItem.bind(this);
    this.changeButton = this.changeButton.bind(this);
    this.changeLikeBtn = this.changeLikeBtn.bind(this);
  }

  componentDidMount() {
    $('.origin-price').css("text-decoration", "line-through");
    this.setState({img_url: `/upload/${this.props.featured_img}`})
  }

  addCartItem() {
    let cart = this.props.onAddCart;
    cart(this.props.uid);
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
        <a href="javascript:void(0)" className="ct-u-hoverIcon ct-u-marginLeft40">
          <i className="fa fa-heart-o"></i>
        </a>
      );
    }

    return content;
  }

  render() {
    return(
      <div className="item ct-u-padding10 ct-u-paddingHorizon50">
        <div className="ct-u-item-hover">
          <div className="ct-u-hoverBox ct-item-border">
            <img src={this.state.img_url} />
            <div className="ct-u-hoverItem">
              <h4 className="text-uppercase ct-u-font2 ct-u-colorWhite">{this.props.product_name}</h4>
              <h4 className="text-uppercase ct-u-font2 ct-u-colorBlack origin-price">{formatCurrency(this.props.price)}vnđ</h4>
              <h3 className="text-uppercase ct-u-font2 ct-u-colorBlack">{formatCurrency(this.props.discount)}vnđ</h3>
              {this.changeButton()}
              {this.changeLikeBtn()}
              <a href="javascript:void(0)" className="btn btn-sm btn-default btn-item" data-fx="fadeIn" data-hover="Chi Tiết"><span>Chi Tiết</span></a>
            </div>

            <div className="ct-u-item-info ct-u-marginHorizon10">
              <h4 className="text-uppercase ct-u-font2 ct-itemName">{this.props.product_name}</h4>
              <h4 className="text-uppercase ct-u-font2 ct-itemPrice origin-price">{formatCurrency(this.props.price)}vnđ</h4>
              <h3 className="text-uppercase ct-u-font2 ct-u-colorBlack">{formatCurrency(this.props.discount)}vnđ</h3>
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
    rw_user: state.rw_user
  }
}

export default connect(mapStateToProps)(ProductDiscount);
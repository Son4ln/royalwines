import React from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import { formatCurrency } from '../../utils';

class ProductNewItem extends React.Component {
  constructor() {
    super();

    this.state = {
      img_url: '',
    }

    this.addCartItem = this.addCartItem.bind(this);
    this.changeButton = this.changeButton.bind(this);
  }

  componentDidMount() {
    this.setState({img_url: `/upload/${this.props.featured_img}`});
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

  addCartItem() {
    let cart = this.props.onAddCart;
    cart(this.props.uid);
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
              <a href="javascript:void(0)" className="ct-u-hoverIcon ct-u-marginLeft40"><i className="fa fa-heart-o"></i></a>
              <a href="javascript:void(0)" className="btn btn-sm btn-default btn-item" data-fx="fadeIn" data-hover="Chi Tiết"><span>Chi Tiết</span></a>
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
    rw_cart: state.rw_cart
  }
}

export default connect(mapStateToProps)(ProductNewItem);
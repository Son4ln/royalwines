import React from 'react';
import ReactDOM from 'react-dom';
import { formatCurrency } from '../../utils';

class ProductDiscount extends React.Component {
  constructor() {
    super();
  }

  render() {
    return(
      <div className="item ct-u-padding10 ct-u-paddingHorizon50">
        <div className="ct-u-item-hover">
          <div className="ct-u-hoverBox ct-item-border">
            <img src="/public/assets/site/images/content/item.png" />
            <div className="ct-u-hoverItem">
              <h4 className="text-uppercase ct-u-font2 ct-u-colorWhite">{this.props.product_name}</h4>
              <h4 className="text-uppercase ct-u-font2 ct-u-colorBlack">{formatCurrency(this.props.price)}vnđ</h4>
              <p className="ct-u-colorWhite">lorem hihihihihih</p>
              <a href="#" className="ct-u-hoverIcon pull-left "><i className="fa fa-shopping-cart"></i></a>
              <a href="#" className="ct-u-hoverIcon ct-u-marginLeft40"><i className="fa fa-heart-o"></i></a>
              <a href="#" class="btn btn-sm btn-default btn-item" data-fx="fadeIn" data-hover="Chi Tiết"><span>Chi Tiết</span></a>
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

export default ProductDiscount
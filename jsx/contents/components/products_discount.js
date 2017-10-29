import React from 'react';
import ReactDOM from 'react-dom';
import { formatCurrency } from '../../utils'

class ProductDiscount extends React.Component {
  constructor() {
    super();

    this.state = {
      img_url: ''
    }
  }

  componentDidMount() {
    $('.origin-price').css("text-decoration", "line-through");
    this.setState({img_url: `/upload/${this.props.featured_img}`})
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

              <a href="#" className="ct-u-hoverIcon pull-left "><i className="fa fa-shopping-cart"></i></a>
              <a href="#" className="ct-u-hoverIcon ct-u-marginLeft40"><i className="fa fa-heart-o"></i></a>
              <a href="#" className="btn btn-sm btn-default btn-item" data-fx="fadeIn" data-hover="Chi Tiết"><span>Chi Tiết</span></a>
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

export default ProductDiscount
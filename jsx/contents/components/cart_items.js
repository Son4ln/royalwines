import React from 'react';
import ReactDOM from 'react-dom';
import { formatCurrency } from '../../utils';

class CartItems extends React.Component {
  constructor() {
    super();

    this.state = {
      img_url: ''
    }

    this.onDeleteCartItem = this.onDeleteCartItem.bind(this);
    this.updateQty = this.updateQty.bind(this);
  }

  componentDidMount() {
    this.setState({
      img_url: `/upload/products/${this.props.product.featured_img}`
    });
  }

  totalProductPrice() {
    let total = this.props.product.price * this.props.product.qty;
    return total;
  }

  onDeleteCartItem() {
    let index = this.props.index;
    let delItem = this.props.onDelete;
    delItem(index);
  }

  updateQty(e) {
    let index = this.props.index;
    let target = $(e.target).parents('.ct-cart-quantity');
    let qty = target.children('#number').val();
    let updateQty = this.props.updateQty;
    updateQty(index, qty);
  }
  
  render() {
    return(
      <tr className="ct-body-table ct-u-colorMotive">
        <td><img src={this.state.img_url} className="ct-cart-img img-responsive"/></td>
        <td className="ct-cart-name">{this.props.product.product_name}</td>
        <td>
          <div className="ct-cart-quantity">
           <button onClick={this.updateQty} className="js-form-number-dec"><span>-</span></button>
           <input id="number" name="number" type="number" value="0" min="1" max="100" value={this.props.product.qty} readonly className="ct-number"/>
           <button onClick={this.updateQty} className="js-form-number-inc"><span>+</span></button>
          </div>
        </td>
        <td>{formatCurrency(this.props.product.price)}VNĐ</td>
        <td>{formatCurrency(this.totalProductPrice())}VNĐ</td>
        <td><button onClick={this.onDeleteCartItem} className="x-btn"><i className="fa fa-times"></i></button></td>
      </tr>
    );
  }
}

export default CartItems;
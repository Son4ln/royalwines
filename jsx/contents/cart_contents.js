import React from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom'
import {connect} from 'react-redux';
import { renderMainScript, formatCurrency } from '../utils';
import * as actions from '../store/actions'
import CartItems from './components/cart_items';

class CartContents extends React.Component {
  constructor() {
    super();

    this.deleteCartItem = this.deleteCartItem.bind(this);
    this.updateQty = this.updateQty.bind(this);
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('cart-script-blog');
    renderMainScript(scriptBlock);

    var findNumberField = function findNumberField(btn) {
    return btn.closest('.ct-cart-quantity').find('input[type=number]');
    };

    $('.js-form-number-dec').on('click', function (e) {
      var $current = $(e.currentTarget),
          $input = findNumberField($current);

      var newValue = parseInt($input.val()) - 1;
      if (newValue >= $input.attr('min')) {
        $input.val(newValue);
      }
    });

    $('.js-form-number-inc').on('click', function (e) {
      var $current = $(e.currentTarget),
          $input = findNumberField($current);

      var newValue = parseInt($input.val()) + 1;
      if (newValue <= $input.attr('max')) {
        $input.val(newValue);
      }
    });
  }

  deleteCartItem(index) {
    let delete_cart = this.props.onDeleteCartItem;
    delete_cart(index);
  }

  updateQty(index, qty) {
    let onUpdate = this.props.onUpdateQty;
    onUpdate(index, qty);
  }

  renderCart() {
    let cart = this.props.rw_cart;
    let content = (
      <tr><td colspan="6" className="text-center"><h1>CHƯA CÓ SẢN PHẨM!</h1></td></tr>
    );

    if (cart.length > 0) {
      content = (
        this.props.rw_cart.map((e, i) => <CartItems key={i} index={i}
        product={this.props.rw_cart[i]} onDelete={this.deleteCartItem} updateQty={this.updateQty} />)
      );
    }

    return content;
  }

  getTotalCart() {
    let cart = this.props.rw_cart;
    let total = 0;
    for (let item of cart) {
      let sub_total = item.qty * item.price;
      total += sub_total;
    }

    return total;
  }

  render() {
    return(
      <section className="ct-content">
        <div className="col-sm-6 ct-js-masonryItem"></div>

        <div className="col-xs-12 ct-u-padding0">
          <div className="overflow-x">
            <table className="ct-cart-table ct-u-font2 text-uppercase ct-u-size20">
              <thead className="ct-head-table">
                <tr>
                  <th>ảnh</th>
                  <th>tên</th>
                  <th>số lượng</th>
                  <th>giá sản phẩm</th>
                  <th>tổng</th>
                  <th>xóa</th>
                </tr>
              </thead>
              <tbody>
                
                {this.renderCart()}

                <tr className="ct-body-table ct-u-colorDark">
                  <td colspan="6">
                    <Link to="/san-pham/0"><button className="ct-cart-body-btn">TIẾP TỤC MUA SẮM</button></Link>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div className="col-sm-7 col-md-6 col-xs-12 pull-right ct-u-padding0">
          <table className="ct-cart-table-checkout ct-u-font2 text-uppercase ct-u-size20" align="right">
            <thead className="ct-head-table">
              <tr>
                <th colspan="2">tổng giỏ hàng</th>
              </tr>
            </thead>
            <tbody className="ct-body-table-checkout ct-u-colorDark">
              <tr>
                <td>Tổng phụ:</td>
                <td>{formatCurrency(this.getTotalCart())}VNĐ</td>
              </tr>

              <tr>
                <td>phí vận chuyển:</td>
                <td>FREE</td>
              </tr>

              <tr>
                <td>Tổng cộng:</td>
                <td className="bold">{formatCurrency(this.getTotalCart())}VNĐ</td>
              </tr>

              
            </tbody>
            <tfoot className="ct-u-colorDark">
              <tr>
                <td colspan="2">
                  <Link to="/thanh-toan" className="btn btn-lg btn-default animated ct-u-marginRight10 ct-u-marginBoth10" 
                  data-fx="fadeIn" data-hover="Thanh toán"><span>Thanh toán</span></Link>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>

        <div id="cart-script-blog"></div>
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
    onDeleteCartItem: (index) => {dispatch(actions.remove_item_cart(index))},
    onUpdateQty: (index, qty) => {dispatch(actions.update_cart(index, qty))}
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(CartContents)
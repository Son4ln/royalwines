import React from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import { renderMainScript, formatCurrency, isValidName, isValidPhone } from '../utils';
import * as actions from '../store/actions';
import {isValidEmail} from '../utils';

class CheckoutContents extends React.Component {
  constructor() {
    super();

    this.state = {
      grandTotal: 0,
      listProduct: [],
      success_checkout: null
    }

    this.checkoutCart = this.checkoutCart.bind(this);
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=checkLogin').then(res => this.checkUser(res.data));
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('checkout-script-blog');
    renderMainScript(scriptBlock);
    this.getCart();

    $('#checkout-btn').click(() => {
      this.checkoutCart();
    });
  }

  checkUser(data) {
    if (data !== 'not_login') {
      $('#full_name').val(data.full_name);
      $('#phone').val(data.phone);
      $('#addr').val(data.address);
      $('#c-email').val(data.email);
    }
  }

  getCart() {
    let cart = JSON.parse(localStorage.getItem('cart'));

    let cart_item = cart ? cart : []
    let grandTotal = 0;
    let list = [];
    if (cart_item.length > 0) {
      for (let item of cart_item) {
        let total = item.qty * item.price;
        grandTotal += total;

        let productPrice = {
          uid: item.uid,
          total: total,
          qty: item.qty
        }

        list.push(productPrice);
      }

      this.setState({
        grandTotal: grandTotal,
        listProduct: list,
      });
    } else {
      let content = (
        <center>
          <h2 className="ct-u-font2 text-uppercase animated  activate pulse">Chưa có sản phẩm trong giỏ hàng</h2>

          <a href="/" className="btn btn-lg btn-button--dark animated ct-u-marginRight10 ct-u-marginBoth20" 
          data-fx="fadeIn">Về trang chủ</a>
        </center>
      );

      $('#checkout-content').addClass('hidden');

      this.setState({
        success_checkout: content
      });

      let scriptBlock = document.getElementById('checkout-script-blog');
      renderMainScript(scriptBlock);
    }
  }

  checkoutCart() {
    if ($('#full_name').val() === '') {
      $('#full_name').focus();
      $('#checkout-alert').html('Vui lòng nhập họ và tên');
      return;
    }

    if ($('#full_name').val() !== '' && !isValidName($('#full_name').val())) {
      $('#full_name').focus();
      $('#checkout-alert').html('Vui lòng nhập đúng họ và tên');
      return;
    }

    if ($('#phone').val() === '') {
      $('#phone').focus();
      $('#checkout-alert').html('Vui lòng nhập số điện thoại');
      return;
    }

    if ($('#phone').val() !== '' && !isValidPhone($('#phone').val())) {
      $('#phone').focus();
      $('#checkout-alert').html('Vui lòng nhập đúng số điện thoại');
      return;
    }

    if ($('#addr').val() === '') {
      $('#addr').focus();
      $('#checkout-alert').html('Vui lòng nhập địa chỉ');
      return;
    }

    if ($('#c-email').val() !== '' && !isValidEmail($('#c-email').val())) {
      $('#c-email').focus();
      $('#checkout-alert').html('Vui lòng nhập đúng email');
      return;
    }

    $('#checkout-btn').html('Đang thanh toán...');
    axios.post('/site/controller/controller.php?action=checkout', {
      full_name: $('#full_name').val(),
      phone: $('#phone').val(),
      addr: $('#addr').val(),
      email: $('#c-email').val(),
      note: $('#c-note').val(),
      total: this.state.grandTotal,
      listProduct: this.state.listProduct
    })
    .then(res => {
      if (res.data === 'success') {
        let content = (
          <center>
            <h2 className="ct-u-font2 text-uppercase animated  activate pulse">Đặt hàng thành công.
            Chúng tôi sẽ liên lạc với bạn trong vòng 24 giờ</h2>

            <a href="/" className="btn btn-lg btn-button--dark animated ct-u-marginRight10 ct-u-marginBoth20" 
            data-fx="fadeIn">Về trang chủ</a>
          </center>
        );

        $('#checkout-content').addClass('hidden');

        this.setState({
          success_checkout: content
        });

        let removeCart = this.props.onRemoveCart;
        removeCart();

        let scriptBlock = document.getElementById('checkout-script-blog');
        renderMainScript(scriptBlock);
      }
    });
  }

  render() {
    let style_alert = {
      color: 'red'
    }
    return(
      <section className="ct-content ct-u-displayTable">
        <div className="ct-checkout">
          {this.state.success_checkout}
          <div className="item" id="checkout-content">
            <h2 className="ct-u-font1 text-uppercase animated ct-u-paddingBottom5 ct-u-margin0 ct-u-size28 ct-u-marginTop20" data-fx="flipInX">thông tin khách hàng</h2>
            <hr className="hr-custom ct-js-background ct-u-paddingTop10 ct-u-paddingBottom15 animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
            <div id="checkout-alert" style={style_alert}></div>
            <form className="ct-login ct-u-colorDark ct-u-font2 ct-u-size18" id="checkout-form">
              <div className="form-group">
                <input type="text" placeholder="Họ và tên:" id="full_name" className="ct-register-input ct-register-pass" required />
                <input type="number" placeholder="SĐT:" id="phone" className="ct-register-input ct-register-repass ct-u-numberHide" required />
              </div>

              <div className="form-group">
                <input type="text" placeholder="Địa chỉ:" id="addr" className="ct-register-input ct-u-marginTop10" required />
              </div>

              <div className="form-group">
                <input type="email" placeholder="Email:" id="c-email" className="ct-register-input" required />
              </div>

              <div className="form-group">
                <textarea id="c-note" className="ct-checkout-area" placeholder="Ghi chú:"></textarea>
                <table className="ct-checkout-btnGroup ct-u-font2 text-uppercase ct-u-size18">
                    <tr className="ct-checkout-title">
                      <td colspan="2">giỏ hàng</td>
                    </tr>
                    <tr className="ct-checkout-content">
                      <td>Tổng phụ:</td>
                      <td>{formatCurrency(this.state.grandTotal)}VNĐ</td>
                    </tr>

                    <tr className="ct-checkout-content">
                      <td>phí vận chuyển:</td>
                      <td>FREE</td>
                    </tr>
                    
                    <tr>
                      <td colspan="2"><hr className="hr-checkout"/></td>
                    </tr>

                    <tr className="ct-checkout-content ct-u-paddingBottom15">
                      <td>Tổng đơn hàng:</td>
                      <td className="bold">{formatCurrency(this.state.grandTotal)}VNĐ</td>
                    </tr>                    
                </table>
              </div>
            </form>
            <a href="javascript:void(0)" id="checkout-btn" className="btn btn-lg btn-button--dark animated ct-u-marginRight10 ct-u-marginBoth20" 
            data-fx="fadeIn">xác nhận đặt hàng</a>
          </div>
        </div>  

        <div id="checkout-script-blog"></div>
      </section>
    );
  }
}

const mapStateToProps = (state) => {
  return {};
}

const mapDispatchToProps = (dispatch) => {
  return {
    onRemoveCart: () => {dispatch(actions.remove_cart())}
  };
}

export default connect(mapStateToProps, mapDispatchToProps)(CheckoutContents)
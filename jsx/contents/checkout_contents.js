import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class CheckoutContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('checkout-script-blog');
    renderMainScript(scriptBlock);
  }

  render() {
    return(
      <section className="ct-content ct-u-displayTable">
        <div className="ct-checkout">
          <div className="item">
            <h2 className="ct-u-font1 text-uppercase animated ct-u-paddingBottom5 ct-u-margin0 ct-u-size28 ct-u-marginTop20" data-fx="flipInX">thông tin khách hàng</h2>
            <hr className="hr-custom ct-js-background ct-u-paddingTop10 ct-u-paddingBottom15 animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
            <form className="ct-login ct-u-colorDark ct-u-font2 ct-u-size18">
              <div className="form-group">
                <input type="text" placeholder="Họ và tên:" className="ct-register-input ct-register-pass" required />
                <input type="number" placeholder="SĐT:" className="ct-register-input ct-register-repass ct-u-numberHide" required />
              </div>

              <div className="form-group">
                <input type="text" placeholder="Địa chỉ:" className="ct-register-input ct-u-marginTop10" required />
              </div>

              <div className="form-group">
                <input type="email" placeholder="Email:" className="ct-register-input" required />
              </div>

              <div className="form-group">
                <textarea className="ct-checkout-area" placeholder="Ghi chú:"></textarea>
                <table className="ct-checkout-btnGroup ct-u-font2 text-uppercase ct-u-size18">
                    <tr className="ct-checkout-title">
                      <td colspan="2">giỏ hàng</td>
                    </tr>
                    <tr className="ct-checkout-content">
                      <td>Tổng phụ:</td>
                      <td>1.000.000VNĐ</td>
                    </tr>

                    <tr className="ct-checkout-content">
                      <td>phí vận chuyển:</td>
                      <td>0VNĐ</td>
                    </tr>
                    
                    <tr>
                      <td colspan="2"><hr className="hr-checkout"/></td>
                    </tr>

                    <tr className="ct-checkout-content ct-u-paddingBottom15">
                      <td>Tổng đơn hàng:</td>
                      <td className="bold">1.000.000VNĐ</td>
                    </tr>                    
                </table>
              </div>
            </form>
            <a href="#" className="btn btn-lg btn-button--dark animated ct-u-marginRight10 ct-u-marginBoth20" 
            data-fx="fadeIn">xác nhận thanh toán</a>
          </div>
        </div>  

        <div id="checkout-script-blog"></div>
      </section>
    );
  }
}

export default CheckoutContents
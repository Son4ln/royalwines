import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class CartContents extends React.Component {
  constructor() {
    super();
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

  render() {
    return(
      <section className="ct-content">
        <div className="row ct-js-masonry">
          <div className="col-sm-6 ct-js-masonryItem"></div>

          <div className="col-sm-12 ct-js-masonryItem">
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
                <tr className="ct-body-table ct-u-colorMotive">
                  <td><img src="public/assets/site/images/content/chivas.png" className="ct-cart-img img-responsive"/></td>
                  <td>chivas regal 25</td>
                  <td>
                    <div className="ct-cart-quantity">
                     <button className="js-form-number-dec"><span>-</span></button>
                     <input id="number" name="number" type="number" value="0" min="0" max="100" readonly className="ct-number"/>
                     <button className="js-form-number-inc"><span>+</span></button>
                    </div>
                  </td>
                  <td>1.000.000VNĐ</td>
                  <td>1.000.000VNĐ</td>
                  <td><button className="x-btn"><i className="fa fa-times"></i></button></td>
                </tr>

                <tr className="ct-body-table ct-u-colorMotive">
                  <td><img src="public/assets/site/images/content/chivas.png" className="ct-cart-img img-responsive"/></td>
                  <td>chivas regal 25</td>
                  <td>
                    <div className="ct-cart-quantity">
                     <button className="js-form-number-dec"><span>-</span></button>
                     <input id="number" name="number" type="number" value="0" min="0" max="100" readonly className="ct-number"/>
                     <button className="js-form-number-inc"><span>+</span></button>
                    </div>
                  </td>
                  <td>1.000.000VNĐ</td>
                  <td>1.000.000VNĐ</td>
                  <td><button className="x-btn"><i className="fa fa-times"></i></button></td>
                </tr>

                <tr className="ct-body-table ct-u-colorDark">
                  <td colspan="6">
                    <button className="ct-cart-body-btn">continue shopping</button>
                    <button className="ct-cart-body-btn">update shopping cart</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div id="cart-script-blog"></div>
      </section>
    );
  }
}

export default CartContents
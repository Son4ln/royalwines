import React from 'react';
import ReactDOM from 'react-dom';


class CartAside extends React.Component {
  constructor() {
    super();
  }

  render() {
  
    return(
    <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
      <div className="ct-sidebar-inner">
        <div className="item">
          <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          <h2 className="ct-u-font2 text-uppercase animated " data-fx="flipInY">giỏ hàng<br/>của bạn</h2>
          <p className="animated" data-fx="fadeIn">Etiam vitae tempus lorem. Interdum et malesuada</p>
          <hr className="hr-custom ct-js-background ct-u-paddingTop15 animated ct-u-paddingTop40" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>
      </div>
    </section>
    );
  }
}

export default CartAside
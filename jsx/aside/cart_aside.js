import React from 'react';
import ReactDOM from 'react-dom';


class CartAside extends React.Component {
  constructor() {
    super();
  }

  render() {
  
    return(
      <div className="ct-u-displayTable">
      <div className="ct-sidebar-inner">
        <div className="item">
          <hr className="hr-custom ct-js-background ct-u-paddingTop15 animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          <h2 className="ct-u-font2 text-uppercase animated" data-fx="flipInY">giỏ hàng</h2>
          <p className="animated" data-fx="fadeIn">Maecenas eu posuere leo. Donec quis facilisis leo</p>
          <hr className="hr-custom ct-js-background ct-u-paddingTop15 animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>
      </div>
      </div>
    );
  }
}

export default CartAside
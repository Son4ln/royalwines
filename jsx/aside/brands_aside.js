import React from 'react';
import ReactDOM from 'react-dom';


class BrandsAside extends React.Component {
  constructor() {
    super();
  }

  render() {
  
    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner rw">
          <div className="item">
            <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
            <h2 className="ct-u-font2 text-uppercase animated" data-fx="flipInY">giỏ hàng</h2>
            <p className="animated" data-fx="fadeIn">Đây là cái mô tả</p>
            <hr className="hr-custom ct-js-background ct-u-paddingTop15 animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          </div>
        </div>
      </section>
    );
  }
}

export default BrandsAside
import React from 'react';
import ReactDOM from 'react-dom';


class WishlistAside extends React.Component {
  constructor() {
    super();
  }

  componentWillMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);
  }

  render() {
    let style_img = {
      width: '40%'
    }

    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner">
          <div className="item">
            <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
            <h2 className="ct-u-font2 text-uppercase animated " data-fx="flipInY">sản phẩm<br/>yêu thích</h2>
            <p className="animated" data-fx="fadeIn">Etiam vitae tempus lorem. Interdum et malesuada</p>
            <hr className="hr-custom ct-js-background ct-u-paddingTop15 animated ct-u-paddingTop40" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          </div>
        </div>
      </section>
    );
  }
}

export default WishlistAside
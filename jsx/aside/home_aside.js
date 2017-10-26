import React from 'react';
import ReactDOM from 'react-dom';


class HomeAside extends React.Component {
  constructor() {
    super();
  }

  componentWillMount() {
    
  }

  render() {
    let style_img = {
      width: '40%'
    }

    return(
      <div className="ct-js-owl" data-animations="true" data-height="100%" data-snap-ignore="true">
        <div className="item">
          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated" data-fx="fadeInDown" 
          data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          <h2 className="ct-u-font2 text-uppercase animated" data-fx="flipInY">Chào mừng đến với<br />
            <img src="/public/assets/site/images/content/logo2.png" style={style_img} />
          </h2>

          <p className="animated" data-fx="fadeIn">
            Vivamus iaculis placerat diam, laoreet posuere
            <br />dui aliquet ut.Praesent lacinia eleifend<br />eros, ac venenatis orci.
          </p>

          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated ct-u-paddingTop60" 
          data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>
        <div className="item">
          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated" 
          data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />

          <h2 className="ct-u-font2 text-uppercase animated" data-fx="flipInY">
            Chào mừng đến với<br /><img src="/public/assets/site/images/content/logo2.png" style={style_img} />
          </h2>

          <p className="animated" data-fx="fadeIn">
            Vivamus iaculis placerat diam, laoreet posuere<br />dui aliquet ut.Praesent lacinia eleifend
            <br />eros, ac venenatis orci.
          </p>

          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated ct-u-paddingTop60" 
          data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>

        <div id="script-block">

        </div>
      </div>
    );
  }
}

export default HomeAside
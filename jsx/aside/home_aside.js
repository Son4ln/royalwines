import React from 'react';
import ReactDOM from 'react-dom';

import {renderMainScript} from '../utils'

class HomeAside extends React.Component {
  constructor() {
    super();

    this.state = {
      bannersArr: []
    }
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=getBanner').then(res => this.getBanner(res.data));
  }

  componentDidMount() {
    
  }

  getBanner(data) {
    let bannerArr = [];
    for(let item of data) {
      let banner = JSON.parse(item);
      bannerArr.push(banner);
    }

    this.setState({bannersArr: bannerArr});
  }

  renderBanner() {
    let renderArr = [];
    let bannersArr = this.state.bannersArr;
    for (let banner of bannersArr) {
      let content = (
        <div className="item">
          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated" 
          data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />

          <h2 className="ct-u-font2 text-uppercase animated" data-fx="flipInY">
            {banner.slide_title}
          </h2>

          <p className="animated" data-fx="fadeIn">
            {banner.slide_description}
          </p>

          <a href={banner.link} className="btn btn-lg btn-default animated" data-fx="fadeIn" data-hover="Chi tiết!"><span>Chi tiết!</span></a>

          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated ct-u-paddingTop60" 
          data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>
      );

      renderArr.push(content);
    }

    return renderArr;
  }

  render() {
    let scriptBlock = document.getElementById('home-script-block');
    if (scriptBlock) {
      renderMainScript(scriptBlock);
    }

    let style_img = {
      width: '40%'
    }

    return(
      <section className="sidebar ct-sidebar ct-js-sidebar ct-js-background ct-u-displayNone ct-big-gallery" 
      data-bg="/public/assets/site/images/content/demo2.jpg" data-bgrepeat="no-repeat">
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

          <a href="#" className="btn btn-lg btn-default animated" data-fx="fadeIn" data-hover="Hết hồn"><span>Hover zô!</span></a>
          
          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated ct-u-paddingTop60" 
          data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>

        {this.renderBanner()}
      </div>
      </section>
    );
  }
}

export default HomeAside
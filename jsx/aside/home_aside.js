import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';

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
    let thisPage = this.props.getCurrentPage;
    thisPage("home");
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
            mang đến sự tiện nghi và thoải mái nhất, 
            <br />bạn sẽ được phục vụ với cung cách hoàng gia <br />mà chỉ có Royalwines mới làm được.
          </p>
          
          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated ct-u-paddingTop60" 
          data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>

        <div className="item">
          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated" data-fx="fadeInDown" 
          data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          <h2 className="ct-u-font2 text-uppercase animated" data-fx="flipInY">THÚ THƯỞNG THỨC RƯỢU <br/>
          VÀ NHỮNG ĐIỀU CẦN BIẾT
          </h2>

          <p className="animated" data-fx="fadeIn">
            Để hiểu rõ hơn về cách thưởng thức rượu, những khái niệm cơ bản về hương thơm, mùi vị của rượu yếu tố ảnh 
            hưởng trực tiếp đến các giác quan là điều vô cùng quan trọng.
          </p>

          <Link to="/chi-tiet-bai-viet/16" className="btn btn-lg btn-default animated" data-fx="fadeIn" data-hover="Chi tiết!"><span>Chi tiết!</span></Link>
          
          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated ct-u-paddingTop60" 
          data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>

        <div className="item">
          <hr className="hr-custom ct-js-background hidden-md hidden-sm hidden-xs animated" data-fx="fadeInDown" 
          data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          <h2 className="ct-u-font2 text-uppercase animated" data-fx="flipInY">QUY TRÌNH SẢN XUẤT<br/>RƯỢU VANG
          </h2>

          <p className="animated" data-fx="fadeIn">
            Rượu vang được làm từ các loại nho nguyên chất và được lên men một cách tự nhiên, vì nho vốn có hai đặc tính tự nhiên là đường và men nên
          </p>

          <Link to="/chi-tiet-bai-viet/7" className="btn btn-lg btn-default animated" data-fx="fadeIn" data-hover="Chi tiết!"><span>Chi tiết!</span></Link>
          
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
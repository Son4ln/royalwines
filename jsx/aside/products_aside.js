import React from 'react';
import ReactDOM from 'react-dom';


class ProductsAside extends React.Component {
  constructor() {
    super();
  }

  componentWillMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);
  }

  componentDidMount() {
    $( ".ct-slide" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 0, 500 ],
      slide: function( event, ui ) {
      $( ".ct-slide-box" ).text(  "TỪ: " + ui.values[ 0 ] + "VNĐ - ĐẾN: "  + ui.values[ 1 ]+ "VNĐ " );                
      },
    })
  }

  render() {
    let style_img = {
      width: '40%'
    }

    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner">
          <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="assets/images/hr2.png" data-bgrepeat="no-repeat" />
          <h2 className="ct-u-font2 text-uppercase animated " data-fx="flipInY">sản phẩm</h2>
          <section className="widget">
            <div className="widget-inner">
              <h4 className="widget-title ct-u-font1 ct-u-paddingBottom10">xuất xứ</h4>
              <ul className="ct-u-font2 text-center">
                <li><a href="#">champagne</a></li>
                <li><a href="#">wine</a></li>
                <li><a href="#">black label</a></li>
                <li><a href="#">gin</a></li>
                <li><a href="#">chivas</a></li>
              </ul>
            </div>
          </section>
          <section className="widget">
            <form role="search" className="search-form">
              <input type="search" className="form-control" placeholder="Search product" />
              <input type="submit" value="search" />
            </form>
          </section>


          <section className="widget hidden-xs">
            <h4 className="widget-title ct-u-font1 ct-u-paddingBottom5">bộ lọc giá</h4>
            <div className="ct-slide"></div>
            <div className="ct-slide-box ct-u-paddingBoth20 text-uppercase">từ: 0VNĐ - đến: 500VNĐ</div>
          </section>

          <section className="widget">
            <input className="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1"/>
            <label for="styled-checkbox-1" className="ct-u-font2 ct-u-size18">Chỉ hiển thị sản phẩm giảm giá</label>
          </section>
          <hr className="hr-custom ct-js-background animated ct-u-paddingTop30" data-fx="fadeInDown" data-bg="assets/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>
      </section>
    );
  }
}

export default ProductsAside
import React from 'react';
import ReactDOM from 'react-dom';
import { Link, Redirect } from 'react-router-dom';
import { formatCurrency } from '../utils';


class ProductsAside extends React.Component {
  constructor() {
    super();

    this.state = {
      renderCate: []
    };

    this.renderCate = this.renderCate.bind(this);
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=getCate').then(res => this.renderCate(res.data));
  }

  componentDidMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);

    $('#search-products').keyup((e) => {
      this.submitSearch(e);
    });
  }

  submitSearch(e) {
    let search_val = $(e.target).val();
    let search_func = this.props.getSearch;
    search_func(search_val)
  }

  renderCate(data) {
    let arr = [];
    for(let item of data) {
      let item_encode = JSON.parse(item);
      let url = `/san-pham/${item_encode.category_id}`;
      let content = (
        <li><Link to={url}>{item_encode.category_name}</Link></li>
      );

      arr.push(content);
    }

    this.setState({
      renderCate: arr
    });
  }

  render() {
    let style_img = {
      width: '40%'
    }

    if(window.location.pathname !== '/san-pham/sell-off') {
      $('#styled-checkbox-1').prop( "checked", false );
    } else {
      $('#styled-checkbox-1').prop( "checked", true );
    }

    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner">
          <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          <h2 className="ct-u-font2 text-uppercase animated " data-fx="flipInY">sản phẩm</h2>
          <section className="widget">
            <div className="widget-inner">
              <h4 className="widget-title ct-u-font1 ct-u-paddingBottom10">xuất xứ</h4>
              <ul className="ct-u-font2 text-center">
                <li><Link to="/san-pham/0">TẤT CẢ SẢN PHẨM</Link></li>
                {this.state.renderCate}
              </ul>
            </div>
          </section>
          <section className="widget">
            <div role="search" className="search-form">
              <input type="search" id="search-products" className="form-control" placeholder="Search product" />
            </div>
          </section>

          <section className="widget">
            <Link to="/san-pham/sell-off" id="sell-off">
              <input className="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1"/>
              <label for="styled-checkbox-1" className="ct-u-font2 ct-u-size18">Chỉ hiển thị sản phẩm giảm giá</label>
            </Link>
          </section>
          <hr className="hr-custom ct-js-background animated ct-u-paddingTop30" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>
      </section>
    );
  }
}

export default ProductsAside
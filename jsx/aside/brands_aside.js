import React from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';

class BrandsAside extends React.Component {
  constructor() {
    super();

    this.state = {
      renderBrands: []
    }
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=getBrands')
    .then(res => this.getBrands(res.data));
  }

  componentDidMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);
    let thisPage = this.props.getCurrentPage;
    thisPage("brands");
  }

  getBrands(data) {
    let arr = [];
    for (let item of data) {
      let item_encode = JSON.parse(item);
      let img_url = `/upload/brands/${item_encode.brand_logo}`;
      let url = `/nhan-hieu/${item_encode.brand_id}`;
      let content = (
        <div className="item">
          <Link to={url}>
            <section className="ct-frame ct-frame--motive ct-u-backgroundWhite ct-box3" >
              <img src={img_url} />           
            </section>
          </Link>
        </div>
      );

      arr.push(content);
    }

    this.setState({
      renderBrands: arr
    });
  }

  render() {
  
    return(
      <section className="ct-sidebar ct-brands-aside ct-js-sidebar ct-js-background ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-brands-item">
          {this.state.renderBrands}
        </div>
      </section>
    );
  }
}

export default BrandsAside
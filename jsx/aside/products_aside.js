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

  render() {
    let style_img = {
      width: '40%'
    }

    return(
      <div>
        <h2>sản phẩm</h2>
      </div>
    );
  }
}

export default ProductsAside
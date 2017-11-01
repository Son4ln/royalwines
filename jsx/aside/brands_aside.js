import React from 'react';
import ReactDOM from 'react-dom';


class BrandsAside extends React.Component {
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
  
    return(
      <section className="ct-sidebar ct-brands-aside ct-js-sidebar ct-js-background ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-brands-item">
          <div className="item">
            <a href="#">
              <section className="ct-frame ct-frame--motive ct-u-backgroundWhite ct-box3" >
                <img src="/public/assets/site/images/content/brand1.png" />           
              </section>
            </a>
          </div>

          <div className="item">
            <a href="#">
              <section className="ct-frame ct-frame--motive ct-u-backgroundWhite ct-box3" >
                <img src="/public/assets/site/images/content/brand1.png" />           
              </section>
            </a>
          </div>

          <div className="item">
            <a href="#">
              <section className="ct-frame ct-frame--motive ct-u-backgroundWhite ct-box3" >
                <img src="/public/assets/site/images/content/brand1.png" />           
              </section>
            </a>
          </div>

          <div className="item">
            <a href="#">
              <section className="ct-frame ct-frame--motive ct-u-backgroundWhite ct-box3" >
                <img src="/public/assets/site/images/content/brand1.png" />           
              </section>
            </a>
          </div>

          <div className="item">
            <a href="#">
              <section className="ct-frame ct-frame--motive ct-u-backgroundWhite ct-box3" >
                <img src="/public/assets/site/images/content/brand1.png" />           
              </section>
            </a>
          </div>
        </div>
      </section>
    );
  }
}

export default BrandsAside
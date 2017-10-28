import React from 'react';
import ReactDOM from 'react-dom';

class BrandsContents extends React.Component {
  constructor() {
    super();
  }

  render() {
    return(
      <section className="ct-content">
        <div className="row ct-js-masonry">
          <div className="col-sm-6 ct-js-masonryItem"></div>

          <div className="col-sm-12 ct-js-masonryItem">
            Trang nhãn hiệu
          </div>
        </div>
      </section>
    );
  }
}

export default BrandsContents
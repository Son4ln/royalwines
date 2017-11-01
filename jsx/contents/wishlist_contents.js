import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
import { renderMainScript } from '../utils';

class WishlistContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('wishlist-script-blog');
    renderMainScript(scriptBlock);
  }

  render() {
    return(
      <section className="ct-content">
        <div className="row ct-js-masonry">
          <div className="col-sm-6 ct-js-masonryItem"></div>
            
          <div className="col-xs-12 ct-u-padding0">
            <div className="overflow-x">
              <table className="ct-cart-table ct-u-font2 text-uppercase ct-u-size20">
                <thead className="ct-head-table">
                  <tr>
                    <th>ảnh</th>
                    <th>tên</th>
                    <th>xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <tr className="ct-body-table ct-u-colorMotive">
                    <td><Link to=""><img src="public/assets/site/images/content/chivas.png" className="ct-cart-img img-responsive"/></Link></td>
                    <td className="ct-cart-name">chivas regal 25</td>
                    <td><button className="x-btn"><i className="fa fa-times"></i></button></td>
                  </tr>

                  <tr className="ct-body-table ct-u-colorMotive">
                    <td><Link to=""><img src="public/assets/site/images/content/chivas.png" className="ct-cart-img img-responsive"/></Link></td>
                    <td className="ct-cart-name">chivas regal 25</td>
                    <td><button className="x-btn"><i className="fa fa-times"></i></button></td>
                  </tr>

                  <tr className="ct-body-table ct-u-colorMotive">
                    <td><Link to=""><img src="public/assets/site/images/content/chivas.png" className="ct-cart-img img-responsive"/></Link></td>
                    <td className="ct-cart-name">chivas regal 25</td>
                    <td><button className="x-btn"><i className="fa fa-times"></i></button></td>
                  </tr>

                  <tr className="ct-body-table ct-u-colorMotive">
                    <td><Link to=""><img src="public/assets/site/images/content/chivas.png" className="ct-cart-img img-responsive"/></Link></td>
                    <td className="ct-cart-name">chivas regal 25</td>
                    <td><button className="x-btn"><i className="fa fa-times"></i></button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div id="wishlist-script-blog"></div>
      </section>
    );
  }
}

export default WishlistContents
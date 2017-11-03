import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
import { connect } from 'react-redux';
import { renderMainScript } from '../utils';
import WishItem from './components/wish_item';
import * as actions from '../store/actions'

class WishlistContents extends React.Component {
  constructor() {
    super();

    this.onDelWish = this.onDelWish.bind(this);
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('wishlist-script-blog');
    renderMainScript(scriptBlock);
  }

  onDelWish(index) {
    let onDel = this.props.onDeleteWishItem;
    onDel(index);
  }

  renderWishList() {
    let list = this.props.rw_wish;
    let content = (
      <tr><td colspan="6" className="text-center"><h1>CHƯA CÓ SẢN PHẨM!</h1></td></tr>
    );

    if(list.length > 0) {
      content = (
        list.map((e, i) => <WishItem key={i} index={i} wishItem={list[i]} onDelWish={this.onDelWish}/>)
      );
    }

    return content;
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
                  {this.renderWishList()}
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

const mapStateToProps = (state) => {
  return {
    rw_wish: state.rw_wish
  }
}

const mapDispatchToProps = (dispatch) => {
  return {
    onDeleteWishItem: (index) => {dispatch(actions.delete_wish_item(index))}
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(WishlistContents);
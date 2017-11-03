import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';

class WishItem extends React.Component {
  constructor() {
    super();

    this.state = {
      img_url: ''
    }

    this.onDelWish = this.onDelWish.bind(this);
  }

  componentDidMount() {
    this.setState({
      img_url: `/upload/products/${this.props.wishItem.featured_img}`
    });
  }

  onDelWish() {
    let index = this.props.index;
    let onDelete = this.props.onDelWish;
    onDelete(index);
  }

  render() {
    return(
      <tr className="ct-body-table ct-u-colorMotive">
        <td><Link to=""><img src={this.state.img_url} className="ct-cart-img img-responsive"/></Link></td>
        <td className="ct-cart-name">{this.props.wishItem.product_name}</td>
        <td><button className="x-btn" onClick={this.onDelWish}><i className="fa fa-times"></i></button></td>
      </tr>
    );
  }
}

export default WishItem;
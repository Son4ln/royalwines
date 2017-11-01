import React from 'react';
import ReactDOM from 'react-dom';
import { Route, Switch } from 'react-router-dom';

import HomeContents from './contents/home_contents';
import CartContents from './contents/cart_contents';
import WishlistContents from './contents/wishlist_contents';
import CheckoutContents from './contents/checkout_contents';
import BrandsContents from './contents/brands_contents';
import ProductsContents from './contents/products_contents';
import BlogsContents from './contents/blogs_contents';
import LoginContents from './contents/login_contents';

class Contents extends React.Component {
  constructor() {
    super();
  }

  render() {
    return(
      <Switch>
        <Route exact path='/' render={() => <HomeContents />}/>
        <Route exact path='/gio-hang' render={() => <CartContents />}/>
        <Route exact path='/yeu-thich' render={() => <WishlistContents />}/>
        <Route exact path='/thanh-toan' render={() => <CheckoutContents />}/> 
        <Route exact path='/nhan-hieu' render={() => <BrandsContents />}/>
        <Route exact path='/san-pham' render={() => <ProductsContents />}/>
        <Route exact path='/bai-viet' render={() => <BlogsContents />}/>
        <Route exact path='/dang-nhap' render={() => <LoginContents />}/>
      </Switch>
    );
  }
}

export default Contents
import React from 'react';
import ReactDOM from 'react-dom';
import { Route, Switch } from 'react-router-dom';

import HomeContents from './contents/home_contents';
import CartContents from './contents/cart_contents';
import WishlistContents from './contents/wishlist_contents';
import BrandsContents from './contents/brands_contents';
import ProductsContents from './contents/products_contents';

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
        <Route exact path='/nhan-hieu' render={() => <BrandsContents />}/>
        <Route exact path='/san-pham' render={() => <ProductsContents />}/>
      </Switch>
    );
  }
}

export default Contents
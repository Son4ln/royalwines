import React from 'react';
import ReactDOM from 'react-dom';
import { Route, Switch } from 'react-router-dom';

import HomeAside from './aside/home_aside';
import CartAside from './aside/cart_aside';
import WishlistAside from './aside/wishlist_aside';
import CheckoutAside from './aside/checkout_aside';
import BrandsAside from './aside/brands_aside';
import ProductsAside from './aside/products_aside';
import BlogsAside from './aside/blogs_aside';
import LoginAside from './aside/login_aside';

class Aside extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
  }

  render() {
    return(
       
        <Switch>
          <Route exact path='/' render={() => <HomeAside />}/>
          <Route exact path='/gio-hang' render={() => <CartAside />}/>
          <Route exact path='/yeu-thich' render={() => <WishlistAside />}/>
          <Route exact path='/thanh-toan' render={() => <CheckoutAside />}/>
          <Route exact path='/nhan-hieu' render={() => <BrandsAside />}/>
          <Route exact path='/san-pham' render={() => <ProductsAside />}/>
          <Route exact path='/bai-viet' render={() => <BlogsAside />}/>
          <Route exact path='/dang-nhap' render={() => <LoginAside />}/>
        </Switch>
    );
  }
}

export default Aside
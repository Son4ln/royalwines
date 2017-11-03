import React from 'react';
import ReactDOM from 'react-dom';
import { Route, Switch } from 'react-router-dom';

import HomeAside from './aside/home_aside';
import CartAside from './aside/cart_aside';
import WishlistAside from './aside/wishlist_aside';
import CheckoutAside from './aside/checkout_aside';
import BrandsAside from './aside/brands_aside';
import ProductsAside from './aside/products_aside';
import ProductDetailAside from './aside/product_detail_aside';
import BlogsAside from './aside/blogs_aside';
import BlogDetailAside from './aside/blog_detail_aside';
import ContactAside from './aside/contact_aside';
import LoginAside from './aside/login_aside';
import EditProfileAside from './aside/edit_profile_aside';

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
          <Route exact path='/chi-tiet-san-pham' render={() => <ProductDetailAside />}/>
          <Route exact path='/bai-viet' render={() => <BlogsAside />}/>
          <Route exact path='/chi-tiet-bai-viet' render={() => <BlogDetailAside />}/>
          <Route exact path='/lien-he' render={() => <ContactAside />}/>
          <Route exact path='/dang-nhap' render={() => <LoginAside />}/>
          <Route exact path='/chinh-sua' render={() => <EditProfileAside />}/>
        </Switch>
    );
  }
}

export default Aside
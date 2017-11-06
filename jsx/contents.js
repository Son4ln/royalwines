import React from 'react';
import ReactDOM from 'react-dom';
import { Route, Switch } from 'react-router-dom';

import HomeContents from './contents/home_contents';
import CartContents from './contents/cart_contents';
import WishlistContents from './contents/wishlist_contents';
import CheckoutContents from './contents/checkout_contents';
import BrandsContents from './contents/brands_contents';
import ProductsContents from './contents/products_contents';
import ProductDetailContents from './contents/product_detail_contents';
import BlogsContents from './contents/blogs_contents';
import BlogDetailContents from './contents/blog_detail_contents';
import ContactContents from './contents/contact_contents';
import LoginContents from './contents/login_contents';
import EditProfileContents from './contents/edit_profile_contents';
import AboutContents from './contents/about_contents';

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
        <Route exact path='/nhan-hieu/:brand_id' render={({match}) => <BrandsContents match={match}/>}/>
        <Route exact path='/san-pham/:cate_id' render={({match}) => <ProductsContents match={match}
        searchVal={this.props.searchVal} limit={9}/>}/>
        <Route exact path='/chi-tiet-san-pham/:id' render={({match}) => <ProductDetailContents match={match}/>}/>
        <Route exact path='/bai-viet' render={() => <BlogsContents searchNews={this.props.searchNewsVal}/>}/>
        <Route exact path='/chi-tiet-bai-viet/:id' render={({match}) => <BlogDetailContents match={match}/>}/>
        <Route exact path='/lien-he' render={() => <ContactContents />}/>
        <Route exact path='/dang-nhap' render={() => <LoginContents />}/>
        <Route exact path='/chinh-sua' render={() => <EditProfileContents />}/>
        <Route exact path='/thong-tin' render={() => <AboutContents />}/>
      </Switch>
    );
  }
}

export default Contents
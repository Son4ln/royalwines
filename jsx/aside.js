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
import AboutAside from './aside/about_aside';

class Aside extends React.Component {
  constructor() {
    super();

    this.getSearch = this.getSearch.bind(this);
    this.getSearchNews = this.getSearchNews.bind(this);
    this.getCurrentPage = this.getCurrentPage.bind(this);
  }

  getSearch(text) {
    let search = this.props.getSearch;
    search(text);
  }

  getSearchNews(text) {
    let search = this.props.searchNewsVal;
    search(text);
  }

  getCurrentPage(page) {
    let thisPage = this.props.getCurrentPage;
    thisPage(page);
  }

  render() {
    return(
      <Switch>
        <Route exact path='/' render={() => <HomeAside getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/gio-hang' render={() => <CartAside getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/yeu-thich' render={() => <WishlistAside getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/thanh-toan' render={() => <CheckoutAside getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/nhan-hieu/:brand_id' render={({match}) => <BrandsAside match={match} getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/san-pham/:cate_id' render={({match}) => <ProductsAside getSearch={this.getSearch} match={match} getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/chi-tiet-san-pham/:id' render={({match}) => <ProductDetailAside match={match} getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/bai-viet' render={() => <BlogsAside getSearchNews={this.getSearchNews} getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/chi-tiet-bai-viet/:id' render={({match}) => <BlogDetailAside match={match} getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/lien-he' render={() => <ContactAside getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/dang-nhap' render={() => <LoginAside getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/chinh-sua' render={() => <EditProfileAside getCurrentPage={this.getCurrentPage}/>}/>
        <Route exact path='/thong-tin' render={() => <AboutAside getCurrentPage={this.getCurrentPage}/>}/>
      </Switch>
    );
  }
}

export default Aside
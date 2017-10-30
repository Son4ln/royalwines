import React from 'react';
import ReactDOM from 'react-dom';
import { Route, Switch } from 'react-router-dom';

import HomeAside from './aside/home_aside';
import CartAside from './aside/cart_aside';
import BrandsAside from './aside/brands_aside';
import ProductsAside from './aside/products_aside';

class Aside extends React.Component {
  constructor() {
    super();
  }

  // componentDidMount() {
  //   function appear() {
  //     $('.cssAnimate .animated').appear(function () {
  //       var $this = $(this);

  //       $this.each(function () {
  //         if ($this.data('time') != undefined) {
  //           setTimeout(function () {
  //             $this.addClass('activate');
  //             $this.addClass($this.data('fx'));
  //         }, $this.data('time'));
  //         } else {
  //           $this.addClass('activate');
  //           $this.addClass($this.data('fx'));
  //         }
  //       });
  //     }, {accX: 50, accY: -50});
  //   }

  //   if ($().appear) {
  //     if (device.mobile() || device.tablet()) {
  //       $("body").removeClass("cssAnimate");
  //     } else {
  //       appear();
  //     }
  //   }
  // }

  render() {
    return(
       
        <Switch>
          <Route exact path='/' render={() => <HomeAside />}/>
          <Route exact path='/gio-hang' render={() => <CartAside />}/>
          <Route exact path='/nhan-hieu' render={() => <BrandsAside />}/>
          <Route exact path='/san-pham' render={() => <ProductsAside />}/>          
        </Switch>
    );
  }
}

export default Aside
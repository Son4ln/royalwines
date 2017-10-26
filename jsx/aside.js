import React from 'react';
import ReactDOM from 'react-dom';
import { Route, Switch } from 'react-router-dom';

import HomeAside from './aside/home_aside';
import BrandsAside from './aside/brands_aside';
import ProductsAside from './aside/products_aside';

class Aside extends React.Component {
  constructor() {
    super();
  }

  render() {
    return(
       <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayNone ct-big-gallery" 
      data-bg="/public/assets/site/images/content/demo2.jpg" data-bgrepeat="no-repeat">
        <Switch>
          <Route exact path='/' render={() => <HomeAside />}/>
          <Route exact path='/nhan-hieu' render={() => <BrandsAside />}/>
          <Route exact path='/san-pham' render={() => <ProductsAside />}/>
        </Switch>
      </section>
    );
  }
}

export default Aside
import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';
import { Provider } from 'react-redux';
import store from './store';

import Menu from './nav';
import AsideHeader from './aside_header';
import Aside from './aside';
import Contents from './contents';

class HomePage extends React.Component {
  constructor() {
    super();
  }

  render() {
    return(
      <Provider store={store}>
        <Router basename="/">
          <div>
            <Menu />
            <div id="ct-js-wrapper" className="ct-pageWrapper">
              <AsideHeader />
              <Aside />
              <Contents />
              <a href="#" id="toTop"><i className="fa fa-angle-up"></i></a>
            </div>
          </div>
        </Router>
      </Provider>
    );
  }
}

ReactDOM.render(<HomePage />, document.getElementById('rw-wrapper'));
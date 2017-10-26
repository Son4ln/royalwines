import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';

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
      <Router basename="/">
        <div>
          <Menu />
          <AsideHeader />
          <Aside />
          <Contents />
          <a href="#" id="toTop"><i className="fa fa-angle-up"></i></a>
        </div>
      </Router>
    );
  }
}

ReactDOM.render(<HomePage />, document.getElementById('rw-wrapper'));
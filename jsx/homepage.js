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

    this.state = {
      searchVal: '',
      searchNewsVal: ''
    }

    this.getSearch = this.getSearch.bind(this);
    this.getSearchNews = this.getSearchNews.bind(this);
  }

  getSearch(text) {
    this.setState({
      searchVal: text
    });
  }

  getSearchNews(text) {
    this.setState({
      searchNewsVal: text
    });
  }

  render() {
    return(
      <Provider store={store}>
        <Router basename="/">
          <div>
            <Menu />
            <div id="ct-js-wrapper" className="ct-pageWrapper">
              <AsideHeader />
              <Aside searchNewsVal={this.getSearchNews} getSearch={this.getSearch}/>
              <Contents searchNewsVal={this.state.searchNewsVal} searchVal={this.state.searchVal}/>
              <a href="#" id="toTop"><i className="fa fa-angle-up"></i></a>
            </div>
          </div>
        </Router>
      </Provider>
    );
  }
}

ReactDOM.render(<HomePage />, document.getElementById('rw-wrapper'));
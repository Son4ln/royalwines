import React from 'react';
import { Redirect } from 'react-router-dom';

export default class PageNotFound extends React.Component {

  componentDidMount() {
    window.location.href = '/404.html';
  }
  render() {
    return (<div>Something wrong!!!</div>);
  }
}
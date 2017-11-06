import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class AboutContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    axios.get('/site/controller/controller.php?action=contactInfo').then(res => this.contactInfo(res.data));

    let scriptBlock = document.getElementById('about-script-blog');
    renderMainScript(scriptBlock);
  }

  contactInfo(data) {
    $('#store_name').html(data.store_name);
    let slogan = '"' + data.slogan + '"';
    $('#slogan').html(slogan);
    $('#about').html(data.introduce);
    $('#event').html(data.event);
    $('#rules').html(data.rules);
  }

  render() {
    return(
      <section className="ct-content">
        <section className="ct-frame ct-frame--white">
          <h3 className="ct-u-font1 text-uppercase text-center" id="store_name"></h3>
          <center><p className="ct-u-font2 ct-u-size18" id="slogan"></p></center>

          <ul className="nav nav-tabs ct-u-paddingTop10" role="tablist" id="myTab">
            <li role="presentation" className="ct-navbarTabs--default active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">Giới Thiệu</a></li>
            <li role="presentation" className="ct-navbarTabs--default"><a href="#event" aria-controls="event" role="tab" data-toggle="tab">Sự Kiện</a></li>
            <li role="presentation" className="ct-navbarTabs--default"><a href="#rules" aria-controls="rules" role="tab" data-toggle="tab">Điều Khoản</a></li>
          </ul>

          <div className="tab-content">
            <div role="tabpanel" className="tab-pane fade in active" id="about">
            </div>
            <div role="tabpanel" className="tab-pane fade" id="event">
            </div>
            <div role="tabpanel" className="tab-pane fade" id="rules">
            </div>
          </div>
          <p></p>
        </section>
        <div id="about-script-blog"></div>
      </section>
    );
  }
}

export default AboutContents
import React from 'react';
import ReactDOM from 'react-dom';


class EditProfileAside extends React.Component {
  constructor() {
    super();
  }

  componentWillMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);
  }

  componentDidMount() {
    let thisPage = this.props.getCurrentPage;
    thisPage("edit-profile");
  }

  render() {
  
    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner">
          <div className="item">
            <img src="/public/assets/site/images/profile2.png" className="img-responsive img-circle ct-big-profileImg center-block animated" data-fx="flipInY" />
            <a href="#" className="btn btn-lg btn-default animated activate fadeIn ct-u-marginTop20" data-fx="flipInY" data-hover="cập nhật ảnh đại diện">
            <span>cập nhật ảnh đại diện</span></a>
          </div>
        </div>
      </section>
    );
  }
}

export default EditProfileAside
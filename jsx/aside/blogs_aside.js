import React from 'react';
import ReactDOM from 'react-dom';


class BlogsAside extends React.Component {
  constructor() {
    super();
  }

  componentWillMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);
  }

  render() {
  
    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner">
          <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="assets/images/hr2.png" data-bgrepeat="no-repeat" />
          <h2 className="ct-u-font2 text-uppercase animated " data-fx="flipInY">bài viết</h2>
          <section className="widget">
            <form role="search" className="search-form">
              <input type="search" className="form-control" placeholder="Tìm kiếm bài viết" />
              <input type="submit" value="search" />
            </form>
          </section>

          <section className="widget text-left">
            <h4 className="widget-title ct-u-font1 ct-u-paddingBottom5">bài viết nổi bật</h4>
            <article className="ct-blogItem">
              <div className="ct-blogItem ct-innerMargin">
                <div className="ct-blogItem ct-entryMetaPost">
                  <span className="ct-blogItem ct-entryDate">oct 22, 2104</span>
                </div>
              </div>
              <h4 className="ct-entryPost ct-u-font2">
                <a href="#">jim and nick's and the fatback coll...</a>
              </h4>
            </article>
            <article className="ct-blogItem">
              <div className="ct-blogItem ct-innerMargin">
                <div className="ct-blogItem ct-entryMetaPost">
                  <span className="ct-blogItem ct-entryDate">oct 22, 2104</span>
                </div>
              </div>
              <h4 className="ct-blogItem ct-entryPost ct-u-font2">
                <a href="#">drinking pappy under the live oaks</a>
              </h4>
            </article>
            <article className="ct-blogItem">
              <div className="ct-blogItem ct-innerMargin">
                <div className="ct-blogItem ct-entryMetaPost">
                  <span className="ct-blogItem ct-entryDate">oct 22, 2104</span>
                </div>
              </div>
              <h4 className="ct-blogItem ct-entryPost ct-u-font2">
                <a href="#">hanging out with david cross and t...</a>
              </h4>
            </article>
          </section>
          <hr className="hr-custom ct-js-background animated ct-u-paddingTop30" data-fx="fadeInDown" data-bg="assets/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>
      </section>
    );
  }
}

export default BlogsAside
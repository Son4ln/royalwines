import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class BlogsContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('blogs-script-blog');
    renderMainScript(scriptBlock);
  }

  render() {
    return(
      <section className="ct-content">
        <section className="ct-frame ct-frame--white">
          <article className="ct-blogItem">
             <div className="ct-blogItem ct-blogThumbnail">
               <img src="public/assets/site/images/content/blog-image.jpg"/>
             </div>
             <div className="ct-blogItem ct-innerMargin">
               <div className="ct-blogItem ct-entryMeta">
                 <span className="ct-blogItem ct-entryDate">oct 22, 2104</span>
                 <span className="ct-blogItem ct-catLinks">♦ <a href="#"> news</a></span>
                 <span className="ct-blogItem ct-entryComments">♦ <a href="#"> 3 comments</a></span>
               </div>
               <h3 className="ct-blogItem ct-entryTitle ct-u-font2"><a href="blog-single.html">hihi đây là cái tai tù</a></h3>
               <p className="ct-blogItem ct-entryDescription">còn đây là cái short dec hihi</p>
               <div className="ct-u-paddingBottom10"><a href="blog-single.html" className="btn btn-lg btn-button--brown">read more</a></div>
             </div>
           </article>
        </section>

        <div className="row ct-navigation-blog-outer">
          <div className="col-md-6 col-xs-12 text-left">
            <div className="ct-navigation-blog">
              <a href="#" className="btn btn-lg btn-button--dark"><i className="fa fa-long-arrow-left"></i> bài cũ hơn</a>
            </div>
          </div>
          <div className="col-md-6 col-xs-12 text-right">
            <div className="ct-navigation-blog">
               <a href="#" className="btn btn-lg btn-button--dark">bài mới hơn <i className="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div id="blogs-script-blog"></div>
      </section>
    );
  }
}

export default BlogsContents
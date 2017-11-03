import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class BlogDetailContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('blogdetail-script-blog');
    renderMainScript(scriptBlock);
  }

  render() {
    return(
      <section className="ct-content">
        <section className="ct-frame ct-frame--white">
          <article className="ct-blogItem">
            <div className="ct-blogThumbnail">
              <img src="public/assets/site/images/content/blog-image.jpg" alt="Post Image" />
            </div>
            <div className="ct-blogItem ct-innerMargin">
              <div className="ct-blogItem ct-entryMeta">
                <span className="ct-blogItem ct-entryDate">oct 22, 2104</span>
                <span className="ct-blogItem ct-catLinks">♦ <a href="#"> news</a></span>
                <span className="ct-blogItem ct-entryComments">♦ <a href="#"> 3 comments</a></span>
              </div>
              <h3 className="ct-blogItem ct-entryTitle ct-u-font2 text-uppercase">standard post format with preview image</h3>
              <p>Etiam nunc tortor, ultrices quis turpis, tempor lacinia ligula. Sed at odio vel est lobortis eleifend ac vitae enim.
                Suspendisse est gravida nisi lectus, nisl ullamcorper et. Pellentesque volutpat felis ut nunc elit euismod sollicitudin. Nam ullamcorper nibh eget sem consectetur, et semper elit suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc dictum massa accumsan massa condimentum tempor.
                In dui est, rutrum ultrices vestibulum sed, blandit sit amet ante.</p>
              <p>
                Curabitur porta ipsum eget velit mattis tincidunt. Morbi elit mauris, lacinia a lacinia venenatis, tincidunt id neque.
                Cras luctus orci a nulla sollicitudin lacinia. Aenean ultrices velit justo, luctus rutrum eros dapibus eu. Sed nec iaculis augue. Mauris varius dictum ligula,
                eu suscipit ipsum feugiat et. Sed ac dictum erat. Sed commodo feugiat ligula quis pellentesque.
              </p>
              <p>
                Morbi consequat blandit laoreet. Sed elementum porttitor venenatis.
                Nunc fermentum bibendum velit, vel luctus elit feugiat eu. Maecenas efficitur dictum nisl sit amet maximus.
              </p>
            </div>
          </article>
        </section>
        <div id="blogdetail-script-blog"></div>
      </section>
    );
  }
}

export default BlogDetailContents
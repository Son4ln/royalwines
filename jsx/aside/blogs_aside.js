import React from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class BlogsAside extends React.Component {
  constructor() {
    super();

    this.state = {
      randBlog: []
    }
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=randomNews')
    .then(res => this.getRandNews(res.data));
  }

  componentDidMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);

    $('#news_search').keyup((e) => {
      this.getKeySearch(e);
    });
  }

  getKeySearch(e) {
    let search = this.props.getSearchNews;
    search($(e.target).val())
  }

  getRandNews(data) {
    let arr = [];
    for (let item of data) {
      let item_encode = JSON.parse(item);
      let blog_url = `/chi-tiet-bai-viet/${item_encode.news_id}`;
      let content = (
        <article className="ct-blogItem">
          <div className="ct-blogItem ct-innerMargin">
            <div className="ct-blogItem ct-entryMetaPost">
              <span className="ct-blogItem ct-entryDate">{item_encode.news_date}</span>
            </div>
          </div>
          <h4 className="ct-entryPost ct-u-font2">
            <Link to={blog_url}>{item_encode.news_title}</Link>
          </h4>
        </article>
      );

      arr.push(content);
    }

    this.setState({
      randBlog: arr
    });
  }  

  render() {
  
    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner">
          <hr className="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
          <h2 className="ct-u-font2 text-uppercase animated " data-fx="flipInY">bài viết</h2>
          <section className="widget">
            <div role="search" className="search-form">
              <input type="search" id="news_search" className="form-control" placeholder="Tìm kiếm bài viết" />
            </div>
          </section>

          <section className="widget text-left">
            <h4 className="widget-title ct-u-font1 ct-u-paddingBottom5">bài viết ngẫu nhiên</h4>
            
            {this.state.randBlog}
            
          </section>
          <hr className="hr-custom ct-js-background animated ct-u-paddingTop30" data-fx="fadeInDown" data-bg="/public/assets/site/images/hr2.png" data-bgrepeat="no-repeat" />
        </div>
      </section>
    );
  }
}

export default BlogsAside
import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class BlogDetailContents extends React.Component {
  constructor() {
    super();

    this.state = {
      news: {},
      img_url: ''
    }

    this.getNews = this.getNews.bind(this);
  }

  componentWillReceiveProps(nextProps) {
    axios.get(`/site/controller/controller.php?action=getNewsById&id=${nextProps.match.params.id}`)
    .then(res => this.getNews(res.data));
  }

  componentWillMount() {
    axios.get(`/site/controller/controller.php?action=getNewsById&id=${this.props.match.params.id}`)
    .then(res => this.getNews(res.data));
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('blogdetail-script-blog');
    renderMainScript(scriptBlock);
  }

  getNews(data) {
    this.setState({
      news: data,
      img_url: `/upload/blog/${data.news_image}`
    });

    $("html, body").animate({ scrollTop: 0 }, 500);
  }

  render() {
    $('#news-detail').html(this.state.news.news_detail);
    $('img').addClass('img-responsive center-block');
    return(
      <section className="ct-content">
        <section className="ct-frame ct-frame--white">
          <article className="ct-blogItem">
            <div className="ct-blogThumbnail">
              <img src={this.state.img_url} alt="Post Image" />
            </div>
            <div className="ct-blogItem ct-innerMargin">
              <div className="ct-blogItem ct-entryMeta">
                <span className="ct-blogItem ct-entryDate">{this.state.news.news_date}</span>
              </div>
              <h3 className="ct-blogItem ct-entryTitle ct-u-font2 text-uppercase">{this.state.news.news_title}</h3>
              <div id="news-detail"></div>
            </div>
          </article>
        </section>
        <div id="blogdetail-script-blog"></div>
      </section>
    );
  }
}

export default BlogDetailContents
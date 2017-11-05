import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';
import {Link} from 'react-router-dom';

class BlogsContents extends React.Component {
  constructor() {
    super();

    this.state = {
      renderNews: [],
      limit: 0
    }

    this.searchNews = this.searchNews.bind(this);
  }
  componentWillReceiveProps(nextProps) {
    this.searchNews(nextProps);
  }

  componentWillMount() {
    axios.get(`/site/controller/controller.php?action=getAllNews&limit=${this.state.limit}`)
    .then(res => this.getNews(res.data));
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('blogs-script-blog');
    renderMainScript(scriptBlock);

    $('#next').click(() => {
      this.nextPagination();
    });

    $('#pre').click(() => {
      this.prePagination();
    });
  }

  searchNews(props) {
    if (props.searchNews != '') {
      axios.get(`/site/controller/controller.php?action=searchNews&limit=${this.state.limit}&key=${props.searchNews}`)
      .then(res => this.getNews(res.data));
    } else {
      this.setState({
        limit: 0
      });

      axios.get(`/site/controller/controller.php?action=getAllNews&limit=${this.state.limit}`)
      .then(res => this.getNews(res.data));
    }
  }

  nextPagination() {
    $('#news_loadder').removeClass('hidden');
    $('#pre').removeClass('hidden');
    let limit = this.state.limit;
    this.setState({
      limit: limit + 4
    });

    if (this.props.searchNews !== '') {
      axios.get(`/site/controller/controller.php?action=searchNews&limit=${this.state.limit}&key=${this.props.searchNews}`)
      .then(res => this.getNews(res.data));
      return;
    }

    axios.get(`/site/controller/controller.php?action=getAllNews&limit=${this.state.limit}`)
    .then(res => this.getNews(res.data));
  }

  prePagination() {
    $('#news_loadder').removeClass('hidden');
    let limit = this.state.limit;

    if (limit <= 4) {
      $('#pre').addClass('hidden');
    }

    this.setState({
      limit: limit - 4
    });

    if (this.props.searchNews !== '') {
      axios.get(`/site/controller/controller.php?action=searchNews&limit=${this.state.limit}&key=${this.props.searchNews}`)
      .then(res => this.getNews(res.data));
      return;
    }

    axios.get(`/site/controller/controller.php?action=getAllNews&limit=${this.state.limit}`)
    .then(res => this.getNews(res.data));
  }

  getNews(data) {
    let arr = [];
    $('#news_loadder').addClass('hidden');
    if (data.length > 0) {
      $("html, body").animate({ scrollTop: 0 }, 500);
      $('#next').removeClass('hidden');
      for (let item of data) {
        let item_encode = JSON.parse(item);
        let img_url = `/upload/blog/${item_encode.news_image}`;

        let content = (
          <section className="ct-frame ct-frame--white">
            <article className="ct-blogItem">
               <div className="ct-blogItem ct-blogThumbnail">
                 <img src={img_url}/>
               </div>
               <div className="ct-blogItem ct-innerMargin">
                 <div className="ct-blogItem ct-entryMeta">
                   <span className="ct-blogItem ct-entryDate">{item_encode.news_date}</span>
                 </div>
                 <h3 className="ct-blogItem ct-entryTitle ct-u-font2"><Link to="/">{item_encode.news_title}</Link></h3>
                 <p className="ct-blogItem ct-entryDescription">{item_encode.short_desc}</p>
                 <div className="ct-u-paddingBottom10"><Link to="/" className="btn btn-lg btn-button--brown">Đọc bài viết</Link></div>
               </div>
             </article>
          </section>
        );

        arr.push(content);
      }
    } else {
      arr = [];
      $('#next').addClass('hidden');
      let content = (
        <center>
          <h2 className="ct-u-font2 text-uppercase animated  activate flipInY">KHÔNG TÌM THẤY BÀI VIẾT!!!</h2>
        </center>
      );

      arr.push(content);
    }
    

    this.setState({renderNews: arr});
  }

  render() {
    return(
      <section className="ct-content">
        {this.state.renderNews}

        <div className="row ct-navigation-blog-outer">
          <div className="col-md-5 col-xs-12 text-left">
            <div className="ct-navigation-blog">
              <a href="javascript:void(0)" id="pre" className="btn btn-lg btn-button--dark hidden"><i className="fa fa-long-arrow-left"></i> bài cũ hơn</a>
            </div>
          </div>
          <div className="col-md-2 col-xs-12 text-center">
            <i id="news_loadder" className="fa fa-cog fa-spin fa-3x fa-fw hidden"></i>
          </div>
          <div className="col-md-5 col-xs-12 text-right">
            <div className="ct-navigation-blog">
               <a href="javascript:void(0)" id="next" className="btn btn-lg btn-button--dark">bài mới hơn <i className="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div id="blogs-script-blog"></div>
      </section>
    );
  }
}

export default BlogsContents
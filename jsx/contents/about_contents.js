import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class AboutContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('about-script-blog');
    renderMainScript(scriptBlock);
  }

  render() {
    return(
      <section className="ct-content">
        <section className="ct-frame ct-frame--white">
          <p className="ct-u-size18">Aenean tempor quam eu mauris elementum, ac cursus nisi mattis. Vivamus ac lacus tempor,
            ultricies lorem dapibus, maximus risus. Phasellus faucibus, arcu set eget faucibus tristique, elit magna mi scelerisque augue,
            at fringilla nulla ante mollis odio. Pellentesque pretium ac metus id nunc aliquet, et auctor lacus malesuada</p>

          <ul className="nav nav-tabs ct-u-paddingTop10" role="tablist" id="myTab">
            <li role="presentation" className="ct-navbarTabs--default active"><a href="#coffee" aria-controls="coffee" role="tab" data-toggle="tab">em không nhớ</a></li>
            <li role="presentation" className="ct-navbarTabs--default"><a href="#sweets" aria-controls="sweets" role="tab" data-toggle="tab">tiêu đề 3 cái này</a></li>
            <li role="presentation" className="ct-navbarTabs--default"><a href="#savories" aria-controls="savories" role="tab" data-toggle="tab">là gì cả</a></li>
          </ul>

          <div className="tab-content">
            <div role="tabpanel" className="tab-pane fade in active" id="coffee">
              <p>Etiam nunc tortor, ultrices quis turpis, tempor lacinia ligula. Sed at odio vel est lobortis eleifend ac vitae enim.
              Suspendisse est gravida nisi lectus, nisl ullamcorper et. Pellentesque volutpat felis ut nunc elit euismod sollicitudin.
              Nam ullamcorper nibh eget sem consectetur, et semper elit suscipit.</p>
            </div>
            <div role="tabpanel" className="tab-pane fade" id="sweets">
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
              eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
              Nemo enim ipsam voluptatem quia voluptas sit aspernatur</p>
            </div>
            <div role="tabpanel" className="tab-pane fade" id="savories">
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate
              non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
            </div>
          </div>
          <p></p>

          <img src="public/assets/site/images/content/about.jpg" className="ct-frame-image-coffe ct-m-boxShadow"/>
          <p className="ct-u-paddingTop30 ct-u-paddingBottom16">
            Praesent tempus euismod finibus. Nunc non interdum sem. Proin efficitur pellentesque dui. Nullam ut vestibulum orci.
            Phasellus eu maximus lectus, vitae viverra enim. Curabitur mattis ultricies ornare. Nam rhoncus turpis neque, posuere faucibus nunc vehicula ac.
          </p>
        </section>
        <div id="about-script-blog"></div>
      </section>
    );
  }
}

export default AboutContents
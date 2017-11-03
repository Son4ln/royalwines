import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class ContactContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('contact-script-blog');
    renderMainScript(scriptBlock);
  }

  render() {
    return(
      <section className="ct-content text-center ct-u-OverflowHidden">
        <section className="ct-frame ct-frame--white">
          <h3 className="ct-u-font1 text-uppercase text-center ct-u-marginTop5">thông tin</h3>
          <hr className="hr-custom ct-js-background" data-bg="public/assets/site/images/hr2.png" data-bgrepeat="no-repeat"/>
          <h5 className="ct-u-colorMotive ct-u-font3 ct-u-size14 text-uppercase ct-u-marginBottom5">Địa chỉ</h5>
          <p className="ct-address ct-u-font2">
            391 Nam Kỳ Khởi Nghĩa<br/>
            Phường 7, Quận 3, TP.HCM
          </p>
          <hr className="hr-custom ct-js-background" data-bg="public/assets/site/images/hr2.png" data-bgrepeat="no-repeat"/>
          <h5 className="ct-u-colorMotive ct-u-font3 ct-u-size14 text-uppercase ct-u-marginBottom5">Số điện thoại</h5>
          <p className="ct-address ct-u-font2">
            0969922871
          </p>
          <p className="ct-address ct-u-font2">
            0937259748
          </p>
          <hr className="hr-custom ct-js-background" data-bg="public/assets/site/images/hr2.png" data-bgrepeat="no-repeat"/>
          <div className="ct-hrContainer ct-u-paddingTop15 ct-u-paddingBottom30">
            <hr className="hr-custom ct-js-background" data-bg="public/assets/site/images/hr1.png"/>
          </div>
          <ul className="list-unstyled list-inline ct-socials--square">
            <li>
              <a href="https://www.facebook.com/createITpl">
                <i className="fa fa-fw fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/createitpl">
                <i className="fa fa-fw fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i className="fa fa-fw fa-google-plus"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i className="fa fa-pinterest"></i>
              </a>
            </li>
          </ul>

          <div className="clearfix"></div>
          <div className="ct-hrContainer ct-u-paddingTop20 ct-u-paddingBottom5">
            <hr className="hr-custom ct-js-background" data-bg="public/assets/site/images/hr1.png"/>
          </div>
          <h3 className="ct-u-font1 text-uppercase text-center">liên hệ với chúng tôi</h3>
          <hr className="hr-custom ct-js-background" data-bg="public/assets/site/images/hr2.png" data-bgrepeat="no-repeat"/>
          <form role="form" action="assets/form/send.php" method="post" className="contactForm validateIt ct-u-paddingTop10" data-email-subject="Contact Form" data-show-errors="true">
            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="contact_name" placeholder="Họ và tên" required type="text" name="field[]" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="contact_phone" placeholder="SĐT" required type="number" name="field[]" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="contact_email" placeholder="Địa chỉ email" required type="email" name="field[]" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-xs-12">
                <div className="form-group">
                  <textarea id="contact_message" placeholder="Nội dung thư" className="form-control input-lg" rows="8" name="field[]" required></textarea>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-xs-12">
                <div className="form-group">
                  <input type="submit" className="btn btn-lg btn-block btn-button--dark" value="Gửi thư"/>
                </div>
              </div>
            </div>
          </form>
        </section>

        <div id="contact-script-blog"></div>
      </section>
    );
  }
}

export default ContactContents
import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript, isValidEmail, isValidName } from '../utils';

class ContactContents extends React.Component {
  constructor() {
    super();
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=checkLogin').then(res => this.checkUser(res.data));
    axios.get('/site/controller/controller.php?action=contactInfo').then(res => this.contactInfo(res.data));
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('contact-script-blog');
    renderMainScript(scriptBlock);

    $('#submit-btn').click((e) => {
      this.submitForm(e);
    });
  }

  checkUser(data) {
    if (data !== 'not_login') {
      $('#full-name').val(data.full_name);
      $('#email').val(data.email);
    }
  }

  contactInfo(data) {
  	$('#address').html(data.address);
    $('#branch').html(data.branch);
    $('#phone').html(data.phone);
    if (data.branch === '' || data.branch === null) {
      $('#t-branch').addClass('hidden');
      $('#branch').addClass('hidden');
    } else {
      $('#t-branch').removeclass('hidden');
      $('#branch').removeclass('hidden');
    }
  }

  submitForm(e) {
  	e.preventDefault();
    if ($('#full-name').val() === '') {
      $('#full-name').focus();
      $('#checkout-alert').html('Vui lòng nhập họ và tên.');
      return;
    } else if (!isValidName($('#full-name').val())) {
      $('#full-name').focus();
      $('#checkout-alert').html('Họ và tên không đúng.');
      return;
    }

    if ($('#email').val() !== '' && !isValidEmail($('#email').val())) {
      $('#email').focus();
      $('#checkout-alert').html('Vui lòng nhập đúng email.');
      return;
    }

    if ($('#subject').val() === '') {
      $('#subject').focus();
      $('#checkout-alert').html('Vui lòng nhập tiêu đề.');
      return;
    }

    if ($('#content').val() === '') {
      $('#content').focus();
      $('#checkout-alert').html('Vui lòng nhập nội dung.');
      return;
    }

    $('#submit-btn').html('Đang gửi thư...');
    axios.post('/site/controller/controller.php?action=submitForm', {
      fullname: $('#full-name').val(),
      email: $('#email').val(),
      subject: $('#subject').val(),
      content: $('#content').val()
    })
    .then(res => {
      if (res.data === 'success') {
      	$('#fullname').val('');
      	$('#email').val('');
      	$('#subject').val('');
      	$('#content').val('');

        $('#checkout-alert').html('Gửi liên hệ thành công.');
        let scriptBlock = document.getElementById('contact-script-blog');
        renderMainScript(scriptBlock);
      }
    });
  }

  render() {
  	let style_alert = {
      color: 'red'
    }
    return(
      <section className="ct-content text-center ct-u-OverflowHidden">
        <section className="ct-frame ct-frame--white">
          <h3 className="ct-u-font1 text-uppercase text-center ct-u-marginTop5">thông tin</h3>
          <hr className="hr-custom ct-js-background" data-bg="public/assets/site/images/hr2.png" data-bgrepeat="no-repeat"/>
          <h5 className="ct-u-colorMotive ct-u-font3 ct-u-size14 text-uppercase ct-u-marginBottom5">Địa chỉ</h5>
          <p className="ct-address ct-u-font2" id="address"></p>
          <h5 id="t-branch" className="ct-u-colorMotive ct-u-font3 ct-u-size14 text-uppercase ct-u-marginBottom5 hidden">Chi nhánh</h5>
          <p className="ct-address ct-u-font2 hidden" id="branch"></p>
          <hr className="hr-custom ct-js-background" data-bg="public/assets/site/images/hr2.png" data-bgrepeat="no-repeat"/>
          <h5 className="ct-u-colorMotive ct-u-font3 ct-u-size14 text-uppercase ct-u-marginBottom5">Số điện thoại</h5>
          <p className="ct-address ct-u-font2" id="phone"></p>
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
          <div id="checkout-alert" style={style_alert}></div>
          <form role="form" method="post" className="contactForm validateIt ct-u-paddingTop10" data-email-subject="Contact Form" data-show-errors="true">
            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="full-name" placeholder="Họ và tên" required type="text" name="field[]" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="email" placeholder="Địa chỉ email" required type="email" name="field[]" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="subject" placeholder="Tiêu đề" required type="text" name="field[]" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-xs-12">
                <div className="form-group">
                  <textarea id="content" placeholder="Nội dung thư" className="form-control input-lg" rows="8" name="field[]" required></textarea>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-xs-12">
                <div className="form-group">
                  <input type="submit" id="submit-btn" className="btn btn-lg btn-block btn-button--dark" value="Gửi thư"/>
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
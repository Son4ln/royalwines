import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';

class EditProfileContents extends React.Component {
  constructor() {
    super();
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('edit-script-blog');
    renderMainScript(scriptBlock);
  }

  render() {
    return(
      <section className="ct-content ct-full-height ct-u-displayTable">
        <div className="ct-register animated" data-fx="pulse">
          <form role="form" action="assets/form/send.php" method="post" className="contactForm validateIt ct-u-paddingTop10" data-email-subject="Contact Form" data-show-errors="true">
            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="name" placeholder="Họ và tên" required type="text" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="phone" placeholder="SĐT" required type="number" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="address" placeholder="Địa chỉ" required type="text" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="pass" placeholder="Mật khẩu" required type="password" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="pass-retype" placeholder="Nhập lại mật khẩu" required type="password" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-xs-12">
                <div className="form-group">
                  <input type="submit" className="btn btn-lg btn-block btn-button--dark" value="cập nhật thông tin"/>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div id="edit-script-blog"></div>
      </section>
    );
  }
}

export default EditProfileContents
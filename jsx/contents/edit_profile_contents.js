import React from 'react';
import ReactDOM from 'react-dom';
import { renderMainScript } from '../utils';
import {connect} from 'react-redux';
import * as actions from '../store/actions';

class EditProfileContents extends React.Component {
  constructor() {
    super();
    this.state = {
      user: {}
    }

    this.saveNewUser = this.saveNewUser.bind(this);
  }

  componentWillMount() {
    axios.get('/site/controller/controller.php?action=checkLogin')
    .then(res => this.checkUser(res.data));
  }

  componentDidMount() {
    let scriptBlock = document.getElementById('edit-script-blog');
    renderMainScript(scriptBlock);

    $('#update-user').submit((e) => {
      this.updateUser(e);
    });
  }

  checkUser(data) {
    if (data === 'not_login') {
      window.location.href = '/';
      return;
    }

    this.setState({
      user: data
    });

    $('#name').val(data.full_name);
    $('#phone').val(data.phone);
    $('#address').val(data.address);
  }

  updateUser(e) {
    e.preventDefault();

    if ($('#name').val() === '') {
      $('#alert-update').html('Vui lòng nhập họ và tên');
      $('#alert-update').removeClass('hidden');
      return;
    }

    if ($('#phone').val() === '') {
      $('#alert-update').html('Vui lòng nhập số điện thoại');
      $('#alert-update').removeClass('hidden');
      return;
    }

    if ($('#address').val() === '') {
      $('#alert-update').html('Vui lòng nhập địa chỉ');
      $('#alert-update').removeClass('hidden');
      return;
    }

    $('#submit-update').val('Đang cập nhập...');

    axios.post('/site/controller/controller.php?action=updateUser', {
      name: $('#name').val(),
      addr: $('#address').val(),
      phone: $('#phone').val(),
      pass: $('#pass').val(),
      retype: $('#pass-retype').val()
    })
    .then(res => {
      if (res.data === 'success') {
        $('#alert-update').addClass('hidden');
        $('#submit-update').val('Cập nhập thông tin');
        this.saveNewUser();
      } else if (res.data === 'retype_wrong') {
        $('#alert-update').html('Nhập lại mật khẩu sai');
        $('#alert-update').removeClass('hidden');
      }
    });
  }

  saveNewUser() {
    axios.get('/site/controller/controller.php?action=checkLogin')
    .then(res => {
      let saveUser = this.props.onSaveUser;
      saveUser(res.data);
    });
  }

  render() {
    let alert_style = {
      color: 'red'
    }

    return(
      <section className="ct-content ct-full-height ct-u-displayTable">
        <div className="ct-register animated" data-fx="pulse">
          <center>
            <h4 className="ct-u-font2 text-uppercase
            ct-u-marginTop10 animated hidden" id="alert-update" data-fx="flipInY" style={alert_style}>

            </h4>
          </center>
          <form id="update-user" role="form" className="contactForm validateIt ct-u-paddingTop10" data-email-subject="Contact Form" data-show-errors="true">
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
                  <input id="email" readonly value={this.state.user.email} placeholder="Email" required type="text" className="form-control input-lg"/>
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
                  <input id="pass" placeholder="Mật khẩu" type="password" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-md-12">
                <div className="form-group">
                  <input id="pass-retype" placeholder="Nhập lại mật khẩu" type="password" className="form-control input-lg"/>
                </div>
              </div>
            </div>

            <div className="row">
              <div className="col-xs-12">
                <div className="form-group">
                  <input type="submit" id="submit-update" className="btn btn-lg btn-block btn-button--dark" value="cập nhật thông tin"/>
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

const mapStateToProps = (state) => {
  return {}
}

const mapDispatchToProps = (dispatch) => {
  return {
    onSaveUser: (user) => {dispatch(actions.save_user(user))}
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(EditProfileContents);
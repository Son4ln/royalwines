import React from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import * as actions from '../store/actions';


class EditProfileAside extends React.Component {
  constructor() {
    super();

    this.state = {
      cur_img: '',
      avatar: '/upload/users/profile2.png',
      user: {}
    }

    this.saveNewUser = this.saveNewUser.bind(this);
  }

  componentWillMount() {
    const script = document.createElement('script');
    script.src = '/public/assets/site/js/main.js';
    script.async = true;

    document.body.appendChild(script);

    axios.get('/site/controller/controller.php?action=checkLogin')
    .then(res => this.checkUser(res.data));
  }

  componentDidMount() {
    let thisPage = this.props.getCurrentPage;
    thisPage("edit-profile");

    $('#review-img').click(() => {
      $('#avat').click();
    });

    $('#avat').change(() => {
      this.reviewImg();
    });

    $('#save-avatar').click(() => {
      this.saveAvatar();
    });
  }

  reviewImg() {
    if ($('#avat').val() !== '') {
      $('#save-avatar').removeClass('hidden');
      let review = document.getElementById('review-img');
      let input = document.getElementById('avat');
      let file = input.files[0];
      let reader = new FileReader();
      reader.onload = (e) => {
        review.src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  }

  checkUser(data) {
    if (data === 'not_login') {
      window.location.href = '/';
      return;
    }

    this.setState({
      user: data
    });

    if (data.avatar !== '') {
       this.setState({
        avatar: `/upload/users/${data.avatar}`,
        cur_img: data.avatar
      });
    }
  }

  saveAvatar() {
    let avatar = $('#avat').prop('files')[0];
    let curimg = this.state.cur_img;
    let form_data = new FormData();
    form_data.append('avatar', avatar);
    form_data.append('old-avatar', curimg);

    $('#loading-av').html('Đang cập nhập...');

    $.ajax({
      url: '/site/controller/controller.php?action=updateAvatar',
      type: 'post',
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      success: (result) => {
        if (result === 'success') {
          this.saveNewUser();
          $('#save-avatar').addClass('hidden');
          $('#alert-img').addClass('hidden');
          $('#avat').val('');
          $('#loading-av').html('cập nhật ảnh đại diện');
        } else {
          $('#alert-img').removeClass('hidden');
        }
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
    let reviewImg = {
      cursor: 'pointer'
    }

    let alert_style = {
      color: 'red'
    }

    return(
      <section className="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" data-bg="/public/assets/site/images/content/demo2.jpg">
        <div className="ct-sidebar-inner">
          <div className="item">
            <center><h4 className="ct-u-font2 text-uppercase ct-u-marginTop10 animated hidden" id="alert-img" data-fx="flipInY" style={alert_style}>Vui lòng chọn ảnh dưới 5mb (jpg, jpeg, png)</h4></center>
            <img src={this.state.avatar} id="review-img" style={reviewImg} className="img-responsive img-circle ct-big-profileImg center-block animated" data-fx="flipInY" />
            <input type="file" name="avatar" id="avat" className="hidden"/>
            <center><h4 className="ct-u-font2 text-uppercase ct-u-colorMotive ct-u-marginTop10 animated" data-fx="flipInY">"bấm vào hình để thay đổi"</h4></center>
            <a href="javascript:void(0)" id="save-avatar" className="hidden btn btn-lg btn-default animated activate fadeIn ct-u-paddingTop20" data-fx="flipInY" data-hover="cập nhật ảnh đại diện">
            <span id="loading-av">cập nhật ảnh đại diện</span></a>
          </div>
        </div>
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

export default connect(mapStateToProps, mapDispatchToProps)(EditProfileAside);

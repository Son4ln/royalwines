<?php
  trait Permission {
    function isSuperUser () {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] != 1) {
          include '../../public/template/404.html';
          die();
        }
      }
    }

    function isManager () {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] != 1 && $_SESSION["royalwines_permission_ok"] != 2) {
          include '../../public/template/404.html';
          die();
        }
      }
    }

    function isSeller() {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] != 1 && $_SESSION["royalwines_permission_ok"] != 2 && $_SESSION["royalwines_permission_ok"] != 3) {
          include '../../public/template/404.html';
          die();
        }
      }
    }
  }
?>
<?php
  trait Permission {
    function isSuperUser () {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] != 1) {
          die();
        }
      }
    }

    function isManager () {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] != 1 && $_SESSION["royalwines_permission_ok"] != 2) {
          die();
        }
      }
    }

    function isSeller() {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] != 1 && $_SESSION["royalwines_permission_ok"] != 2 && $_SESSION["royalwines_permission_ok"] != 3) {
          die();
        }
      }
    }

    function isBloger() {
      if (isset($_SESSION["royalwines_user_login_ok"]) && isset($_SESSION["royalwines_pass_login_ok"])) {
        if ($_SESSION["royalwines_permission_ok"] != 1 && $_SESSION["royalwines_permission_ok"] != 2 && $_SESSION["royalwines_permission_ok"] != 4) {
          die();
        }
      }
    }
  }
?>
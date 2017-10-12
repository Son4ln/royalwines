<?php
	class ManageUsersController {
		function getMess() {
			$manage = new ManageUsersModel();
			$result = $manage -> getManageUser();
			include '../view/manage_users/listMess.php';
		}

		function viewAllMess() {
			$manage = new ManageUsersModel();
			$resultManage = $manage -> getAllManagment();
			include '../view/manage_users/viewAll.php';
		}
	}
?>
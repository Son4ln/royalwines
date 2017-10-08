<?php
	class ManageUsersController {
		function getMess() {
			$manage = new ManageUsersModel();
			$result = $manage -> getManageByStatus();
			include '../view/manage_users/listMess.php';
		}

		function seenMess() {
			$manage = new ManageUsersModel();
			$id = $_GET['id'];
			$manage -> seenStatus($id);
			exit('success');
		}

		function viewAllMess() {
			$manage = new ManageUsersModel();
			$resultManage = $manage -> getAllManagment();
			include '../view/manage_users/viewAll.php';
		}
	}
?>
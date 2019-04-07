<?php
require_once('application/models/main.model.php');
require_once('application/models/admin.model.php');
		if(isset($_SESSION['uid']))
		{
			require('application/views/layouts/header.php');
			require('application/views/layouts/sidebar.php');
				if(isset($_GET['employee'])) {
					require_once('application/views/admin/employee.php');
				} else if(isset($_GET['addEmployee'])) {
					require_once('application/views/admin/addEmployee.php');

				} else if(isset($_GET['editEmployee'])) {
					require_once('application/views/admin/editEmployee.php');

				}else
				if(isset($_GET['addBorrower']))
				{
					require_once('application/views/teller/addBorrower.php');

				}

			require('application/views/layouts/footer.php');
		}
		else
		{
			require('application/views/login.php');
		}
?>
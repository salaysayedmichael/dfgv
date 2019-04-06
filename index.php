<?php
<<<<<<< Updated upstream
require_once('application/models/main.model.php');
require_once('application/models/admin.model.php');
=======
		require_once('application/models/main.model.php');
>>>>>>> Stashed changes
		if(isset($_SESSION['uid']))
		{
			require('application/views/layouts/header.php');
			require('application/views/layouts/sidebar.php');
				if(isset($_GET['employee']))
				{
<<<<<<< Updated upstream
					require_once('application/views/admin/employee.php');
				}elseif(isset($_GET['addEmployee']))
				{
					require_once('application/views/admin/addEmployee.php');
=======
					require_once('application/views/teller/addEmployee.php');
				}else
				if(isset($_GET['addBorrower']))
				{
					require_once('application/views/teller/addBorrower.php');
>>>>>>> Stashed changes
				}
			require('application/views/layouts/footer.php');
		}
		else
		{
			require('application/views/login.php');
		}
?>
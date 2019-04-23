<?php
require_once('application/models/main.model.php');
require_once('application/models/admin.model.php');
		if(isset($_SESSION['uid']))
		{
			require('application/views/layouts/header.php');
			require('application/views/layouts/sidebar.php');
				if(isset($_GET['p'])){
					$page = $_GET['p'];
					if(file_exists("application/views/admin/$page.php")){
						require_once("application/views/admin/$page.php");
					}else{
						require_once("application/views/admin/error.php");
					}
				}else{
					require_once("application/views/admin/error.php");
				}
				// }
			require('application/views/layouts/footer.php');
		}
		else
		{
			require('application/views/login.php');
		}
?>
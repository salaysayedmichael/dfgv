<?php
  require_once('application/models/main.model.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DFGV - Dashboard</title>
	 <!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href='assets/bower_components/bootstrap/dist/css/bootstrap.min.css'>
  <!--DataTables-->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/datatables/dataTables.responsive.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href='assets/bower_components/font-awesome/css/font-awesome.min.css'>
	<!-- Ionicons -->
	<link rel="stylesheet" type="text/css" href='assets/bower_components/Ionicons/css/ionicons.min.css'>
	<!-- Theme style -->
	<link rel="stylesheet" type="text/css" href='assets/dist/css/AdminLTE.min.css'>
  <link rel="stylesheet" type="text/css" href='assets/plugins/animate.css/animate.css'>
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" type="text/css" href='assets/dist/css/skins/skin-blue.min.css'>
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href='assets/css/dfgv.css'>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/semantic.min.css"/>

</head>
<body class="skin-blue sidebar-mini">
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DFGV</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if(!empty($main->getUser($_SESSION['uid']))) :?>
              <?php foreach($main->getUser($_SESSION['uid']) as $user) :?>
              <!-- The user image in the navbar-->
              <img src="<?php echo 'assets/imgs/'.$user['gender'].'.png'?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo ucfirst($user['fName']).' '.mb_substr($user['mName'], 0, 1, 'utf-8').'. '.' '.ucfirst($user['lName']);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $user['gender'] == 'male' ? 'assets/imgs/male.png' : 'assets/imgs/female.png'?>" class="img-circle" alt="User Image">
                
                <p>
                  <?php echo ucfirst($user['fName']).' '.mb_substr($user['mName'], 0, 1, 'utf-8').'. '.' '.ucfirst($user['lName']);?> - <?php echo ucfirst($user['position'])?>
                  <small>Member since <?php echo mb_substr($user['created'], 0, 10, 'utf-8')?></small>
                </p>
                <?php endforeach;?>
                <?php endif;?>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="?logout=1" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

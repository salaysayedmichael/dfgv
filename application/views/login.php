<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DFGV - Dashboard</title>
	 <!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href='assets/bower_components/bootstrap/dist/css/bootstrap.min.css'>
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href='assets/bower_components/font-awesome/css/font-awesome.min.css'>
	<!-- Ionicons -->
	<link rel="stylesheet" type="text/css" href='assets/bower_components/Ionicons/css/ionicons.min.css'>
	<!-- Theme style -->
	<link rel="stylesheet" type="text/css" href='assets/dist/css/AdminLTE.min.css'>
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href='assets/css/dfgv.css'>
     <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/semantic.min.css"/>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>CAMOTES</b> DFGV<br>LENDING CORPORATION</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body login-style" id="login-form">
    <p class="login-box-msg">Sign in to start your session</p>
      <div class="form-group has-feedback">
        <input type="text" id="user-id" class="form-control" placeholder="User ID">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <!-- <input type="submit" id="login" class="btn btn-primary btn-block btn-flat" value="Sign In" /> -->
          <button id="login" class="btn btn-primary btn-block btn-flat">
             Sign In
          </button>
        </div>
        <!-- /.col -->
      </div>
  </div>
  <!-- /.login-box-body -->
</div>
</body>
<!-- jQuery 3 -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/js/dfgv_2.js"></script>
</html>
</section><!--End of sidebar.php .content-header-->
<section class="content">
	<?php if(!empty($admin->showEditEmployee($_GET['empID']))):?>
	<?php foreach($admin->showEditEmployee($_GET['empID']) as $employee):?>
	<div class="box">
		<div class="box-header">
			<input type="hidden" id="<?php echo $_GET["empID"]?>" name="">
			<i class="fa fa-plus"></i> <h3 class="box-title">Employee</h3>
		</div>
		<div class="box-body">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li>
						<a href="#personal-info" data-toggle="tab" aria-expanded="true">Personal Information</a>
					</li>
					
				</ul>
				<div class="tab-content">
					
					<div class="tab-pane active" id="personal-info">
						<div class="row">
							<div class="col-md-4">
								<label for="lName">Last Name <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="Last Name" id="edit-lName" value="<?php echo ucfirst($employee['lName'])?>">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="lName">First Name <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="First Name" id="edit-fName" value="<?php echo ucfirst($employee['fName'])?>">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="lName">Middle Name <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="Middle" id="edit-mName" value="<?php echo ucfirst($employee['mName'])?>">
              					</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<label for="lName">Address <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                					<input type="text" class="form-control" placeholder="Address" id="edit-address" value="<?php echo ucfirst($employee['address'])?>">
              					</div>
							</div>
						</div>						
						<br>
						<div class="row">
							<div class="col-md-4">
								<label for="lName">Email <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                					<input type="text" class="form-control" placeholder="Email" id="edit-email" value="<?php echo $employee['email']?>">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="lName">Personal Phone <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                					<input type="number" class="form-control" placeholder="Personal Phone" id="edit-personal-phone" value="<?php echo $employee['personal_phone']?>">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="lName">Home Phone </label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa  fa-phone"></i></span>
                					<input type="number" class="form-control" placeholder="Home Phone (Optional)" id="edit-home-phone" value="<?php echo $employee['home_phone']?>">
              					</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3">
								<label for="lName">Position <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                					<!-- <input list="position" class="form-control"> -->
                					<select id="edit-position" class="form-control">
                						<?php if($employee["position"]== 'admin'):?>
                						<option value="admin" selected>Admin</option>
                						<option value="teller">Teller</option>
                						<option value="collector">Collector</option>
                						<?php elseif($employee["position"]== 'teller'):?>
                						<option value="admin" >Admin</option>	
                						<option value="teller" selected="">Teller</option>
                						<option value="collector">Collector</option>
                						<?php else:?>
            							<option value="admin" >Admin</option>	
                						<option value="teller" selected="">Teller</option>
                						<option value="collector" selected="">Collector</option>
                						<?php endif;?>
                					</select>
              					</div>
							</div>
							<div class="col-md-3">
								<label for="lName">Birthdate(YYYY/MM/DD) <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                					<input type="text" class="form-control" placeholder="Birthdate" id="edit-birthdate" value="<?php echo $employee['birthdate']?>">
              					</div>
							</div>
							<div class="col-md-3">
								<label for="lName">Gender <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                					<select id="edit-gender" class="form-control">
                						<?php if($employee["gender"]== 'male'):?>
                						<option value="">Select position...</option>
                						<option value="male" selected>Male</option>
                						<option value="female">Female</option>
                						<?php else:?>
                						<option value="male" >Male</option>	
                						<option value="female" selected="">Female</option>
                						<?php endif;?>
                					</select>
              					</div>
							</div>
							<div class="col-md-3">
								<label for="lName">Status <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-male"></i></span>
                					<input type="text" class="form-control" placeholder="Status" id="edit-status" value="<?php echo ucfirst($employee['marital_status'])?>">
              					</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if($employee["position"] != "collector"):?>
			<div class="nav-tabs-custom login-tab">
				<ul class="nav nav-tabs">
					<li>
						<a href="#login-details" data-toggle="tab" aria-expanded="true">Login Details</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="login-details">
						<div class="row">
							<div class="col-md-4">
								<label for="lName">User ID <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="User ID" id="edit-user-id" value="<?php echo $employee['userID']?>">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="lName">Password <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                					<input type="password" class="form-control" placeholder="Password" id="edit-password" value="<?php echo $employee['password']?>">
                					<span class="input-group-addon"><i class="fa fa-eye" id="sw-password"></i><i class="fa fa-eye-slash hide" id="hd-password"></i></span>
              					</div>
							</div>
							<div class="col-md-4">
								<label for="lName">Confirm Password <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                					<input type="password" class="form-control" placeholder="Confirm Password" id="edit-cpassword" value="<?php echo $employee['password']?>">
                					<span class="input-group-addon"><i class="fa fa-eye" id="sw-cpassword"></i><i class="fa fa-eye-slash hide" id="hd-cpassword"></i></span>
              					</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			</div>
			<?php endforeach;?>
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<small>Fields with asterisk(<span class="text-red font-weight-bold">*</span>) are required.</small>
		<div class="box-footer">
			<div class="col-md-2">
				<button type="submit" id="btn-editEmployee" class="btn btn-block btn-info btn-flat"><i class="fa fa-user-plus"></i> Employee</button>
			</div>
		</div>
	</div>
	<?php else:?>
		<?php require_once("application/views/admin/error.php");?>
	<?php endif;?>
</section>
			

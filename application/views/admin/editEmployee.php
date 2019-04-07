<section class="content">
	<div class="box">
		<div class="box-header">
			<i class="fa fa-plus"></i> <h3 class="box-title">Employee</h3>
		</div>
		<div class="box-body">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li>
						<a href="#personal-info" data-toggle="tab" aria-expanded="true">Personal Information</a>
					</li>
					<li>
						<a href="#login-details" data-toggle="tab" aria-expanded="true">Login Details</a>
					</li>
				</ul>
				<div class="tab-content">
					<?php if(!empty($admin->showEditEmployee($_GET['editEmployee']))):?>
						<?php foreach($admin->showEditEmployee($_GET['editEmployee']) as $employee):?>
					<div class="tab-pane active" id="personal-info">
						<div class="row">
							<div class="col-md-4">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="Last Name" id="lName" value="<?php echo ucfirst($employee['lName'])?>">
              					</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="First Name" id="fName" value="<?php echo ucfirst($employee['fName'])?>">
              					</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="Middle" id="mName" value="<?php echo ucfirst($employee['mName'])?>">
              					</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                					<input type="text" class="form-control" placeholder="Address" id="address" value="<?php echo ucfirst($employee['address'])?>">
              					</div>
							</div>
						</div>						
						<br>
						<div class="row">
							<div class="col-md-4">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                					<input type="text" class="form-control" placeholder="Email" id="email" value="<?php echo $employee['email']?>">
              					</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                					<input type="number" class="form-control" placeholder="Personal Phone" id="personal-phone" value="<?php echo $employee['personal_phone']?>">
              					</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa  fa-phone"></i></span>
                					<input type="number" class="form-control" placeholder="Home Phone (Optional)" id="home-phone" value="<?php echo $employee['home_phone']?>">
              					</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                					<!-- <input list="position" class="form-control"> -->
                					<select id="position" class="form-control">
                						<?php if($employee["position"]== 'admin'):?>
                						<option value="">Select position...</option>
                						<option value="admin" selected>Admin</option>
                						<option value="teller">Teller</option>
                						<?php else:?>
                						<option value="admin" >Admin</option>	
                						<option value="teller" selected="">Teller</option>
                						<?php endif;?>
                					</select>
              					</div>
							</div>
							<div class="col-md-3">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                					<input type="text" class="form-control" placeholder="Birthdate" id="birthdate" value="<?php echo $employee['birthdate']?>">
              					</div>
							</div>
							<div class="col-md-3">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                					<select id="gender" class="form-control">
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
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-male"></i></span>
                					<input type="text" class="form-control" placeholder="Status" id="status" value="<?php echo ucfirst($employee['marital_status'])?>">
              					</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="login-details">
						<div class="row">
							<div class="col-md-4">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="User ID" id="user-id" value="<?php echo $employee['userID']?>">
              					</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                					<input type="password" class="form-control" placeholder="Password" id="password" value="<?php echo $employee['password']?>">
              					</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                					<input type="password" class="form-control" placeholder="Confirm Password" id="cpassword" value="<?php echo $employee['password']?>">
              					</div>
							</div>
						</div>
					</div>
					<?php endforeach;?>
					<?php endif;?>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<div class="col-md-2">
				<button type="submit" id="btn-editEmployee" class="btn btn-block btn-info btn-flat"><i class="fa fa-user-plus"></i> Employee</button>
			</div>
		</div>
	</div>
</section>

</section><!--End of sidebar.php .content-header-->
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
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="personal-info">
						<div class="row">
							<div class="col-md-4">
								<label for="lName">Last Name <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="Last Name" id="lName">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="fName">First Name <span class="text-red font-weight-bold">*</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="First Name" id="fName">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="mName">Middle Name</label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="Middle" id="mName">
              					</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<label for="address">Address<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                					<input type="text" class="form-control" placeholder="Address" id="address">
              					</div>
							</div>
						</div>						
						<br>
						<div class="row">
							<div class="col-md-4">
								<label for="email">Email<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                					<input type="text" class="form-control" placeholder="Email" id="email">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="personal-phone">Personal Phone<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                					<input type="number" class="form-control" placeholder="Personal Phone" id="personal-phone">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="personal-phone">Home Phone</label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa  fa-phone"></i></span>
                					<input type="number" class="form-control" placeholder="Home Phone (Optional)" id="home-phone">
              					</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3">
								<label for="personal-phone">Position<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                					<select id="position" class="form-control">
                						<option value="">Select position...</option>
                						<option value="admin">Admin</option>
                						<option value="teller">Teller</option>
                						<option value="collector">Collector</option>
                					</select>
              					</div>
							</div>
							<div class="col-md-3">
								<label for="personal-phone">Birthdate (YYYY-MM-DD)<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                					<input type="text" class="form-control" placeholder="Birthdate" id="birthdate">
              					</div>
							</div>
							<div class="col-md-3">
								<label for="personal-phone">Gender<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                					<select id="gender" class="form-control">
                						<option value="">Select Gender...</option>
                						<option value="male">Male</option>
                						<option value="female">Female</option>
                					</select>
              					</div>
							</div>
							<div class="col-md-3">
								<label for="personal-phone">Civil Status<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-male"></i></span>
                					<select id="status" class="form-control">
                						<option value="">Select Status...</option>
                						<option value="single">Single</option>
                						<option value="married">Married</option>
                						<option value="widow">Widow</option>
                					</select>
              					</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
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
								<label for="personal-phone">User ID<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                					<input type="text" class="form-control" placeholder="User ID" id="user-id">
              					</div>
							</div>
							<div class="col-md-4">
								<label for="personal-phone">Password<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                					<input type="password" class="form-control" placeholder="Password" id="password">
                					<span class="input-group-addon"><i class="fa fa-eye" id="sw-password"></i><i class="fa fa-eye-slash hide" id="hd-password"></i></span>
              					</div>

							</div>
							<div class="col-md-4">
								<label for="personal-phone">Confirm Password<span class="text-red font-weight-bold"> *</span></label>
								<div class="input-group">
                					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                					<input type="password" class="form-control" placeholder="Confirm Password" id="cpassword">
                					<span class="input-group-addon"><i class="fa fa-eye" id="sw-cpassword"></i><i class="fa fa-eye-slash hide" id="hd-cpassword"></i></span>
              					</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Fields with asterisk(<span class="text-red font-weight-bold">*</span>) are required.</small>
		<div class="box-footer">

			<div class="col-md-2">
				<button type="submit" id="btn-addEmployee" class="btn btn-block btn-info btn-flat"><i class="fa fa-user-plus"></i> Employee</button>
			</div>
		</div>
	</div>
</section>

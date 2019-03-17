  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <p>Admin User</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form hidden">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Quick Links</li>
        <!-- Optionally, you can add icons to the links -->
        <li ><a href="home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="active"><a href="borrowers"><i class="fa fa-users"></i> <span>Borrowers</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa  fa-list-alt"></i> <span>Reports</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Report 1</a></li>
            <li><a href="#">Report 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="inline page-title">Add New Borrower </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li >Borrowers</li>
        <li class="active">Add Borrower</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- end of basic borrower information -->
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <legend>Borrower's Information</legend>
              <div class="form-group">
                <span class="red-info">* </span><label>First Name</label><input type="text" class="form-control" id="fname">
              </div>
              <div class="form-group">
                <label>Middle Name</label><input type="text" class="form-control" id="mname">
              </div>
              <div class="form-group">
                <span class="red-info">* </span><label>Last Name</label><input type="text" class="form-control" id="lname">
              </div>
              <div class="row" style="padding-left:3%;">
                 <div class="wd-30 inline-block">
                   <span class="red-info">* </span><label class="">Birth Date</label><br /><input type="date" class="form-control"  id="borrower_bdate">
                  </div>
                  <div class="wd-30 inline-block" style="margin-left:3%;">
                    <label class="">Gender</label><br/>
                    <select class=" form-control " id="borrower_gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="wd-30 inline-block" style="margin-left:4%;">
                    <label class="">Civil Status</label><br/>
                    <select class=" form-control " id="borrower_civil_status">
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Separated">Separated</option>
                      <option value="Annuled">Annuled</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <span class="red-info">* </span><label>Present Address</label><input type="text" class="form-control" id="borrower_present_address">
              </div>
              <div class="form-group">
                <span class="red-info">* </span><label>Home Address</label><input type="text" class="form-control" id="borrower_home_address">
              </div>
              <div class="row" style="padding-left:3%;">
                 <div class="wd-30 inline-block">
                   <span class="red-info">* </span><label class="">House Ownership</label><br />
                   <select class="form-control" id="own_house">
                     <option value="1">Own House</option>
                     <option value="0">Renting</option>
                   </select>
                  </div>
                  <div class="wd-30 inline-block" style="margin-left:6%;">
                    <span class="red-info">* </span><label class="">Length Of Stay (years)</label><br/><input type="number" class="form-control" id="lenght_of_stay">
                  </div>
                  <div class="wd-30 inline-block">
                   <label class="">Property Owner</label><br />
                   <select class="form-control" id="own_house">
                     <option value="Yes">Yes</option>
                     <option value="No">No</option>
                   </select>
                  </div>
              </div>
              <div class="row" style="padding-left:3%;">
                 <div class="wd-40 inline-block">
                   <label class="">No. of Children</label><br />
                   <input class="form-control" type="number" id="num_of_children">
                  </div>
                  <div class="wd-50 inline-block" style="margin-left:6%;">
                    <label class="">No. of Dependents</label><br/><input type="number" class="form-control" id="num_of_dependents">
                  </div>
              </div>
              <div class="form-group">
                <span class="red-info">* </span><label>Occupation</label><input type="text" class="form-control" id="occupation">
              </div>
              <div class="form-group">
                <span class="red-info">* </span><label>Employer</label><input type="text" class="form-control" id="Employer">
              </div>
              <div class="form-group">
                <span class="red-info">* </span><label>Valid ID</label><input type="text" class="form-control" id="valid_id">
              </div>
              <div class="form-group">
                <span class="red-info">* </span><label>Contact Number</label><input type="text" class="form-control" id="contact_number">
              </div>
              

          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <legend>Spouse's Information</legend>
            <div class="form-group">
                <label>Name of Husband/Wife</label><input type="text" class="form-control" id="name_spouse">
            </div>
            <div class="row" style="padding-left:3%;">
                 <div class="wd-30 inline-block">
                   <label class="">Birth Date</label><br />
                   <input class="form-control" type="date" id="spouse_bdate">
                  </div>
                   <div class="wd-30 inline-block" style="margin-left:3%;">
                    <label class="">Gender</label><br/>
                    <select class=" form-control " id="spouse_gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="wd-30 inline-block" style="margin-left:4%;">
                    <label class="">Civil Status</label><br/>
                    <select class=" form-control " id="spouse_civil_status">
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Separated">Separated</option>
                      <option value="Annuled">Annuled</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>
              </div>
            <div class="form-group">
                <label>Present Address</label><input type="text" class="form-control" id="spouse_present_address">
            </div>
            <div class="form-group">
                <label>Home Address</label><input type="text" class="form-control" id="spouse_home_address">
            </div>
            <div class="form-group">
                <label>Occupation</label><input type="text" class="form-control" id="spuse_occupation">
            </div>
            <div class="form-group">
                <label>Employer</label><input type="text" class="form-control" id="spouse_employer">
            </div>
            <div class="form-group">
                <label>Valid ID</label><input type="text" class="form-control" id="spouse_valid_id">
            </div>
            <div class="form-group">
                <label>Contact Number</label><input type="text" class="form-control" id="spouse_contact_number">
            </div>
          </fieldset>
        </div>
      </div>
      <!-- end of basic borrower information -->
      <hr />
      <!-- income/expenses -->
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <legend>Source of Income</legend>
              <div class="row" style="padding-left:3%;">
                 <div class="wd-50 inline-block">
                   <label>Applicant's Income/Salary</label><input type="number" class="form-control amount" id="borrower_income">
                  </div>
                  <div class="wd-45 inline-block" style="margin-left:2%;">
                     <label>Spouse's Income/Salary</label><input type="number" class="form-control amount" id="spouse_income">
                  </div>
              </div>
              <div class="row" style="padding-left:3%;">
                 <div class="wd-40 inline-block">
                   <label>Other Income</label><input type="number" class="form-control amount" id="other_income">
                  </div>
                  <div class="wd-55 inline-block" style="margin-left:2%;">
                    <label>Other Income Details</label>
                    <input type="text" class="form-control wd-100" id="other_income_details">
                     
                  </div>
              </div>
              <div class="form-group">
                <span class="red-info">* </span><label>Net Income <span class="red-info">[=Total Income (<span id="s-total-income">000.00</span>)  - Total Expenses (<span id="s-total-expenses">000.00</span>)]</span></label><input type="number" class="form-control" id="net_income" required>
              </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <legend>Expenses</legend>
              <div class="row" style="padding-left:3%;">
                 <div class="wd-50 inline-block">
                   <label>Food</label><input type="number" class="form-control amount" id="exp_food">
                  </div>
                  <div class="wd-45 inline-block" style="margin-left:2%;">
                    <label>Bills(Electric/Water/Etc.)</label><input type="number " class="form-control amount" id="exp_bills">
                  </div>
              </div>
              <div class="row" style="padding-left:3%;">
                <div class="wd-50 inline-block">
                   <label>Education</label><input type="number" class="form-control amount" id="exp_education">
                </div>
                <div class="wd-45 inline-block" style="margin-left:2%;">
                    <label>Rentals</label><input type="number" class="form-control amount" id="exp_rentals">
                </div>
              </div>
              <div class="row" style="padding-left:3%;">
                <div class="wd-50 inline-block">
                   <label>Repair/Maintenance</label><input type="number" class="form-control amount" id="exp_repair">
                </div>
                <div class="wd-45 inline-block" style="margin-left:2%;">
                    <label>Miscellaneous</label><input type="number" class="form-control amount" id="exp_miscellaneous">
                </div>
              </div>
          </fieldset>
        </div>
      </div>
      <!-- end of income/expenses -->
      <!-- submit and clear buttons -->
      <div class="row">
        <div class="col-md-8">  </div>
        <div class="col-md-2"> <button class="btn btn-flat btn-danger wd-100" id="btn-cancel">Cancel</button> </div>
        <div class="col-md-2"> <button class="btn btn-flat btn-primary wd-100" id="btn-add-borrower">Submit</button> </div>
      </div>
      <!-- end of submit and clear buttons -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
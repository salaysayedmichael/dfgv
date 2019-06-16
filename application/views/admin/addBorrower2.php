</section><!--End of .content-header-->
<section class="content" id="addBorrower">
	<div class="box">
		<div class="box-header">
			<i class="fa fa-plus"></i> <h3 class="box-title">Borrower</h3>
		</div>
		<div class="box-body">
			<div class="row">
                <div class="col-md-6" id="borrowerInfo">
                    <h3>Borrower's Information</h3>
                    <div class="col-md-12">
                        <input type="text" v-required class="form-control" placeholder="First Name">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control text-date" placeholder="Birthdate" >
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" placeholder="Gender">
                            <option value="" selected disabled>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" placeholder="Civil Status">
                            <option value="" selected disabled>Civil Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widow">Widow</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Present Address">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Home Address">
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" placeholder="House Owner">
                            <option value="" selected disabled>House Owner</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" placeholder="Renting">
                            <option value="" selected disabled>Renting</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="Length Of Stay">
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="Number of Children">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Occupation">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="Valid ID">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Contact Number">
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="No of Loans">
                    </div>
                </div>
                <div class="col-md-6" id="spouseInfo">
                    <h3>Spouse's Information</h3>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Name of Spouse">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control text-date" placeholder="Birthdate" >
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" placeholder="Gender">
                            <option value="" selected disabled>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" placeholder="Civil Status">
                            <option value="" selected disabled>Civil Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widow">Widow</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Present Address">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Home Address">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Occupation">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Valid ID">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Contact Number">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="incomeInfo">
                    <h3>Source of Income</h3>
                    <div class="col-md-6">
                      <input type="number" class="form-control" placeholder="Income or Salary">
                    </div>
                    <div class="col-md-6">
                      <input type="number" class="form-control" placeholder="Other Income">
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Other Income Details">
                    </div>
                    <div class="col-md-7 padding-top">
                        [Total Income (<span id="totalIncomeText">0</span>.00) - Total Expenses (<span id="totalExpensesText">0</span>.00)] = 
                    </div>
                    <div class="col-md-5">
                      <input type="number" class="form-control" disabled id="netIncome" placeholder="Net Income">
                    </div>
                </div>
                <div class="col-md-6" id="expensesInfo">
                    <h3>Expenses</h3>
                    <div class="col-md-6">
                      <input type="number" class="form-control" placeholder="Food">
                    </div>
                    <div class="col-md-6">
                      <input type="number" class="form-control" placeholder="Bills">
                    </div>
                    <div class="col-md-6">
                      <input type="number" class="form-control" placeholder="Education">
                    </div>
                    <div class="col-md-6">
                      <input type="number" class="form-control" placeholder="Rentals">
                    </div>
                    <div class="col-md-6">
                      <input type="number" class="form-control" placeholder="Repair or Maintenance">
                    </div>
                    <div class="col-md-6">
                      <input type="number" class="form-control" placeholder="Miscellaneous">
                    </div>
                </div>
            </div>
		</div>
		<div class="box-footer">
            <div class="col-md-2" id="comakerInfo">
                <select name="" class="form-control" placeholder="Comaker">
                    <option value="" disabled selected>Comaker</option>
                    <?php
                      if(empty($main->getAllComakers())==false){
                        foreach($main->getAllComakers() as $comaker){
                          ?>
                          <option value="<?= $comaker['comakerID'] ?>"><?= $comaker['fName']." ".$comaker['midName']." ".$comaker['lName'] ?></option>
                          <?php
                        }
                      }
                    ?>
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" id="addComakerModalBtn" class="btn btn-block btn-info btn-flat btn-round"><i class="fa fa-plus"></i> </button>
            </div>
            <div class="col-md-7"></div>
			<div class="col-md-2">
				<button type="submit" id="addBorrowerBtn" class="btn btn-block btn-info btn-flat"><i class="fa fa-user-plus"></i> Borrower</button>
			</div>
		</div>
	</div>
</section>
<?php 
    include_once("application/views/modals/addComaker.modal.php");
?>
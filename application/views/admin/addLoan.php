</section><!--End of sidebar.php .content-header-->
<section class="content">
	<?php
		$borrowers = $main->getAll('SELECT * FROM borrower ORDER by lName ASC',array());
		$selectedBorrower = isset($_GET['borrowerID'])?$_GET['borrowerID']:0;
	?>
	<div class="box">
		<div class="box-header">
			<h3 >Loan Application Form</h3>
		</div>
		<div class="box-body">
			<div class="row" style="margin: 20px;">
				<!-- 
					- Borrower Name (borrower.borrowerID)
					- Loan Amount (loan.loanAmount)
					- Purpose (loan.purpose)
					- Interest rate (loan.percentage)
					- Loan Type
				 -->
				 <div class="col-md-6">
				 	<div class="input-group">
    					<span class="input-group-addon"><i class="fa fa-user"></i></span>
    					<select class="form-control" id="borrower">
    						<option value="0">Select Borrower</option>
    						<?php
    							foreach($borrowers as $b)
    							{
    								$selected = $b['borrowerID'] == $selectedBorrower ? "selected":"";
    								echo '<option value="'.$b['borrowerID'].'" '.$selected.'>'.$b['lName'].' '.$b['fName'].'</option>';
    							}
    						?>
    					</select>
  					</div>
				 </div>
				 <div class="col-md-3">
				 	<div class="input-group">
    					<span class="input-group-addon"><i class="fa fa-rub"></i></span>
    					<input type="number" step="any" class="form-control" placeholder="Loan Amount" id="LoanAmount" borrower_id="1" value="" />
  					</div>
				 </div> 
				 <div class="col-md-3">
				 	<div class="input-group">
    					<span class="input-group-addon"><i class="fa fa-bar-chart-o"></i></span>
    					<input type="number" step="any" class="form-control" placeholder="Intereset Rate" id="interestRate" value="" />
  					</div>
				 </div>
				 <hr />
				 <div class="col-md-8">
				 	<div class="input-group">
    					<span class="input-group-addon"><i class="fa fa-edit"></i></span>
    					<input type="text" class="form-control" placeholder="Purpose" id="purpose" value="" />
  					</div>
				 </div>

				 <div class="col-md-4">
				 	<div class="input-group">
    					<span class="input-group-addon"><i class="fa fa-plus-square-o"></i></span>
    					<select class="form-control" id="loanType">
    						<option value="0">Select Loan Type</option>
    						<option value="1">Daily (Arawan)</option>
    						<option value="2">Weekly</option>
    					</select>
  					</div>
				 </div>


			</div>
		</div>
		<div class="box-footer">
			<div class="col-md-12">
				<button id="btn-addLoan" class="btn btn-primary btn-flat pull-right">Add New Application</button>
			</div>
		</div>
	</div>
</section>

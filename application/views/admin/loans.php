</section><!--End of sidebar.php .content-header-->
<?php
include_once("application/views/modals/showLoanDetails.modal.php");
?>
<section class="content">
	<?php

		$sql = "SELECT 
				    l.applicationNo,
				    concat(b.fName, ' ', b.lName) as `borrower_name`,
				    l.loanAmount,
				    l.percentage,
				    l.totalPayable,
				    l.purpose,
				    e.userID,
				    ls.ls_Label as `loan_status`,
				    lt.lt_Label as `loan_type`,
				    concat(e.fName, ' ', e.lName) as `Processor`
				FROM
				    loan l
				        inner join
				    borrower b USING (borrowerID)
				        inner join
				    employee e ON e.userID = l.empID
				        inner join
				    loan_status ls ON ls.ls_id = l.loanStatus
				        inner join
				    loan_type lt ON lt.lt_id = l.loan_type";
		$loans = $main->getAll($sql ,array());
		$selectedBorrower = isset($_GET['borrowerID'])?$_GET['borrowerID']:0;
	?>
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Loans</h3>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<table id="tbl-LoanList" class="table no-margin responsive display nowrap dataTable dtr-inline collapsed">
					<thead>
						<tr>
							<th class="wd-5">#</th>
							<th class="wd-10">Loan Number</th>
							<th class="wd-15">Borrower Name</th>
							<th class="wd-10">Loan Amount</th>
							<th class="wd-10">Interest (%)</th>
							<th class="wd-10">Total Payable</th>
							<th class="wd-10">Loan Status</th>
							<th class="wd-10">Loan Type</th>
							<th class="wd-15">Processor</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($loans))
						{
							$ctr = 1;
							foreach ($loans as $l) {
								echo "<tr class='loan-row-click' id='".$l['applicationNo']."'>";  
								echo "<td>".$ctr++."</td>";  
								echo "<td>".$l['applicationNo']."</td>";  
								echo "<td>".$l['borrower_name']."</td>";  
								echo "<td class='text-right'>".$l['loanAmount']."</td>";  
								echo "<td class='text-right'>".$l['percentage']."%</td>";  
								echo "<td class='text-right'>".$l['totalPayable']."</td>";  
								echo "<td>".$l['loan_status']."</td>";  
								echo "<td>".$l['loan_type']."</td>";  
								echo "<td>".$l['Processor']."</td>";  
								echo "</tr>";  

							}
						}
						else
						{
							echo "<tr>";  
								echo "<td></td>";  
								echo "<td></td>";  
								echo "<td>No Available Data</td>";  
								echo "<td></td>";  
								echo "<td></td>";  
								echo "<td></td>";  
								echo "<td></td>";  
								echo "<td></td>";  
								echo "<td></td>";  
								echo "</tr>";
						}
						

						?>
						
					
					</tbody>
				</table>
			</div>
		</div>
		<div class="box-footer clearfix">
			<a class="btn btn-primary btn-lg float-right btn-flat" href="?p=addLoan">
            	<i class="fa fa-user-plus"></i> New Application
          	</a>
		</div>
	</div>
</section>
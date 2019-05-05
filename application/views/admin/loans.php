</section><!--End of sidebar.php .content-header-->
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
				<table id="tbl-empList" class="table no-margin responsive display nowrap dataTable dtr-inline collapsed">
					<thead>
						<tr>
							<th>#</th>
							<th>Loan Number</th>
							<th>Borrower Name</th>
							<th>Loan Amount</th>
							<th>interest %</th>
							<th>Total Payable</th>
							<th>Loan Status</th>
							<th>Loan Type</th>
							<th>Processor</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($loans))
						{
							$ctr = 1;
							foreach ($loans as $l) {
								echo "<tr>";  
								echo "<td>".$ctr++."</td>";  
								echo "<td>".$l['applicationNo']."</td>";  
								echo "<td>".$l['borrower_name']."</td>";  
								echo "<td>".$l['loanAmount']."</td>";  
								echo "<td>".$l['percentage']."</td>";  
								echo "<td>".$l['totalPayable']."</td>";  
								echo "<td>".$l['loan_status']."</td>";  
								echo "<td>".$l['loan_type']."</td>";  
								echo "<td>".$l['Processor']."</td>";  
								echo "</tr>";  

							}
						}
						else
						{
							echo "<tr>";  
								echo "<td>$ctr++</td>";  
								echo "<td>".$l['applicationNo']."</td>";  
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
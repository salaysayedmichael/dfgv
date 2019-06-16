</section>
<?php 
	$id = isset($_GET['id'])?$_GET['id']:0;
	$specificloan = $id!=0;
	$collections = $specificloan ? $admin->showCollections($id,"loan") : $admin->showAllCollections();
?>
<?php include "application/views/modals/getCollection.modal.php"?>
<?php include "application/views/modals/viewCollection.modal.php"?>
<section class="content">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">List of Collections</h3>
		</div>
		<div class="box-body">
		<?php if($specificloan): ?>
			<div class="panel-group" id="accordion">
				<?php foreach($collections as $collection):	
						$loaninfo = $admin->getLoanInfo($collection["application_no"])[0];
						// var_dump($loaninfo); die;
						$loancollections = $admin->showCollections($id,$collection["application_no"]);
						$count = 1;
						?>
						<div class="panel panel-default">
							<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $collection["application_no"] ?>">Application # 
								<?= sprintf("%05d", $collection["application_no"]); ?></a>
							</h4>
							</div>
							<div id="collapse<?php echo $collection["application_no"] ?>" class="panel-collapse collapse in">
							<div class="panel-body">
								<table>
									<tr>
										<td>Name: </td>
										<td><?php echo $loaninfo["fName"]." ".$loaninfo["mName"]." ".$loaninfo["lName"] ?></td>
									</tr>
									<tr>
										<td>Amount Granted: </td>
										<td> ₱ <?php echo $loaninfo["loanAmount"] ?></td>
									</tr>
									<tr>
										<td>Type: </td>
										<td><?php echo $loaninfo["lt_label"] ?></td>
									</tr>
									<tr>
										<td>Total: </td>
										<td></td>
									</tr>
								</table>
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>DATE</th>
											<th>AMOUNT</th>
											<th>ARREARS</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($loancollections as $lc): ?>
										<tr>
											<td><?php echo $count++ ?></td>
											<td><?php echo $lc['collection_date']; ?></td>
											<td><?php echo $lc['collection_amount']; ?></td>
											<td><?php echo $lc['arrear']; ?></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							</div>
						</div>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
			<div class="table-responsive">
				<table id="tbl-collections" class="table no-margin responsive display nowrap dataTable dtr-inline collapsed">
					<thead>
						<tr>
							<th>#</th>
							<th>Application #</th>
							<th>Collector</th>
							<th>Borrower</th>
							<th>Loan Amount</th>
							<th>Interest</th>
							<th>Total Collected</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($collections)):?>
						<?php foreach($collections as $key => $collection):?>
						<tr>
							<td><?php echo ($key+1);?></td>
							<td><?php echo $collection["appNo"];?></td>
							<td><?php echo ucfirst($collection['eFname'])." ".mb_substr(ucfirst($collection['eMname']), 0, 1, 'utf-8').". ".ucfirst($collection['eLname'])?></td>
							<td><?php echo ucfirst($collection['bFname'])." ".mb_substr(ucfirst($collection['bMname']), 0, 1, 'utf-8').". ".ucfirst($collection['bLname'])?></td>
							<td><?php echo "₱ ".$collection["loan_amount"];?></td>
							<td><?php echo floatval($collection["interest"])."%";?></td>
							<td><?php echo !empty($collection["collection_amount"]) ? "₱ ".$collection["collection_amount"] : "";?></td>
							<td>
								<a href="#collection-modal" id="<?php echo $collection['appNo']?>" class="get-collection" data-toggle="modal">
									<i class="fa fa-money fa-lg"></i>
								</a>
								&nbsp; | &nbsp;
								<a href="#view-collection-modal" class="view-collection" id="<?php echo $collection['appNo']?>" data-toggle="modal">
									<span class="glyphicon glyphicon-eye-open"></span>
								</a>
							</td>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
				</table>
			</div>
		<?php endif; ?>
		</div>
	</div>
</section>
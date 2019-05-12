</section>
<?php $collections = $admin->showAllCollections();?>
<?php include "application/views/modals/getCollection.modal.php"?>
<?php include "application/views/modals/viewCollection.modal.php"?>
<section class="content">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">List of Collections</h3>
		</div>
		<div class="box-body">
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
		</div>
	</div>
</section>
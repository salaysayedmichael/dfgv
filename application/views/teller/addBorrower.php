<?php require_once('application/views/modals/editBorrower.modal.php');?>
<?php require_once('application/views/modals/addBorrower.modal.php');?>
<section class="content">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">List of Borrower</h3>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<table id="tbl-empList" class="table no-margin responsive display nowrap dataTable dtr-inline collapsed">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Occupation</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($main->getAllBorrowers())):?>
						<?php foreach($main->getAllBorrowers() as $key => $borrower) :?>
						<tr>
							<td><?php echo ($key+1)?></td>
							<td><?php echo ucfirst($borrower['fName']).' '.mb_substr($borrower['mName'], 0, 1, 'utf-8').'. '.' '.ucfirst($borrower['lName'])?></td>
							<td><?php echo ucfirst($borrower['occupation']);?></td>
							<td><?php echo ucfirst($borrower['presentAddr'])?></td>
							<td class="text-center">
								<a data-id="<?= $borrower['borrowerID'] ?>" class="editBorrowerBtn" > <i class="fa fa-edit fa-lg"></i></a> 
								&nbsp;| &nbsp;
								<a data-id="<?= $borrower['borrowerID'] ?>" class="deleteBorrowerBtn"> <i class="fa fa-trash fa-lg text-danger"></i></a>
							</td>
						</tr>
						<?php endforeach;?>
						<?php else:?>
							<tr>
								<td colspan="5" class="text-center"> No data available.</td>
							</tr>
						<?php endif; ?>
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Occupation</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<div class="box-footer clearfix">
			<a href="#add-borrower-modal" data-toggle="modal" class="btn btn-info btn-lg float-right btn-flat">
            	<i class="fa fa-user-plus"></i> Borrower
          	</a>
		</div>
	</div>
</section>
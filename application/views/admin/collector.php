<section class="content">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">List of Collector</h3>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<table id="tbl-collector" class="table no-margin responsive display nowrap dataTable dtr-inline collapsed">
					<thead>
						<tr>
							<td>#</td>
							<td>Name</td>
							<td>Gender</td>
							<td>Address</td>
							<td>Birthdate</td>
							<td>Contact</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($main->getAllEmployees('collector'))):?>
						<?php foreach($main->getAllEmployees('collector') as $key => $collector):?>
						<tr>
							<td><?php echo ($key+1); ?></td>
							<td><?php echo ucfirst($collector['fName']).' '.mb_substr($collector['mName'], 0, 1, 'utf-8').'. '.' '.ucfirst($collector['lName']); ?></td>
							<td><?php echo ucfirst($collector['gender']); ?></td>
							<td><?php echo ucfirst($collector['address']); ?></td>
							<td><?php echo ucfirst($collector['birthdate']); ?></td>
							<td><?php echo ucfirst($collector['personal_phone']); ?></td>
							<td class="text-center">
								<a href="?p=editEmployee&empID=<?php echo base64_encode($collector['empID']);?>" class="empEdit" id="<?php echo $collector['empID'];?>" data-toggle="modal"> <i class="fa fa-edit fa-lg"></i></a> 
								&nbsp;| &nbsp;
								<a href="javascript:;" class="empDel" id="<?php echo $collector['empID'];?>"> <i class="fa fa-trash fa-lg text-danger"></i></a>
							</td>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box-footer clearfix"></div>
	</div>
</section>
<section class="content">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">List of Employee</h3>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<table id="tbl-empList" class="table no-margin responsive display nowrap dataTable dtr-inline collapsed">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Position</th>
							<th>Address</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($main->getAllEmployees())):?>
						<?php foreach($main->getAllEmployees() as $key => $employee) :?>
						<tr>
							<td><?php echo ($key+1)?></td>
							<td><?php echo ucfirst($employee['fName']).' '.mb_substr($employee['mName'], 0, 1, 'utf-8').'. '.' '.ucfirst($employee['lName'])?></td>
							<td><?php echo ucfirst($employee['position']);?></td>
							<td><?php echo ucfirst($employee['address'])?></td>
							<td><?php echo (!empty($employee['email']) || $employee == null ? $employee['email'] : 'Not given')?></td>
							<td class="text-center">
								<a href="?editEmployee=<?php echo $employee['userID'];?>" class="empEdit" id="<?php echo $employee['userID'];?>" data-toggle="modal"> <i class="fa fa-edit fa-lg"></i></a> 
								&nbsp;| &nbsp;
								<a href="javascript:;" class="empDel" id="<?php echo $employee['userID'];?>"> <i class="fa fa-trash fa-lg text-danger"></i></a>
							</td>
						</tr>
						<?php endforeach;?>
						<?php else:?>
							<tr>
								<td colspan="5"> No data available.</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box-footer clearfix">
			<a class="btn btn-info btn-lg float-right btn-flat" href="?addEmployee">
            	<i class="fa fa-user-plus"></i> Employee
          	</a>
		</div>
	</div>
</section>
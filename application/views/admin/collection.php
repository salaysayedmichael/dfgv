<h1>Collection Details</h1>
</section> <!--End of sidebar.php .content-header-->
<?php $collections = $admin->getCollectionDetails($_GET["cid"]);?>
<?php $empName = ucfirst($collections[0]['eFname'])." ".mb_substr(ucfirst($collections[0]['eMname']), 0, 1, 'utf-8').". ".ucfirst($collections[0]['eLname']);?>
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-body box-profile">
					<img class="profile-user-img img-responsive img-circle" src="assets/imgs/<?php echo $collections[0]['gender']?>.png" alt="User profile picture">
					<h3 class="profile-username text-center"><?php echo $empName; ?></h3>
					<p class="text-muted text-center"><?php echo ucfirst($collections[0]["position"]);?></p>
					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
		                  <b>Email</b> <a class="pull-right"><?php echo $collections[0]['email']?></a>
		                </li>
						<li class="list-group-item">
		                  <b>Phone No</b> <a class="pull-right"><?php echo $collections[0]['phone']?></a>
		                </li>
						<li class="list-group-item">
		                  <b>Total Collections</b> <a class="pull-right">PHP <?php echo array_sum(array_column($collections,'amount'));?></a>
		                </li>
		                <li class="list-group-item">
		                  <b>Loan Transactions</b> <a class="pull-right"><?php echo count(array_column($collections,'appNo'));?></a>
		                </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#collections" data-toggle="tab">Collections</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane">
						<div class="table-responsive">
							<table id="tbl-collection" class="table no-margin responsive display nowrap dataTable dtr-inline collapsed">
								<thead>
									<tr>
										<th>#</th>
										<th>Borrower</th>
										<th>Loan #</th>
										<th>Loan Status</th>
										<th>Collection Amount</th>
										<th>Collection Date</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($collections as $key => $collection):?>
									<tr>
										<td><?php echo ($key+1); ?></td>
										<td><?php echo ucfirst($collection['bFname'])." ".mb_substr(ucfirst($collection['bMname']), 0, 1, 'utf-8').". ".ucfirst($collection['bLname']); ?></td>
										<td><?php echo $collection["appNo"]; ?></td>
										<td><?php echo $collection["status"]?></td>
										<td><?php echo $collection["amount"];?></td>
										<td></td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
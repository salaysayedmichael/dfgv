<h1>Collection Details</h1>
</section><!--End of .content-header-->
<?php if(!empty($admin->getCollectionDetails($_GET["cid"]))):?>
<?php foreach($admin->getCollectionDetails($_GET["cid"]) as $collector):?>
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= 'assets/imgs/male.png'?>" alt="User profile picture">
              <h3 class="profile-username text-center">Mark Jeff</h3>
              <p class="text-muted text-center">Collector</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Collections</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Loan Transactions</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Borrowers</b> <a class="pull-right">87</a>
                </li>
              </ul>
              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#personal-info" data-toggle="tab" aria-expanded="true">Collections</a>
					</li>
				</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="personal-info">
					<table id="tbl-collection" class="table no-margin responsive display nowrap dataTable dtr-inline collapsed">
						<thead>
							<tr>
								<td>#</td>
								<td>Borrower</td>
								<td>Loan #</td>
								<td>Amount</td>
								<td>Date</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endforeach;?>
<?php endif;?>
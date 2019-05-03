<div class="modal fade in" id="add-comaker-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Add Comaker</h4>
      </div>
      <div class="modal-body">
          <div class="row" id="comakerInfo">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="First Name">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Middle Name">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Last Name">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control text-date" placeholder="Birthdate" >
            </div>
            <div class="col-md-4">
                <select class="form-control" placeholder="Civil Status">
                    <option value="" selected disabled>Civil Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widow">Widow</option>
                </select>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Contact Number">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Present Address">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Home Address">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Occupation">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Salary or Income">
            </div>
            <div class="col-md-12">
                <select class="form-control" placeholder="Employer">
                    <option value="" selected disabled>Employer</option>
                    <?php
                      if(empty($main->getAllEmployers())==false){
                        foreach($main->getAllEmployers() as $employer){
                          ?>
                          <option value="<?= $employer['employerID'] ?>"><?= $employer['name'] ?></option>
                          <?php
                        }
                      }
                    ?>
                </select>
            </div>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" id="addComakerBtn" class="btn btn-primary">Add Comaker</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
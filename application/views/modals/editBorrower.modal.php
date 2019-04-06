<div class="modal fade in" id="edit-borrower-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Edit Borrower</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <input type="hidden" id="borrowerID">
                <input type="text" id="fName" class="form-control" required placeholder="First Name"/>
            </div>
            <div class="col-md-4">
             <input type="text" id="mName" class="form-control" required placeholder="Middle Name"/>
            </div>
            <div class="col-md-4">
             <input type="text" id="lName" class="form-control" required placeholder="Last Name"/> 
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">
            <input type="date" id="bDay" class="form-control" required placeholder="Birthday"/>
            </div>
            <div class="col-md-5">
            <select id="civilStatus" placeholder="Civil Status" class="form-control" required>
                <option value="" disabled selected>Civil Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widow">Widow</option>
            </select>
            </div>
            <div class="col-md-3">
            <select id="gender" placeholder="Gender" class="form-control" required>
                <option value="" disabled selected>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-6">
              <input type="text" id="homeAddr" class="form-control" required placeholder="Home Address"/>
            </div>
            <div class="col-md-6">
                <input type="text" id="presentAddr" class="form-control" required placeholder="Present Address"/>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-3">
                <select id="ownHouse" placeholder ="Own House?" class="form-control" required>
                    <option value="" disabled selected>Own House?</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="col-md-5">
                <select id="renting" placeholder="Renting?" class="form-control" required>
                    <option value="" disabled selected>Renting?</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="number" placeholder="Length of Stay" id="lengthOfStay" class="form-control" required>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">
            <input type="number" placeholder="Number Of Children" id="noOfChildren" class="form-control" required>
            </div>
            <div class="col-md-8">
            <input type="text" placeholder="Occupation" id="occupation" class="form-control" required> 
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-5">
                <input type="text" placeholder="Contact Number" id="contactNo" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder="Valid ID" id="validID" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input type="number" placeholder="Loans" id="loanCount" class="form-control" required>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
            <select id="comakerID" class="form-control" placeholder="Comaker" required>
              <option value="" disabled selected>Select Comaker</option>
            <?php if(!empty($main->getAllComakers())):?>
                <?php foreach($main->getAllComakers() as $key => $comaker) :?>
                    <option value="<?= $comaker['comakerID'] ?>"><?= $comaker['fName']." ".$comaker['midName']." ".$comaker['lName'] ?></option>
                <?php endforeach;?>
            <?php endif; ?>
            </select>
            </div>
        </div>
      </div><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" id="saveBorrower" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
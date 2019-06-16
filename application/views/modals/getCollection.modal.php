<div class="modal fade" id="collection-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fa fa-plus text-blue"></i> 
        <span class="modal-title" id="exampleModalLabel">Add Collection</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <label for="exampleInputEmail1">Application No.</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-tags"></i></span>
              <input type="email" class="form-control" placeholder="Application No." id="application-no" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <label for="exampleInputEmail1">Borrower</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="email" class="form-control" placeholder="Borrower"id="borrower-name" disabled>
            </div>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-6">
            <label for="exampleInputEmail1">Collector</label>
            <div class="input-group">
              <?php foreach($main->getAllEmployees('collector') as $collector):?>
              <span class="input-group-addon"><i class="fa fa-black-tie"></i></span>
              <select class="form-control" id="collector">
                <option value="">Select Collector</option>
                <option value="<?php echo $collector['empID']?>"><?php echo ucfirst($collector['fName']).' '.mb_substr($collector['mName'], 0, 1, 'utf-8').'. '.ucfirst($collector['lName']); ?></option>
              </select>
             <?php endforeach;?>
            </div>
          </div>
          <div class="col-md-6">
            <label for="exampleInputEmail1">Collection Received</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-money"></i></span>
              <input type="number" class="form-control" id="collection-receive" placeholder="Insert Amount">
            </div>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-5">
            <label for="exampleInputEmail1">Collection Date(YYYY-MM-DD)</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa  fa-calendar"></i></span>
              <input type="text" class="form-control" id="collection-date" placeholder="Insert Amount">
            </div>
          </div>
          <div class="col-md-7">
            <label for="exampleInputEmail1">Comment</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
              <textarea class="form-control" id="comment"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="insert-collection">Save changes</button>
      </div>
    </div>
  </div>
</div>
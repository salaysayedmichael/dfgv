
<div id="showLoanDetailsModal" class="modal fade">
  <div class="modal-dialog  modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Loan Details</h4>
      </div>
      <div class="modal-body" >
        <fieldset>
          <legend>Loan Application No: <span id="ldm-applicationID"></span> <input type="text" class="form-control pull-right wd-50" id="ldm-borrower-name" disabled /></legend>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Purpose</label><input type="text" class="form-control" id="ldm-purpose" disabled />
                    </div>

                    <div class="form-group">
                      <label>Loan Status</label><input type="text" class="form-control" id="ldm-loan-status" disabled />
                    </div>
                    <div class="form-group">
                        <label>Loan Type</label><input type="text" class="form-control" id="ldm-loan-type" disabled />
                    </div>
                    
                 </div>
                  
                <div class="col-md-4">
                  <div class="form-group">
                        <label>Processor</label><input type="text" class="form-control" id="ldm-Processor" disabled />
                    </div>
                    <div class="form-group">
                        <label>Loan Amount</label><input type="text" class="form-control text-right" id="ldm-loan-amount" disabled />
                    </div>
                    <div class="form-group">
                        <label>Loan Interest Rate</label><input type="text"  class="form-control  text-right" id="ldm-interest-rate" disabled />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Total Payable</label><input type="text" class="form-control  text-right" id="ldm-total-payable" disabled />
                    </div>
                    <div class="form-group">
                        <label>Total Total Collected</label><input type="text" class="form-control  text-right" id="ldm-total-collected" disabled />
                    </div>
                    <div class="form-group">
                        <label>Collectible</label><input type="text" class="form-control  text-right" id="ldm-total-collectible" disabled />
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset>
          <legend>Collection Details</legend>
          <table class="table table-bordered table-striped table-hover" id="ldm-tbl-collection">
            <thead>
              <th>#</th>
              <th>Collection Date</th>
              <th>Collector</th>
              <th>Amount</th>
              <th>Comment</th>
            </thead>
            <tbody id="ldm-tbl-collection-body">
              <tr>
                <td>xxx</td>
                <td>xxx</td>
                <td>xxx</td>
                <td>xxx</td>
                <td>xxx</td>
              </tr>
            </tbody>
          </table>
        </fieldset>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
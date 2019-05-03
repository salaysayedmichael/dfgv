<div class="modal fade in" id="add-comaker-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Add Comaker</h4>
      </div>
      <div class="modal-body" id="addComaker">
        <form-wizard title="" :order="order" v-on:finish="finish" :disabled="disabled" :contents="contents" :text="text">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
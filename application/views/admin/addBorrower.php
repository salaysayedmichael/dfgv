</section><!--End of sidebar.php .content-header-->
<?php
    include_once("application/views/modals/addEmployer.modal.php");
?>
<section class="content" id="addBorrower">
    <form-wizard title="Add Borrower" :order="order" v-on:finish="finish" :disabled="disabled" :contents="contents" :text="text">
</section>
<?php 
    include_once("application/views/modals/addComaker.modal.php");
    
?>
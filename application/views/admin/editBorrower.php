</section><!--End of sidebar.php .content-header-->
<?php
    $id = isset($_GET['id'])?$_GET['id']:'';
    if($id == 0 || $id == '' || count($main->getAll("SELECT * FROM `borrower` WHERE borrowerID = ? ;",array($id)))<=0){
        require_once("application/views/admin/error.php");
    }else{
        ?>
        <section class="content" id="editBorrower">
            <form-wizard title="Edit Borrower" :order="order" v-on:finish="finish" :disabled="disabled" :contents="contents" :text="text">
        </section>
        <?php
    }
    include_once("application/views/modals/addEmployer.modal.php");
    include_once("application/views/modals/addComaker.modal.php");
?>
//List of Employee Table
$('#tbl-empList,#tbl-collector,#tbl-collections,#tbl-collectionInfo,#tbl-LoanList').DataTable();
//List of datepickers
$('#birthdate,#edit-birthdate,#collection-date').datepicker({
	format: "yyyy-mm-dd"
});
$('.text-date').datepicker({
	format: "yyyy-mm-dd"
});

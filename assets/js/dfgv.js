// event handlers
$(document).ready(function() 
{
    $(document).on('click','#btn-addLoan',function(){
    	 addLoan();
	});



});


// end of event handlers
//--------------------------------------
// functions
function returnAJAX(method, url, data)
	{
		return $.ajax({
						method : method,
						url    : url,
						data   : data,
						cachec : false
					});
	}; 
function addLoan()
{
	var borrwowerID  = $('#borrower').val();
	var interestRate = $('#interestRate').val();
	var purpose      = $('#purpose').val();
	var loanType     = $('#loanType').val();
	var LoanAmount     = $('#LoanAmount').val();

	var data = {'borrwowerID':borrwowerID,'interestRate':interestRate,'purpose':purpose,'loanType':loanType,'LoanAmount':LoanAmount,'action':'addLoanApplication'};
		var url  = 'application/controllers/admin.controller.php';

		alertify.confirm('<i class="fa fa-check"></i> Warning','<div class="alert alert-warning">Before continuing, please Make sure that all the information provided are correct.</div>',function(){
			$.when(returnAJAX('POST', url, data)).done(function(response){
				result = JSON.parse(response);
				alertify.notify('Processing Loan Application');
				setTimeout(function(){
					if(result.success)
					{
						alertify.alert('<i class="fa fa-check"></i> Success','<div class="alert alert-success">'+result.message+'</div>',function() {
							alertify.success('Refreshing...');
							setTimeout(function(){
								window.location.replace('?p=loans');
							},1500);
						});
					}else {
						alertify.alert('<i class="fa fa-check"></i> Danger','<div class="alert alert-danger">'+result.message+'</div>',function() {
							alertify.success('Refreshing...');
							setTimeout(function(){
								location.reload();
							},1500);
						});
					}
				},1500);
				
			});
		},function(){
			alertify.notify('Cancel');
		});
}
//end of functions
//--------------------------------------
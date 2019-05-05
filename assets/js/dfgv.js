// event handlers
$(document).ready(function() 
{
    $(document).on('click','#btn-addLoan',function(){
    	 addLoan();
	}); 

	$(document).on('click','.loan-row-click',function(){
    	 // addLoan();
    	 var id = $(this).prop('id');
    	 showLoanDetails(id);
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
function showLoanDetails(id)
{
	$('#ldm-applicationID').html(id);
	var data = {'applicationID':id,'action':'loadLoanData'};
	var url  = 'application/controllers/admin.controller.php';
	$.when(returnAJAX('POST', url, data)).done(function(response){
			result = JSON.parse(response);
			if(result.success)
			{
				var purpose       = result.purpose;
				var borrower_name = result.borrower_name;
				var loanAmount    = result.loanAmount;
				var interest_rate = result.interest_rate;
				var totalPayable  = result.totalPayable;
				var loan_status   = result.loan_status;
				var loan_type     = result.loan_type;
				var purpose       = result.purpose;
				var processor     = result.processor;
				var collected     = result.collected;
				var collectible   = result.collectible;
				console.log(loan_status);
				$('#ldm-borrower-name').val(borrower_name);
				$('#ldm-purpose').val(purpose);
				$('#ldm-loan-status').val(loan_status);
				$('#ldm-loan-type').val(loan_type);
				$('#ldm-Processor').val(processor);
				$('#ldm-loan-amount').val(loanAmount);
				$('#ldm-interest-rate').val(interest_rate+'\%');
				$('#ldm-total-payable').val(totalPayable);
				$('#ldm-total-collected').val(collected);
				$('#ldm-total-collectible').val(collectible);

				$('#ldm-tbl-collection-body').html('<tr><td colspan-"3">Loading Data</td></tr>');
				loadCollectionInfoInModal(id,'ldm-tbl-collection-body');
			}	
			
		},function(){
			
		});
	$('#showLoanDetailsModal').modal();
}

function loadCollectionInfoInModal(applicationNo,tbody_id)
{
	var data = {'applicationNo':applicationNo,'action':'loadCollectionInfoByApplication'};
	var url  = 'application/controllers/admin.controller.php';
	$.when(returnAJAX('POST', url, data)).done(function(response){
			result = JSON.parse(response);
			if(result.success)
			{
				$("#"+tbody_id).html(result.html);
			}	
			
		},function(){
			
		});
}
//end of functions
//--------------------------------------
// event handlers
$(document).ready(function() 
{
    $(document).on('click','#btn-add-borrower',function(){
    	 addBorrower();
	}); 

	$(document).on('click','#btn-cancel',function(){
    	 $('.form-control').val("");
	});

	$(document).on('change','.amount',function(){
    	 computeNetIncome();
	});

	$(document).on('click','.user-login',function(){
    	 userlogin();
	});
});


// end of event handlers
//--------------------------------------
// functions
function addBorrower()
{
	var fname                    = $('#fname').val();
	var mname                    = $('#mname').val();
	var lname                    = $('#lname').val();
	var borrower_bdate           = $('#borrower_bdate').val();
	var borrower_gender          = $('#borrower_gender').val();
	var borrower_civil_status    = $('#borrower_civil_status').val();
	var borrower_present_address = $('#borrower_present_address').val();
	var borrower_home_address    = $('#borrower_home_address').val();
	var own_house                = $('#own_house').val();
	var lenght_of_stay           = $('#lenght_of_stay').val();
	var num_of_children          = $('#num_of_children').val();
	var num_of_dependents        = $('#num_of_dependents').val();
	var occupation               = $('#occupation').val();
	var Employer                 = $('#Employer').val();
	var valid_id                 = $('#valid_id').val();
	var contact_number           = $('#contact_number').val();
	var name_spouse              = $('#name_spouse').val();
	var spouse_bdate             = $('#spouse_bdate').val();
	var spouse_gender            = $('#spouse_gender').val();
	var spouse_civil_status      = $('#spouse_civil_status').val();
	var spouse_present_address   = $('#spouse_present_address').val();
	var spouse_home_address      = $('#spouse_home_address').val();
	var spuse_occupation         = $('#spuse_occupation').val();
	var spouse_employer          = $('#spouse_employer').val();
	var spouse_valid_id          = $('#spouse_valid_id').val();
	var spouse_contact_number    = $('#spouse_contact_number').val();
	var borrower_income          = $('#borrower_income').val();
	var spouse_income            = $('#spouse_income').val();
	var other_income             = $('#other_income').val();
	var other_income_details     = $('#other_income_details').val();
	var net_income               = $('#net_income').val();
	var exp_food                 = $('#exp_food').val();
	var exp_bills                = $('#exp_bills').val();
	var exp_education            = $('#exp_education').val();
	var exp_rentals              = $('#exp_rentals').val();
	var exp_repair               = $('#exp_repair').val();
	var exp_miscellaneous        = $('#exp_miscellaneous').val();
	// check if required information hav values
	var missing_count = 0;
	var missing_fields = "It seems that there are missing information. The following fields are required.<br /> <span style='color:red;'>";
	if(fname.length == 0)
	{
		missing_count++;
		missing_fields += "\tFirst Name<br />";
	}
	if(lname.length == 0)
	{
		missing_count++;
		missing_fields += "\tLast Name<br />";
	}

	if(borrower_bdate.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's Birth Date<br />";
	}
	if(borrower_present_address.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's Present Address<br />";
	}
	if(borrower_home_address.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's Home Address<br />";
	}
	if(own_house.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's House Ownership<br />";
	}
	if(lenght_of_stay.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's Length of Stay<br />";
	}

	if(occupation.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's Occupation<br />";
	}

	if(Employer.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's Employer<br />";
	}

	if(valid_id.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's Valid ID<br />";
	}

	if(contact_number.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's Contact Number<br />";
	}

	if(net_income.length == 0)
	{
		missing_count++;
		missing_fields += "\tBorrower's Net Income<br />";
	}
	missing_fields += "</span>";
	if(false && missing_count>0)
	{
		alertify.alert(missing_fields);
	}
	else
	{
		var type = "insertNewBorrower";
		var url = "../process" ;
		 $.ajax({
		         type: "POST",
		         url:url, 
		         data: {
		         	type,
		         	fname,
					mname,
					lname,
					borrower_bdate,
					borrower_gender,
					borrower_civil_status,
					borrower_present_address,
					borrower_home_address,
					own_house,
					lenght_of_stay,
					num_of_children,
					num_of_dependents,
					occupation,
					Employer,
					valid_id,
					contact_number,
					name_spouse,
					spouse_bdate,
					spouse_gender,
					spouse_civil_status,
					spouse_present_address,
					spouse_home_address,
					spuse_occupation,
					spouse_employer,
					spouse_valid_id,
					spouse_contact_number,
					borrower_income,
					spouse_income,
					other_income,
					other_income_details,
					net_income,
					exp_food,
					exp_bills,
					exp_education,
					exp_rentals,
					exp_repair,
					exp_miscellaneous
		         },
		         dataType: "text",  
		         cache:false,
		         success: 
		              function(data){
		              	data = JSON.parse(data);
		              	console.log(data);
		                // alert(data);  //as a debugging message.
		              }
		          });// you have missed this bracket
		     return false;
		
	}

	
}

function computeNetIncome()
{
	var borrower_income   = $('#borrower_income').val()>0?$('#borrower_income').val():0;
	var spouse_income     = $('#spouse_income').val()>0?$('#spouse_income').val():0;
	var other_income      = $('#other_income').val()>0?$('#other_income').val():0;
	var exp_food          = $('#exp_food').val()>0?$('#exp_food').val():0;
	var exp_bills         = $('#exp_bills').val()>0?$('#exp_bills').val():0;
	var exp_education     = $('#exp_education').val()>0? $('#exp_education').val():0;
	var exp_rentals       = $('#exp_rentals').val()>0?$('#exp_rentals').val():0;
	var exp_repair        = $('#exp_repair').val()>0?$('#exp_repair').val():0;
	var exp_miscellaneous = $('#exp_miscellaneous').val()>0?$('#exp_miscellaneous').val():0; 
	var total_income      = parseFloat(borrower_income)+parseFloat(spouse_income)+parseFloat(other_income);
	var total_expenses    = parseFloat(exp_food)+parseFloat(exp_bills)+parseFloat(exp_education)+parseFloat(exp_rentals)+parseFloat(exp_repair)+parseFloat(exp_miscellaneous);
	var net_income        = total_income-total_expenses;
	$('#s-total-income').html("Php. "+total_income);
	$('#s-total-expenses').html("Php. "+total_expenses);
	$('#net_income').val(net_income);
}

function userlogin()
{
	var username = $('#username').val();
	var password = $('#password').val();
	var type = "login";
	var url = 'login/getUserInfo/';
	 $.ajax({
	         type: "POST",
	         url:url, 
	         data: {
	         	type,
	         	username,
	         	password
	         },
	         dataType: "text",  
	         cache:false,
	         success: 
	              function(data){
	              	data = JSON.parse(data);
	              	if(!data.success)
	              	{
	              		alertify.alert("Login Failed","The Username and Password you provided is incorrect.");
	              	}
	              	else
	              	{
	              		window.location.assign('dashboard/view');
	              	}
	              	
	              	console.log(data);
	                // alert(data);  //as a debugging message.
	              }
	          });// you have missed this bracket

}
//end of functions
//--------------------------------------
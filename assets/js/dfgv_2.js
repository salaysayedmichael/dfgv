$(document).ready(function(){
	
	function returnAJAX(method, url, data)
	{
		return $.ajax({
						method : method,
						url    : url,
						data   : data,
						cachec : false
					});
	};

	function showActiveBar()
	{
		var url = window.location;
		// for sidebar menu but not for treeview submenu
		$('ul.sidebar-menu a').filter(function() {
		    return this.href == url;
		}).parent().siblings().removeClass('active').end().addClass('active');
		// for treeview which is like a submenu
		$('ul.treeview-menu a').filter(function() {
		    return this.href == url;
		}).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active menu-open').end().addClass('active menu-open');
	}
	showActiveBar();

	function dfgvAlert(title, type, message)
	{
		if(type == 'alert')
		{
			alertify.alert(title, message);
		}
	}
	function lazyData(columns, parent){
		data = {}
		errors = []
		$.each(columns,function(index,val){
			placeholder = $(`${parent} #${val}`).attr("placeholder")
			type = $(`${parent} #${val}`).attr("type")
			value = $(`${parent} #${val}`).val()
			if(type!="date"){
				if(type=="text"){
					if(value.trim()==="" || value.trim()===null){
						errors.push(placeholder)
						return false;
					}
				}else{
					if(value === "" || value === null){
						errors.push(placeholder)
						return false;
					}
				}
				
			}else{
				if (!Date.parse(value)) {
					errors.push(placeholder)
					return false;
				}
			}
			data[val] = value;
		})
		if (errors.length !== 0) {
			alert(`${errors.join()} field should be set.`)
			return {}
		}
		return data
	}
	$('#login').on('click',function(e){
		e.preventDefault();
		var user_id  = $('#user-id').val();
		var password = $('#password').val();
		var data     = {'user_id' :user_id,
						'password':password,
						'action'  :'login'};
		var url      = 'application/controllers/main.controller.php';

		$.when(returnAJAX('POST', url, data)).done(function(response){
			data = JSON.parse(response);
			console.log(data);
			if(!data.error)
			{
				$('#login').val('Please wait....');
				$('#login').attr("disabled","true");
				$('#login').val('Redirecting....');
				location.reload();
			}
			else
			{
				alert(data.message);
			}
		});
	});

	//Add Employee
	$('#btn-addEmployee').on('click',function(e){
		e.preventDefault();
		var lName         = $('#lName').val();
		var fName         = $('#fName').val();
		var mName         = $('#mName').val();
		var address       = $('#address').val();
		var email         = $('#email').val();
		var per_phone     = $('#personal-phone').val();
		var home_phone    = $('#home-phone').val();
		var position      = $('#position').val();
		var birthdate     = $('#birthdate').val();
		var gender        = $('#gender').val();
		var status        = $('#status').val();
		var user_id       = $('#user-id').val();
		var password      = $('#password').val();
		var cpassword     = $('#cpassword').val();
		var url           = 'application/controllers/admin.controller.php';
		var data          = {
						  	'lName':lName, 'fName':fName, 'mName':mName,
		                  	'address':address, 'email':email, 'per_phone':per_phone,
		                  	'home_phone':home_phone, 'position':position, 'birthdate':birthdate,
		                  	'gender':gender, 'status':status, 'user_id':user_id,
		                  	'password':password, 'cpassword':cpassword, 'action':'addEmployee'
		                    };
		$.when(returnAJAX('POST', url, data )).done(function(response){
			result = JSON.parse(response);
			if(result.error)
			{
				// dfgvAlert('<i class="fa fa-warning"></i> Warning', 'alert', '<div class="alert alert-warning">'+result.message+'</div>');
				alertify.error(result.message);
				if(result.type == 'personal_info')
				{
					$('a[href="#personal-info"]').addClass('shake animated');
				}
				else if(result.type == 'login_details')
				{
					$('a[href="#login-details"]').addClass('shake animated');
				}
				setTimeout(function(){
					$('a[href="#login-details"],a[href="#personal-info"]').removeClass('shake animated');
				},1000);
			}
			else
			{
				alertify.confirm('<i class="fa fa-check"></i> Success', '<div class="alert alert-success">'+result.message+'\nDo you want to add another employee?'+'</div>',function(){
					setTimeout(function(){
						location.reload();
					},1000);
				},function(){
					alertify.success('Redirecting to employee list...');
					setTimeout(function(){
						location.href = "?employee";
					},2000);
				});
				
			}
		});

	});

	//Update Employee info
	$('body').on('click','.empEdit',function(){
		var id = $(this).attr('id');
		$('#lName').val(id);
	});
	//Soft Delete Employee
	$('body').on('click','.empDel',function(){
		var id   = $(this).attr('id');
		var data = {'userID':id,'action':'deleteEmp'};
		var url  = 'application/controllers/admin.controller.php';

		alertify.confirm('<i class="fa fa-check"></i> Warning','<div class="alert alert-warning">Do you really want to delete this employee?</div>',function(){
			$.when(returnAJAX('POST', url, data)).done(function(respsonse){
				result = JSON.parse(response);
			});
		},function(){
			alertify.notify('Cancel');
		});
		
	});
	$('#addBorrower').on('click',function(e){
		e.preventDefault();
		var columns = [`fName`, `mName`, `lName`, `bDay`, `civilStatus`, `gender`, `presentAddr`, `homeAddr`, `ownHouse`, `renting`, `lengthOfStay`, `noOfChildren`, `occupation`, `contactNo`, `validID`, `loanCount`, `comakerID`]
		data = lazyData(columns,'#add-borrower-modal')
		if($.isEmptyObject(data)){
			return
		}
		data["action"] = "addBorrower";
		url      = 'application/controllers/main.controller.php';
		$('#addBorrower').prop("disabled",true)
		$('#addBorrower').text("Adding..")
		$.when(returnAJAX('POST', url, data)).done(function(response){
			response = JSON.parse(response);
			if(response){
				alert("Borrower successfully added!");
			}else{
				alert("Error occured!");
			}
			$('#addBorrower').prop("disabled",false)
			$('#addBorrower').text("Add Borrower")
			setTimeout(() => {
				location.reload();
			}, 2000);
		});
	});
	$('.editBorrowerBtn').on('click',function(e){
		data = {}
		data["action"] = "getBorrower";
		data["id"] = $(this).data("id")
		url      = 'application/controllers/main.controller.php';
		$.when(returnAJAX('POST', url, data)).done(function(response){
			response = JSON.parse(response);
			$.each(response,function(key,value){
				$.each(value,function(index,val){
					$(`#${index}`).val(val)
				})
			})
			$("#edit-borrower-modal").modal("show")
		});
	});
	$('.deleteBorrowerBtn').on('click',function(e){
		data = {}
		data["action"] = "deleteBorrower"
		data["id"] = $(this).data("id")
		var deleteMessage = confirm("Do you really want to delete this?");
		if (deleteMessage == true) {
			url      = 'application/controllers/main.controller.php';
			$.when(returnAJAX('POST', url, data)).done(function(response){
				response = JSON.parse(response);
				if(response){
					alert("Borrower data has been deleted!");
				}else{
					alert("Error occured!");
				}
				setTimeout(() => {
					location.reload();
				}, 2000);
			});
		}
	});
	$('#saveBorrower').on('click',function(e){
		e.preventDefault();
		var columns = [`borrowerID`,`fName`, `mName`, `lName`, `bDay`, `civilStatus`, `gender`, `presentAddr`, `homeAddr`, `ownHouse`, `renting`, `lengthOfStay`, `noOfChildren`, `occupation`, `contactNo`, `validID`, `loanCount`, `comakerID`]
		data = lazyData(columns,'#edit-borrower-modal')
		if($.isEmptyObject(data)){
			return
		}
		data["action"] = "saveBorrower";
		url      = 'application/controllers/main.controller.php';
		$('#saveBorrower').prop("disabled",true)
		$('#saveBorrower').text("Saving..")
		$.when(returnAJAX('POST', url, data)).done(function(response){
			response = JSON.parse(response);
			if(response){
				alert("Changes successfully saved!");
			}else{
				alert("Error occured!");
			}
			$('#saveBorrower').prop("disabled",false)
			$('#saveBorrower').text("Save Changes")
			setTimeout(() => {
				location.reload();
			}, 2000);
		});
	});
	$('#tbl-empList').DataTable();
});
//Tables

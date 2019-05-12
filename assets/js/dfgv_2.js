$(document).ready(function(){
	function URL(controller) {
		return "application/controllers/"+controller+".controller.php";
	};
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
	
	//Show password
	$('i#sw-password').on('click',function(){
		$('#password,#edit-password').prop('type','text');
		$('#hd-password').removeClass('hide');
		$(this).addClass('hide');
	});
	$('i#sw-cpassword').on('click',function(){
		$('#cpassword,#edit-cpassword').prop('type','text');
		$('#hd-cpassword').removeClass('hide');
		$(this).addClass('hide');
	});

	//Hide Password
	$('i#hd-password').on('click',function(){
		$('#password,#edit-password').prop('type','password');
		$('#sw-password').removeClass('hide');
		$(this).addClass('hide');
	});
	$('i#hd-cpassword').on('click',function(){
		$('#cpassword,#edit-cpassword').prop('type','password');
		$('#sw-cpassword').removeClass('hide');
		$(this).addClass('hide');
	});

	//Login 
	function login(){ //modified by Joe Apr 24 2019 (so that we can reuse the login function)
		var user_id  = $('#user-id').val();
		var password = $('#password').val();
		var data     = {'user_id' :user_id,
						'password':password,
						'action'  :'login'};
		var url      = 'application/controllers/main.controller.php';

		$.when(returnAJAX('POST', url, data)).done(function(response){
			data = JSON.parse(response);
			if(!data.error)
			{
				$('#login').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
				$('#login').attr("disabled","true");
				setTimeout(function(){
					alertify.success("Access Granted");
					setTimeout(function(){
						location.reload();
					},1300);
				},2000);
			}
			else
			{
				alertify.error(data.message);
			}
		});
	}
	$('#login-form input').on('keypress',function(e){
		if(e.which == 13) {
			login()
		}
	});
	$('#login').on('click',function(e){
		e.preventDefault();
		login()
	});

	//Disabling Login details when employee is collector
	$('#edit-position,#position').on('change',function(){
		if($('#edit-position,#position').val() == "collector") {
			$(".login-tab #user-id").val("");
			$(".login-tab #password").val("");
			$(".login-tab #cpassword").val("");
			$(".login-tab").hide().fadeOut();
		} else {
			$(".login-tab").show().fadeIn();
		}
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
						location.href = "?p=employee";
					},2000);
				});
				
			}
		});

	});

	//Update Employee info
	$('#btn-editEmployee').on('click',function(e){
		e.preventDefault();
		var lName         = $('#edit-lName').val();
		var fName         = $('#edit-fName').val();
		var mName         = $('#edit-mName').val();
		var address       = $('#edit-address').val();
		var email         = $('#edit-email').val();
		var per_phone     = $('#edit-personal-phone').val();
		var home_phone    = $('#edit-home-phone').val();
		var position      = $('#edit-position').val();
		var birthdate     = $('#edit-birthdate').val();
		var gender        = $('#edit-gender').val();
		var status        = $('#edit-status').val();
		var user_id       = $('#edit-user-id').val();
		var password      = $('#edit-password').val();
		var cpassword     = $('#edit-cpassword').val();
		var url           = 'application/controllers/admin.controller.php';
		var data          = {
						  	'lName':lName, 'fName':fName, 'mName':mName,
		                  	'address':address, 'email':email, 'per_phone':per_phone,
		                  	'home_phone':home_phone, 'position':position, 'birthdate':birthdate,
		                  	'gender':gender, 'status':status, 'user_id':user_id,
		                  	'password':password, 'cpassword':cpassword, 'action':'editEmployee'
		                    };
		$.when(returnAJAX('POST', url, data)).done(function(response) {
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
				alertify.alert('<i class="fa fa-check"></i> Success', '<div class="alert alert-success">'+result.message+'</div>',function(){
					alertify.success('Redirecting to employee list...');
					setTimeout(function(){
						location.href = "?p=employee";
					},2000);
				});
				
			}
		});

	});

	//Soft Delete Employee
	$('body').on('click','.empDel',function(){
		var id   = $(this).attr('id');
		var data = {'userID':id,'action':'deleteEmp'};
		var url  = 'application/controllers/admin.controller.php';

		alertify.confirm('<i class="fa fa-check"></i> Warning','<div class="alert alert-warning">Do you really want to delete this employee?</div>',function(){
			$.when(returnAJAX('POST', url, data)).done(function(response){
				result = JSON.parse(response);
				alertify.notify('Deleting Employee...');
				setTimeout(function(){
					if(!result.error)
					{
						alertify.alert('<i class="fa fa-check"></i> Success','<div class="alert alert-success">'+result.message+'</div>',function() {
							alertify.success('Refreshing...');
							setTimeout(function(){
								location.reload();
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
		
	});

	//Get collection
	$('body').on('click','.get-collection',function() {
		var id   = $(this).attr("id");
		var data = {'app_no':id,'action':'get_collection'};
		var url  = 'application/controllers/admin.controller.php';
		$.when(returnAJAX('POST', url, data)).done(function(response) {
			result = JSON.parse(response);
			if(!result.error) {
				$('#application-no').val(result.data[0][0]["applicationNo"]);
				$('#borrower-name').val(result.data[0][0]["fName"]+" "+result.data[0][0]["mName"].charAt(0).toUpperCase()+". "+result.data[0][0]["lName"]);
				$('#borrower-name').attr("borrower-id",result.data[0][0]["borrowerID"])
			}
		});
		
	});

	//Insert Collection
	$('#insert-collection').on('click',function() {
		var data = {"app_no"   : $("#application-no").val(),
					"borrower" : $("#borrower-name").attr("borrower-id"),
					"collector": $("#collector").val(),
					"received" : $("#collection-receive").val(),
					"date"     :$("#collection-date").val(),
					"comment"  : $("#comment").val(),
					"action"   :"insert_collection"
				};

		$.when(returnAJAX('POST', URL("admin"), data)).done(function(response) {
			result = JSON.parse(response);
			if(!result.error) {
				alertify.alert("Success","<div class='alert alert-success'>"+result.message+"</div>",function(){
					$("#collection-modal").modal("hide");
					alertify.success("Refreshing page...");
					setTimeout(function(){
						location.reload();
					},1500);
				});
			}
			else {
				dfgvAlert("Error", "alert", "<div class='alert alert-danger'>"+result.message+"</div>")
			}
		});

	});

	//View Collection Details/Details
	$("body").on("click",".view-collection",function(){
		var data = {"id"	 : $(this).attr("id"),
					"action" : "view_collection"
				};
		$.when(returnAJAX("POST", URL("admin"), data)).done(function(response) {
			result = JSON.parse(response);
			console.log(result);
			if(result.success){
				var borrower 		= result.data["fname"]+" "+result.data["mname"].charAt(0)+". "+result.data["lname"];
				var collection_left = parseFloat(result.data["totalpayable"]) - parseFloat(result.data["c_mount"]);
				var collection      = isNaN(collection_left) ? "" : collection_left;
				$("#view-collection-modal #view-application-no").val(result.data["applicationno"]);
				$("#view-collection-modal #view-borrower").val(borrower);
				$("#view-collection-modal #view-loan").val(+result.data["loanAmount"]);
				$("#view-collection-modal #view-interest").val(result.data["percentage"]+"%");
				$("#view-collection-modal #view-payables").val(result.data["totalpayable"]);
				$("#view-collection-modal #view-collection").val(result.data["c_amount"]);
				$("#view-collection-modal #view-collection-left").val(collection);
			}
		});		
	});
	function lazyData(element,getError = false){
		data = {}
		errors = []
		tobeReturned = []
		$(`${element} .form-control`).each(function(){
			placeholder = $(this).parent().children("span").text()
			type = $(this).attr("type")
			value = $(this).val()
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
			data[placeholder] = value;
		})
		if (errors.length !== 0) {
			if(getError){
				tobeReturned.error = `${errors.join()} field should be set.`
				tobeReturned.data = {}
				return tobeReturned
			}
			alert(`${errors.join()} field should be set.`)
			return {}
		}
		if(getError){
			tobeReturned.data = data
			return tobeReturned
		}
		return data
	}
	$("#addComakerModalBtn").on("click",function(e){
		e.preventDefault();
		$("#add-comaker-modal").modal("show")
	})
	$('#addComakerBtn').on('click',function(e){
		e.preventDefault();
		arrayOfData = {}
		arrayOfData["comaker"] = lazyData("#add-comaker-modal #comakerInfo")
		if($.isEmptyObject(arrayOfData["comaker"])){
			return
		}
		arrayOfData["action"] = "addComaker";
		url      = 'application/controllers/main.controller.php';
		$('#addComakerBtn').prop("disabled",true)
		$('#addComakerBtn').text("Adding..")
		$.when(returnAJAX('POST', url, arrayOfData)).done(function(response){
			response = JSON.parse(response);
			if(response.success){
				alert("Comaker successfully added!");
			}else{
				alert("Error occured!");
			}
			$('#addComakerBtn').prop("disabled",false)
			$('#addComakerBtn').text("Add Comaker")
			$("#add-comaker-modal").modal("hide")
			$("#addBorrower span:contains('Comaker')").parent().children(".form-control").append(`
				<option value="${response.id}">${response.name}</option>
			`)
		});
	});
	$('#addBorrowerBtn').on('click',function(e){
		e.preventDefault();
		arrayOfData = {}
		getData = []
		categories = ['borrower','income','expenses','comaker']
		error = ""
		$.each(categories,function(index,val){
			getData[`${val}`] = lazyData(`#addBorrower #${val}Info`,true)
			arrayOfData[`${val}`] = getData[`${val}`]["data"]
			if(getData[`${val}`]["error"] !== undefined){
				error += getData[`${val}`]["error"]+"\r\n";
			}
		})
		isThereEmpty = ($.isEmptyObject(arrayOfData["borrower"]))||($.isEmptyObject(arrayOfData["income"]))||($.isEmptyObject(arrayOfData["expenses"]))||($.isEmptyObject(arrayOfData["comaker"]))
		if($("#addBorrower #spouseInfo [placeholder='Name of Spouse']").val()!=""){
			getData["spouse"] = lazyData("#addBorrower #spouseInfo",true)
			arrayOfData["spouse"] = getData["spouse"]["data"]
			if(getData[`spouse`]["error"] !== undefined){
				error += getData[`spouse`]["error"];
			}
			isThereEmpty = ($.isEmptyObject(arrayOfData["borrower"]))||($.isEmptyObject(arrayOfData["income"]))||($.isEmptyObject(arrayOfData["expenses"]))||($.isEmptyObject(arrayOfData["comaker"]))||($.isEmptyObject(arrayOfData["spouse"]))
		}
		if(isThereEmpty){
			alert(error)
			return
		}
		arrayOfData["action"] = "addBorrower";
		url      = 'application/controllers/main.controller.php';
		console.log(arrayOfData)
		$('#addBorrowerBtn').prop("disabled",true)
		$('#addBorrowerBtn').text("Adding..")
		$.when(returnAJAX('POST', url, arrayOfData)).done(function(response){
			response = JSON.parse(response);
			window.location.replace("?p=borrowers");
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
		data = lazyData(columns,'#edit-borrower-modal');
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
	function calculate(){
		totalIncome = 0
		totalExpenses = 0
		$("#incomeInfo input[type=number]:not(#netIncome)").each(function(){
			val = $(this).val()
			if(val == ""){
				val = 0
			}
			totalIncome = totalIncome + parseInt(val)
		})
		$("#expensesInfo input[type=number]").each(function(){
			val = $(this).val()
			if(val == ""){
				val = 0
			}
			totalExpenses = totalExpenses + parseInt(val)
		})
		netIncome = Number(totalIncome - totalExpenses)
		$("#totalExpensesText").text("")
		$("#totalExpensesText").text(totalExpenses)
		$("#totalIncomeText").text("")
		$("#totalIncomeText").text(totalIncome)
		$("#netIncome").val("")
		$("#netIncome").val(netIncome)
	}
	$("#incomeInfo input[type=number]").each(function(){
		$(this).on('keyup',function(){
			calculate()
		})
	})
	$("#expensesInfo input[type=number]").each(function(){
		$(this).on('keyup',function(){
			calculate()
		})
	})

	$('#tbl-empList').DataTable();
	$.fn.dataTable.ext.errMode = 'none';
	$('#borrowerTbl')
		.on( 'error.dt', function ( e, settings, techNote, message ) {
			console.log( 'An error has been reported by DataTables: ', message );
		} )
		.DataTable();
});
//Tables

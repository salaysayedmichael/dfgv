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
	$('#tbl-empList').DataTable();
});
//Tables

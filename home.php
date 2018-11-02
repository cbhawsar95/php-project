<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles.css">  
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">  
   	<style type="text/css">
   	.error{
   			color:red;
   		}
   	.btn{
   		font-size: 12px;
   	}

   	</style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
	<!-- Header -->
	<div class="header" >			
		<h1>User Management System</h1>
	</div>
	<!-- Content Section -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 id="head">CRUD Operations On User Table:-</h2>
				<div class="float-right">
					<button class="btn btn-success" id="addUserBtn" data-toggle="modal" data-target="#userModal">Add User Record</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<h4>Records:</h4>
			<div class="records_content" >
				<!-- <table id="userDetails" class="display" style="width:100%"> -->
				<table id="userDetails" class="table table-striped table-bordered nowrap" style="width:100%">
			 	
			      <thead>
			            <tr>
			            	<th>No.</th>
			                <th>First name</th>
			                <th>Last name</th>
			                <th>Gender</th>
			                <th>E-mail</th>
			                <th>Designation</th>
			                <th>Address</th>
			                <th>Edit</th>
			                <th>Delete</th>
			            </tr>
			       </thead>
			    </table>  
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
<div class="footer" >			
	<p>	&copy; bhawsar.chanchal95 </p>
</div>
	<!-- /Content Section -->
	<!-- Bootstrap Modal - To Add New Record -->
<div class="modal fade" id="userModal">
	<div class="modal-dialog">
		<form method="post" id="userForm" name="userForm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalTitle">Add New Record</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
			  		<label for="firstName">First Name</label>
				   	<input type="text" name="firstName" id="firstName" placeholder="First Name" class="form-control" required="" />
				</div>

				<div class="form-group">
					<label for="lastName">Last Name</label>
					<input type="text" name ="lastName" id="lastName" placeholder="Last Name" class="form-control" required="" />
				</div>

				<!-- <div class="form-group">
					<label for="gender"> Gender </label>
					<div class="radio">
						<input type="radio" id="male" name="gender" value="male">Male<br/>
						<input type="radio" id="female" name="gender" value="female">Female<br/>
					</div>
				</div> -->
				<div class="form-group">
					<label>Gender</label>
					<select class="form-control" id="gender" name="gender" required="">
						<option value="">select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="text" id="email" name="email" placeholder="Email Address" class="form-control" required="" />
				</div>

				<div class="form-group">
					<label for="designation">Designation</label>
					<select class="form-control" id="designation" name="designation" required="">
						<option value="">select</option>
						<option value="1">Front-End Developer</option>
						<option value="2">Back-End Developer</option>
					</select>
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" id="address" name="address" placeholder="Address" class="form-control" required="" />
				</div>

			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				 <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
    
				<!-- <button type="submit" id="addBtn" class="btn btn-primary" onclick="" value=>Add Record</button> -->
			</div>
		</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/script.js"></script>

 <script type="text/javascript">
 $(document).ready(function () {
 	 $('#userDetails').DataTable( {
        "processing": true,
        "pageLength": 2,
        "serverSide": true,
        "ajax": "fetchUsers.php" ,
	    "columns": [
	    	{"data": "number"},
	        {"data": "firstName"},
    	    {"data": "lastName"},
        	{"data": "gender"},
        	{"data": "email"},
            {"data": "designation"},
        	{"data": "address"},
        	{"data": "edit"},
        	{"data": "delete"},
        ]
    });

	//$("form[name='userForm']").valid();
 	$('#addUserBtn').click(function(){
 		$('#userForm')[0].reset();
 		$('.modal-title').text("Add User");
 		$('#action').val("add");
 	});
});

	// validate form on keyup and submit
	$("form[name='userForm']").validate({
		rules:{
			firstName:{
				required:true,
				minlength: 3
			},
			lastName:{
				required:true,
				minlength: 3
			},
			gender:{
				required: true,
			},
			email:{
				required:true,
				email: true
			},
			designation: {
				required:true
			},
			address:{
				required: true,
				minlength:3
			},
		},
  	    messages: {
            firstName: {
            	required: "Please enter First Name",
        		minlength: "Your name must be at least 1 characters"
        	},
			lastName: {
            	required: "Please enter your Last Name",
        		minlength: "Your name must be at least 1 characters"
        	},
            gender: "Please Choose your Gender",
            email:{ 
            	required:"Please enter your email",
            	minlength: "Please Enter Valid email"
            },
            designation: "Please choose your designation",
            address: "Please Write your Address",
        },
        errorPlacement: function(error, element) {
    		if ( element.is(":radio") ) {
        		error.prependTo( element.parent() );
        		//error.prependTo( element.parent() );
    		}else{
    			// This is the default behavior of the script
        		error.insertAfter( element );
    		}
		}
	});

	$('#action').on('submit',function () {
    // get values
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    var email = $("#email").val();
    /*var gender =$("input[type=radio]:checked").val();*/
	var gender = $("#gender").val();
    var designation = $("#designation").val();
    var address = $("#address").val();
	if(firstName != '' && lastName != '' && gender != '' && email != '' && designation != '' && address != ''){
 	// Add record
    $.post("addNewUser.php", {
        firstName: firstName,
        lastName: lastName,
        gender: gender,
        email: email,
        designation : designation,
        address : address
    }, function (data,status) {
        // close the popup
        $("form[name='userForm']")[0].reset();
        $("#userModal").modal("hide");
    });
	}
else{
	alert("All Fields Are Required");
	}
});

	function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hiddenUserId").val(id);
    $.post("getUserDetails.php", 
    	{id: id},
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#updateFirstName").val(user.firstName);
            $("#updateLastName").val(user.lastName);
       		$("input[value="+user.gender+"]").prop('checked', true);
           	//$("#updateGender").val(user.gender);
            $("#updateEmail").val(user.email);
            $("#updateDesignation").val(user.designation);
            $("#updateAddress").val(user.address);
        }
    );
    // Open modal popup
     $('#userModal').modal('show');
     $('.modal-title').text("Edit User");
     $('#action').val("Edit");
}

	function UpdateUserDetails() {
    // get values
    var firstName = $("#updateFirstName").val();
    var lastName = $("#updateLastName").val();
/*    var gender = $("input[name=updateGender]").filter(':checked').val();*/
	var gender = $("#updateGender]").val();
    var email = $("#updateEmail").val();
    var designation= $("#updateDesignation").val();
    var address=$("#updateAddress").val();

    // get hidden field value
    var id = $("#hiddenUserId").val();

    // Update the details by requesting to the server using ajax
    $.post("updateUserDetails.php", {
            id: id,
            firstName: firstName,
            lastName: lastName,
            gender: gender,
            email: email,
            designation: designation,
            address: address
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using fetchUsers();
        }
    );
}
//Delete Records
	function DeleteUser(id) {
	    var conf = confirm("Are you sure, do you really want to delete User?");
	    if (conf == true) {
	        $.post("deleteUser.php", {
	                id: id
	            },
	            function (data, status) {
	            }
	        );
	    }
	}    

 </script>
</body>
</html>
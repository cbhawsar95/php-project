$().ready(function() {
	// validate form on keyup and submit
	$("form[name='addUserForm']").validate({
		rules:{
			firstName:{
				required:true,
				minlength: 6
			},
            lastName:{
                required:true,
                minlength: 6
            },
			email:{
				required:true,
				email: true
			},
			gender:{ 
				required:true 
			},
			designation:{
				required: true
			},
	 		address: {
                required: true,
            }
		},
		 messages: {
            firstName: {
            	required: "Please enter your name",
        		minlength: "Your name must be at least 6 characters"
        	},
            lastName: {
                required: "Please enter your name",
                minlength: "Your name must be at least 6 characters"
            },

            email:{ 
            	required:"Please enter your email",
            	minlength: "Please Enter Valid email"
            },
            
            gender: "Please Select any Gender <br>",
            designation: "Please choose Designation",
            address: "Please write your address"
        },
        errorPlacement: function(error, element) {
            if ( element.is(":radio") ) {
                error.prependTo( element.parent() );
            }
            else { // This is the default behavior of the script
                error.insertAfter( element );
            }
        },

        submitHandler: function(form) {
      		form.submit();
      	}
	});
});
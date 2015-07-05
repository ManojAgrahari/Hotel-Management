/*

My Custom JS
============
*/
$(document).ready(function(){

var hd = $("header");
var mn = $(".navbar");

/*    validation   */
$('#registration-form').validate({
	    rules: {
	       inputName: {
	       	minlength: 4,
	        required: true,
	       required: true
	      },
		  
	      inputEmail: {
	        required: true,
	        email: true
	      },

	      inputDate: {
	        required: true,
	        date: true
	      },

	      inputAddress: {
	      	minlength: 10,
	        required: true
	      },

		   inputContact: {
	      	minlength: 10,
	        required: true,
	        number: true
	      },

	      inputPercentage: {
	        required: true,
	        required: true
	      },
		  
		  inputDB: {
		  	minlength: 4,
	        required: true,
	      },
		  agree: "required"
		  
	    },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('error').addClass('success');
			}
	  });
 





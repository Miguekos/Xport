/**
 * File : addProduct.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function(){
	
	var addProductForm = $("#insertProduct");
	
	var validator = addProductForm.validate({
		
		// rules:{
		// 	fname :{ required : true },
		// 	email : { required : true },
		// 	password : { required : true },
		// 	cpassword : {required : true },
		// 	cpassword : {required : true },
		// 	cpassword : {required : true },
		// },
		// messages:{
		// 	fname :{ required : "This field is required" },
		// 	email : { required : "This field is required", email : "Please enter valid email address", remote : "Email already taken" },
		// 	password : { required : "This field is required" },
		// 	cpassword : {required : "This field is required", equalTo: "Please enter same password" },
		// 	mobile : { required : "This field is required", digits : "Please enter numbers only" },
		// 	role : { required : "This field is required", selected : "Please select atleast one option" }			
		// }
	});
});
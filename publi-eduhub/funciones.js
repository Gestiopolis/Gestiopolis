$(function() { 
	var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;	
	$(".boton").click(function(){  
		$(".error").fadeOut().remove();
		
       
        if ($(".email").val() == "" || !emailreg.test($(".email").val())) {
			$(".email").focus().after('<span class="error">X</span>');  
			return false;  
		}  

		 if ($(".nombre").val() == "") {  
			$(".nombre").focus().after('<span class="error">X</span>');  
			return false;  
		}  
		
        if ($(".telefono").val() == "") {  
			$(".telefono").focus().after('<span class="error">X</span>');  
			return false;  
		}  
        if ($(".pais").val() == "") {  
			$(".pais").focus().after('<span class="error">X</span>');   
			return false;  
		}  
    });  
	$(".nombre, .telefono, .pais").bind('blur keyup', function(){  
        if ($(this).val() != "") {  			
			$('.error').fadeOut();
			return false;  
		}  
	});	
	$(".email").bind('blur keyup', function(){  
        if ($(".email").val() != "" && emailreg.test($(".email").val())) {	
			$('.error').fadeOut();  
			return false;  
		}  
	});
});
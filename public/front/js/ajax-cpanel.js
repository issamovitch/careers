$(document).ready(function() {

	// Selectors Vars
	var sender				= $(".sender"),
		result				= $(".result")

	// Fading Time
	var fadingTime			= 1000,
		resultShowTime		= 3000;

	

	// Send Mail with Ajax
		$('#Form').submit( function(e) {
		e.preventDefault();
		var data = new FormData(this);
		$.ajax({
			url: "cpanel/form.php?add",
			type: "post",
			data: data,
			cache: false,
            contentType: false,
            processData: false,
			beforeSend: function() {
				$('.sender').hide(1000);
    			 $('#loader').fadeIn(1000);
				 
  			},
 			 complete: function(){
    		 $('#loader').hide();
  			},
			success: function(data){
				sender.fadeOut(fadingTime, function(){
					result.fadeIn(fadingTime, function() {
						$(this).delay(resultShowTime).fadeOut
					});
				});
				
			},
			error: function(){

			}
		});
		
	});



});

$(function(){  
    $(".btn-finish").click(function(){ 
		document.getElementById("wid").style.width = "100%";
});
});
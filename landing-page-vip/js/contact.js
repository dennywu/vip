$(function(){
	$('#form-contact-us').submit(function(e) {
		e.preventDefault();
		$("#form-contact-us label.error").remove();
	    var postdata = $('#form-contact-us').serialize();
	    $.ajax({
	        type: 'POST',
	        url: 'php/shared/send_form_email.php',
	        data: postdata,
	        dataType: 'json',
	        success: function(json) {
	            if(json.emailMessage != '') {
					$('#form-contact-us .left-form').prepend("<label class='wrap-txt error'>"+ json.emailMessage +"</label>");
	            }
	            if(json.subjectMessage != '') {
					$('#form-contact-us .left-form').prepend("<label class='wrap-txt error'>"+ json.subjectMessage +"</label>");
	            }
	            if(json.messageMessage != '') {
					$('#form-contact-us .left-form').prepend("<label class='wrap-txt error'>"+ json.messageMessage +"</label>");
	            }
	            if(json.emailMessage == '' && json.subjectMessage == '' && json.messageMessage == '') {
	                $('#form-contact-us .left-form').html('<p class="success">Thanks for contacting us! We will get back to you very soon.</p>');
	            }
	        },
			error:function(a,b,c){
				$('.contact-form form').fadeOut('fast', function() {
	                    $('.contact-form').append('<p>'+ a.responseText +'');
	            });
			}
	    });
	});
});
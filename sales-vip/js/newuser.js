$(function(){
	$("#role").change(function(){
		if($("#role").val() == "sales"){
			$("div#div-colaborator").show();
		}
	});
	$('form#addUser').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok ',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi username'
                            }
                        }
                    },
					name: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi nama lengkap user'
                            }
                        }
                    },
					password: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi password'
                            },
							stringLength: {
                                message: 'Minimal password 6 karakter',
								min:6
                            }
                        }
                    },
					phone: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi telpon user'
                            }
                        }
                    },
					email: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi email'
                            },
							emailAddress: {
								message: 'The value is not a valid email address'
							}
                        }
                    },
					role: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan pilih role'
                            }
                        }
                    },
					colaborator: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan pilih colaborator'
                            }
                        }
                    }
                }
            })
});
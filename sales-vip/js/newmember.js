$(function(){
	$('.datepicker').datepicker({
		format: 'dd/mm/yyyy'
	});
	$('form').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok ',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nocard: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi nomor kartu'
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi nama member'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi email member'
                            },
							emailAddress: {
								message: 'The value is not a valid email address'
							}
                        }
                    },
                    birthday: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi tanggal lahir member'
                            }
                        }
                    },
                    job: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi pekerjaan member'
                            }
                        }
                    }
                }
            })
});
$(document).ready(function() {

    // Init jQuery Masked inputs
    $('.phone').mask('9999-9999999');
    $('.phoneext').mask("9999-9999999 ext 9999");
    $('.rif').mask('*-99999999-9');
    $('.cedula').mask('*-99999999');
    $('.passport').mask('*-99999999');
    $('#customers_identity_card').mask('*-999999999', { clearIfNotMatch: true });


    /* @custom validation method (smartCaptcha) 
    ------------------------------------------------------------------ */
    $.validator.methods.smartCaptcha = function(value, element, param) {
        return value == param;
    };

    $('#btn_edit_acept').on('click', function(event) {
        event.preventDefault();
        return $("#form_customers_edit").submit();
    });

    $("form#form_customers_edit").validate({

        /* @validation states + elements 
        ------------------------------------------- */
        errorClass: "state-error",
        validClass: "state-success",
        errorElement: "em",
        ignore: 'input[type=hidden], .select2-input, .select2-focusser',
        /* @validation rules 
        ------------------------------------------ */
        submitHandler: function(form) {

            var confirm = bootbox.confirm({
                title: "CONFIRMACIÓN",
                message: "Va a enviar una solicitud de modificación de cliente, ¿Está seguro?.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancelar'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Aceptar',
                        className: 'btn-danger'
                    }
                },
                callback: function(result) {

                    if (result) {

                        var postData = $("form#form_customers_edit").serialize();
                        var formURL = document.location;


                        var dialog = bootbox.dialog({
                            show: false,
                            backdrop: true,
                            title: 'ENVIANDO DATOS',
                            message: '<p><i class="fa fa-spin fa-spinner"></i> Espere por Favor...</p>'
                        });

                        $.ajax({
                                url: formURL,
                                data: postData,
                                method: 'POST',
                                beforeSend: function(xhr) {
                                    dialog.modal('show');
                                }
                            })
                            .done(function(data, textStatus, jqXHR) {
                                console.log(data);
                                var response = JSON.parse(JSON.stringify(data));

                                if (response.message_type == 1) {
                                    bootbox.hideAll();
                                    var dialog = bootbox.dialog({
                                        closeButton: false,
                                        title: 'RESPUESTA',
                                        message: '<p><i class="fa fa-check-square-o"></i> ' + response.message + '</p>',
                                        buttons: {
                                            cancel: {
                                                label: '<i class="fa fa-times"></i>Cerrar',
                                                className: 'btn-danger',
                                                callback: function() {
                                                    location.href = document.location;
                                                }
                                            }
                                        }
                                    });

                                } else {
                                    bootbox.hideAll();
                                    var dialog = bootbox.dialog({
                                        closeButton: false,
                                        title: 'ERROR',
                                        message: '<p><i class="fa fa-warning"></i> ' + response.message + '</p>',
                                        buttons: {
                                            cancel: {
                                                label: '<i class="fa fa-times"></i>Cerrar',
                                                className: 'btn-danger',
                                                callback: function() {
                                                    dialog.modal('hide');
                                                }
                                            }
                                        }
                                    });
                                }
                            })
                            .fail(function(jqXHR, textStatus, errorThrown) {

                                if (console && console.log) {
                                    console.log("La solicitud a fallado: " + textStatus);
                                    console.log("Error: " + errorThrown);
                                    console.log(jqXHR);
                                }
                            });
                    }
                }
            });
        },
        rules: {
            customers_phone: {
                required: true

            },
            customers_tariffs_id: {
                required: true
            },
            customers_name: {
                required: true
            },
            customers_address: {
                required: true
            },
            customers_email: {
                required: true,
                email: true
            }


        },
        /* @validation error messages 
        ---------------------------------------------- */
        messages: {
            customers_phone: {
                required: 'Ingrese el teléfono del cliente'
            },
            customers_tariffs_id: {
                required: 'Seleccione la tarifa asignada al cliente'
            },
            customers_name: {
                required: 'Ingrese el nombre del cliente',
            },
            customers_email: {
                required: 'Ingrese un email del cliente',
                email: 'Formato de correo invalido'
            },
            customers_address: {
                required: 'Ingrese la dirección de habitación del cliente'
            }
        },
        /* @validation highlighting + error placement  
        ---------------------------------------------------- */

        highlight: function(element, errorClass, validClass) {
            $(element).closest('.field').addClass(errorClass).removeClass(validClass);

        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.field').removeClass(errorClass).addClass(validClass);

        },
        errorPlacement: function(error, element) {
            if (element.is(":radio") || element.is(":checkbox")) {
                element.closest('.option-group').after(error);
            } else {
                error.insertAfter(element.parent());
            }
        }
    });

    $("input[type='checkbox']").on('click', function() {

        var is_active = 2;

        if ($(this).prop('checked')) { is_active = 1; }

        var postData = {
            bookshop_id: $(this).val(),
            users_id: $(this).attr('usersid'),
            operation: "ASSIGN",
            is_active: is_active
        };

        var formURL = document.location;

        $.ajax({
                url: formURL,
                data: postData,
                method: 'POST',
                beforeSend: function(xhr) {
                    // $("#spinner_access_"+$(this).val()+"").removeClass('hidden');
                }
            })
            .done(function(data, textStatus, jqXHR) {

                var response = JSON.parse(JSON.stringify(data));
                console.log(data);
                console.log(response);
                //$("#spinner_access_"+$(this).val()+"").addClass('hidden');

                if (response.message_type == 1) {

                } else {

                }

            })
            .fail(function(jqXHR, textStatus, errorThrown) {

                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                    console.log("Error: " + errorThrown);
                    console.log(jqXHR);
                }
            });

    });

    $(".select2-single").rules('add', 'required');

});
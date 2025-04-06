$(document).ready(function() {
    // Init jQuery Masked inputs
    $('.date').mask('99/99/9999');
    $('.time').mask('99:99:99');
    $('.date_time').mask('99/99/9999 99:99:99');
    $('.zip').mask('99999-999');
    $('.phone').mask('9999-9999999');
    $('.phoneext').mask("9999-9999999 ext 9999");
    $(".money").mask("999.999.999,99");
    $(".product").mask("999.999.999.999");
    $(".tin").mask("99-9999999");
    $(".ssn").mask("999-99-9999");
    $(".ip").mask("9ZZ.9ZZ.9ZZ.9ZZ");
    $(".eyescript").mask("~9.99 ~9.99 999");
    $(".custom").mask("9.99.999.9999");

    var openModal = null;

    $('#dock_Customers').on('click', function() {

        if (!openModal) {

            var url = document.location.toString().split('/');
            $.get(url[0] + '//' + url[1] + url[2] + '/Customers/form/add', function(response) {

                var Content = $(document.createElement('div')).attr('id', 'dock-content').html('');
                Content.html(response);

                var findPush = Content.children('.active-content').find('.dock-item');

                findPush.dockmodal({
                    showClose: true,
                    showPopout: false,
                    showMinimize: false,
                    height: 650,
                    width: 700,
                    title: function() {
                        return this.data('title');
                    },
                    initialState: "docked",
                    close: function() {
                        openModal = 0;
                    },
                    open: function() {
                        openModal = 1;
                        /* @custom validation method (smartCaptcha) 
                            ------------------------------------------------------------------ */
                        $.validator.methods.smartCaptcha = function(value, element, param) {
                            return value == param;
                        };

                        $("form#form_customers_add").validate({

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
                                    message: "Va a enviar una solicitud de registro de cliente, ¿Está seguro?.",
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

                                            var postData = $("form#form_customers_add").serialize();
                                            var formURL = url[0] + '//' + url[1] + url[2] + '/Customers/add';


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
                                customers_name: {
                                    required: true
                                },
                                customers_identity_card: {
                                    required: true
                                        /*,
                                                                          pattern:/^([VJGP]{1})[-]([0-9]{9})$/*/
                                },
                                customers_type_id: {
                                    required: true
                                },
                                customers_phone: {
                                    required: false
                                },
                                customers_cell_phone: {
                                    required: false
                                },
                                customers_nationality_id: {
                                    required: true
                                },
                                customers_address: {
                                    required: true
                                }
                            },
                            /* @validation error messages 
                            ---------------------------------------------- */
                            messages: {
                                customers_name: {
                                    required: 'Ingrese el nombre del cliente',
                                },
                                customers_identity_card: {
                                    required: 'Ingrese la identificación del cliente',
                                    pattern: 'Formato de identificación invalido'
                                },
                                customers_type_id: {
                                    required: 'Seleccione el tipo de identificación del cliente'
                                },
                                customers_phone: {
                                    required: 'Ingrese un teléfono de habitación del cliente'
                                },
                                customers_cell_phone: {
                                    required: 'Ingrese un celular del cliente'
                                },
                                customers_nationality_id: {
                                    required: 'Seleccione la nacionalidad del cliente'
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

                        /*INICIALIZAMOS LOS ESTILOS DE LOS SELECTORES*/
                        $(".select2-single").select2({
                            placeholder: "Seleccione una Opción",
                            allowClear: true
                        });

                        $(".select2-single").on('change', function() {
                            $(this).trigger('blur');
                        });
                        /*FIN DE ESTILOS DE LOS SELECTORES*/


                        $('#btn_add_acept').on('click', function(event) {
                            event.preventDefault();
                            return $("#form_customers_add").submit();
                        });

                        //$(".select2-single").rules('add', 'required');    
                    }
                });

            });

        }

    });


//    $(document).keydown(function(e) {
//
//        var code = (e.keyCode ? e.keyCode : e.which);
//        if (code == 116) {
//            e.preventDefault();
//
//            var confirm = bootbox.confirm({
//                title: "CONFIRMACIÓN",
//                message: "Si recarga la página perdera todo el trabajo realizado, ¿Está seguro?",
//                buttons: {
//                    cancel: {
//                        label: '<i class="fa fa-times"></i> Cancelar'
//                    },
//                    confirm: {
//                        label: '<i class="fa fa-check"></i> Aceptar',
//                        className: 'btn-danger'
//                    }
//                },
//                callback: function(result) {
//                    if (result) {
//                        document.location.reload();
//                    } else {
//                        bootbox.hideAll();
//                    }
//                }
//            });
//        }
//    });


    /*CONFIGURACION DEL CALENDARIO DATEPICKER*/
    $.fn.datetimepicker.defaults.icons = {
        time: 'fa fa-clock-o',
        date: 'fa fa-calendar',
        up: 'fa fa-chevron-up',
        down: 'fa fa-chevron-down',
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-dot-circle-o',
        clear: 'fa fa-trash',
        close: 'fa fa-times'
    };

    $(".date").datetimepicker({
        locale: 'es',
        showToday: true,
        toolbarPlacement: 'top',
        showTodayButton: true,
        pickTime: false,
        format: 'd.m.Y'
    });
    /* FIN CONFIGURACION DEL CALENDARIO DATEPICKER*/
});
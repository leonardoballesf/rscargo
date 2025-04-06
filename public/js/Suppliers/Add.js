$(document).ready(function() {

    // Init jQuery Masked inputs
    $('.phone').mask('9999-9999999');
    $('.phoneext').mask("9999-9999999 ext 9999");
    $('.identification').mask('*-999999999');
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});
    

    /* @custom validation method (smartCaptcha) 
    ------------------------------------------------------------------ */
    $.validator.methods.smartCaptcha = function(value, element, param) {
      return value == param;
    };

    $('#btn_add_acept').on('click', function (event) {
        event.preventDefault();
        return $("#form_suppliers_add").submit();    
    });

    $("form#form_suppliers_add").validate({

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
        message: "Va a enviar una solicitud de registro de empleado, ¿Está seguro?.",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancelar'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Aceptar',
                className: 'btn-danger'
            }
        },
        callback: function (result) {

        if(result){
            
            var postData = $("form#form_suppliers_add").serialize();
            var formURL = document.location;

            var dialog = bootbox.dialog({
                show: false,
                backdrop: true,
                title: 'ENVIANDO DATOS',
                message: '<p><i class="fa fa-spin fa-spinner"></i> Espere por Favor...</p>'
            });

            $.ajax({
            url: formURL,
            data:postData,
            method:'POST',
            beforeSend: function( xhr ) {
                dialog.modal('show');
            }
            })
            .done(function( data, textStatus, jqXHR ) {
                console.log(data);
                var response=JSON.parse(JSON.stringify(data));

                if(response.message_type==1){
                    bootbox.hideAll();
                    var dialog = bootbox.dialog({
                        closeButton: false,
                        title: 'RESPUESTA',
                        message: '<p><i class="fa fa-check-square-o"></i> '+response.message+'</p>',
                        buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i>Cerrar',
                            className: 'btn-danger',
                            callback: function () {
                                location.href=document.location;
                            }
                        }                        
                        }
                    });

                }else{
                    bootbox.hideAll();
                    var dialog = bootbox.dialog({
                        closeButton: false,
                        title: 'ERROR',
                        message: '<p><i class="fa fa-warning"></i> '+response.message+'</p>',
                        buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i>Cerrar',
                            className: 'btn-danger',
                            callback: function () {
                                dialog.modal('hide');
                            }
                        }                        
                        }
                    });
                }
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {

                if ( console && console.log ) {
                    console.log( "La solicitud a fallado: " +  textStatus);
                    console.log( "Error: " +  errorThrown);
                    console.log(jqXHR);
                }
            });                
        }    
        }
    });    
    },  
      rules: {
        suppliers_description: {
          required: true
        },
        suppliers_identity_card: {
          required: false,
          pattern:/^[VJG]{1}[-][0-9]{9}$/
        },
        suppliers_phone: {
          required: true,
          pattern:/^\d{4}[\-]\d{7}$/
        },
        suppliers_email: {
          required: true,
          email: true
        },
        suppliers_gender_id: {
          required: true
        },
        suppliers_address: {
          required: true
        }         

      },
      /* @validation error messages 
      ---------------------------------------------- */
      messages: {
        suppliers_description: {
          required: 'Ingrese la descripción del Empleado'
        },
        suppliers_identity_card: {
          required: 'Ingrese la identificación del Empleado',
          pattern: 'Formato de documento no válido',
        },
        suppliers_birthdate: {
          required: 'Ingrese la fecha de cumpleaños del Empleado',
          pattern: 'Formato de fecha no válido',
        },
        suppliers_phone: {
          required: 'Ingrese el teléfono del Empleado',
          pattern: 'Formato de teléfono no válido',
        },
        suppliers_email: {
          required: 'Ingrese la dirección de correo del Empleado',
          email: 'Ingrese una dirección de correo válida'
        },
        suppliers_gender_id: {
          required: 'Seleccione el género del Empleado',
        },
        suppliers_address: {
          required: 'Ingrese la dirección de habitación del Empleado',
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

    $(".select2-single").rules('add', 'required');    
    
    $("#sellers_birthdate").datetimepicker({
        locale:'es',
        showToday: true,
        toolbarPlacement:'top',
        showTodayButton:true,
        pickTime: false,
        format:'DD/MM/YYYY'
    });
});
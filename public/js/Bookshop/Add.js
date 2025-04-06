$(document).ready(function() {

    // Init jQuery Masked inputs
    $('.phone').mask('9999-9999999');
    $('.phoneext').mask("9999-9999999 ext 9999");

    /* @custom validation method (smartCaptcha) 
    ------------------------------------------------------------------ */
    $.validator.methods.smartCaptcha = function(value, element, param) {
      return value == param;
    };

    $('#btn_bookshop_add').on('click', function (event) {
        event.preventDefault();
        return $("#form_bookshop_add").submit();    
    });

    $("form#form_bookshop_add").validate({

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
        message: "Va a enviar una solicitud de registro de sucursal, ¿Está seguro?.",
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

            var postData = $("form#form_bookshop_add").serialize();
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
        bookshop_description: {
          required: true
        },
        bookshop_phone: {
          required: true,
          pattern:/^\d{4}[\-]\d{7}$/
        },
        bookshop_email: {
          required: true,
          email: true
        },
        bookshop_address: {
          required: true
        },
        bookshop_location_id: {
          required: true
        },
        bookshop_regions_id: {
          required: true
        },
        bookshop_is_active: {
          required: true
        }
      },
      /* @validation error messages 
      ---------------------------------------------- */
      messages: {
        bookshop_description: {
          required: 'Ingrese la descripción de la Sucursal'
        },
        bookshop_phone: {
          required: 'Ingrese el teléfono de la Sucursal',
          pattern: 'Formato de teléfono no válido',
        },
        bookshop_email: {
          required: 'Ingrese la dirección de correo de la Sucursal',
          email: 'Ingrese una dirección de correo válida'
        },
        bookshop_address: {
          required: 'Ingrese la dirección de la Sucursal',
        },
        bookshop_location_id: {
          required: 'Debe seleccionar la localidad',
        },
        bookshop_regions_id: {
          required: 'Debe seleccionar la región',
        },
        bookshop_is_active: {
          required: 'Debe seleccionar el estatus',
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

});
$(document).ready(function() {

    // Init jQuery Masked inputs
    $('.phone').mask('9999-9999999');
    $('.phoneext').mask("9999-9999999 ext 9999");
    $('.identification').mask('*-99999999');

    /* @custom validation method (smartCaptcha) 
    ------------------------------------------------------------------ */
    $.validator.methods.smartCaptcha = function(value, element, param) {
      return value == param;
    };

    $('#btn_add_acept').on('click', function (event) {
        event.preventDefault();
        return $("#form_users_add").submit();    
    });

    $("form#form_users_add").validate({

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
        message: "Va a enviar una solicitud de registro de usuario, ¿Está seguro?.",
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
            
            var postData = $("form#form_users_add").serialize();
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
        users_username: {
          required: true
        },
        users_password: {
          required: true,
          minlength: 4,
          maxlength: 16
        },
        users_password_confirm: {
          required: true,
          minlength: 4,
          maxlength: 16,
          equalTo: '#users_password'
        },
        users_sellers_id: {
          required: true
        },
        users_bookshop_id: {
          required: true
        },
        users_role: {
          required: true
        }         
      },
      /* @validation error messages 
      ---------------------------------------------- */
      messages: {
        users_username: {
          required: 'Ingrese el nombre de usuario'
        },
        users_password: {
          required: 'Ingrese una contraseña',
          minlength: 'Tamaño de contraseña debe ser mayor a 4 o igual a 16',
          maxlength: 'Tamaño de contraseña debe ser mayor a 4 o igual a 16' 
        },
        users_password_confirm: {
          required: 'Ingrese una contraseña de confirmación',
          minlength: 'Tamaño de contraseña debe ser mayor a 4 o igual a 16',
          maxlength: 'Tamaño de contraseña debe ser mayor a 4 o igual a 16',
          equalTo: 'Las contraseñas no concuerdan'
        },
        users_sellers_id: {
          required: 'Seleccione el Empleado asociado a la cuenta'
        },
        users_bookshop_id: {
          required: 'Seleccione la Sucursal por defecto asociada a la cuenta'
        },
        users_role: {
          required: 'Seleccione el Nivel de acceso de la cuenta'
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
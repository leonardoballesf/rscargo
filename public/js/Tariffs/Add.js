$(document).ready(function() {

    /* @custom validation method (smartCaptcha) 
    ------------------------------------------------------------------ */
    $.validator.methods.smartCaptcha = function(value, element, param) {
      return value == param;
    };

    $('#btn_add_acept').on('click', function (event) {
        event.preventDefault();
        return $("#form_tariffs_add").submit();    
    });

    $("form#form_tariffs_add").validate({

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
        message: "Va a enviar una solicitud de registro, ¿Está seguro?.",
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

            var postData = $("form#form_tariffs_add").serialize();
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
      tariffs_name: {
        required: true
      },
      tariffs_description: {
        required: true
      },
      tariffs_value: {
        required: true,
        number:true
      }
    },
    /* @validation error messages 
    ---------------------------------------------- */
    messages: {
      tariffs_name: {
        required: 'Ingrese el nombre de la tarifa'
      },
      tariffs_description: {
        required: 'Ingrese la descripción de la tarifa',
      },
      tariffs_value: {
        required: 'Ingrese el valor de la tarifa',
        number:'Ingrese un valor numerico'
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
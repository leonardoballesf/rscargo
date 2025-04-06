$(document).ready(function() {
    localStorage.removeItem('h_menu_active_id');
    localStorage.removeItem('v_menu_active_id');
    localStorage.setItem("v_menu_active_id", "v_menu_customers");
    localStorage.setItem("h_menu_active_id", "h_menu_customers");
    localStorage.setItem("op_menu-open", "op_principal");

    /*INICIALIZACION DE COMPONENTE DATATABLE PARA LA TABLA CUSTOMERS*/
    var tabla = $('#customerstable').DataTable({
        "iDisplayLength": 10,
        "sDom": 'rtip',
        "filter": true,
        "info": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "Customers/customersjson",
            "type": "POST",
            "data": {
                cols: [
                    'customers.id',
                    'customers.name',
                    'customers.code',
                    'customers.is_active',
                    'customers.created'
                ]
            },
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [
            { "data": "id", "sClass": "text-center" },
            { "data": "customer", "sClass": "text-left" },
            { "data": "code", "sClass": "text-right" },
            { "data": "estatus", "sClass": "text-center" },
            { "data": "created", "sClass": "text-right" },
            { "data": "opciones", "sClass": "text-center" }
        ],
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [-1],
        }],
        "oLanguage": {
            "sProcessing": '\n\
        <div class="animated fadeIn">\n\
          <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>\n\
          <h4>Cargando Información</h4>\n\
            <small>Por Favor Espere</small>\n\
        </div>\n\
        ',
            "sLoadingRecords": '\n\
        <div class="animated fadeIn">\n\
            <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>\n\
            <span>Cargando Información</span>\n\
        </div>\n\
        ',
            "oPaginate": {
                "sFirst": " ",
                "sPrevious": "<span class=\"text-danger imoon imoon-arrow-left2\">",
                "sNext": "<span class=\"text-danger imoon imoon-arrow-right3\">",
                "sLast": " "
            },
            "sLengthMenu": "  Mostrar: _MENU_",
            "sInfo": "<span class=\"text-danger\">Cantidad: <strong> _TOTAL_ </strong> Mostrando [_START_ de _END_]</span>",
            "sInfoFiltered": "  (Filtrado desde _MAX_ total registros)",
            "sZeroRecords": "  No se encontró ningun registro",
            "sInfoEmpty": "  Mostrando 0 hasta 0 de 0 entradas"
        }
    });


    tabla
        .order([0, 'desc'])
        .search('')
        .columns().search('')
        .draw();
    tabla.ajax.reload();

    /*APLICAR FILTRO TYPEAHEAD PARA LA TABLA SELLERS*/
    $('#customers_code').on('blur change', function() {
        tabla.column().columns(2).search('' + $(this).val() + '').draw();
        tabla.ajax.reload();
    });

    $('#customers_name').on('blur change', function() {
        tabla.column().columns(1).search('' + $(this).val() + '').draw();
        tabla.ajax.reload();
    });
    /*APLICAR FILTRO TYPEAHEAD*/

    /*APLICAR FILTRO PARA LA TABLA SELLERS*/
    $('#search').on('click', function() {

        var input_empty = 0;

        if ($('#customers_name').val() === "" &&
            $('#customers_code').val() === "" &&
            $('#customers_is_active :selected').val() === "" &&
            $('#customers_created').val() === "") {

            input_empty += 1;

        } else {

            input_empty = 0;
        }

        if (input_empty > 0) {

            var dialog = bootbox.dialog({
                closeButton: false,
                title: 'OPCIONES DE FILTRADO',
                message: '<p><i class="fa fa-warning"></i> &nbsp;Debe seleccionar una opcion para aplicar el filtrado</p>',
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> &nbsp;Cerrar',
                        className: 'btn-danger',
                        callback: function() {
                            tabla
                                .order([0, 'desc'])
                                .search('')
                                .columns().search('')
                                .draw();
                            tabla.ajax.reload();
                            dialog.modal('hide');
                        }
                    }
                }
            });

        } else {

            tabla.column().columns(1).search('' + $('#customers_name').val() + '');
            tabla.column().columns(2).search('' + $('#customers_code').val() + '');
            tabla.column().columns(3).search($('#customers_is_active :selected').val());

            if ($('#customers_created').val() !== "") {
                var dateValue = $('#customers_created').val().split('/');
                dateValue = dateValue[2] + '-' + dateValue[1] + '-' + dateValue[0];
                tabla.column().columns(4).search(dateValue);
            }

            tabla.draw();
            tabla.ajax.reload();

        }
    });
    /* FIN APLICAR FILTRO*/

    /*QUITAR FILTRO PARA LA TABLA SELLERS*/
    $('#reset').on('click', function(event) {

        event.preventDefault();

        $('#customers_name').val('');
        $('#customers_code').val('');
        $('#customers_created').val('');

        tabla
            .order([0, 'desc'])
            .search('')
            .columns().search('')
            .draw();
        tabla.ajax.reload();

    });
    /* FIN QUITAR FILTRO*/

    /*INICIALIZAMOS LOS ESTILOS DE LOS SELECTORES*/
    $(".select2-single").select2({
        placeholder: "Seleccione una Opción",
        allowClear: true
    });

    $(".select2-single").on('change', function() {
        $(this).trigger('blur');
    });
    /*FIN DE ESTILOS DE LOS SELECTORES*/
    $('.date').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    /* FIN INICIALIZACION*/


    /*NOTIFICACION A CLIENTES */

    $(document).on("click", ".sendMail", function(e) {
        e.preventDefault();
        $this = $(this);

        $data = { ids: $(this).data("id"), delivered: $(this).data("delivered") };

        var confirm = bootbox.confirm({
            title: "CONFIRMACIÓN",
            message: "Va a enviar una notificación de registro de cliente, ¿Está seguro?.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar',
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Aceptar',
                    className: "btn-danger",
                },
            },
            callback: function(result) {
                if (result) {
                    var postData = $data;
                    var formURL = "Customers/notification";

                    var dialog = bootbox.dialog({
                        show: false,
                        backdrop: true,
                        title: "ENVIANDO DATOS",
                        message: '<p><i class="fa fa-spin fa-spinner"></i> Espere por Favor...</p>',
                    });
                    console.log($data);
                    $.ajax({
                            url: formURL,
                            data: postData,
                            method: "POST",
                            beforeSend: function(xhr) {
                                dialog.modal("show");
                            },
                        })
                        .done(function(data, textStatus, jqXHR) {
                            console.log(data);
                            var response = JSON.parse(JSON.stringify(data));

                            if (response.message_type == 1) {
                                bootbox.hideAll();
                                var dialog = bootbox.dialog({
                                    closeButton: false,
                                    title: "RESPUESTA",
                                    message: '<p><i class="fa fa-check-square-o"></i> ' +
                                        response.message +
                                        "</p>",
                                    buttons: {
                                        cancel: {
                                            label: '<i class="fa fa-times"></i>Cerrar',
                                            className: "btn-danger",
                                            callback: function() {
                                                location.href = document.location;
                                            },
                                        },
                                    },
                                });
                            } else {
                                bootbox.hideAll();
                                var dialog = bootbox.dialog({
                                    closeButton: false,
                                    title: "ERROR",
                                    message: '<p><i class="fa fa-warning"></i> ' +
                                        response.message +
                                        "</p>",
                                    buttons: {
                                        cancel: {
                                            label: '<i class="fa fa-times"></i>Cerrar',
                                            className: "btn-danger",
                                            callback: function() {
                                                dialog.modal("hide");
                                            },
                                        },
                                    },
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
            },
        });
    });
    /*FIN NOTIFICACION A CLIENTES */



});
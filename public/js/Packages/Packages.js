$(document).ready(function() {
    localStorage.removeItem("h_menu_active_id");
    localStorage.removeItem("v_menu_active_id");
    localStorage.setItem("v_menu_active_id", "v_menu_packages");
    localStorage.setItem("h_menu_active_id", "h_menu_packages");
    localStorage.setItem("op_menu-open", "op_principal");

    /*INICIALIZACION DE COMPONENTE DATATABLE PARA LA TABLA CUSTOMERS*/
    var tabla = $("#packagestable").DataTable({
        iDisplayLength: 10,
        sDom: "rtip",
        filter: true,
        info: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "Packages/packagesjson",
            type: "POST",
            data: {
                cols: [
                    "packages.id",
                    "packages.code",
                    "customers.id",
                    //                    'packages.weight',
                    //                    'packages.bulk',
                    "packages.cost",
                    "packages.registration_date",
                    "packages.delivered",
                    "packages.payment_methods_id",
                ],
            },
            dataSrc: function(json) {
                return json.data;
            },
        },
        columns: [
            { data: "id", sClass: "text-center" },
            { data: "code", sClass: "text-left" },
            { data: "name", sClass: "text-left" },
            //            { "data": "weight", "sClass": "text-center" },
            //            { "data": "bulk", "sClass": "text-center" },
            { data: "cost", sClass: "text-center" },
            { data: "registration_date", sClass: "text-right" },
            { data: "delivered", sClass: "text-center" },
            { data: "payment_methods_id", sClass: "text-center" },
            { data: "opciones", sClass: "text-center" },
        ],
        aoColumnDefs: [{
            bSortable: false,
            aTargets: [-1],
        }, ],
        oLanguage: {
            sProcessing: '\n\
        <div class="animated fadeIn">\n\
          <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>\n\
          <h4>Cargando Información</h4>\n\
            <small>Por Favor Espere</small>\n\
        </div>\n\
        ',
            sLoadingRecords: '\n\
        <div class="animated fadeIn">\n\
            <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>\n\
            <span>Cargando Información</span>\n\
        </div>\n\
        ',
            oPaginate: {
                sFirst: " ",
                sPrevious: '<span class="text-danger imoon imoon-arrow-left2">',
                sNext: '<span class="text-danger imoon imoon-arrow-right3">',
                sLast: " ",
            },
            sLengthMenu: "  Mostrar: _MENU_",
            sInfo: '<span class="text-danger">Cantidad: <strong> _TOTAL_ </strong> Mostrando [_START_ de _END_]</span>',
            sInfoFiltered: "  (Filtrado desde _MAX_ total registros)",
            sZeroRecords: "  No se encontró ningun registro",
            oEmpty: "  Mostrando 0 hasta 0 de 0 entradas",
        },

        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;

            // Remove the formatting to get integer data for summation
            var intVal = function(i) {

                return typeof i === 'string' ?
                    i.replace('<small>', '').replace('</small>', '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            /*             var intVal = function(i) {
                            console.log(i);
                            return parseInt(i);
                        };
             */

            // Total over all pages
            total = api
                .column(3)
                .data()
                .reduce(function(a, b) {
                    return parseFloat(intVal(a) + intVal(b)).toFixed(2);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(3, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return parseFloat(intVal(a) + intVal(b)).toFixed(2);
                }, 0);

            // Update footer
            $(api.column(3).footer()).html(
                'B/. ' + parseFloat(pageTotal).toFixed(2) + ' ( B/. ' + parseFloat(total).toFixed(2) + ' total)'
            );
        }


    });

    tabla.order([0, "desc"]).search("").columns().search("").draw();
    tabla.ajax.reload();

    /*APLICAR FILTRO TYPEAHEAD PARA LA TABLA SELLERS*/
    $("#packages_code").on("blur change", function() {
        tabla
            .column()
            .columns(1)
            .search("" + $(this).val() + "")
            .draw();
        tabla.ajax.reload();
    });

    //    $('#packages_bulk').on('blur change', function() {
    //        tabla.column().columns(3).search('' + $(this).val() + '').draw();
    //        tabla.ajax.reload();
    //    });
    //
    //    $('#packages_weight').on('blur change', function() {
    //        tabla.column().columns(2).search('' + $(this).val() + '').draw();
    //        tabla.ajax.reload();
    //    });

    /*APLICAR FILTRO TYPEAHEAD*/

    /*APLICAR FILTRO PARA LA TABLA SELLERS*/
    $("#search").on("click", function() {
        var input_empty = 0;

        if (
            $("#packages_code").val() === "" &&
            $("#packages_registration_date").val() === "" &&
            //            $('#packages_weight').val() === "" &&
            //            $('#packages_bulk').val() === "" &&
            $("#packages_customers_id :selected").val() === "" &&
            $("#packages_delivered :selected").val() === ""
        ) {
            input_empty += 1;
        } else {
            input_empty = 0;
        }

        if (input_empty > 0) {
            var dialog = bootbox.dialog({
                closeButton: false,
                title: "OPCIONES DE FILTRADO",
                message: '<p><i class="fa fa-warning"></i> &nbsp;Debe seleccionar una opcion para aplicar el filtrado</p>',
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> &nbsp;Cerrar',
                        className: "btn-danger",
                        callback: function() {
                            tabla.order([0, "desc"]).search("").columns().search("").draw();
                            tabla.ajax.reload();
                            dialog.modal("hide");
                        },
                    },
                },
            });
        } else {
            tabla
                .column()
                .columns(1)
                .search("" + $("#packages_code").val() + "");
            tabla
                .column()
                .columns(2)
                .search("" + $("#packages_customers_id").val() + "");
            //            tabla.column().columns(3).search('' + $('#packages_weight').val() + '');
            //            tabla.column().columns(4).search('' + $('#packages_bulk').val() + '');
            tabla
                .column()
                .columns(5)
                .search($("#packages_delivered :selected").val());

            if ($("#packages_registration_date").val() !== "") {
                var dateValue = $("#packages_registration_date").val().split("/");
                dateValue = dateValue[2] + "-" + dateValue[0] + "-" + dateValue[1];
                tabla.column().columns(4).search(dateValue);
            }

            tabla.draw();
            tabla.ajax.reload();
        }
    });
    /* FIN APLICAR FILTRO*/

    /*QUITAR FILTRO PARA LA TABLA SELLERS*/
    $("#reset").on("click", function(event) {
        event.preventDefault();

        $("#packages_code").val("");
        //        $('#packages_weight').val('');
        //        $('#packages_bulk').val('');
        $("#packages_delivered").val("");
        $("#packages_registration_date").val("");
        $("#packages_customers_id").val("");

        tabla.order([0, "desc"]).search("").columns().search("").draw();
        tabla.ajax.reload();
    });
    /* FIN QUITAR FILTRO*/

    /*INICIALIZAMOS LOS ESTILOS DE LOS SELECTORES*/
    $(".select2-single").select2({
        placeholder: "Seleccione una Opción",
        allowClear: true,
    });

    $("#payment_methods_id").select2({
        placeholder: "------TIPOS DE PAGO------",
        allowClear: true,
    });

    $("#delivered").select2({
        placeholder: "---------ESTATUS---------",
        allowClear: true,
    });



    $(".select2-single").on("change", function() {
        $(this).trigger("blur");
    });
    /*FIN DE ESTILOS DE LOS SELECTORES*/

    $(".date").datetimepicker({
        format: "MM/DD/YYYY",
    });

    /* FIN INICIALIZACION*/

    /*CAMBIO DE ESTATUS EN LOS PAQUETES */

    $(document).on("click", ".deliveryChange", function(e) {
        e.preventDefault();
        $this = $(this);


        $data = {
            ids: $(this).data("id"),
            delivered: $(this).data("delivered"),
            tpago: $("#payment_methods_id").val()
        };

        // console.log($data);

        var confirm = bootbox.confirm({
            title: "CONFIRMACIÓN",
            message: "Va a enviar una solicitud de modificación de paquete, ¿Está seguro?.",
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
                    var formURL = "Packages/estatusChange";

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
                                                tabla.draw();
                                                tabla.ajax.reload();

                                                //location.href = document.location;
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

    /*FIN CAMBIO DE ESTATUS EN LOS PAQUETES */

    /*ENVIAR NOTIFICACIONES AGRUPADAS POR CLIENTES */
    $(document).on("click", "#send", function(e) {

        var $data = $('input[type="checkbox"]').serializeArray();

        if ($data.length > 0) {

            var confirm = bootbox.confirm({
                title: "CONFIRMACIÓN",
                message: "Va a enviar una solicitud de notificaión de paquetes, ¿Está seguro?.",
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
                        var formURL = "Packages/notifications";

                        var dialog = bootbox.dialog({
                            show: false,
                            backdrop: true,
                            title: "ENVIANDO DATOS",
                            message: '<p><i class="fa fa-spin fa-spinner"></i> Espere por Favor...</p>',
                        });
                        //console.log(postData);

                        $.ajax({
                                method: "POST",
                                url: formURL,
                                data: postData,
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
                                                    tabla.draw();
                                                    tabla.ajax.reload();
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
        }
    });
    /*FIN ENVIAR NOTIFICACIONES AGRUPADAS POR CLIENTES */


    /*ENVIAR NOTIFICACIONES AGRUPADAS POR CLIENTES */
    $(document).on("click", "#changeStatus", function(e) {

        var $data = $('input[type="checkbox"]').serializeArray();

        if ($data.length > 0) {

            $data.push({ name: "tpago", value: $("#payment_methods_id").val() });
            $data.push({ name: "delivered", value: $("#delivered").val() });

            var confirm = bootbox.confirm({
                title: "CONFIRMACIÓN",
                message: "Va a enviar una solicitud de modificación de paquetes, ¿Está seguro?.",
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
                        var formURL = "Packages/changestatus";

                        var dialog = bootbox.dialog({
                            show: false,
                            backdrop: true,
                            title: "ENVIANDO DATOS",
                            message: '<p><i class="fa fa-spin fa-spinner"></i> Espere por Favor...</p>',
                        });
                        //console.log(postData);

                        $.ajax({
                                method: "POST",
                                url: formURL,
                                data: postData,
                                beforeSend: function(xhr) {
                                    dialog.modal("show");
                                },
                            })
                            .done(function(data, textStatus, jqXHR) {
                                //console.log(data);
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
                                                    tabla.draw();
                                                    tabla.ajax.reload();
                                                    //location.href = document.location;
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
        }
    });
    /*FIN ENVIAR NOTIFICACIONES AGRUPADAS POR CLIENTES */


    /*ENVIAR NOTIFICACIONES INDIVIDUALES*/
    $(document).on("click", ".sendMail", function(e) {

        e.preventDefault();
        $this = $(this);

        $data = { ids: $(this).data("id")};
        

            var confirm = bootbox.confirm({
                title: "CONFIRMACIÓN",
                message: "Va a enviar una solicitud de notificación de paquetes, ¿Está seguro?.",
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
                        var formURL = "Packages/notify";

                        var dialog = bootbox.dialog({
                            show: false,
                            backdrop: true,
                            title: "ENVIANDO DATOS",
                            message: '<p><i class="fa fa-spin fa-spinner"></i> Espere por Favor...</p>',
                        });
                        //console.log(postData);

                        $.ajax({
                                method: "POST",
                                url: formURL,
                                data: postData,
                                beforeSend: function(xhr) {
                                    dialog.modal("show");
                                },
                            })
                            .done(function(data, textStatus, jqXHR) {
                                //console.log(data);
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
                                                    tabla.draw();
                                                    tabla.ajax.reload();
                                                    //location.href = document.location;
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
    /*FIN ENVIAR NOTIFICACIONES INDIVIDUALES */

});
$(document).ready(function() {
    localStorage.removeItem("h_menu_active_id");
    localStorage.removeItem("v_menu_active_id");
    localStorage.setItem("v_menu_active_id", "v_menu_notifications");
    localStorage.setItem("h_menu_active_id", "h_menu_notifications");
    localStorage.setItem("op_menu-open", "op_principal");

    /*INICIALIZACION DE COMPONENTE DATATABLE PARA LA TABLA CUSTOMERS*/
    var tabla = $("#notificationstable").DataTable({
        iDisplayLength: 10,
        sDom: "rtip",
        filter: true,
        info: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "Notifications/notificationsjson",
            type: "POST",
            data: {
                cols: [
                    "notifications.id",
                    "notifications.from_email",
                    "notifications.name",
                    "notifications.to_email",
                    "notifications.sent",
                    "notifications.created",
                ],
            },
            dataSrc: function(json) {
                return json.data;
            },
        },
        columns: [
            { data: "id", sClass: "text-center" },
            { data: "from_email", sClass: "text-left" },
            { data: "name", sClass: "text-left" },
            { data: "to_email", sClass: "text-center" },
            { data: "sent", sClass: "text-right" },
            { data: "created", sClass: "text-center" }
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
            sInfoEmpty: "  Mostrando 0 hasta 0 de 0 entradas",
        },
    });

    tabla.order([0, "desc"]).search("").columns().search("").draw();
    tabla.ajax.reload();


});
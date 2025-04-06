$(document).ready(function() {
    
localStorage.removeItem('h_menu_active_id');
localStorage.removeItem('v_menu_active_id');
localStorage.setItem("v_menu_active_id", "v_menu_business");
localStorage.setItem("h_menu_active_id", "h_menu_business");
localStorage.setItem("op_menu-open", "op_principal");          

/*INICIALIZACION DE COMPONENTE DATATABLE PARA LA TABLA CATALOG*/    

'business.id AS business_id','business.identity_card AS business_identity_card','business.description AS business_description',
                        'business.address AS business_address','business.phone AS business_phone','business.facsimile AS business_facsimile',
                        'business.email AS business_email','business.website AS business_website','business.logo AS business_logo', 
                        'business.is_active AS business_is_active','business.created AS business_created','business.modified AS business_modified', 
                        'status_type.description AS status_type_description'

    var tabla = $('#businesstable').DataTable( {
        "iDisplayLength": 5,
        "sDom": 'rtip',
        "filter": true,
        "info": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "Business/businessJson",
            "type": "POST",
            "data": {
            cols:[
            'business.id',                
            'business.description',
            'business.identity_card',
            'business.phone',
            'business.created',
            'business.is_active'
            ]
            },
            "dataSrc": function ( json ) {
                console.log(json.data);
                return json.data;
            }
        },
        "columns": [
                    { "data": "id",   "sClass": "text-center" },
                    { "data": "description",   "sClass": "text-left" },
                    { "data": "identity_card",   "sClass": "text-right" },
                    { "data": "phone" ,   "sClass": "text-right"},
                    { "data": "created" ,   "sClass": "text-right"},
                    { "data": "estatus", "sClass": "text-center"},
                    { "data": "opciones", "sClass": "text-center"}
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
        "sFirst":       " ",
        "sPrevious":    "<span class=\"text-danger imoon imoon-arrow-left2\">",
        "sNext":        "<span class=\"text-danger imoon imoon-arrow-right3\">",
        "sLast":        " "
        },
        "sLengthMenu":    "  Mostrar: _MENU_",
        "sInfo":          "<span class=\"text-danger\">Cantidad: <strong> _TOTAL_ </strong> Mostrando [_START_ de _END_]</span>",
        "sInfoFiltered":  "  (Filtrado desde _MAX_ total registros)",
        "sZeroRecords" :  "  No se encontró ningun registro",
        "sInfoEmpty":     "  Mostrando 0 hasta 0 de 0 entradas"
        }
    } );

    /*APLICAR FILTRO TYPEAHEAD PARA LA TABLA*/ 
    
    $('#input_description').on('keypress blur change', function () {

        tabla.column().columns(1).search(''+$(this).val()+'').draw();
        tabla.ajax.reload();   

    });
    /*APLICAR FILTRO TYPEAHEAD*/     

    /*APLICAR FILTRO PARA LA TABLA USERS*/ 
    $('#search').on('click', function () {
        var input_empty=0;

        if($('#input_description').val()==="" && $('#select_status :selected').val()===""){
            input_empty+=1;
        }else{
            input_empty=0;
        }

        if(input_empty>0){
            $(this).addClass('disabled');
            var dialog = bootbox.dialog({
                closeButton: false,
                title: 'OPCIONES DE FILTRADO',
                message: '<p><i class="fa fa-warning"></i> &nbsp;Debe seleccionar una opcion para aplicar el filtrado</p>',
                buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> &nbsp;Cerrar',
                    className: 'btn-danger',
                    callback: function () {
                        tabla
                                .order([ 0, 'asc' ])
                                .search( '' )
                                .columns().search( '' )
                                .draw();
                        tabla.ajax.reload();
                        dialog.modal('hide');
                        $('#search').removeClass('disabled');
                    }
                }
                }
            });
            
        }else{
            $(this).addClass('disabled');
            tabla.column().columns(1).search(''+$('#input_description').val()+'');
            tabla.column().columns(3).search($('#select_status :selected').val());
            tabla.draw();
            tabla.ajax.reload();
            $(this).removeClass('disabled');

        }    
    });
    /* FIN APLICAR FILTRO*/
    
    /*QUITAR FILTRO PARA LA TABLA CATALOG*/ 
    $('#reset').on('click', function (event) {
        
        event.preventDefault();
        $(this).addClass('disabled');
        tabla
            .order([ 0, 'asc' ])
            .search( '' )
            .columns().search( '' )
            .draw();
        tabla.ajax.reload();
        $(this).removeClass('disabled');

    });
    /* FIN QUITAR FILTRO*/    
    
    /* FIN INICIALIZACION*/     

    // Inicializamos estilo de los selectores (Select2)
    $(".select2-single").select2(
       {
       placeholder: "Seleccione una Opción",
       allowClear: true
       }
    );

    $(".select2-single").on('change', function() {
    $(this).trigger('blur');
    });
    
});
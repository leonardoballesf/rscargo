$(document).ready(function() {
    localStorage.removeItem('h_menu_active_id');
    localStorage.removeItem('v_menu_active_id');
    localStorage.setItem("v_menu_active_id", "v_menu_sellers");
    localStorage.setItem("h_menu_active_id", "h_menu_sellers");
    localStorage.setItem("op_menu-open", "op_principal");          
    
/*INICIALIZACION DE COMPONENTE DATATABLE PARA LA TABLA SELLERS*/    

var tabla = $('#sellerstable').DataTable( {
        "iDisplayLength": 5,
        "sDom": 'rtip',
        "filter": true,
        "info": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "Sellers/sellersjson",
            "type": "POST",
            "data": {
            cols:[
            'sellers.id',
            'sellers.description',
            'sellers.identity_card',
            'sellers.phone',
            'sellers.created',            
            'sellers.is_active'
            ]
            },
            "dataSrc": function ( json ) {
                return json.data;
            }
        },
        "columns": [
                    { "data": "id",   "sClass": "text-left" },
                    { "data": "description",   "sClass": "text-left" },
                    { "data": "identity_card" ,   "sClass": "text-left"},
                    { "data": "phone", "sClass": "text-left" },
                    { "data": "created", "sClass": "text-left" },                    
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
    });


    /*APLICAR FILTRO TYPEAHEAD PARA LA TABLA SELLERS*/ 
    $('#sellers_identification').on('blur change', function () {
        tabla.column().columns(2).search(''+$(this).val()+'').draw();
        tabla.ajax.reload();
    });
    
    $('#sellers_description').on('blur change', function () {
        tabla.column().columns(1).search(''+$(this).val()+'').draw();
        tabla.ajax.reload();   
    });
    /*APLICAR FILTRO TYPEAHEAD*/     

    /*APLICAR FILTRO PARA LA TABLA SELLERS*/ 
    $('#search').on('click', function () {
        
        var input_empty=0;

        if($('#sellers_description').val()==="" 
                && $('#sellers_identification').val()==="" 
                && $('#sellers_is_active :selected').val()===""
                && $('#sellers_created').val()===""){
                
            input_empty+=1;
            
        }else{
            
            input_empty=0;
        }

        if(input_empty>0){

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
                    }
                }                        
                }
            });
        
        }else{
            
            
            
            tabla.column().columns(1).search(''+$('#sellers_description').val()+'');
            tabla.column().columns(2).search(''+$('#sellers_identification').val()+'');
            
            if($('#sellers_created').val()!==""){
                var dateValue = $('#sellers_created').val().split('/');
                dateValue = dateValue[2]+'-'+dateValue[1]+'-'+dateValue[0];
                tabla.column().columns(4).search(dateValue);
            }
            
            tabla.column().columns(5).search($('#sellers_is_active :selected').val());
            tabla.draw();
            tabla.ajax.reload();   
            
        }    
    });
    /* FIN APLICAR FILTRO*/
        
    /*QUITAR FILTRO PARA LA TABLA SELLERS*/ 
    $('#reset').on('click', function (event) {
        
        event.preventDefault();
        
        $('#sellers_description').val('');
        $('#sellers_identification').val('');
        $('#sellers_created').val('');
        
        tabla
            .order([ 0, 'asc' ])
            .search( '' )
            .columns().search( '' )
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
    
/* FIN INICIALIZACION*/     
});
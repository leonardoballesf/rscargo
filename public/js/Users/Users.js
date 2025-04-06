$(document).ready(function() {
    localStorage.removeItem('h_menu_active_id');
    localStorage.removeItem('v_menu_active_id');
    localStorage.setItem("v_menu_active_id", "vs_menu_users");
    localStorage.setItem("h_menu_active_id", "h_menu_users");
    localStorage.setItem("op_menu-open", "op_seguridad");          
    
/*INICIALIZACION DE COMPONENTE DATATABLE PARA LA TABLA SELLERS*/    

var tabla = $('#userstable').DataTable( {
        "iDisplayLength": 5,
        "sDom": 'rtip',
        "filter": true,
        "info": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "Users/usersjson",
            "type": "POST",
            "data": {
            cols:[
            'users.id',
            'users.username',
            'sellers.identity_card',
            'users.role',
            'users.is_active',
            'users.created'            
            ]
            },
            "dataSrc": function ( json ) {
                return json.data;
            }
        },
        "columns": [
                    { "data": "id",   "sClass": "text-center" },
                    { "data": "username",   "sClass": "text-left" },
                    { "data": "identity_card" ,   "sClass": "text-left"},
                    { "data": "role", "sClass": "text-center" },
                    { "data": "estatus", "sClass": "text-center"},
                    { "data": "created", "sClass": "text-right" },                    
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
    $('#users_identification').on('blur change', function () {
        tabla.column().columns(2).search(''+$(this).val()+'').draw();
        tabla.ajax.reload();
    });
    
    $('#users_description').on('blur change', function () {
        tabla.column().columns(1).search(''+$(this).val()+'').draw();
        tabla.ajax.reload();   
    });
    /*APLICAR FILTRO TYPEAHEAD*/     

    /*APLICAR FILTRO PARA LA TABLA SELLERS*/ 
    $('#search').on('click', function () {
        
        var input_empty=0;

        if($('#users_description').val()==="" 
                && $('#users_identification').val()==="" 
                && $('#users_role :selected').val()===""
                && $('#users_is_active :selected').val()===""
                && $('#users_created').val()===""){
                
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
            
            tabla.column().columns(1).search(''+$('#users_description').val()+'');
            tabla.column().columns(2).search(''+$('#users_identification').val()+'');
            tabla.column().columns(3).search($('#users_role :selected').val());
            tabla.column().columns(4).search($('#users_is_active :selected').val());
            
            if($('#users_created').val()!==""){
                var dateValue = $('#users_created').val().split('/');
                dateValue = dateValue[2]+'-'+dateValue[1]+'-'+dateValue[0];
                tabla.column().columns(5).search(dateValue);
            }
            
            tabla.draw();
            tabla.ajax.reload();   
            
        }    
    });
    /* FIN APLICAR FILTRO*/
        
    /*QUITAR FILTRO PARA LA TABLA SELLERS*/ 
    $('#reset').on('click', function (event) {
        
        event.preventDefault();
        
        $('#users_description').val('');
        $('#users_identification').val('');
        $('#users_created').val('');
        
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
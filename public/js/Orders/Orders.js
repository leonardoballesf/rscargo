$(document).ready(function() {
    localStorage.removeItem('h_menu_active_id');
    localStorage.removeItem('v_menu_active_id');
    localStorage.setItem("v_menu_active_id", "v_menu_orders");
    localStorage.setItem("h_menu_active_id", "h_menu_orders");
    localStorage.setItem("op_menu-open", "op_principal");          

/*INICIALIZACION DE COMPONENTE DATATABLE PARA LA TABLA USERS*/    
    var tabla = $('#orderstable').DataTable( {
                    "iDisplayLength": 5,
                    "sDom": 'rtip',
                    "filter": true,
                    "info": true,
                    "processing": true,
                    "serverSide": true,
                    "ajaxSource": "Orders/ordersjson",
                    "columns": [
                        { "data": "code",   "sClass": "text-left" },
                        { "data": "title" ,   "sClass": "text-left"},
                        { "data": "category", "sClass": "text-left" },
                        { "data": "created", "sClass": "text-center"},
                        { "data": "hour", "sClass": "text-center"},
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

    /*APLICAR FILTRO TYPEAHEAD PARA LA TABLA USERS*/ 
    $('#catalog_code').on('blur change', function () {
        
        tabla.column().columns(0).search(''+$(this).val()+'').draw();
        tabla.ajax.reload();
        
    });

    
    
    $('#catalog_description').on('blur change', function () {

        tabla.column().columns(1).search(''+$(this).val()+'').draw();
        tabla.ajax.reload();   

    });
    /*APLICAR FILTRO TYPEAHEAD*/     

    /*APLICAR FILTRO PARA LA TABLA USERS*/ 
    $('#search').on('click', function () {
        
        $(this).attr("disabled","disabled");
        
        var input_empty=0;

        if($('#catalog_code').val()==="" 
                && $('#catalog_description').val()==="" 
                && $('#catalog_category :selected').val()==""
                && $('#catalog_status :selected').val()==""){
                
            input_empty+=1;
            
        }else{
            
            input_empty=0;
        }

        

        if(input_empty>0){

            var dialog = bootbox.dialog({
                title: 'OPCIONES DE FILTRADO',
                message: '<p><i class="fa fa-warning"></i> &nbsp;Debe seleccionar una opcion para aplicar el filtrado</p>'
            });

            dialog.init(function(){
                        setTimeout(function(){
                            dialog.modal('hide');

                            tabla
                                .search( '' )
                                .columns().search( '' )
                                .draw();
                            tabla.ajax.reload();
                            
                        }, 3000);
            });
            

            setTimeout(function(){

                $('#search').removeAttr("disabled");

            }, 4000);


            
        
        }else{

            tabla.column().columns(0).search(''+$('#catalog_code').val()+'');
            tabla.column().columns(1).search(''+$('#catalog_description').val()+'');
            tabla.column().columns(2).search($('#catalog_category :selected').val());
            tabla.column().columns(4).search($('#catalog_status :selected').val());
            tabla.draw();
            tabla.ajax.reload();   
            setTimeout(function(){

                $('#search').removeAttr("disabled");

            }, 4000);
        }    
        


    });
    /* FIN APLICAR FILTRO*/
    
/* FIN INICIALIZACION*/     


// Inicializamos estilo de los selectores (Select2)
    $(".select2-single").select2({
       placeholder: "Seleccione una Opción",
       allowClear: true
    });

});

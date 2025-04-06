<?php

    //print('<pre>');print_r($this->List);print('</pre>');

?>

<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">


        <!-- recent activity table -->
        <div class="panel">
              
            <div class="panel panel-danger panel-border top mbn">
                <div class="panel-heading">
                <span class="panel-title text-uppercase text-center"><?php print($this->title);?></span>
                
                <?php  
                    print($this->html->link("<i class='imoon imoon-plus fs18' ></i>",
                            array(
                                'id' => 'dock-push',
                                'controller' => 'Catalog',
                                'action' => 'add',
                                "title"=>"Agregar Producto",
                                'class'=>'btn text-danger-lighter pull-right'
                            )
                          )
                    ); 
                ?>
                
                </div>
            </div>                 
             
            <div class="panel-body pn ">
              <div class="table-responsive ">
                  <table  id="catalogtable" class="table table-striped table-hover dataTable no-footer fs12">
                  <thead>
                    <tr class="bg-light">
                      <th class="text-center bg-danger">ID</th>
                      <th class="text-center bg-danger">CÓDIGO</th>
                      <th class="text-center bg-danger">DESCRIPCIÓN</th>
                      <th class="text-center bg-danger">CATEGORIA</th>
                      <th class="text-center bg-danger">REGISTRO</th>
                      <th class="text-center bg-danger">ESTATUS</th>                      
                      <th class="text-center sorting_disabled bg-danger">OPCIONES</th>
                    </tr>
                  </thead>
                  <tbody class="text-uppercase">
                  
                  </tbody>
                </table>
              </div>
            </div>
        </div>

        </div>
        <!-- end: .tray-center -->

        <!-- begin: .tray-right -->
        <aside class="tray tray-right tray300">
            
        <div class="panel panel-danger panel-border top mb15">
              <div class="panel-heading">
                <span class="panel-title text-uppercase text-center">Opciones de Filtrado</span>
              </div>
        </div>                       

          <!-- menu quick links -->
          <div class="admin-form">

            <form name="form_filters" id="form_filters" >
            <!-- section -->
            <div class="section mb10">
                <label for="catalog_code" class="field prepend-icon">
                    <?php  
                    print($this->html->input('catalog_code','text','',
                            array(
                                "id"=>'catalog_code',
                                "class"=>"gui-input",
                                "placeholder"=>'Código'
                            ),
                          false)
                    );
                    ?>
                    <label for="catalog_code" class="field-icon">
                      <i class="fa fa-hashtag"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->
            
            <!-- section -->
            <div class="section mb10">
                <label for="catalog_title" class="field prepend-icon">
                    <?php  
                    print($this->html->input('catalog_title','text','',
                            array(
                                "id"=>'catalog_title',
                                "class"=>"gui-input",
                                "placeholder"=>'Nombre del Articulo'
                            ),
                          false)
                    );
                    ?>
                    <label for="catalog_title" class="field-icon">
                        <i class="fa fa-tags"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->
            
            <!-- section -->
            <h5><small class="text-left text-uppercase">Fecha de Registro:</small></h5>
            <div class="section mb15">
                <label for="catalog_created" class="field prepend-icon form-group">
                    <?php  
                    print($this->html->input('catalog_created','text','',
                            array(
                                "id"=>'catalog_created',
                                "class"=>"gui-input form-control text-right date",
                                "readonly"=>'true'
                            ),
                          false)
                    );
                    ?>
                    <label for="catalog_created" class="field-icon">
                      <i class="fa fa-calendar"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->            
            
            <!-- section -->
            <h5><small class="text-left text-uppercase">Categoria:</small></h5>
            <div class="section mb15">
                <label for="catalog_category_id" class="field form-group">
                    <?php  
                    print($this->html->input('catalog_category_id','select',$this->categoryType['select'],
                            array(
                                "id"=>'catalog_category_id',
                                "required" => 'required',
                                "class"=>"select2-single form-control",
                                "placeholder"=>"Categoria"
                            ),
                          false)
                    );
                    ?>  
                </label>
            </div>
            <!-- end section -->            
            
            <!-- section -->
            <h5><small class="text-left text-uppercase">Estatus:</small></h5>
            <div class="section mb15">
                <label for="catalog_is_active" class="field form-group">
                    <?php  
                    print($this->html->input('catalog_is_active','select',$this->statusType['select'],
                            array(
                                "id"=>'catalog_is_active',
                                "class"=>"select2-single form-control"
                            ),
                          false)
                    );
                    ?>  
                </label>
            </div>
            <!-- end section -->

            <hr class="short">

            <div class="section container-fluid">
                <button class="btn btn-default btn-danger btn-block btn-sm" id="search" type="button"><span class="ladda-label">Aplicar Filtro</span></button>
                <button class="btn btn-default btn-danger btn-block btn-sm" id="reset"  type="button"><span class="ladda-label">Quitar Filtro</span></button>
            </div>

            </form>
          </div>

        </aside>
        <!-- end: .tray-right -->
        
</section>
<!-- End: Content -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <?php
            
              //  print('<pre>');print_r($this->List);print('</pre>');
            
            ?>

        <!-- recent activity table -->
        <div class="panel">
              
            <div class="panel panel-danger panel-border top mbn">
                <div class="panel-heading">
                <span class="panel-title text-uppercase text-center"><?php print($this->title);?></span>
                
                <?php  
                    print($this->html->link("<i class='imoon imoon-plus fs18' ></i>",
                            array(
                                'id' => 'dock-push',
                                'controller' => 'Suppliers',
                                'action' => 'add',
                                "title"=>"Agregar Proveedor",
                                'class'=>'btn text-danger-lighter pull-right'
                            )
                          )
                    ); 
                ?>
                
                </div>
            </div>                 
             
            <div class="panel-body pn ">
              <div class="table-responsive ">
                  <table id="supplierstable" class="table table-striped table-hover dataTable no-footer fs12">
                  <thead>
                    <tr class="bg-light">
                      <th class="text-center bg-danger">ID</th>
                      <th class="text-center bg-danger">PROVEEDOR</th>
                      <th class="text-center bg-danger">IDENTIFICACIÓN</th>
                      <th class="text-center bg-danger">TELEFONO</th>
                      <th class="text-center bg-danger">INGRESO</th>
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
                <label for="suppliers_identification" class="field prepend-icon">
                    <?php  
                    print($this->html->input('suppliers_identification','text','',
                            array(
                                "id"=>'suppliers_identification',
                                "class"=>"gui-input",
                                "placeholder"=>'Identificación'
                            ),
                          false)
                    );
                    ?>
                    <label for="suppliers_identification" class="field-icon">
                      <i class="fa fa-hashtag"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->
            
            <!-- section -->
            <div class="section mb10">
                <label for="suppliers_description" class="field prepend-icon">
                    <?php  
                    print($this->html->input('suppliers_description','text','',
                            array(
                                "id"=>'suppliers_description',
                                "class"=>"gui-input",
                                "placeholder"=>'Nombre del Proveedor'
                            ),
                          false)
                    );
                    ?>
                    <label for="suppliers_description" class="field-icon">
                        <i class="fa fa-user"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->
            
            <!-- section -->
            <h5><small class="text-left text-uppercase">Fecha de Ingreso:</small></h5>
            <div class="section mb15">
                <label for="suppliers_created" class="field prepend-icon form-group">
                    <?php  
                    print($this->html->input('suppliers_created','text','',
                            array(
                                "id"=>'suppliers_created',
                                "class"=>"gui-input form-control text-right date",
                                "readonly"=>'true'
                            ),
                          false)
                    );
                    ?>
                    <label for="suppliers_created" class="field-icon">
                      <i class="fa fa-calendar"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->            
            
            <!-- section -->
            <h5><small class="text-left text-uppercase">Estatus:</small></h5>
            <div class="section mb15">
                <label for="suppliers_is_active" class="field form-group">
                    <?php  
                    print($this->html->input('suppliers_is_active','select',$this->statusType['select'],
                            array(
                                "id"=>'suppliers_is_active',
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
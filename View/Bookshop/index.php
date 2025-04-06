    <!-- Begin: Content -->
    <section id="content" class="table-layout animated">
        
        <!-- begin: .tray-center -->
        <div class="tray tray-center pt15">
        
        
        <!-- create new order panel -->
        <!-- recent activity table -->
        <div class="panel">
            
            <div class="panel panel-danger panel-border top mbn">
                <div class="panel-heading">
                <span class="panel-title text-uppercase text-center"><?php print($this->title);?></span>
                
                <?php  
                    print($this->html->link("<i class='imoon imoon-plus fs18' ></i>",
                            array(
                                'id' => 'dock-push',
                                'controller' => 'Bookshop',
                                'action' => 'add',
                                "title"=>"Agregar Sucursal",
                                'class'=>'btn text-danger-lighter pull-right'
                            )
                          )
                    ); 
                ?>
                
                </div>
            </div>     

          <div class="panel-body pn ">
            <div class="table-responsive ">
                <table id="bookshoptable" class="table table-striped table-hover dataTable no-footer fs12">
                <thead>
                  <tr class="bg-light">
                    <th class="text-center bg-danger">ID</th>
                    <th class="text-center bg-danger">SUCURSAL</th>
                    <th class="text-center bg-danger">TELÉLEFONO</th>
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

        <form name="form_filters" id="form_filters" onsubmit="return false">
            
            <div class="section mb10">
              <label for="input_description" class="field prepend-icon">
                <input type="text" name="input_description" id="input_description" class="gui-input" placeholder="Descripción">
                <label for="input_description" class="field-icon">
                  <i class="fa fa-tag"></i>
                </label>
              </label>
            </div>
            
            <h5><small>ESTATUS</small></h5>
            <div class="section mb15">
              <label class="field form-group">
                  
                <?php  
                print($this->html->input('select_status','select',array(0=>array("id"=>1,"description"=>'Activo'),1=>array("id"=>2,"description"=>'Inactivo')),
                        array(
                            "id"=>'select_status',
                            "class"=>"select2-single form-control",
                            "placeholder"=>"Estatus de Árticulo"
                        ),
                      false)
                );
                ?>
                <i class="arrow double"></i>
              </label>
            </div>

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
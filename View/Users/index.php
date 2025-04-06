<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <?php
            
                //print('<pre>');print_r($this->rolesType);print('</pre>');
            
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
                                'controller' => 'Users',
                                'action' => 'add',
                                "title"=>"Agregar Usuario",
                                'class'=>'btn text-danger-lighter pull-right'
                            )
                          )
                    ); 
                ?>
                
                </div>
            </div>                 
             
            <div class="panel-body pn ">
              <div class="table-responsive ">
                  <table id="userstable" class="table table-striped table-hover dataTable no-footer fs12">
                  <thead>
                    <tr class="bg-light">
                      <th class="text-center bg-danger">ID</th>
                      <th class="text-center bg-danger">USUARIO</th>
                      <th class="text-center bg-danger">IDENTIFICACIÓN</th>
                      <th class="text-center bg-danger">NIVEL</th>
                      <th class="text-center bg-danger">ESTATUS</th>                      
                      <th class="text-center bg-danger">REGISTRO</th>
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
                <label for="users_identification" class="field prepend-icon">
                    <?php  
                    print($this->html->input('users_identification','text','',
                            array(
                                "id"=>'users_identification',
                                "class"=>"gui-input",
                                "placeholder"=>'Identificación'
                            ),
                          false)
                    );
                    ?>
                    <label for="users_identification" class="field-icon">
                      <i class="fa fa-hashtag"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->
            
            <!-- section -->
            <div class="section mb10">
                <label for="users_description" class="field prepend-icon">
                    <?php  
                    print($this->html->input('users_description','text','',
                            array(
                                "id"=>'users_description',
                                "class"=>"gui-input",
                                "placeholder"=>'Nombre de Usuario'
                            ),
                          false)
                    );
                    ?>
                    <label for="users_description" class="field-icon">
                        <i class="fa fa-user"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->
            
            <!-- section -->
            <h5><small class="text-left text-uppercase">Fecha de Ingreso:</small></h5>
            <div class="section mb15">
                <label for="users_created" class="field prepend-icon form-group">
                    <?php  
                    print($this->html->input('users_created','text','',
                            array(
                                "id"=>'users_created',
                                "class"=>"gui-input form-control text-right date",
                                "readonly"=>'true'
                            ),
                          false)
                    );
                    ?>
                    <label for="users_created" class="field-icon">
                      <i class="fa fa-calendar"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->            
            
            <!-- section -->
            <h5><small class="text-left text-uppercase">Nivel de Acceso:</small></h5>
            <div class="section mb15">
                <label for="users_role" class="field form-group">
                    <?php  
                    print($this->html->input('users_role','select',array(array("id"=>1,"description"=>'Usuario'),array("id"=>2,"description"=>'Administrador'),array("id"=>3,"description"=>'Super Administrador')),
                            array(
                                "id"=>'users_role',
                                "required" => 'required',
                                "class"=>"select2-single form-control",
                                "placeholder"=>"Rol de Usuario"
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
                <label for="users_is_active" class="field form-group">
                    <?php  
                    print($this->html->input('users_is_active','select',array(array("id"=>1,"description"=>'Activo'),array("id"=>2,"description"=>'Inactivo')),
                            array(
                                "id"=>'users_is_active',
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
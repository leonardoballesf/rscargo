<?php
   
    //print('<pre>');print_r(json_decode(json_encode($this->List),JSON_OBJECT_AS_ARRAY));print('</pre>');

    if(isset($this->List) && !empty($this->List)):
            foreach ($this->List as $key => $value):
?>
<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">
    <section id="content_bookshop_add" class="table-layout animated">

    <!-- begin: .tray-center -->
    <div class="tray tray-center pt15">

        <div class="mw1000 center-block">
            <!-- Información de la Sucursal -->
            <div class="panel panel-danger panel-border top mb15">

                <div class="panel-heading">

                <span class="panel-title text-uppercase text-center"><?php print($this->title);?></span>
                    <?php  
                        print($this->html->link("<i class='imoon imoon-cancel-circle fs18'></i>",
                                array(
                                    "name" => "btn_edit_cancel",
                                    "id" => "btn_edit_cancel",                    
                                    "controller" => 'Sellers',
                                    "action" => '',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                        print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                array(
                                    "name" => "btn_edit_acept",
                                    "id" => "btn_edit_acept",                    
                                    "controller" => 'Sellers',
                                    "action" => '',
                                    "href"=> '#',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                    ?>             
                </div>

                <div class="panel-body bg-light dark">
        
                <div class="admin-form">
                            <!-- Información del Empleado -->
                            <div class="panel panel-danger mbn5">

                              <div class="panel-body bg-light dark">
                                <?php
                                print($this->html->form(array(
                                            "method" => "POST",
                                            "action" => '',
                                            "id" => 'form_sellers_edit',
                                            "name" => 'form_sellers_edit',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>
                                <!--SECTION ROW -->
                                <div class="section row">

                                    <!-- section -->
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Nombre del Empleado:</small></h5>
                                    <div class="section mb5">
                                        <label for="sellers_description" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('sellers_description','text', trim($value['sellers_description']),
                                                    array(
                                                        "id"=>'sellers_description',
                                                        "class"=>"gui-input",
                                                        "placeholder"=>"Nombre del Empleado"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                          <label for="sellers_description" class="field-icon">
                                          <i class="fa fa-user"></i>
                                        </label>
                                      </label>
                                    </div>
                                    </div>
                                    <!-- end section -->

                                    <!-- section -->
                                    <div class="col-md-4">    
                                    <h5><small class="text-left text-uppercase">Identificación:</small></h5>
                                    <div class="section mb5">
                                        <label for="sellers_identity_card" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('sellers_identity_card','text', trim($value['sellers_identity_card']),
                                                    array(
                                                        "id"=>'sellers_identity_card',
                                                        "class"=>"gui-input text-uppercase identification"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="sellers_identity_card" class="field-icon">
                                              <i class="fa fa-hashtag"></i>
                                            </label>
                                        </label>
                                        <span class="small-9 fs10">[VE]-123456789</span>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Fecha de Nacimiento:</small></h5>
                                    <div class="section mb5">
                                        <label for="sellers_birthdate" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('sellers_birthdate','text', date('d/m/Y', strtotime($value['sellers_birthdate'])),
                                                    array(
                                                        "id"=>'sellers_birthdate',
                                                        "class"=>"gui-input",
                                                        "placeholder"=>"Fecha de Nacimiento"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="sellers_birthdate" class="field-icon">
                                              <i class="fa fa-birthday-cake"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                </div>                                    
                                <!--END SECTION ROW -->

                                <!--SECTION ROW -->
                                <div class="section row">

                                    <!-- section -->                                    
                                    <div class="col-md-4">    
                                    <h5><small class="text-left text-uppercase">Teléfono de Contacto:</small></h5>
                                    <div class="section mb5">
                                        <label for="sellers_phone" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('sellers_phone','text', trim($value['sellers_phone']),
                                                    array(
                                                        "id"=>'sellers_phone',
                                                        "class"=>"gui-input phone",
                                                        "placeholder"=>"Teléfono de Contacto"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="sellers_phone" class="field-icon">
                                              <i class="fa fa-phone"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Correo de Contacto:</small></h5>
                                    <div class="section mb5">
                                        <label for="sellers_email" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('sellers_email','text', trim($value['sellers_email']),
                                                    array(
                                                        "id"=>'sellers_email',
                                                        "class"=>"gui-input email",
                                                        "placeholder"=>"Correo de Contacto"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="sellers_email" class="field-icon">
                                              <i class="fa fa-envelope"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->

                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Género:</small></h5>
                                    <div class="section mb5">
                                        <label for="sellers_gender_id" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('sellers_gender_id','select',array(array("id"=>1,"description"=>'Masculino'),array("id"=>2,"description"=>'Femenino')),
                                                    array(
                                                        "id"=>'sellers_gender_id',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['sellers_gender_id'],"option"=>$this->gender[$value['sellers_gender_id']])
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                </div>
                                <!--END SECTION ROW -->
                                
                                <!--SECTION ROW -->
                                <div class="section row">
                                    
                                    <!-- section -->                                
                                    <div class="col-md-12">
                                    <h5><small class="text-left text-uppercase">Dirección de Ubicación:</small></h5>
                                    <div class="section mb5">
                                        <label for="sellers_address" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('sellers_address','textarea', trim($value['sellers_address']),
                                                    array(
                                                        "id"=>'sellers_address',
                                                        "class"=>"gui-textarea form-control textarea-grow ",
                                                        "rows"=>'4',
                                                        "placeholder"=>"Dirección de Ubicación"
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                            <label for="sellers_address" class="field-icon">
                                              <i class="fa fa-map-marker"></i>
                                            </label>

                                        </label>
                                    </div>                    
                                    </div>       
                                    <!-- end section -->
                                </div>

                                <!--SECTION ROW -->
                                <div class="section row">
                                    <!-- section -->                                
                                    <div class="col-md-4">
                                        <h5><small class="text-left text-uppercase">Estatus:</small></h5>
                                        <div class="section mb15">
                                            <label for="sellers_is_active" class="field prepend-icon form-group">
                                                <?php  
                                                print($this->html->input('sellers_is_active','select',array(array("id"=>1,"description"=>'Activo'),array("id"=>2,"description"=>'Inactivo')),
                                                        array(
                                                            "id"=>'sellers_is_active',
                                                            "class"=>"select2-single gui-input form-control",
                                                            "default"=>array("value"=>$value['sellers_is_active'],"option"=>$this->status[$value['sellers_is_active']]),
                                                            "placeholder"=>"Estatus"
                                                        ),
                                                      false)
                                                );
                                                ?>  
                                            </label>
                                        </div>
                                    </div>       
                                    <!-- end section -->
                                </div>                                
                                <!--END SECTION ROW -->
                                                                    
                                
                                <?php
                                print($this->html->endForm());
                                ?>
                              </div>
                            </div>
                            <!-- Fin Información del Empleado -->
                </div>
                </div>
            </div>
        </div>
    </div>
    
    </section>
    <!-- End: Content -->
  </div>
</div>
<?php       endforeach; 
        endif;
?>
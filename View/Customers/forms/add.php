<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">
    <section id="content_users_edit" class="table-layout animated">
    <!-- begin: .tray-center -->
    <div class="tray tray-center ">
        <div class="mw1000 center-block panel panel-danger panel-body bg-light dark">
            <!-- Información dela Cliente -->
                <div class="admin-form">
                            <!-- Información del Cliente -->
                                <?php
                                print($this->html->form(array(
                                            "method" => "POST",
                                            "action" => '',
                                            "id" => 'form_customers_add',
                                            "name" => 'form_customers_add',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>
                                <!--SECTION ROW -->
                                <div class="section row mbn mtn">
                                    <!-- section -->
                                    <div class="section col-md-12">    
                                    <h5><small class="text-left text-uppercase">Nombre del Cliente:</small></h5>
                                        <label for="customers_name" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_name','text', isset($value['customers_name']) ? $value['customers_name'] : "",
                                                    array(
                                                        "id"=>'customers_name',
                                                        "class"=>"gui-input text-uppercase"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="customers_name" class="field-icon">
                                              <i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>                                    
                                <!--END SECTION ROW -->
                                
                                <!--SECTION ROW -->
                                <div class="section row mbn mtn">
                                    
                                    <!-- section -->
                                    <div class="section col-md-4">    
                                    <h5><small class="text-left text-uppercase">Identificación:</small></h5>
                                        <label for="customers_identity_card" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_identity_card','text', isset($value['customers_identity_card']) ? $value['customers_identity_card'] : "",
                                                    array(
                                                        "id"=>'customers_identity_card',
                                                        "class"=>"gui-input text-uppercase"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="customers_identity_card" class="field-icon">
                                              <i class="fa fa-hashtag"></i>
                                            </label>
                                        </label>
                                        <span class="small-9 fs10">[VEJG]-000000000</span>
                                    </div>
                                    <!-- end section -->

                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Tipo de Tarifa [$]:</small></h5>
                                    <div class="section mb5">
                                        <label for="customers_tariffs_id" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_tariffs_id','select',$this->tariffsType['select'],
                                                    array(
                                                        "id"=>'customers_tariffs_id',
                                                        "class"=>"select2-single form-control"
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->                                    

                                    <!-- section -->                                    
                                    <div class="section col-md-4">
                                    <h5><small class="text-left text-uppercase">Nacionalidad:</small></h5>
                                        <label for="customers_nationality_id" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_nationality_id','select',$this->nationalityType['select'],
                                                    array(
                                                        "id"=>'customers_nationality_id',
                                                        "class"=>"select2-single form-control"
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                        </label>
                                    </div>
                                    <!-- end section -->
                                    
                                </div>                                    
                                <!--END SECTION ROW -->
                                <!--SECTION ROW -->
                                <div class="section row mbn mtn">
                                    <!-- section -->
                                    <div class="section col-md-4">    
                                    <h5><small class="text-left text-uppercase">Teléfono de Habitación:</small></h5>
                                        <label for="customers_phone" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_phone','text', isset($value['customers_phone']) ? $value['customers_phone'] : "",
                                                    array(
                                                        "id"=>'customers_phone',
                                                        "class"=>"gui-input text-uppercase"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="customers_phone" class="field-icon">
                                              <i class="fa fa-phone"></i>
                                            </label>
                                        </label>
                                        <span class="small-9 fs10">02XX-0000000</span>
                                    </div>
                                    <!-- end section -->                                    
                                    
                                    <!-- section -->
                                    <div class="section col-md-6">    
                                    <h5><small class="text-left text-uppercase">Teléfono de Celular:</small></h5>
                                        <label for="customers_cell_phone" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_cell_phone','text', isset($value['customers_cell_phone']) ? $value['customers_cell_phone'] : "",
                                                    array(
                                                        "id"=>'customers_cell_phone',
                                                        "class"=>"gui-input text-uppercase"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="customers_cell_phone" class="field-icon">
                                              <i class="fa fa-mobile"></i>
                                            </label>
                                        </label>
                                        <span class="small-9 fs10">04XX-0000000</span>
                                    </div>
                                    <!-- end section -->                                    

                                    <!-- section -->
                                    <div class="section col-md-6">    
                                    <h5><small class="text-left text-uppercase">Correo Electrónico:</small></h5>
                                        <label for="customers_email" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_email','text', isset($value['customers_email']) ? $value['customers_email'] : "",
                                                    array(
                                                        "id"=>'customers_email',
                                                        "class"=>"gui-input text-uppercase"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="customers_email" class="field-icon">
                                              <i class="fa fa-envelope"></i>
                                            </label>
                                        </label>
                                        <span class="small-9 fs10">correo@dominio.ext</span>
                                    </div>
                                    <!-- end section -->
                                
                                </div>                                    
                                <!--END SECTION ROW -->   
                                
                                <!--SECTION ROW -->
                                <div class="section row pt5-md">
                                    <!-- section -->       
                                    <div class="section col-lg-12">
                                    <h5><small class="text-left text-uppercase">Dirección de Ubicación:</small></h5>
                                    
                                        <label for="customers_address" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_address','textarea', isset($value['customers_address']) ? trim($value['customers_address']) : "",
                                                    array(
                                                        "id"=>'customers_address',
                                                        "class"=>"gui-textarea form-control textarea-grow ",
                                                        "rows"=>'4',
                                                        "placeholder"=>"Dirección de Ubicación"
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                            <label for="customers_address" class="field-icon">
                                              <i class="fa fa-map-marker"></i>
                                            </label>

                                        </label>
                                    </div>                    
                                    <!-- end section -->
                                </div> 

                                <?php  
                                    print($this->html->input('btn_add_acept','button', '<i class="imoon imoon-disk fs18"></i> Guardar',
                                            array(
                                                "id"=>'btn_add_acept',
                                                "class"=>"btn btn-danger dark text-danger-lighter pull-right",
                                            ),
                                          false)
                                    );
                                ?>                                   
                                <!--END SECTION ROW -->                                    
                                <?php
                                print($this->html->endForm());
                                ?>
                            <!-- Fin Información del Cliente-->
                </div>
            <!-- Fin Información dela Cliente -->
        </div>
    </div>
    </section>
    <!-- End: Content -->
  </div>
</div>
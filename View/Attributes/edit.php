<?php
   
    if(isset($this->settings) && !empty($this->settings)):
            foreach ($this->settings as $key => $value):
?>
<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">
    <section id="content_attributes_edit" class="table-layout animated">

    <!-- begin: .tray-center -->
    <div class="tray tray-center pt15">

        <div class="mw1000 center-block">
            <!-- Información de la Sucursal -->
            <div class="panel panel-danger panel-border top mb15">

                <div class="panel-heading">

                <span class="panel-title text-uppercase text-center">Información del Atributo</span>
                    <?php  
                        print($this->html->link("<i class='imoon imoon-cancel-circle fs18'></i>",
                                array(
                                    "name" => "btn_edit_cancel",
                                    "id" => "btn_edit_cancel",                    
                                    "controller" => 'Attributes',
                                    "action" => '',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                        print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                array(
                                    "name" => "btn_edit_acept",
                                    "id" => "btn_edit_acept",                    
                                    "controller" => 'Attributes',
                                    "action" => 'edit',
                                    "href"=> '#',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                    ?>             
                </div>

                <div class="panel-body bg-light dark">
        
                <div class="admin-form">
                            <!-- Información de la Sucursal -->
                            <div class="panel panel-danger mbn5">

                              <div class="panel-body bg-light dark">
                                <?php
                                print($this->html->form(array(
                                            "method" => "POST",
                                            "action" => '',
                                            "id" => 'form_attributes_edit',
                                            "name" => 'form_attributes_edit',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>
                                    <div class="section row">
                                        <div class="col-md-12">
                                        <!-- section -->
                                        <h5><small class="text-left text-uppercase">Nombre del Atributo:</small></h5>
                                        <div class="section mb5">
                                            <label for="attributes_name" class="field prepend-icon">
                                                <?php  
                                                print($this->html->input('attributes_name','text', trim($value['attributes_name']),
                                                        array(
                                                            "id"=>'attributes_name',
                                                            "class"=>"gui-input",
                                                            "placeholder"=>"Nombre del Atributo"
                                                        ),
                                                      false)
                                                );
                                                ?>
                                              <label for="attributes_name" class="field-icon">
                                              <i class="fa fa-home"></i>
                                            </label>
                                          </label>
                                        </div>
                                        <!-- end section -->
                                        </div>

                                    </div>

                                    <div class="section row">
                                        <div class="col-md-12">
                                        <!-- section -->
                                        <h5><small class="text-left text-uppercase">Descripción o Definición del Atributo:</small></h5>
                                        <div class="section mb5">
                                            <label for="attributes_description" class="field prepend-icon">
                                                <?php  
                                                print($this->html->input('attributes_description','textarea',  trim($value['attributes_description']),
                                                        array(
                                                            "id"=>'attributes_description',
                                                            "class"=>"gui-textarea form-control textarea-grow ",
                                                            "rows"=>'4',
                                                            "placeholder"=>"Descripción o Definición del Atributo"
                                                        ),
                                                      false)
                                                );
                                                ?> 
                                                <label for="attributes_description" class="field-icon">
                                                  <i class="fa fa-map-marker"></i>
                                                </label>

                                            </label>
                                        </div>                    
                                        <!-- end section -->                                
                                        </div>                    
                                    </div>

                                    <!-- panel-title -->
                                <div class="panel panel-danger panel-heading panel-border panel-title text-uppercase text-center top fs14">
                                    <span class="text-center text-danger-lighter"><strong>Información Administrativa</strong></span>
                                </div>
                                <!-- end panel-title -->                                 
                                

                                <!--SECTION ROW -->
                                <div class="section row">
                                    
                                    <!-- section -->
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Registrador Por:</small></h5>
                                    <div class="section mb5">
                                        <label for="users_sellers_id" class="field prepend-icon field-icon">
                                            <?php  
                                            print($this->html->tags('users_sellers_id','label', '<i class="fa fa-address-card-o"></i> '.$value['sellers_description'],
                                                    array(
                                                        "id"=>'users_sellers_id',
                                                        "class"=>"gui-input form-control field prepend-icon"
                                                    )
                                                    )
                                            );
                                            ?>
                                        </label>
                                    </div>
                                    </div>                                    
                                    <!-- end section -->
                                    
                                    <!-- section -->
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Empresa:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_description" class="field prepend-icon field-icon">
                                            <?php  
                                            print($this->html->tags('business_description','label', '<i class="fa fa-home"></i> '.$value['business_description'],
                                                    array(
                                                        "id"=>'business_description',
                                                        "class"=>"gui-input form-control field prepend-icon"
                                                    )
                                                    )
                                            );
                                            ?>
                                        </label>
                                    </div>
                                    </div>                                    
                                    <!-- end section -->                                    
                                    
                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Estatus:</small></h5>
                                    <div class="section mb5">
                                        <label for="attributes_is_active" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('attributes_is_active','select',$this->statusType['select'],
                                                    array(
                                                        "id"=>'attributes_is_active',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['attributes_is_active'],"option"=>$this->statusType['type'][$value['attributes_is_active']]),
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
                            <!-- Fin Información de la Sucursal -->
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
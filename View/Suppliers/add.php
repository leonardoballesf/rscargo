<?php
   
    //print('<pre>');print_r(json_decode(json_encode($this->List),JSON_OBJECT_AS_ARRAY));print('</pre>');

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
                                    "name" => "btn_add_cancel",
                                    "id" => "btn_add_cancel",                    
                                    "controller" => 'Suppliers',
                                    "action" => '',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                        print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                array(
                                    "name" => "btn_add_acept",
                                    "id" => "btn_add_acept",                    
                                    "controller" => 'Suppliers',
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
                                            "id" => 'form_suppliers_add',
                                            "name" => 'form_suppliers_add',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>
                                <!--SECTION ROW -->
                                <div class="section row">

                                    <!-- section -->
                                    <div class="col-md-12">
                                    <h5><small class="text-left text-uppercase">Nombre del Proveedor:</small></h5>
                                    <div class="section mb5">
                                        <label for="suppliers_description" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('suppliers_description','text', isset($value['suppliers_description']) ? trim($value['suppliers_description']):"",
                                                    array(
                                                        "id"=>'sellers_description',
                                                        "class"=>"gui-input",
                                                        "placeholder"=>"Nombre del Empleado"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                          <label for="suppliers_description" class="field-icon">
                                          <i class="fa fa-user"></i>
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
                                    <h5><small class="text-left text-uppercase">Identificación:</small></h5>
                                    <div class="section mb5">
                                        <label for="suppliers_identity_card" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('suppliers_identity_card','text', isset($value['suppliers_identity_card']) ? trim($value['suppliers_identity_card']):"",
                                                    array(
                                                        "id"=>'suppliers_identity_card',
                                                        "class"=>"gui-input text-uppercase identification"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="suppliers_identity_card" class="field-icon">
                                              <i class="fa fa-hashtag"></i>
                                            </label>
                                        </label>
                                        <span class="small-9 fs10">[VEJG]-123456789</span>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    <!-- section -->                                    
                                    <div class="col-md-4">    
                                    <h5><small class="text-left text-uppercase">Teléfono de Contacto:</small></h5>
                                    <div class="section mb5">
                                        <label for="suppliers_phone" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('suppliers_phone','text', isset($value['suppliers_phone']) ? trim($value['suppliers_phone']):"",
                                                    array(
                                                        "id"=>'sellers_phone',
                                                        "class"=>"gui-input phone",
                                                        "placeholder"=>"Teléfono de Contacto"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="suppliers_phone" class="field-icon">
                                              <i class="fa fa-phone"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->                                   

                                    <!-- section -->                                    
                                    <div class="col-md-4">    
                                    <h5><small class="text-left text-uppercase">Teléfono Fax:</small></h5>
                                    <div class="section mb5">
                                        <label for="suppliers_facsimile" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('suppliers_facsimile','text', isset($value['suppliers_facsimile']) ? trim($value['suppliers_facsimile']):"",
                                                    array(
                                                        "id"=>'suppliers_facsimile',
                                                        "class"=>"gui-input phone",
                                                        "placeholder"=>"Fax de Contacto"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="suppliers_facsimile" class="field-icon">
                                              <i class="fa fa-phone"></i>
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
                                    <h5><small class="text-left text-uppercase">Correo de Contacto:</small></h5>
                                    <div class="section mb5">
                                        <label for="suppliers_email" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('suppliers_email','text', isset($value['suppliers_email']) ? trim($value['suppliers_email']):"",
                                                    array(
                                                        "id"=>'suppliers_email',
                                                        "class"=>"gui-input email",
                                                        "placeholder"=>"Correo de Contacto"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="suppliers_email" class="field-icon">
                                              <i class="fa fa-envelope"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->

                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Página Web:</small></h5>
                                    <div class="section mb5">
                                        <label for="suppliers_website" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('suppliers_website','text', isset($value['suppliers_website']) ? trim($value['suppliers_website']):"",
                                                    array(
                                                        "id"=>'suppliers_website',
                                                        "class"=>"gui-input url",
                                                        "placeholder"=>"Página Web"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="suppliers_website" class="field-icon">
                                              <i class="fa fa-globe"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Tipo de Proveedor:</small></h5>
                                    <div class="section mb5">
                                        <label for="suppliers_type_id" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('suppliers_type_id','select',$this->customersType['select'],
                                                    array(
                                                        "id"=>'suppliers_type_id',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['suppliers_type_id'],"option"=>$this->customersType['type'][$value['suppliers_type_id']])
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
                                        <label for="suppliers_address" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('suppliers_address','textarea', isset($value['suppliers_address']) ? trim($value['suppliers_address']):"",
                                                    array(
                                                        "id"=>'suppliers_address',
                                                        "class"=>"gui-textarea form-control textarea-grow ",
                                                        "rows"=>'4',
                                                        "placeholder"=>"Dirección de Ubicación"
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                            <label for="suppliers_address" class="field-icon">
                                              <i class="fa fa-map-marker"></i>
                                            </label>

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
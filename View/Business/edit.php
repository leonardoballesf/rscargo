<?php
    //print('<pre>');print_r(json_decode(json_encode($this->List),JSON_OBJECT_AS_ARRAY));print('</pre>');
    if(isset($this->List) && !empty($this->List)):
        foreach ($this->List as $key => $value):
?>
<section id="content" class="animated fadeIn">
<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">

          <!-- begin: .tray-center -->
    <div class="tray tray-center pt15">

        <div class="mw1100 center-block">

            <div class="panel panel panel-danger panel-border top mb15">
              <div class="panel-heading">
                <span class="panel-title text-uppercase text-center"><?php print($this->title);?></span>
                <ul class="nav panel-tabs">
                  <li class="active">
                    <?php  
                        print($this->html->link("<i class='fa fa-tags'></i> Empresa",
                                array(
                                    "name" => "tab_business",
                                    "id" => "tab_business",                    
                                    "controller" => '',
                                    "action" => '',
                                    "href" => '#business',
                                    "data-toggle" => 'tab',
                                    "aria-expanded" => 'true',
                                    "class"=>'panel-title text-uppercase'
                                )
                              )
                        ); 
                    ?>  
                  </li>
                                   
                </ul>
              </div>
              <div class="panel-body bg-light dark">
                <div class="tab-content">
                  <!--Datos del Articulo-->
                  <div id="business" class="tab-pane active">
                  
                    <div class="panel panel-danger panel-heading panel-title panel-transparent text-uppercase text-left top mb5 fs14">
                        
                        <?php  
                            print($this->html->link("<i class='imoon imoon-cancel-circle fs18 text-danger'></i>",
                                    array(
                                        "name" => "btn_edit_cancel",
                                        "id" => "btn_edit_cancel",                    
                                        "controller" => 'Business',
                                        "action" => '',
                                        "class"=>'btn text-danger-lighter pull-right'
                                    )
                                  )
                            ); 
                            print($this->html->link("<i class='imoon imoon-disk fs18 text-danger'></i>",
                                    array(
                                        "name" => "btn_edit_acept",
                                        "id" => "btn_edit_acept",                    
                                        "controller" => 'Business',
                                        "action" => '',
                                        "href"=> '#',
                                        "class"=>'btn text-danger-lighter pull-right'
                                    )
                                  )
                            ); 
                        ?>             
                    </div>         
                    <div class="bg-light dark">
        
                    <div class="admin-form">
                            <!-- Información del Articulo -->
                            <div class="panel panel-danger mbn5">

                              <div class="panel-body bg-light dark">
                                <?php
                                print($this->html->form(array(
                                            "method" => "POST",
                                            "action" => '',
                                            "id" => 'form_business_edit',
                                            "name" => 'form_business_edit',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>
                                <!--SECTION ROW -->
                                <div class="section row mbn">
                                    
                                    <!-- section -->  
                                    <div class="col-md-3">
                                        <h5 class="text-uppercase text-center"><small class="text-uppercase text-center">Logo Institucional</small></h5>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                          <div class="fileupload-preview thumbnail mb20 ">
                                            <?php
                                            print($this->html->image($value['business_logo'],
                                                    array(
                                                        "id"=> 'img_logo',
                                                        "class" => 'img-responsive mw200 mh-200  hidden-xs',
                                                        "alt" => 'Logo Institucional',
                                                        "data-src"=>'holder.js/100%x120'
                                                    )
                                            )
                                            ); 
                                            ?>    
                                          </div>
                                          <span class="btn btn-default light btn-file btn-block ph5">
                                            <span class="fileupload-new">Elegir</span>
                                            <span class="fileupload-exists">Cambiar</span>
                                            <input id="images_logo" name="images_logo" type="file" >
                                          </span>
                                        </div>
                                    </div>
                                    <!-- end section -->  
                                    
                                    <!-- panel-title -->
                                    <div class="panel panel-danger panel-heading panel-border panel-title text-uppercase text-center top ml10 fs14">
                                        <span class="text-left text-danger-lighter"><strong>Datos de la Empresa</strong></span>
                                    </div>
                                    <!-- end panel-title -->
                                    
                                    
                                    <!-- section -->
                                    <div class="col-md-6">
                                    <h5><small class="text-left text-uppercase">Nombre de la Empresa:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_description" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_description','text', isset($value['business_description']) ? trim($value['business_description']):"",
                                                    array(
                                                        "id"=>'business_description',
                                                        "class"=>"gui-input",
                                                        "placeholder"=>"Nombre del Empleado"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                          <label for="business_description" class="field-icon">
                                          <i class="fa fa-home"></i>
                                        </label>
                                      </label>
                                    </div>
                                    </div>
                                    <!-- end section -->       
                                    
                                    <!-- section -->
                                    <div class="col-md-3">    
                                    <h5><small class="text-left text-uppercase">Identificación:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_identity_card" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_identity_card','text', isset($value['business_identity_card']) ? trim($value['business_identity_card']):"",
                                                    array(
                                                        "id"=>'business_identity_card',
                                                        "class"=>"gui-input text-uppercase identification"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="business_identity_card" class="field-icon">
                                              <i class="fa fa-hashtag"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->

                                    <!-- section -->
                                    <div class="col-md-6">    
                                    <h5><small class="text-left text-uppercase">Representante Legal:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_owner_description" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_owner_description','text', isset($value['business_owner_description']) ? trim($value['business_owner_description']):"",
                                                    array(
                                                        "id"=>'business_identity_card',
                                                        "class"=>"gui-input"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="business_owner_description" class="field-icon">
                                              <i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    <!-- section -->
                                    <div class="col-md-3">    
                                    <h5><small class="text-left text-uppercase">Identificación:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_owner_identity_card" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_owner_identity_card','text', isset($value['business_owner_identity_card']) ? trim($value['business_owner_identity_card']):"",
                                                    array(
                                                        "id"=>'business_owner_identity_card',
                                                        "class"=>"gui-input text-uppercase identification"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="business_owner_identity_card" class="field-icon">
                                              <i class="fa fa-hashtag"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    
                                </div>                                    
                                <!--END SECTION ROW -->

                                <hr class="short alt">
                                
                                <!--SECTION ROW -->
                                <div class="section row">
                                    
                                    <!-- section -->                                
                                    <div class="col-md-12">
                                    <h5><small class="text-left text-uppercase">Dirección de la Empresa:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_address" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_address','textarea', isset($value['business_address']) ? trim($value['business_address']):"",
                                                    array(
                                                        "id"=>'business_address',
                                                        "class"=>"gui-textarea form-control textarea-grow ",
                                                        "rows"=>'4',
                                                        "placeholder"=>"Dirección de Ubicación"
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                            <label for="business_address" class="field-icon">
                                              <i class="fa fa-map-marker"></i>
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
                                    <div class="col-md-6">    
                                    <h5><small class="text-left text-uppercase">Página Web:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_website" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_website','text', isset($value['business_website']) ? trim($value['business_website']):"",
                                                    array(
                                                        "id"=>'business_website',
                                                        "class"=>"gui-input"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="business_website" class="field-icon">
                                              <i class="fa fa-globe"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    <!-- section -->
                                    <div class="col-md-6">    
                                    <h5><small class="text-left text-uppercase">Correo:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_email" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_email','text', isset($value['business_email']) ? trim($value['business_email']):"",
                                                    array(
                                                        "id"=>'business_email',
                                                        "class"=>"gui-input"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="business_email" class="field-icon">
                                              <i class="fa fa-envelope"></i>
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
                                    <h5><small class="text-left text-uppercase">Teléfono:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_phone" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_phone','text', isset($value['business_phone']) ? trim($value['business_phone']):"",
                                                    array(
                                                        "id"=>'business_phone',
                                                        "class"=>"gui-input text-uppercase identification"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="business_phone" class="field-icon">
                                              <i class="fa fa-phone"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    <!-- section -->
                                    <div class="col-md-4">    
                                    <h5><small class="text-left text-uppercase">Fax:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_facsimile" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_facsimile','text', isset($value['business_facsimile']) ? trim($value['business_facsimile']):"",
                                                    array(
                                                        "id"=>'business_facsimile',
                                                        "class"=>"gui-input text-uppercase identification"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="business_facsimile" class="field-icon">
                                              <i class="fa fa-phone-square"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->     
                                    
                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Estatus:</small></h5>
                                    <div class="section mb5">
                                        <label for="business_is_active" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('business_is_active','select',$this->statusType['select'],
                                                    array(
                                                        "id"=>'business_is_active',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['business_is_active'],"option"=>$this->statusType['type'][$value['business_is_active']]),
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
                  <!--Fin Datos del Articulo-->
                  
                </div>
              </div>
            </div>
          
        </div>
    </div>
  </div>
</div>
</section>
<!-- End: Content -->
<?php   endforeach; 
    endif;
?>
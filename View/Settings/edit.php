<?php
        //print('<pre>');print_r(json_decode(json_encode($this->request),JSON_OBJECT_AS_ARRAY));print('</pre>');
        //if(isset($this->message) && !empty($this->message)){
        //print('<pre>');print_r(json_decode(json_encode($this->message),JSON_OBJECT_AS_ARRAY));print('</pre>');
        //$this->flash->display();
        //}
    
    if(isset($this->settings) && !empty($this->settings)):
            foreach ($this->settings as $key => $value):
?>
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center pt15">

          <div class="mw1000 center-block">
            <!-- Información de la Sucursal -->
            <div class="panel panel-danger panel-border top mb15">

              <div class="panel-heading">

                <span class="panel-title text-uppercase text-center">Información de la Sucursal</span>
                    <?php  
                        print($this->html->link("<i class='imoon imoon-cancel-circle fs18'></i>",
                                array(
                                    "name" => "btn_bookshop_cancel",
                                    "id" => "btn_bookshop_cancel",                    
                                    "controller" => 'Settings',
                                    "action" => '',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                        print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                array(
                                    "name" => "btn_bookshop_settings",
                                    "id" => "btn_bookshop_settings",                    
                                    "controller" => 'Settings',
                                    "action" => 'edit',
                                    "href"=> '#',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                    ?>             
              </div>

              <div class="panel-body bg-light dark">
                <?php
                print($this->html->form(array(
                            "method" => "POST",
                            "action" => '',
                            "id" => 'form_bookshop_settings',
                            "name" => 'form_bookshop_settings',
                            "enctype" => 'multipart/form-data',
                        ))
                );
                ?>
                <div class="admin-form">

                    <h5><small class="text-left text-uppercase">Nombre de la Sucursal:</small></h5>
                    <div class="section mb15">
                        <label for="bookshop_description" class="field prepend-icon">
                            <?php  
                            print($this->html->input('bookshop_description','text', trim($value['bookshop_description']),
                                    array(
                                        "id"=>'bookshop_description',
                                        "class"=>"gui-input",
                                        "placeholder"=>"Nombre de la Sucursal"
                                    ),
                                  false)
                            );
                            ?>
                          <label for="bookshop_description" class="field-icon">
                          <i class="fa fa-home"></i>
                        </label>
                      </label>
                    </div>

                    <!-- section -->
                    <h5><small class="text-left text-uppercase">Teléfono de Contacto:</small></h5>
                    <div class="section mb15">
                        <label for="bookshop_phone" class="field prepend-icon">
                            <?php  
                            print($this->html->input('bookshop_phone','text', trim($value['bookshop_phone']),
                                    array(
                                        "id"=>'bookshop_phone',
                                        "class"=>"gui-input phone",
                                        "placeholder"=>"Teléfono de Contacto"
                                    ),
                                  false)
                            );
                            ?>
                            <label for="bookshop_phone" class="field-icon">
                              <i class="fa fa-phone"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <!-- section -->
                    <h5><small class="text-left text-uppercase">Correo de Contacto:</small></h5>
                    <div class="section mb15">
                        <label for="bookshop_email" class="field prepend-icon">
                            <?php  
                            print($this->html->input('bookshop_email','text', trim($value['bookshop_email']),
                                    array(
                                        "id"=>'bookshop_email',
                                        "class"=>"gui-input",
                                        "placeholder"=>"Correo de Contacto"
                                    ),
                                  false)
                            );
                            ?>
                            <label for="bookshop_email" class="field-icon">
                              <i class="fa fa-envelope"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <!-- section -->
                    <h5><small class="text-left text-uppercase">Dirección de Ubicación:</small></h5>
                    <div class="section mb15">
                        <label for="bookshop_address" class="field prepend-icon">
                            <?php  
                            print($this->html->input('bookshop_address','textarea', trim($value['bookshop_address']),
                                    array(
                                        "id"=>'bookshop_address',
                                        "class"=>"gui-textarea form-control textarea-grow ",
                                        "rows"=>'4',
                                        "placeholder"=>"Dirección de Ubicación"
                                    ),
                                  false)
                            );
                            ?> 
                            <label for="bookshop_address" class="field-icon">
                              <i class="fa fa-map-marker"></i>
                            </label>
                            <span class="input-footer">
                            <strong>Localidad: </strong> <?php print($value['bookshop_location']);?>
                            </span>
                        </label>
                    </div>                    
                    <!-- end section -->

                    <!-- panel-title -->
                    <div class="panel panel-danger panel-heading panel-border panel-title text-uppercase text-center top mb15 fs14">
                        <span class="text-center text-danger-lighter"><strong>Información Geográfica</strong></span>
                    </div>
                    <!-- end panel-title -->

                    <!-- section -->
                    <h5><small class="text-left text-uppercase">Ubicación:</small></h5>
                    <div class="section mb15">
                        <label for="bookshop_location_id" class="field form-group">
                            <?php  
                            print($this->html->input('bookshop_location_id','select',$this->bookshopLocationList,
                                    array(
                                        "id"=>'bookshop_location_id',
                                        "class"=>"select2-single form-control",
                                        "required"=>"required",
                                        "default"=>array("value"=>$value['bookshop_location_id'],"option"=>$value['bookshop_location']),
                                        "placeholder"=>"Librerias"
                                    ),
                                  false)
                            );
                            ?> 
                        </label>
                    </div>
                    <!-- end section -->

                    <!-- section -->
                    <h5><small class="text-left text-uppercase">Región:</small></h5>
                    <div class="section mb15">
                        <label for="bookshop_regions_id" class="field prepend-icon form-group">
                            <?php  
                            print($this->html->input('bookshop_regions_id','select',$this->bookshopRegionsList,
                                    array(
                                        "id"=>'bookshop_regions_id',
                                        "class"=>"select2-single form-control",
                                        "required"=>"required",
                                        "default"=>array("value"=>$value['bookshop_regions_id'],"option"=>$value['region_description']),
                                        "placeholder"=>"Librerias"
                                    ),
                                  false)
                            );
                            ?>  
                        </label>
                    </div>
                    <!-- end section -->                  

                </div>
                <?php
                print($this->html->endForm());
                ?>
              </div>
            </div>
            <!-- Fin Información de la Sucursal -->
          </div>
        </div>
        <!-- end: .tray-center -->

        <!-- begin: .tray-right -->
        <aside class="tray tray-right tray290">
         <div class="panel panel-danger panel-border top mb15">
              <div class="panel-heading">
                <span class="panel-title text-uppercase text-center">Información de la Empresa</span>
              </div>
         </div>
                <?php
                print($this->html->form(array(
                            "method" => "POST",
                            "action" => '',
                            "id" => 'form_business_settings',
                            "name" => 'form_business_settings',
                            "enctype" => 'multipart/form-data',
                            "novalidate"=>"novalidate"
                        ))
                );
                ?>
                <!-- admin-form business-->
                <div class="admin-form">
                    <!-- section -->  
                    <h5><small class="text-uppercase">Nombre:</small></h5>
                    <div class="section mb5">
                        <label for="business_description" class="field prepend-icon form-group">
                            <?php  
                            print($this->html->input('business_description','text', trim($value['business_description']),
                                    array(
                                        "id"=>'business_description',
                                        "class"=>"gui-input",
                                        "placeholder"=>"Correo de Contacto"
                                    ),
                                  false)
                            );
                            ?>
                            <label for="business_description" class="field-icon">
                              <i class="fa fa-home"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->  

                    <!-- section -->  
                    <h5><small class="text-uppercase">Documento Físcal:</small></h5>
                    <div class="section mb5">
                        <label for="business_identity_card" class="field prepend-icon form-group">
                            <?php  
                            print($this->html->input('business_identity_card','text', trim($value['business_identity_card']),
                                    array(
                                        "id"=>'business_identity_card',
                                        "class"=>"gui-input",
                                        "placeholder"=>"Documento Físcal"
                                    ),
                                  false)
                            );
                            ?>
                            <label for="business_identity_card" class="field-icon">
                              <i class="fa fa-certificate"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <!-- section -->  
                    <h5><small class="text-uppercase">Dirección Físcal:</small></h5>
                    <div class="section mb5">
                        <label for="business_address" class="field prepend-icon form-group">
                            <?php  
                            print($this->html->input('business_address','textarea', trim($value['business_address']),
                                    array(
                                        "id"=>'business_address',
                                        "class"=>"gui-input form-control textarea-grow",
                                        "rows"=>'4',
                                        "placeholder"=>"Dirección Físcal"
                                    ),
                                  false)
                            );
                            ?>
                            <label for="business_address" class="field-icon">
                              <i class="fa fa-map-marker"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <!-- section -->  
                    <h5><small class="text-uppercase">Teléfono Master:</small></h5>
                    <div class="section mb5">
                        <label for="business_phone" class="field prepend-icon form-group">
                            <?php  
                            print($this->html->input('business_phone','text', trim($value['business_phone']),
                                    array(
                                        "id"=>'business_phone',
                                        "class"=>"gui-input",
                                        "placeholder"=>"Teléfono Master"
                                    ),
                                  false)
                            );
                            ?>
                            <label for="business_phone" class="field-icon">
                              <i class="fa fa-phone-square"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <!-- section -->  
                    <h5><small class="text-uppercase">Fax:</small></h5>
                    <div class="section mb5">
                        <label for="business_facsimile" class="field prepend-icon form-group">
                            <?php  
                            print($this->html->input('business_facsimile','text', trim($value['business_facsimile']),
                                    array(
                                        "id"=>'business_facsimile',
                                        "class"=>"gui-input",
                                        "placeholder"=>"Fax"
                                    ),
                                  false)
                            );
                            ?>
                            <label for="business_facsimile" class="field-icon">
                              <i class="fa fa-fax"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <!-- section -->  
                    <h5><small class="text-uppercase">Correo Electrónico:</small></h5>
                    <div class="section mb5">
                        <label for="business_email" class="field prepend-icon form-group">
                            <?php  
                            print($this->html->input('business_email','text', trim($value['business_email']),
                                    array(
                                        "id"=>'business_email',
                                        "class"=>"gui-input",
                                        "placeholder"=>"Correo Electrónico"
                                    ),
                                  false)
                            );
                            ?>
                            <label for="business_email" class="field-icon">
                              <i class="fa fa-envelope"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <!-- section -->
                    <h5><small class="text-uppercase">Página Web:</small></h5>
                    <div class="section mb15">
                      <label for="business_website" class="field prepend-icon form-group">
                        <?php  
                        print($this->html->input('business_website','text', trim($value['business_website']),
                                array(
                                    "id"=>'business_website',
                                    "class"=>"gui-input",
                                    "placeholder"=>"Sitio Web"
                                ),
                              false)
                        );
                        ?>
                        <label for="business_website" class="field-icon">
                          <i class="fa fa-globe"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <!-- section -->  
                    <h5><small class="text-uppercase">Logo Institucional:</small></h5>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-preview thumbnail mb20">
                        <?php
                        print($this->html->image($value['business_logo'],
                                array(
                                    "class" => 'img-responsive center-block mt5 ml15 mw200 hidden-xs',
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
                        <input type="file">
                      </span>
                    </div>
                    <!-- end section -->  
                </div>
                <!-- end admin-form business-->
                <?php
                print($this->html->endForm());
                ?>
        </aside>
        <!-- end: .tray-right -->
  
</section>
<!-- End: Content -->
<?php       endforeach; 
        endif;
?>
<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">
    <section id="content_bookshop_add" class="table-layout animated">

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
                                    "name" => "btn_bookshop_add_cancel",
                                    "id" => "btn_bookshop_add_cancel",                    
                                    "controller" => 'Bookshop',
                                    "action" => '',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                        print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                array(
                                    "name" => "btn_bookshop_add",
                                    "id" => "btn_bookshop_add",                    
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
        
                <div class="admin-form">
                            <!-- Información de la Sucursal -->
                            <div class="panel panel-danger mbn5">

                              <div class="panel-body bg-light dark">
                                <?php
                                print($this->html->form(array(
                                            "method" => "POST",
                                            "action" => '',
                                            "id" => 'form_bookshop_add',
                                            "name" => 'form_bookshop_add',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>
                                    <div class="section row">
                                        <div class="col-md-4">
                                        <!-- section -->
                                        <h5><small class="text-left text-uppercase">Nombre de la Sucursal:</small></h5>
                                        <div class="section mb5">
                                            <label for="bookshop_description" class="field prepend-icon">
                                                <?php  
                                                print($this->html->input('bookshop_description','text', '',
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
                                        <!-- end section -->
                                        </div>
                                        <div class="col-md-4">    
                                        <!-- section -->
                                        <h5><small class="text-left text-uppercase">Teléfono de Contacto:</small></h5>
                                        <div class="section mb5">
                                            <label for="bookshop_phone" class="field prepend-icon">
                                                <?php  
                                                print($this->html->input('bookshop_phone','text', '',
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
                                        </div>
                                        <div class="col-md-4">
                                        <!-- section -->
                                        <h5><small class="text-left text-uppercase">Correo de Contacto:</small></h5>
                                        <div class="section mb5">
                                            <label for="bookshop_email" class="field prepend-icon">
                                                <?php  
                                                print($this->html->input('bookshop_email','text', '',
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
                                        </div>

                                    </div>

                                    <div class="section row">
                                        <div class="col-md-12">
                                        <!-- section -->
                                        <h5><small class="text-left text-uppercase">Dirección de Ubicación:</small></h5>
                                        <div class="section mb5">
                                            <label for="bookshop_address" class="field prepend-icon">
                                                <?php  
                                                print($this->html->input('bookshop_address','textarea', '',
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

                                            </label>
                                        </div>                    
                                        <!-- end section -->                                
                                        </div>                    
                                    </div>

                                    <div class="section row">
                                        <div class="col-md-4">
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
                                                            "placeholder"=>"Ubicaciones"
                                                        ),
                                                      false)
                                                );
                                                ?> 
                                            </label>
                                        </div>
                                        <!-- end section -->
                                        </div>

                                        <div class="col-md-4">
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
                                                            "placeholder"=>"Regiones"
                                                        ),
                                                      false)
                                                );
                                                ?>  
                                            </label>
                                        </div>
                                        <!-- end section -->
                                        </div>
                                    </div>
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
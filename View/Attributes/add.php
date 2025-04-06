<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">
    <section id="content_attributes_add" class="table-layout animated">

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
                                    "name" => "btn_add_cancel",
                                    "id" => "btn_add_cancel",                    
                                    "controller" => 'Attributes',
                                    "action" => '',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                        print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                array(
                                    "name" => "btn_add_acept",
                                    "id" => "btn_add_acept",                    
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
                                            "id" => 'form_attributes_add',
                                            "name" => 'form_attributes_add',
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
                                                print($this->html->input('attributes_name','text', '',
                                                        array(
                                                            "id"=>'attributes_name',
                                                            "class"=>"gui-input",
                                                            "placeholder"=>"Nombre del Atributo"
                                                        ),
                                                      false)
                                                );
                                                ?>
                                              <label for="attributes_name" class="field-icon">
                                              <i class="fa fa-tags"></i>
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
                                                print($this->html->input('attributes_description','textarea', '',
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
<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">
    <section id="content_categories_add" class="table-layout animated">

    <!-- begin: .tray-center -->
    <div class="tray tray-center pt15">

        <div class="mw1000 center-block">
            <!-- Información de la Sucursal -->
            <div class="panel panel-danger panel-border top mb15">

                <div class="panel-heading">

                <span class="panel-title text-uppercase text-center">Información de la Presentación</span>
                    <?php  
                        print($this->html->link("<i class='imoon imoon-cancel-circle fs18'></i>",
                                array(
                                    "name" => "btn_add_cancel",
                                    "id" => "btn_add_cancel",                    
                                    "controller" => 'Presentation',
                                    "action" => '',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                        print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                array(
                                    "name" => "btn_add_acept",
                                    "id" => "btn_add_acept",                    
                                    "controller" => 'Presentation',
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
                                            "id" => 'form_presentation_add',
                                            "name" => 'form_presentation_add',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>
                                    <!--SECTION ROW -->
                                    <div class="section row">

                                        <!-- section -->                                    
                                        <div class="col-md-4">
                                        <h5><small class="text-left text-uppercase">CATEGORÍA PADRE:</small></h5>
                                        <div class="section mb5">
                                            <label for="categories_parent_id" class="field prepend-icon">
                                                <?php  
                                                print($this->html->input('categories_parent_id','select',$this->categoryType['select'],
                                                        array(
                                                            "id"=>'categories_parent_id',
                                                            "class"=>"select2-single form-control",
                                                            "default"=>array("value"=>$value['categories_parent_id'],"option"=>$this->categoryType['type'][$value['categories_parent_id']]),
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
                                  
                                  
                                  
                                    <div class="section row">
                                        <div class="col-md-12">
                                        <!-- section -->
                                        <h5><small class="text-left text-uppercase">Nombre de la Categoría:</small></h5>
                                        <div class="section mb5">
                                            <label for="categories_name" class="field prepend-icon">
                                                <?php  
                                                print($this->html->input('categories_name','text', trim($value['categories_name']),
                                                        array(
                                                            "id"=>'categories_name',
                                                            "class"=>"gui-input",
                                                            "placeholder"=>"Nombre de la Categoría"
                                                        ),
                                                      false)
                                                );
                                                ?>
                                              <label for="categories_name" class="field-icon">
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
                                        <h5><small class="text-left text-uppercase">Descripción o Definición de la Categoría:</small></h5>
                                        <div class="section mb5">
                                            <label for="categories_description" class="field prepend-icon">
                                                <?php  
                                                print($this->html->input('categories_description','textarea',  trim($value['categories_description']),
                                                        array(
                                                            "id"=>'categories_description',
                                                            "class"=>"gui-textarea form-control textarea-grow ",
                                                            "rows"=>'4',
                                                            "placeholder"=>"Descripción o Definición de la Categoría"
                                                        ),
                                                      false)
                                                );
                                                ?> 
                                                <label for="categories_description" class="field-icon">
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
<?php
    //print('<pre>');print_r(json_decode(json_encode($this->List),JSON_OBJECT_AS_ARRAY));print('</pre>');
?>
<!--<section id="content_catalog_add" class="table-layout animated">-->
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
                        print($this->html->link("<i class='fa fa-tags'></i> Datos del Árticulo",
                                array(
                                    "name" => "tab_datos",
                                    "id" => "tab_datos",                    
                                    "controller" => '',
                                    "action" => '',
                                    "href" => '#datos',
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
                  <div id="datos" class="tab-pane active">
                  
                    <div class="panel panel-danger panel-heading panel-title panel-transparent text-uppercase text-left top mb5 fs14">
                        <span class="text-center text-primary-lighter"><strong>Datos del Árticulo</strong></span>
                        <?php  
                            print($this->html->link("<i class='imoon imoon-cancel-circle fs18 text-danger'></i>",
                                    array(
                                        "name" => "btn_add_cancel",
                                        "id" => "btn_add_cancel",                    
                                        "controller" => 'Catalog',
                                        "action" => '',
                                        "class"=>'btn text-danger-lighter pull-right'
                                    )
                                  )
                            ); 
                            print($this->html->link("<i class='imoon imoon-disk fs18 text-danger'></i>",
                                    array(
                                        "name" => "btn_add_acept",
                                        "id" => "btn_add_acept",                    
                                        "controller" => 'Catalog',
                                        "action" => '',
                                        "href"=> 'javascript:void(0)',
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
                                            "id" => 'form_catalog_add',
                                            "name" => 'form_catalog_add',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>
                                <!--SECTION ROW -->
                                <div class="section row">
                                    <!-- section -->  
                                    <div class="col-md-3">
                                        <h5 class="text-uppercase text-center"><small class="text-uppercase text-center">Imagen o Portada</small></h5>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                          <div class="fileupload-preview thumbnail mb20 ">
                                            <?php
                                            print($this->html->image($value['catalog_image'],
                                                    array(
                                                        "id"=> 'img_logo',
                                                        "class" => 'img-responsive mw200 mh-200  hidden-xs',
                                                        "alt" => 'Imagen',
                                                        "data-src"=>'holder.js/100%x120'
                                                    )
                                            )
                                            ); 
                                            ?>    
                                          </div>
                                          <span class="btn btn-default light btn-file btn-block ph5">
                                            <span class="fileupload-new">Elegir</span>
                                            <span class="fileupload-exists">Cambiar</span>
                                            <input id="image_cover" name="image_cover" type="file" >
                                          </span>
                                        </div>
                                    </div>
                                    <!-- end section -->  

                                    <!-- section -->
                                    <div class="col-md-9">
                                    <h5><small class="text-left text-uppercase">Nombre del Árticulo:</small></h5>
                                    <div class="section mb5">
                                        <label for="catalog_title" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('catalog_title','text', isset($value['catalog_title']) ? trim($value['catalog_title']):"",
                                                    array(
                                                        "id"=>'catalog_title',
                                                        "class"=>"gui-input",
                                                        "placeholder"=>"Nombre del Árticulo"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                          <label for="catalog_title" class="field-icon">
                                          <i class="fa fa-bookmark"></i>
                                        </label>
                                      </label>
                                    </div>
                                    </div>
                                    <!-- end section -->           

                                    
                                    <!-- section -->                                
                                    <div class="col-md-9">
                                    <h5><small class="text-left text-uppercase">Descripción del Árticulo:</small></h5>
                                    <div class="section mb5">
                                        <label for="catalog_description" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('catalog_description','textarea', isset($value['catalog_description']) ? trim($value['catalog_description']):"",
                                                    array(
                                                        "id"=>'catalog_description',
                                                        "class"=>"gui-textarea form-control textarea-grow ",
                                                        "rows"=>'4',
                                                        "placeholder"=>"Descripción del Árticulo"
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                            <label for="catalog_description" class="field-icon">
                                              <i class="fa fa-tags"></i>
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
                                    <div class="col-md-3">    
                                    <h5><small class="text-left text-uppercase">Código:</small></h5>
                                    <div class="section mb5">
                                        <label for="catalog_code" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('catalog_code','text', isset($value['catalog_code']) ? trim($value['catalog_code']):"",
                                                    array(
                                                        "id"=>'catalog_code',
                                                        "class"=>"gui-input text-uppercase identification"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="catalog_code" class="field-icon">
                                              <i class="fa fa-hashtag"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->

                                    <!-- section -->
                                    <div class="col-md-3">    
                                    <h5><small class="text-left text-uppercase">Código de Barras:</small></h5>
                                    <div class="section mb5">
                                        <label for="catalog_bardcode" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('catalog_bardcode','text', isset($value['catalog_bardcode']) ? trim($value['catalog_bardcode']):"",
                                                    array(
                                                        "id"=>'catalog_bardcode',
                                                        "class"=>"gui-input text-uppercase identification"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="catalog_bardcode" class="field-icon">
                                              <i class="fa fa-barcode"></i>
                                            </label>
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    <!-- section -->                                    
                                    <div class="col-md-3">
                                    <h5><small class="text-left text-uppercase">Categoria:</small></h5>
                                    <div class="section mb5">
                                        <label for="catalog_category_id" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('catalog_category_id','select',$this->categoryType['select'],
                                                    array(
                                                        "id"=>'catalog_category_id',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['catalog_category_id'],"option"=>$this->categoryType['type'][$value['catalog_category_id']])
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->

                                    <!-- section -->                                    
                                    <div class="col-md-3">
                                    <h5><small class="text-left text-uppercase">Exento de Impuesto:</small></h5>
                                    <div class="section mb5">
                                        <label for="catalog_tax_exempt" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('catalog_tax_exempt','select',$this->booleanType['select'],
                                                    array(
                                                        "id"=>'catalog_tax_exempt',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['catalog_tax_exempt'],"option"=>$this->booleanType['type'][$value['catalog_tax_exempt']])
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
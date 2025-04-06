<?php
    //print('<pre>');print_r(json_decode(json_encode($this->List),JSON_OBJECT_AS_ARRAY));print('</pre>');
    if(isset($this->List) && !empty($this->List)):
            foreach ($this->List as $key => $value):
?>
<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">
    <section id="content_catalog_edit" class="table-layout animated">

    <!-- begin: .tray-center -->
    <div class="tray tray-center pt15">

        <div class="mw1000 center-block">
            

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
                  <li class="">
                    <?php  
                        print($this->html->link("<i class='fa fa-tags'></i> Descuentos",
                                array(
                                    "name" => "tab_descuentos",
                                    "id" => "tab_descuentos",                    
                                    "controller" => '',
                                    "action" => '',
                                    "href" => '#descuentos',
                                    "data-toggle" => 'tab',
                                    "aria-expanded" => 'true',
                                    "class"=>'panel-title text-uppercase'
                                )
                              )
                        ); 
                    ?>    
                  </li>
                  <li class="">
                    <?php  
                        print($this->html->link("<i class='fa fa-tags'></i> Impuestos",
                                array(
                                    "name" => "tab_impuestos",
                                    "id" => "tab_impuestos",                    
                                    "controller" => '',
                                    "action" => '',
                                    "href" => '#impuestos',
                                    "data-toggle" => 'tab',
                                    "aria-expanded" => 'true',
                                    "class"=>'panel-title text-uppercase'
                                )
                              )
                        ); 
                    ?>    
                  </li>                  
                  <li class="">
                    <?php  
                        print($this->html->link("<i class='fa fa-tags'></i> Atributos",
                                array(
                                    "name" => "tab_atributos",
                                    "id" => "tab_atributos",                    
                                    "controller" => '',
                                    "action" => '',
                                    "href" => '#atributos',
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
                                        "name" => "btn_edit_cancel",
                                        "id" => "btn_edit_cancel",                    
                                        "controller" => 'Catalog',
                                        "action" => '',
                                        "class"=>'btn text-danger-lighter pull-right'
                                    )
                                  )
                            ); 
                            print($this->html->link("<i class='imoon imoon-disk fs18 text-danger'></i>",
                                    array(
                                        "name" => "btn_edit_acept",
                                        "id" => "btn_edit_acept",                    
                                        "controller" => 'Catalog',
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
                                            "id" => 'form_catalog_edit',
                                            "name" => 'form_catalog_edit',
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
                                    
                                    <!-- panel-title -->
                                    <div class="panel panel-danger panel-heading panel-border panel-title text-uppercase text-center top ml10 fs14">
                                        <span class="text-left text-danger-lighter"><strong>Datos del Árticulo</strong></span>
                                    </div>
                                    <!-- end panel-title -->                                    
                                    

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
                                        <label for="catalog_is_active" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('catalog_is_active','select',$this->statusType['select'],
                                                    array(
                                                        "id"=>'catalog_is_active',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['catalog_is_active'],"option"=>$this->statusType['type'][$value['catalog_is_active']]),
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
                  
                  <!--Descuentos-->
                  <div id="descuentos" class="tab-pane">

                    <div class="panel panel-danger panel-heading panel-title panel-transparent text-uppercase text-left top mb5 fs14">
                        <span class="text-center text-primary-lighter"><strong>Datos del Descuento</strong></span>
                        <?php  
                            print($this->html->link("<i class='imoon imoon-disk fs18 text-danger'></i>",
                                    array(
                                        "name" => "btn_discount_acept",
                                        "id" => "btn_discount_acept",                    
                                        "controller" => 'Catalog',
                                        "action" => '',
                                        "href"=> '#',
                                        "class"=>'btn text-danger-lighter pull-right'
                                    )
                                  )
                            ); 
                        ?>             
                    </div>                      
                    <div class="admin-form">  
                    <div class="panel panel-danger mbn5">

                    <div class="panel-body bg-light dark">
                    <!--SECTION ROW -->
                    <div class="section row">

                        <!-- section -->
                        <div class="col-md-4">    
                        <h5><small class="text-left text-uppercase">Descripción:</small></h5>
                        <div class="section mb5">
                            <label for="discounts_description" class="field prepend-icon">
                                <?php  
                                print($this->html->input('discounts_description','text', isset($value['discounts_description']) ? trim($value['discounts_description']):"",
                                        array(
                                            "id"=>'discounts_description',
                                            "class"=>"gui-input text-uppercase identification"
                                        ),
                                      false)
                                );
                                ?>
                                <label for="discounts_description" class="field-icon">
                                  <i class="fa fa-tags"></i>
                                </label>
                            </label>
                        </div>
                        </div>
                        <!-- end section -->

                        <!-- section -->
                        <div class="col-md-4">    
                        <h5><small class="text-left text-uppercase">Porcentaje:</small></h5>
                        <div class="section mb5">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-level-up"></i>
                          </span>
                                <?php  
                                print($this->html->input('discounts_rate','text', isset($value['discounts_rate']) ? trim($value['discounts_rate']):"",
                                        array(
                                            "id"=>'discounts_rate',
                                            "readonly"=>'true',
                                            "class"=>"form-control ui-spinner-input gui-input text-uppercase decimal"
                                        ),
                                      false)
                                );
                                ?>  
                        </div>
                        </div>
                        </div>
                        <!-- end section -->

                        <!-- section -->
                        <div class="col-md-4">    
                        <h5><small class="text-left text-uppercase">Duración:</small></h5>
                        <div class="section mb5">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-calendar-plus-o"></i>
                          </span>
                                <?php  
                                print($this->html->input('discounts_duration_days','text', isset($value['discounts_duration_days']) ? trim($value['discounts_duration_days']):"",
                                        array(
                                            "id"=>'discounts_duration_days',
                                            "class"=>"form-control ui-spinner-input gui-input text-uppercase identification"
                                        ),
                                      false)
                                );
                                ?>  
                        </div>
                        </div>
                        </div>
                        <!-- end section -->

                    </div>                                    
                    <!--END SECTION ROW -->    
                      
                    
                    <!--SECTION ROW -->
                    <div class="section row">
                        
                        
                            <table id="catalog_discounts"  class="table mbn tc-med-1 tc-bold-last">
                              <thead>
                                <tr class="">
                                  <th class="text-center bg-danger">ID</th>
                                  <th class="text-center bg-danger">DESCRIPCIÓN</th>
                                  <th class="text-center bg-danger">PORCENTAJE</th>
                                  <th class="text-center bg-danger">PERIODO</th>
                                  <th class="text-center bg-danger">ACTIVO</th>
                                </tr>
                              </thead>
                              <tbody class="fs15"> 
                                <?php
                                    $checked='';
                                    foreach ($this->discountList as $key => $list) {
                                        if (!empty($list['discounts_is_active'])==1) $checked='checked'; else $checked='';
                                        print('
                                            <tr>
                                            <td class="text-center">'.$list['discounts_id'].'</td>
                                            <td class="text-left">'.$list['discounts_description'].'</td>
                                            <td class="text-center"><small>'.$list['discounts_rate'].'</small></span></td>
                                            <td class="text-center"><small>'.$list['discounts_duration_days'].' días</small></span></td>
                                            <td class="text-center">
                                            <label class="switch block switch-danger">
                                              <input type="checkbox" name="catalog_discounts_'.$list['discounts_id'].'" id="catalog_discounts_'.$list['discounts_id'].'" value="'.$list['discounts_id'].'" usersid="'.$value['discounts_users_id'].'" '.$checked.'>
                                              <label for="catalog_discounts_'.$list['discounts_id'].'" data-on="SI" data-off="NO" ></label>
                                              <span id="spinner_catalog_discounts_'.$list['discounts_id'].'" class="hidden fa fa-spin fa-spinner" ></span>    
                                            </label>                                                        
                                            </td>
                                            </tr>
                                        ');
                                    }

                                 ?>  
                              </tbody>
                            </table>
                        
                                                  
                    </div>                                
                    <!--END SECTION ROW -->
                    </div>
                    </div>
                    </div>  
                  </div>
                  <!--Fin Descuentos-->  
                  
                  <!--Impuestos-->
                  <div id="impuestos" class="tab-pane">
                      
                    <div class="panel panel-danger panel-heading panel-title panel-transparent text-uppercase text-left top mb5 fs14">
                        <span class="text-center text-primary-lighter"><strong>Datos del Impuesto</strong></span>
                        <?php  
                            print($this->html->link("<i class='imoon imoon-disk fs18 text-danger'></i>",
                                    array(
                                        "name" => "btn_taxes_acept",
                                        "id" => "btn_taxes_acept",                    
                                        "controller" => 'Catalog',
                                        "action" => '',
                                        "href"=> '#',
                                        "class"=>'btn text-danger-lighter pull-right'
                                    )
                                  )
                            ); 
                        ?>             
                    </div>                      
                    <div class="admin-form">  
                    <div class="panel panel-danger mbn5">

                    <div class="panel-body bg-light dark">
                    <!--SECTION ROW -->
                    <div class="section row">

                        <!-- section -->
                        <div class="col-md-4">    
                        <h5><small class="text-left text-uppercase">Descripción:</small></h5>
                        <div class="section mb5">
                            <label for="discounts_description" class="field prepend-icon">
                                <?php  
                                print($this->html->input('discounts_description','text', isset($value['discounts_description']) ? trim($value['discounts_description']):"",
                                        array(
                                            "id"=>'discounts_description',
                                            "class"=>"gui-input text-uppercase identification"
                                        ),
                                      false)
                                );
                                ?>
                                <label for="discounts_description" class="field-icon">
                                  <i class="fa fa-tags"></i>
                                </label>
                            </label>
                        </div>
                        </div>
                        <!-- end section -->

                        <!-- section -->
                        <div class="col-md-4">    
                        <h5><small class="text-left text-uppercase">Porcentaje:</small></h5>
                        <div class="section mb5">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-level-up"></i>
                          </span>
                                <?php  
                                print($this->html->input('discounts_rate','text', isset($value['discounts_rate']) ? trim($value['discounts_rate']):"",
                                        array(
                                            "id"=>'discounts_rate',
                                            "class"=>"form-control ui-spinner-input gui-input text-uppercase identification"
                                        ),
                                      false)
                                );
                                ?>  
                        </div>
                        </div>
                        </div>
                        <!-- end section -->

                        <!-- section -->
                        <div class="col-md-4">    
                        <h5><small class="text-left text-uppercase">Duración:</small></h5>
                        <div class="section mb5">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-calendar-plus-o"></i>
                          </span>
                                <?php  
                                print($this->html->input('discounts_duration_days','text', isset($value['discounts_duration_days']) ? trim($value['discounts_duration_days']):"",
                                        array(
                                            "id"=>'discounts_duration_days',
                                            "class"=>"form-control ui-spinner-input gui-input text-uppercase identification"
                                        ),
                                      false)
                                );
                                ?>  
                        </div>
                        </div>
                        </div>
                        <!-- end section -->

                    </div>                                    
                    <!--END SECTION ROW -->    
                      
                    
                    <!--SECTION ROW -->
                    <div class="section row">
                        
                        
                            <table id="catalog_discounts"  class="table mbn tc-med-1 tc-bold-last">
                              <thead>
                                <tr class="">
                                  <th class="text-center bg-danger">ID</th>
                                  <th class="text-center bg-danger">DESCRIPCIÓN</th>
                                  <th class="text-center bg-danger">PORCENTAJE</th>
                                  <th class="text-center bg-danger">PERIODO</th>
                                  <th class="text-center bg-danger">ACTIVO</th>
                                </tr>
                              </thead>
                              <tbody class="fs15"> 
                                <?php
                                    $checked='';
                                    foreach ($this->discountList as $key => $list) {
                                        if (!empty($list['discounts_is_active'])==1) $checked='checked'; else $checked='';
                                        print('
                                            <tr>
                                            <td class="text-center">'.$list['discounts_id'].'</td>
                                            <td class="text-left">'.$list['discounts_description'].'</td>
                                            <td class="text-center"><small>'.$list['discounts_rate'].'</small></span></td>
                                            <td class="text-center"><small>'.$list['discounts_duration_days'].' días</small></span></td>
                                            <td class="text-center">
                                            <label class="switch block switch-danger">
                                              <input type="checkbox" name="catalog_discounts_'.$list['discounts_id'].'" id="catalog_discounts_'.$list['discounts_id'].'" value="'.$list['discounts_id'].'" usersid="'.$value['discounts_users_id'].'" '.$checked.'>
                                              <label for="catalog_discounts_'.$list['discounts_id'].'" data-on="SI" data-off="NO" ></label>
                                              <span id="spinner_catalog_discounts_'.$list['discounts_id'].'" class="hidden fa fa-spin fa-spinner" ></span>    
                                            </label>                                                        
                                            </td>
                                            </tr>
                                        ');
                                    }

                                 ?>  
                              </tbody>
                            </table>
                        
                                                  
                    </div>                                
                    <!--END SECTION ROW -->
                    </div>
                    </div>
                    </div>  
                    
                  </div>
                  <!--Fin Impuestos-->  

                  <!--Atributos-->
                  <div id="atributos" class="tab-pane">
                      
                    <div class="panel panel-danger panel-heading panel-title panel-transparent text-uppercase text-left top mb5 fs14">
                        <span class="text-center text-primary-lighter"><strong>Datos del Atributo</strong></span>
                        <?php  
                            print($this->html->link("<i class='imoon imoon-disk fs18 text-danger'></i>",
                                    array(
                                        "name" => "btn_attributes_acept",
                                        "id" => "btn_attributes_acept",                    
                                        "controller" => 'Catalog',
                                        "action" => '',
                                        "href"=> '#',
                                        "class"=>'btn text-danger-lighter pull-right'
                                    )
                                  )
                            ); 
                        ?>             
                    </div>                      
                    <div class="admin-form">  
                    <div class="panel panel-danger mbn5">

                    <div class="panel-body bg-light dark">
                    <!--SECTION ROW -->
                    <div class="section row">

                        <!-- section -->
                        <div class="col-md-4">    
                        <h5><small class="text-left text-uppercase">Descripción:</small></h5>
                        <div class="section mb5">
                            <label for="discounts_description" class="field prepend-icon">
                                <?php  
                                print($this->html->input('discounts_description','text', isset($value['discounts_description']) ? trim($value['discounts_description']):"",
                                        array(
                                            "id"=>'discounts_description',
                                            "class"=>"gui-input text-uppercase identification"
                                        ),
                                      false)
                                );
                                ?>
                                <label for="discounts_description" class="field-icon">
                                  <i class="fa fa-tags"></i>
                                </label>
                            </label>
                        </div>
                        </div>
                        <!-- end section -->

                        <!-- section -->
                        <div class="col-md-4">    
                        <h5><small class="text-left text-uppercase">Porcentaje:</small></h5>
                        <div class="section mb5">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-level-up"></i>
                          </span>
                                <?php  
                                print($this->html->input('discounts_rate','text', isset($value['discounts_rate']) ? trim($value['discounts_rate']):"",
                                        array(
                                            "id"=>'discounts_rate',
                                            "class"=>"form-control ui-spinner-input gui-input text-uppercase identification"
                                        ),
                                      false)
                                );
                                ?>  
                        </div>
                        </div>
                        </div>
                        <!-- end section -->

                        <!-- section -->
                        <div class="col-md-4">    
                        <h5><small class="text-left text-uppercase">Duración:</small></h5>
                        <div class="section mb5">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-calendar-plus-o"></i>
                          </span>
                                <?php  
                                print($this->html->input('discounts_duration_days','text', isset($value['discounts_duration_days']) ? trim($value['discounts_duration_days']):"",
                                        array(
                                            "id"=>'discounts_duration_days',
                                            "class"=>"form-control ui-spinner-input gui-input text-uppercase identification"
                                        ),
                                      false)
                                );
                                ?>  
                        </div>
                        </div>
                        </div>
                        <!-- end section -->

                    </div>                                    
                    <!--END SECTION ROW -->    
                      
                    
                    <!--SECTION ROW -->
                    <div class="section row">
                        
                        
                            <table id="catalog_discounts"  class="table mbn tc-med-1 tc-bold-last">
                              <thead>
                                <tr class="">
                                  <th class="text-center bg-danger">ID</th>
                                  <th class="text-center bg-danger">DESCRIPCIÓN</th>
                                  <th class="text-center bg-danger">PORCENTAJE</th>
                                  <th class="text-center bg-danger">PERIODO</th>
                                  <th class="text-center bg-danger">ACTIVO</th>
                                </tr>
                              </thead>
                              <tbody class="fs15"> 
                                <?php
                                    $checked='';
                                    foreach ($this->discountList as $key => $list) {
                                        if (!empty($list['discounts_is_active'])==1) $checked='checked'; else $checked='';
                                        print('
                                            <tr>
                                            <td class="text-center">'.$list['discounts_id'].'</td>
                                            <td class="text-left">'.$list['discounts_description'].'</td>
                                            <td class="text-center"><small>'.$list['discounts_rate'].'</small></span></td>
                                            <td class="text-center"><small>'.$list['discounts_duration_days'].' días</small></span></td>
                                            <td class="text-center">
                                            <label class="switch block switch-danger">
                                              <input type="checkbox" name="catalog_discounts_'.$list['discounts_id'].'" id="catalog_discounts_'.$list['discounts_id'].'" value="'.$list['discounts_id'].'" usersid="'.$value['discounts_users_id'].'" '.$checked.'>
                                              <label for="catalog_discounts_'.$list['discounts_id'].'" data-on="SI" data-off="NO" ></label>
                                              <span id="spinner_catalog_discounts_'.$list['discounts_id'].'" class="hidden fa fa-spin fa-spinner" ></span>    
                                            </label>                                                        
                                            </td>
                                            </tr>
                                        ');
                                    }

                                 ?>  
                              </tbody>
                            </table>
                        
                                                  
                    </div>                                
                    <!--END SECTION ROW -->
                    </div>
                    </div>
                    </div>  
                    
                  </div>
                  <!--Fin Atributos-->  
                  
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
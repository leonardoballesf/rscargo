<?php
    //print('<pre>');print_r($this->List);print('</pre>');
    //print('<pre>');print(json_encode($this->help->statusType['select'], JSON_PRETTY_PRINT));print('</pre>');
    if(isset($this->List) && !empty($this->List)):
            foreach ($this->List as $key => $value):
?>

<section id="content" class="animated fadeIn">
<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">
<!--    <section id="content_users_edit" class="table-layout animated">-->

    <!-- begin: .tray-center -->
    <div class="tray tray-center pt15">

        <div class="mw1100 center-block">
            <!-- Información dela Usuario -->
            <div class="panel panel-danger panel-border top mb15">

                <div class="panel-heading">

                <span class="panel-title text-uppercase text-center"><?php print($this->title);?>: </span>
                
                <!-- section -->
                <label for="customers_name" class="">
                    <?php  
                    print($this->html->tags('customers_name','label', '<i class="fa fa-user"></i> '.$value['customers_code'].' - '.$value['customers_name'],
                            array(
                                "id"=>'customers_name',
                                "class"=>"text-uppercase text-danger"
                            )
                            )
                    );
                    ?>
                </label>
                <!-- end section -->   
                
                    <?php  
                        print($this->html->link("<i class='imoon imoon-cancel-circle fs18'></i>",
                                array(
                                    "name" => "btn_edit_cancel",
                                    "id" => "btn_edit_cancel",                    
                                    "controller" => 'Customers',
                                    "action" => '',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                        print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                array(
                                    "name" => "btn_edit_acept",
                                    "id" => "btn_edit_acept",                    
                                    "controller" => 'Customers',
                                    "action" => '',
                                    "href"=> 'javascript:void(0)',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                    ?>             
                </div>
                
                <div class="panel-body bg-light dark">
        
                <div class="admin-form">
                            <!-- Información del Empleado -->
                            <div class="panel panel-danger mb5">

                              <div class="panel-body bg-light dark">
                                <?php
                                print($this->html->form(array(
                                            "method" => "POST",
                                            "action" => '',
                                            "id" => 'form_customers_edit',
                                            "name" => 'form_customers_edit',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>

                                <!-- panel-title -->
                                <div class="panel panel-danger panel-heading panel-border panel-title text-uppercase text-center top mb5 fs14">
                                    <span class="text-center text-danger-lighter"><strong>Información Personal</strong></span>
                                </div>
                                <!-- end panel-title -->  
                                
<!--SECTION ROW -->
<div class="section row">
                                    
                                    <!-- section -->
                                    <div class="col-md-12">    
                                    <h5><small class="text-left text-uppercase">Nombre del Cliente:</small></h5>
                                    <div class="section mb5">
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
                                    </div>
                                    <!-- end section -->
                                    
                                </div>                                    
                                <!--END SECTION ROW -->                                



                                <!--SECTION ROW -->
                                <div class="section row">
                                    

                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Tipo de Tarifa:</small></h5>
                                    <div class="section mb5">
                                        <label for="customers_type_id" class="field prepend-icon">
                                            <?php  
                                            
                                            print($this->html->input('customers_tariffs_id','select',$this->tariffsType['select'],
                                                    array(
                                                        "id"=>'customers_tariffs_id',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['customers_tariffs_id'],"option"=>$this->tariffsType['type'][$value['customers_tariffs_id']]),
                                                    ),
                                                  false)
                                            );
                                            ?> 
                                        </label>
                                    </div>
                                    </div>
                                    <!-- end section -->                                    

                                    <!-- section -->
                                    <div class="col-md-4">    
                                    <h5><small class="text-left text-uppercase">Correo Electrónico:</small></h5>
                                    <div class="section mb5">
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
                                    </div>
                                    <!-- end section -->

                                    <!-- section -->
                                    <div class="col-md-4">    
                                    <h5><small class="text-left text-uppercase">Teléfono:</small></h5>
                                    <div class="section mb5">
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
                                    <div class="col-md-12">
                                    <h5><small class="text-left text-uppercase">Dirección de Ubicación:</small></h5>
                                    <div class="section mb5">
                                        <label for="customers_address" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_address','textarea', trim($value['customers_address']),
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
                                    <h5><small class="text-left text-uppercase">Sucursal:</small></h5>
                                    <div class="section mb5">
                                        <label for="bookshop_description" class="field prepend-icon field-icon">
                                            <?php  
                                            print($this->html->tags('bookshop_description','label', '<i class="fa fa-home"></i> '.$value['bookshop_description'],
                                                    array(
                                                        "id"=>'bookshop_description',
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
                                        <label for="customers_is_active" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('customers_is_active','select',$this->statusType['select'],
                                                    array(
                                                        "id"=>'customers_is_active',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['customers_is_active'],"option"=>$this->statusType['type'][$value['customers_is_active']]),
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
                            <!-- Fin Información del Usuario -->
                </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</section>
<!-- End: Content -->
    
<?php       endforeach; 
        endif;
?>
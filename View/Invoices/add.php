<?php
    /*$post = ['cedula' => '15106515','nacionalidad' => 'V'];
    $ch = curl_init('https://tramites.saime.gob.ve/index.php?r=usuario/usuario/BuscarSaimeContacto');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    curl_close($ch);*/
?>

<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

          <!-- create new order panel -->
          <div class="panel mb5 mt5">
            <div class="panel-heading">
              <span class="panel-title text-uppercase hidden-xs"><?php print($this->title);?></span>
              <ul class="nav panel-tabs-border panel-tabs">
                <li class="active">
                  <a href="#tab_customer" data-toggle="tab">Cliente</a>
                </li>
                <li>
                  <a href="#tab_payment_methods" data-toggle="tab">Forma de Pago</a>
                </li>
              </ul>
            </div>
            <div class="panel-body admin-form">
              <div class="tab-content">
                <div id="tab_customer" class="tab-pane active">
                <div class="admin-form">
                           
                <?php
                print($this->html->form(array(
                            "method" => "POST",
                            "action" => '',
                            "id" => 'form_invoices_add',
                            "name" => 'form_invoices_add',
                            "enctype" => 'multipart/form-data',
                        ))
                );
                ?>
                                
                <?php
                
                $invoice = json_decode(file_get_contents($this->userPath.'/invoices.json'),JSON_OBJECT_AS_ARRAY);
                
                $items_in_invoices = json_decode(file_get_contents($this->userPath.'/items_in_invoices.json'), JSON_OBJECT_AS_ARRAY);
                
                $invoices_current['Invoices'] = array_merge($invoice['Invoices'],$items_in_invoices);
                        
                $invoices_backup['Invoices'] = Session::get('Invoices');
               
                $value = $invoice['Invoices']['customer'][0];
                
                ?>
                        <!--SECTION ROW-->
                        <div class="section row">
                            
                          <!-- section -->
                          <div class="col-md-12">    
                          <h5><small class="text-left text-uppercase">Nombre del Cliente:</small></h5>
                          <div class="section mb5">
                              <label for="customers_name" class="field prepend-icon">
                                  <?php  
                                  print($this->html->input('customers_name','text', isset($value['name']) ? $value['name'] : "",
                                          array(
                                              "id"=>'customers_name',
                                              "class"=>"gui-input text-uppercase"
                                          ),
                                        false)
                                  );
                                  ?>
                                  <label for="customers_name" class="field-icon">
                                    <i class="fa fa-hashtag"></i>
                                  </label>
                              </label>
                          </div>
                          </div>
                          <!-- end section -->
                        </div>

                    
                        <!--SECTION ROW-->
                        <div class="section row">
                          <!-- section -->
                          <div class="col-md-4">    
                          <h5><small class="text-left text-uppercase">Identificación:</small></h5>
                          <div class="section mb5">
                              <label for="identity_card" class="field prepend-icon">
                                  <?php  
                                  print($this->html->input('identity_card','text', isset($value['identity_card']) ? $value['identity_card'] : "",
                                          array(
                                              "id"=>'identity_card',
                                              "class"=>"gui-input text-uppercase"
                                          ),
                                        false)
                                  );
                                  ?>
                                  <label for="identity_card" class="field-icon">
                                    <i class="fa fa-hashtag"></i>
                                  </label>
                              </label>
                          </div>
                          </div>
                          <!-- end section -->
                          <!-- section -->                                    
                          <div class="col-md-4">
                          <h5><small class="text-left text-uppercase">Tipo de Identificación:</small></h5>
                          <div class="section mb5">
                              <label for="type_id" class="field prepend-icon">
                                  <?php  
                                  print($this->html->input('type_id','select',$this->customersType['select'],
                                          array(
                                              "id"=>'type_id',
                                              "class"=>"select2-single form-control",
                                              "default"=>array("value"=>$value['type_id'],"option"=>$this->customersType['type'][$value['type_id']])
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
                          <h5><small class="text-left text-uppercase">Nacionalidad:</small></h5>
                          <div class="section mb5">
                              <label for="nationality_id" class="field prepend-icon">
                                  <?php  
                                  print($this->html->input('nationality_id','select',$this->nationalityType['select'],
                                          array(
                                              "id"=>'nationality_id',
                                              "class"=>"select2-single form-control",
                                              "default"=>array("value"=>$value['nationality_id'],"option"=>$this->nationalityType['type'][$value['nationality_id']])
                                          ),
                                        false)
                                  );
                                  ?> 
                              </label>
                          </div>
                          </div>
                          <!-- end section -->         
                        </div>
                        <!--END SECTION ROW-->

                <?php
                print($this->html->endForm());
                ?>
                </div>
                </div>
                <div id="tab_payment_methods" class="tab-pane">
                <div class="admin-form">    
                    
                <?php
                print($this->html->form(array(
                            "method" => "POST",
                            "action" => '',
                            "id" => 'form_invoices_paymethod_add',
                            "name" => 'form_invoices_paymethod_add',
                            "enctype" => 'multipart/form-data',
                        ))
                );
                ?>
                   
                <!--SECTION ROW-->
                <div class="section row">
                    
                <div class="section col-md-4">
                     <h5><small class="text-left text-uppercase">Forma de Pago:</small></h5>
                      <label for="payment_method_id" class="field select">
                        <?php  
                        print($this->html->input('payment_method_id','select',$this->paymentMethods['select'],
                                array(
                                    "id"=>'payment_method_id',
                                    "class"=>"",
                                    "placeholder"=>"---SELECCIONE---"
                                ),
                              false)
                        );
                        ?> 
                        <i class="arrow "></i>
                      </label>
                </div>
                    
                <div class="section col-md-4">
                     <h5><small class="text-left text-uppercase">Entidad Emisora:</small></h5>
                      <label for="issuing_entity_id" class="field select">
                        <?php  
                        print($this->html->input('issuing_entity_id','select',$this->issuingEntity['select'],
                                array(
                                    "id"=>'issuing_entity_id',
                                    "class"=>"",
                                    "placeholder"=>"---SELECCIONE---"
                                ),
                              false)
                        );
                        ?> 
                        <i class="arrow "></i>
                      </label>
                </div>    
                
                <!-- section -->
                <div class="col-md-4">    
                <h5><small class="text-left text-uppercase">Código o Cuenta:</small></h5>
                <div class="section mb5">
                    <label for="account_code" class="field prepend-icon">
                        <?php  
                        print($this->html->input('account_code','text','',
                                array(
                                    "id"=>'account_code',
                                    "class"=>"gui-input text-uppercase"
                                ),
                              false)
                        );
                        ?>
                        <label for="identity_card" class="field-icon">
                          <i class="fa fa-hashtag"></i>
                        </label>
                    </label>
                </div>
                </div>
                <!-- end section -->    
                    
                </div>
                <!--END SECTION ROW-->
                
                <!--SECTION ROW-->
                <div class="section row">
                
                <div class="section col-md-4">
                     <h5><small class="text-left text-uppercase">Entidad Emisora:</small></h5>
                      <label for="issuing_entity_id" class="field select">
                        <?php  
                        print($this->html->input('issuing_entity_id','select',$this->issuingEntity['select'],
                                array(
                                    "id"=>'issuing_entity_id',
                                    "class"=>"gui-input form-control",
                                    "placeholder"=>"Entidad Emisora"
                                ),
                              false)
                        );
                        ?> 
                        <i class="arrow "></i>
                      </label>
                </div>
                
                </div>  

                  <div class="section row">
                    <div class="col-md-4">
                      <label for="secno" class="field prepend-icon">
                        <input type="text" name="secno" id="secno" class="gui-input" placeholder="Numero de Seguridad">
                        <b class="tooltip tip-left-top"><em> Referencia o clave de aprobación </em></b>
                        <label for="secno" class="field-icon">
                          <i class="fa fa-barcode"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="col-md-8">
                      <p class="field-align">
                        <a href="#" class="theme-link"> What is this? </a>
                      </p>
                    </div>
                    <!-- end section -->
                  </div>                
                <?php
                print($this->html->endForm());
                ?>
                </div>
                </div>
              </div>
            </div>
          </div>

          <!-- recent orders table -->
        <div class="panel mt15">
            <div class="">
            <div class="panel panel-danger panel-border top mbn">
              <div class="panel-heading text-center">
                <span class="panel-title text-uppercase">DETALLE DE FACTURA</span>
              </div>
            </div> 
              
                  <table id="invoices_items" name="invoices_items" class="table table-responsive table-striped table-bordered admin-form theme-warning fs12">
                  <thead>
                    <tr class="bg-light text-danger-lighter">
                      <th class="text-center">#</th>
                      <th class="text-center">CODIGO</th>
                      <th class="text-center">DESCRIPCIÓN</th>
                      <th class="text-center">PVP</th>
                      <th class="text-center">DESC</th>
                      <th class="text-center">IMP</th>
                      <th class="text-center">CANT</th>
                      <th class="text-center">TOTAL</th>
                      <th class="text-center sorting_disabled so">
                          <i class="fa fa-th-large" aria-hidden="true"></i>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                      
                      
                  </tbody>
                  
                  <tfoot>
                      <tr>
                          <td class="text-right text-danger-lighter text-muted-dark" colspan="7"> <span class="text-uppercase"><strong>TOTAL FACTURA:</strong></span></td>
                          <td class="text-right text-dark-dark"> <strong><?= number_format($invoice_amount, 2,',','.')." ".$this->currencyType[0]['abbreviation']; ?></strong> </td>
                          <td></td>
                      </tr>
                  </tfoot>
                </table>
            
            </div>
           

        </div>
        </div>
        <!-- end: .tray-center -->

        <!-- begin: .tray-right -->
        <aside class="tray tray-right tray300">
            
        <div class="panel panel-danger panel-border top mb5">
              <div class="panel-heading text-center">
                <span class="panel-title text-uppercase"><?php print($this->title);?></span>
              </div>
        </div>                       

        <!-- menu quick links -->
        <div class="admin-form">
            <?php
            print($this->html->form(array(
                        "method" => "POST",
                        "action" => '',
                        "id" => 'form_invoices_filters',
                        "name" => 'form_invoices_filters',
                        "enctype" => 'multipart/form-data',
                    ))
            );
            ?> 
            <!-- section -->
            <div class="section mb10">
                <label for="customers_indentity_card" class="field prepend-icon">
                    <?php  
                    print($this->html->input('customers_indentity_card','text','',
                            array(
                                "id"=>'customers_indentity_card',
                                "class"=>"gui-input",
                                "placeholder"=>'Identificación del Cliente'
                            ),
                          false)
                    );
                    ?>
                    <label for="customers_indentity_card" class="field-icon">
                      <i class="fa fa-hashtag"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->

            <!-- section -->
            <div class="section mb10">
                <label for="catalog_code" class="field prepend-icon">
                    <?php  
                    print($this->html->input('catalog_code','text','',
                            array(
                                "id"=>'catalog_code',
                                "class"=>"gui-input",
                                "placeholder"=>'Código del Árticulo'
                            ),
                          false)
                    );
                    ?>
                    <label for="catalog_code" class="field-icon">
                      <i class="fa fa-barcode"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->
            
            <!-- section -->
            <hr class="short alt">
            <h5><small class="text-center text-uppercase"></small></h5>
            <div class="section col-md-10 center-block">
                <table class="panel table table-bordered table-condensed table-layout" id="numpad">
                <tbody class="text-center">

                        <tr>
                            <td>
                                <a class="btn btn-danger" value="7">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-stack-1x">7</i>
                                   </span>
                                </a> 
                            </td>
                            <td>
                                <a class="btn btn-danger" value="8">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-stack-1x">8</i>
                                   </span>
                                </a> 
                            </td>
                            <td>
                                <a class="btn btn-danger" value="9">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-stack-1x">9</i>
                                   </span>
                                </a> 
                            </td>
                            
                        </tr>
                        <tr>

                            <td>
                                <a class="btn btn-danger" value="4">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-stack-1x">4</i>
                                   </span>
                                </a> 
                            </td>
                            <td>
                                <a class="btn btn-danger" value="5">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-stack-1x">5</i>
                                   </span>
                                </a> 
                            </td>
                            <td>
                            <a class="btn btn-danger" value="6">
                               <span class="fa-stack fa-1x">
                               <i class="fa fa-stack-1x">6</i>
                               </span>
                            </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-danger" value="1">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-stack-1x">1</i>
                                   </span>
                                </a> 
                            </td>
                            <td>
                                <a class="btn btn-danger" value="2">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-stack-1x">2</i>
                                   </span>
                                </a> 
                            </td>
                            <td>
                                <a class="btn btn-danger" value="3">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-stack-1x">3</i>
                                   </span>
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-danger" value="eraser">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-eraser"></i>
                                   </span>
                                </a> 
                            </td>

                            <td>
                                <a class="btn btn-danger" value="0">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-stack-1x">0</i>
                                   </span>
                                </a> 
                            </td>

                            <td>
                                <a class="btn btn-danger" value="backspace">
                                   <span class="fa-stack fa-1x">
                                   <i class="fa fa-backward"></i>
                                   </span>
                                </a> 
                            </td>

                        </tr>
                </tbody>
                </table>
                
            </div>
            <!-- end section -->            
            
            

            <hr class="short">

            <div class="section container-fluid">
                <button class="btn btn-default btn-danger btn-block btn-sm" id="payup" type="button"><span class="ladda-label">PAGAR</span></button>
                <button class="btn btn-default btn-danger btn-block btn-sm" id="undo"  type="button"><span class="ladda-label">CANCELAR</span></button>
            </div>

                          
            <?php
               print($this->html->endForm());
            ?>
        </div>

        </aside>
        <!-- end: .tray-right -->
        
</section>
<!-- End: Content -->
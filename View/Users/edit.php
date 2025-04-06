<?php
    //print('<pre>');print_r($this->bookshopsList);print('</pre>');
    //print('<pre>');print(json_encode($this->List, JSON_PRETTY_PRINT));print('</pre>');
    if(isset($this->List) && !empty($this->List)):
            foreach ($this->List as $key => $value):
?>
<div id="dock-form" class="active-content">
  <div class="dock-item" data-title="<?php print($this->title);?>">
    <section id="content_users_edit" class="table-layout animated">

    <!-- begin: .tray-center -->
    <div class="tray tray-center pt15">

        <div class="mw1000 center-block">
            <!-- Información dela Usuario -->
            <div class="panel panel-danger panel-border top mb15">

                <div class="panel-heading">

                <span class="panel-title text-uppercase text-center"><?php print($this->title);?></span>
                    <?php  
                        print($this->html->link("<i class='imoon imoon-cancel-circle fs18'></i>",
                                array(
                                    "name" => "btn_edit_cancel",
                                    "id" => "btn_edit_cancel",                    
                                    "controller" => 'Users',
                                    "action" => '',
                                    "class"=>'btn text-danger-lighter pull-right'
                                )
                              )
                        ); 
                        print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                array(
                                    "name" => "btn_edit_acept",
                                    "id" => "btn_edit_acept",                    
                                    "controller" => 'Users',
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
                            <div class="panel panel-danger mbn5">

                              <div class="panel-body bg-light dark">
                                <?php
                                print($this->html->form(array(
                                            "method" => "POST",
                                            "action" => '',
                                            "id" => 'form_users_edit',
                                            "name" => 'form_users_edit',
                                            "enctype" => 'multipart/form-data',
                                        ))
                                );
                                ?>
                                <!--SECTION ROW -->
                                <div class="section row">
                                    
                                    <!-- section -->
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Nombre de Usuario:</small></h5>
                                    <div class="section mb5">
                                        <label for="users_username" class="field prepend-icon field-icon">
                                            <?php  
                                            print($this->html->tags('users_username','label', '<i class="fa fa-user"></i> '.$value['users_username'],
                                                    array(
                                                        "id"=>'users_username',
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
                                    <h5><small class="text-left text-uppercase">Contraseña:</small></h5>
                                    <div class="section mb5">
                                        <label for="users_password" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('users_password','password', '',
                                                    array(
                                                        "id"=>'users_password',
                                                        "class"=>"gui-input password",
                                                        "placeholder"=>"Contraseña"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="users_password" class="field-icon">
                                              <i class="fa fa-shield"></i>
                                            </label>
                                        </label>
                                        
                                    </div>
                                    </div>
                                    <!-- end section -->
                                    
                                    <!-- section -->                                    
                                    <div class="col-md-4">
                                    <h5><small class="text-left text-uppercase">Confirmar:</small></h5>
                                    <div class="section mb5">
                                        <label for="users_password_confirm" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('users_password_confirm','password', '',
                                                    array(
                                                        "id"=>'users_password_confirm',
                                                        "class"=>"gui-input password",
                                                        "placeholder"=>"Confirmar Contraseña"
                                                    ),
                                                  false)
                                            );
                                            ?>
                                            <label for="users_password_confirm" class="field-icon">
                                              <i class="fa fa-shield"></i>
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
                                    <h5><small class="text-left text-uppercase">Empleado Asignado:</small></h5>
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
                                    <h5><small class="text-left text-uppercase">Sucursal Asignada:</small></h5>
                                    <div class="section mb5">
                                        <label for="users_bookshop_id" class="field form-group">
                                            <?php  
                                            print($this->html->input('users_bookshop_id','select',$this->bookshopselectList,
                                                    array(
                                                        "id"=>'users_bookshop_id',
                                                        "class"=>"select2-single form-control",
                                                        "required"=>"required",
                                                        "default"=>array("value"=>$value['users_bookshop_id'],"option"=>$this->bookshopselectList[$value['users_bookshop_id']]['description']),
                                                        "placeholder"=>"Sucursales"
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
                                    <h5><small class="text-left text-uppercase">Nivel de Acceso:</small></h5>
                                    <div class="section mb5">
                                        <label for="users_role" class="field prepend-icon">
                                            <?php  
                                            print($this->html->input('users_role','select',$this->role['select'],
                                                    array(
                                                        "id"=>'users_role',
                                                        "class"=>"select2-single form-control",
                                                        "default"=>array("value"=>$value['users_role'],"option"=>$this->role['type'][$value['users_role']]),
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
                                <!--SECTION ROW -->
                                <div class="section row">
                                    
                                    <div class="panel">
                                      <div class="panel panel-danger panel-border mbn">
                                        <div class="panel-heading panel-title text-center">
                                        <span class=" text-uppercase fs15">LISTADO DE SUCURSALES CON ACCESO</span>
                                        </div>
                                    </div>  
                                      <div class="panel-body panel-scroller scroller-primary scroller-md scroller-overlay scroller-pn pn">
                                        <table id="users_bookshop"  class="table mbn tc-med-1 tc-bold-last">
                                          <thead>
                                            <tr class="hidden">
                                                <th class="text-center bg-danger">SUCURSAL</th>
                                              <th class="text-center bg-danger">ESTATUS</th>
                                              <th class="text-center bg-danger">ACCESO</th>
                                            </tr>
                                          </thead>
                                          <tbody class="fs15"> 
                                            <?php
                                                $checked='';
                                                foreach ($this->bookshopsList as $key => $list) {
                                                    if (!empty($list['assigned'])==1) $checked='checked'; else $checked='';
                                                    print('
                                                        <tr>
                                                        <td class="text-left">'.$list['description'].'</td>
                                                        <td class="text-center"><span class="'.$this->statusClass[$list['is_active']].'" ><small>'.$this->status[$list['is_active']].'</small></span></td>
                                                        <td class="text-center">
                                                        <label class="switch block switch-danger">
                                                          <input type="checkbox" name="users_access_bookshop_'.$list['id'].'" id="users_access_bookshop_'.$list['id'].'" value="'.$list['id'].'" usersid="'.$value['users_id'].'" '.$checked.'>
                                                          <label for="users_access_bookshop_'.$list['id'].'" data-on="SI" data-off="NO" ></label>
                                                          <span id="spinner_access_'.$list['id'].'" class="hidden fa fa-spin fa-spinner" ></span>    
                                                        </label>                                                        
                                                        </td>
                                                        </tr>
                                                    ');
                                                }
                                             
                                             ?>  
                                          </tbody>
                                        </table>
                                      </div>

                                  </div>                                    
                                    
                                    
                                </div>                                
                                <!--END SECTION ROW -->
                              </div>
                            </div>
                            <!-- Fin Información del Usuario -->
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
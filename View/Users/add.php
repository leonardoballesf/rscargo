<?php
//print('<pre>');print_r($this->AccesList);print('</pre>');
//print('<pre>');print(json_encode($this->List, JSON_PRETTY_PRINT));print('</pre>');
?>
<section id="content_bookshop_add" class="table-layout animated">
    <div id="dock-form" class="active-content">
        <div class="dock-item" data-title="<?php print($this->title); ?>">

            <!-- begin: .tray-center -->
            <div class="tray tray-center pt15">

                <div class="mw1000 center-block">
                    <!-- Información de la Sucursal -->
                    <div class="panel panel-danger panel-border top mb15">

                        <div class="panel-heading">

                            <span class="panel-title text-uppercase text-center"><?php print($this->title); ?></span>
                            <?php
                            print($this->html->link("<i class='imoon imoon-cancel-circle fs18'></i>",
                                            array(
                                                "name" => "btn_add_cancel",
                                                "id" => "btn_add_cancel",
                                                "controller" => 'Users',
                                                "action" => '',
                                                "class" => 'btn text-danger-lighter pull-right'
                                            )
                                    )
                            );
                            print($this->html->link("<i class='imoon imoon-disk fs18'></i>",
                                            array(
                                                "name" => "btn_add_acept",
                                                "id" => "btn_add_acept",
                                                "controller" => 'Users',
                                                "action" => '',
                                                "href" => 'javascript:void(0)',
                                                "class" => 'btn text-danger-lighter pull-right'
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
                                                    "id" => 'form_users_add',
                                                    "name" => 'form_users_add',
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
                                                    <label for="users_username" class="field prepend-icon">
                                                        <?php
                                                        print($this->html->input('users_username', 'text', '',
                                                                        array(
                                                                            "id" => 'users_username',
                                                                            "class" => "gui-input",
                                                                            "placeholder" => "Nombre de Usuario"
                                                                        ),
                                                                        false)
                                                        );
                                                        ?>
                                                        <label for="users_username" class="field-icon">
                                                            <i class="fa fa-user"></i>
                                                        </label>
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
                                                        print($this->html->input('users_password', 'password', '',
                                                                        array(
                                                                            "id" => 'users_password',
                                                                            "class" => "gui-input password",
                                                                            "placeholder" => "Contraseña"
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
                                                        print($this->html->input('users_password_confirm', 'password', '',
                                                                        array(
                                                                            "id" => 'users_password_confirm',
                                                                            "class" => "gui-input password",
                                                                            "placeholder" => "Confirmar Contraseña"
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
                                                    <label for="users_sellers_id" class="field form-group">
                                                        <?php
                                                        print($this->html->input('users_sellers_id', 'select', $this->sellersList,
                                                                        array(
                                                                            "id" => 'users_sellers_id',
                                                                            "class" => "select2-single form-control",
                                                                            "required" => "required",
                                                                            "placeholder" => "Empleados"
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
                                                <h5><small class="text-left text-uppercase">Sucursal Asignada:</small></h5>
                                                <div class="section mb5">
                                                    <label for="users_bookshop_id" class="field form-group">
                                                        <?php
                                                        print($this->html->input('users_bookshop_id', 'select', $this->bookshopAccesList,
                                                                        array(
                                                                            "id" => 'users_bookshop_id',
                                                                            "class" => "select2-single form-control",
                                                                            "required" => "required",
                                                                            "placeholder" => "Sucursales"
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
                                                        print($this->html->input('users_role', 'select', array(array("id" => 1, "description" => 'Usuario'), array("id" => 2, "description" => 'Administrador'), array("id" => 3, "description" => 'Super Administrador')),
                                                                        array(
                                                                            "id" => 'users_role',
                                                                            "class" => "select2-single form-control"
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

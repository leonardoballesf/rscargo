<?php
//print('<pre>');print_r($this->List);print('</pre>');
//print('<pre>');print(json_encode($this->help->statusType['select'], JSON_PRETTY_PRINT));print('</pre>');
?>
<section id="content" class="animated fadeIn">
    <div id="dock-form" class="active-content">
        <div class="dock-item" data-title="<?php print($this->title); ?>">
            <!--    <section id="content_users_edit" class="table-layout animated">-->

            <!-- begin: .tray-center -->
            <div class="tray tray-center pt15">

                <div class="mw1100 center-block">
                    <!-- Información dela Usuario -->
                    <div class="panel panel-danger panel-border top mb15">

                        <div class="panel-heading ">

                            <span class="panel-title text-uppercase text-center"><?php print($this->title); ?> </span>


                            <?php
                            print($this->html->link(
                                "<i class='imoon imoon-cancel-circle fs18 text-danger'></i>",
                                array(
                                    "name" => "btn_add_cancel",
                                    "id" => "btn_add_cancel",
                                    "controller" => 'Packages',
                                    "action" => '',
                                    "class" => 'btn text-danger-lighter pull-right',
                                )
                            ));
                            print($this->html->link(
                                "<i class='imoon imoon-disk fs18 text-danger'></i>",
                                array(
                                    "name" => "btn_add_acept",
                                    "id" => "btn_add_acept",
                                    "controller" => 'Packages',
                                    "action" => '',
                                    "href" => 'javascript:void(0)',
                                    "class" => 'btn text-danger-lighter pull-right',
                                )
                            ));
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
                                            "id" => 'form_packages_add',
                                            "name" => 'form_packages_add',
                                            "enctype" => 'multipart/form-data',
                                        )));
                                        ?>
                                        <!-- panel-title -->
                                        <div class="panel panel-danger panel-heading panel-border panel-title text-uppercase text-center top mb5 fs14">
                                            <span class="text-center text-danger-lighter"><strong>Información del Paquete</strong></span>
                                        </div>
                                        <!-- end panel-title -->

                                        <!--SECTION ROW -->
                                        <div class="section row">

                                            <!-- section -->
                                            <div class="col-md-4">
                                                <h5><small class="text-left text-uppercase">Cliente:</small></h5>
                                                <div class="section mb5">
                                                    <label for="packages_customers_id" class="field prepend-icon">
                                                        <?php

                                                        //print_r($this->customersList);
                                                        print($this->html->input(
                                                            'packages_customers_id',
                                                            'select',
                                                            $this->customersList['select'],
                                                            array(
                                                                "id" => 'packages_customers_id',
                                                                "class" => "select2-single form-control",
                                                                "default" => array("value" => $value['packages_customers_id'], "option" => $this->customersList['type'][$value['packages_customers_id']]),
                                                            ),
                                                            false
                                                        ));
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end section -->
                                            <!-- section -->
                                            <div class="col-md-4">
                                                <h5><small class="text-left text-uppercase">Traking:</small></h5>
                                                <div class="section mb5">
                                                    <label for="packages_code" class="field prepend-icon">
                                                        <?php
                                                        print($this->html->input(
                                                            'packages_code',
                                                            'text',
                                                            isset($value['packages_code']) ? $value['packages_code'] : "",
                                                            array(
                                                                "id" => 'packages_code',
                                                                "class" => "gui-input text-uppercase",
                                                            ),
                                                            false
                                                        ));
                                                        ?>
                                                        <label for="packages_code" class="field-icon">
                                                            <i class="fa fa-hashtag"></i>
                                                        </label>
                                                    </label>

                                                </div>
                                            </div>
                                            <!-- end section -->

                                            <!-- section -->
                                            <div class="col-md-4">
                                                <h5><small class="text-left text-uppercase">Peso:</small></h5>
                                                <div class="section mb5">
                                                    <label for="packages_weight" class="field prepend-icon">
                                                        <?php
                                                        print($this->html->input(
                                                            'packages_weight',
                                                            'text',
                                                            isset($value['packages_weight']) ? $value['packages_weight'] : "0",
                                                            array(
                                                                "id" => 'packages_weight',
                                                                "class" => "gui-input text-uppercase text-left",
                                                            ),
                                                            false
                                                        ));
                                                        ?>
                                                        <label for="packages_weight" class="field-icon">
                                                            <i class="fa fa-tachometer"></i>
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
                                                <h5><small class="text-left text-uppercase">Alto:</small></h5>
                                                <div class="section mb5">
                                                    <label for="packages_high" class="field prepend-icon">
                                                        <?php
                                                        print($this->html->input(
                                                            'packages_high',
                                                            'text',
                                                            isset($value['packages_high']) ? $value['packages_high'] : "0",
                                                            array(
                                                                "id" => 'packages_high',
                                                                "class" => "calculate_bulk gui-input text-uppercase text-left",
                                                            ),
                                                            false
                                                        ));
                                                        ?>
                                                        <label for="packages_high" class="field-icon">
                                                            <i class="fa fa-tachometer"></i>
                                                        </label>
                                                    </label>

                                                </div>
                                            </div>
                                            <!-- end section -->


                                            <!-- section -->
                                            <div class="col-md-3">
                                                <h5><small class="text-left text-uppercase">Ancho:</small></h5>
                                                <div class="section mb5">
                                                    <label for="packages_width" class="field prepend-icon">
                                                        <?php
                                                        print($this->html->input(
                                                            'packages_width',
                                                            'text',
                                                            isset($value['packages_width']) ? $value['packages_width'] : "0",
                                                            array(
                                                                "id" => 'packages_width',
                                                                "class" => "calculate_bulk gui-input text-uppercase text-left",
                                                            ),
                                                            false
                                                        ));
                                                        ?>
                                                        <label for="packages_width" class="field-icon">
                                                            <i class="fa fa-tachometer"></i>
                                                        </label>
                                                    </label>

                                                </div>
                                            </div>
                                            <!-- end section -->

                                            <!-- section -->
                                            <div class="col-md-3">
                                                <h5><small class="text-left text-uppercase">Profundidad:</small></h5>
                                                <div class="section mb5">
                                                    <label for="packages_depth" class="field prepend-icon">
                                                        <?php
                                                        print($this->html->input(
                                                            'packages_depth',
                                                            'text',
                                                            isset($value['packages_depth']) ? $value['packages_depth'] : "0",
                                                            array(
                                                                "id" => 'packages_depth',
                                                                "class" => "calculate_bulk gui-input text-uppercase text-left",
                                                            ),
                                                            false
                                                        ));
                                                        ?>
                                                        <label for="packages_depth" class="field-icon">
                                                            <i class="fa fa-tachometer"></i>
                                                        </label>
                                                    </label>

                                                </div>
                                            </div>
                                            <!-- end section -->



                                            <!-- section -->
                                            <div class="col-md-3">
                                                <h5><small class="text-left text-uppercase">Volumen:</small></h5>
                                                <div class="section mb5">
                                                    <label for="packages_bulk" class="field prepend-icon">
                                                        <?php
                                                        print($this->html->input(
                                                            'packages_bulk',
                                                            'text',
                                                            isset($value['packages_bulk']) ? $value['packages_bulk'] : "1",
                                                            array(
                                                                "id" => 'packages_bulk',
                                                                "class" => "gui-input text-uppercase text-left",
                                                                "readonly" => true
                                                            ),
                                                            false
                                                        ));
                                                        ?>
                                                        <label for="packages_bulk" class="field-icon">
                                                            <i class="fa fa-tachometer"></i>
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
                                                <h5><small class="text-left text-uppercase">Nota:</small></h5>
                                                <div class="section mb5">
                                                    <label for="packages_description" class="field prepend-icon">
                                                        <?php
                                                        print($this->html->input(
                                                            'packages_description',
                                                            'textarea',
                                                            isset($value['packages_description']) ? trim($value['packages_description']) : "",
                                                            array(
                                                                "id" => 'packages_description',
                                                                "class" => "gui-textarea form-control textarea-grow ",
                                                                "rows" => '4',
                                                                "placeholder" => "Nota"
                                                            ),
                                                            false
                                                        ));
                                                        ?>
                                                        <label for="packages_description" class="field-icon">
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
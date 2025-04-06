<?php
//print('<pre>');print_r($this->List);print('</pre>');
//print('<pre>');print(json_encode($this->help->statusType['select'], JSON_PRETTY_PRINT));print('</pre>');
if (isset($this->List) && !empty($this->List)) :
    foreach ($this->List as $key => $value) :
        $disabled = (($value['packages_delivered'] == 3) ? 'disabled' : 'enable');
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

                                <div class="panel-heading">

                                    <span class="panel-title text-uppercase text-center"><?php print($this->title); ?>: </span>

                                    <!-- section -->
                                    <label for="packages_code" class="">
                                        <?php
                                        print($this->html->tags(
                                            'packages_code',
                                            'label',
                                            '<i class="fa fa-barcode"></i> ' . $value['packages_code'],
                                            array(
                                                "id" => 'packages_code',
                                                "class" => "text-uppercase text-danger"
                                            )
                                        ));
                                        ?>
                                    </label>
                                    <!-- end section -->

                                    <?php
                                    print($this->html->link(
                                        "<i class='imoon imoon-cancel-circle fs18'></i>",
                                        array(
                                            "name" => "btn_edit_cancel",
                                            "id" => "btn_edit_cancel",
                                            "controller" => 'Packages',
                                            "action" => '',
                                            "class" => 'btn text-danger-lighter pull-right'
                                        )
                                    ));
                                    print($this->html->link(
                                        "<i class='imoon imoon-disk fs18'></i>",
                                        array(
                                            "name" => "btn_edit_acept",
                                            "id" => "btn_edit_acept",
                                            "controller" => 'Packages',
                                            "action" => '',
                                            "href" => 'javascript:void(0)',
                                            "class" => 'btn text-danger-lighter pull-right'
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
                                                    "id" => 'form_packages_edit',
                                                    "name" => 'form_packages_edit',
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
                                                        <h5><small class="text-left text-uppercase">Número de Orden:</small></h5>
                                                        <div class="section mb5">
                                                            <label for="packages_order_number" class="field prepend-icon">
                                                                <?php
                                                                print($this->html->input(
                                                                    'packages_order_number',
                                                                    'text',
                                                                    isset($value['packages_order_number']) ? $value['packages_order_number'] : "",
                                                                    array(
                                                                        "id" => 'packages_order_number',
                                                                        "class" => "gui-input text-uppercase",
                                                                        "readonly" => 'true',
                                                                    ),
                                                                    false
                                                                ));
                                                                ?>
                                                                <label for="packages_order_number" class="field-icon">
                                                                    <i class="fa fa-hashtag"></i>
                                                                </label>
                                                            </label>

                                                        </div>
                                                    </div>
                                                    <!-- end section -->

                                                    <!-- section -->
                                                    <div class="col-md-4">
                                                        <h5><small class="text-left text-uppercase">Fecha de Recepción:</small>
                                                        </h5>
                                                        <div class="section mb5">
                                                            <label for="packages_registration_date" class="field prepend-icon">
                                                                <?php
                                                                print($this->html->input(
                                                                    'packages_registration_date',
                                                                    'text',
                                                                    isset($value['packages_registration_date']) ? $this->html->formatDate($value['packages_registration_date']) : "",
                                                                    array(
                                                                        "id" => 'packages_registration_date',
                                                                        "class" => "gui-input form-control text-right date",
                                                                        "readonly" => 'true',
                                                                        $disabled => $disabled
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
                                                                        $disabled => $disabled,
                                                                        "default" => array("value" => $value['packages_customers_id'], "option" => $this->customersList['type'][$value['packages_customers_id']]),
                                                                    ),
                                                                    false
                                                                ));
                                                                ?>
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
                                                                        "readonly" => 'true',
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
                                                                    isset($value['packages_weight']) ? $value['packages_weight'] : "",
                                                                    array(
                                                                        "id" => 'packages_weight',
                                                                        "class" => "gui-input text-uppercase",
                                                                        $disabled => $disabled
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


                                                    <!-- section -->
                                                    <div class="col-md-4">
                                                        <h5><small class="text-left text-uppercase">Volumen:</small></h5>
                                                        <div class="section mb5">
                                                            <label for="packages_bulk" class="field prepend-icon">
                                                                <?php
                                                                print($this->html->input(
                                                                    'packages_bulk',
                                                                    'text',
                                                                    isset($value['packages_bulk']) ? $value['packages_bulk'] : 1,
                                                                    array(
                                                                        "id" => 'packages_bulk',
                                                                        "class" => "gui-input text-uppercase",
                                                                        $disabled => $disabled
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
                                                                        $disabled => $disabled,
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

                                                    <!-- section -->
                                                    <div class="col-md-4">
                                                        <h5><small class="text-left text-uppercase">Estatus de Entrega:</small></h5>
                                                        <div class="section mb5">
                                                            <label for="packages_delivered" class="field prepend-icon">
                                                                <?php

                                                                //print_r($this->customersList);
                                                                print($this->html->input(
                                                                    'packages_delivered',
                                                                    'select',
                                                                    $this->deliveredType['select'],
                                                                    array(
                                                                        "id" => 'packages_delivered',
                                                                        "class" => "select2-single form-control",
                                                                        $disabled  => $disabled,
                                                                        "default" => array("value" => $value['packages_delivered'], "option" => $this->deliveredType['type'][$value['packages_delivered']]),
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
                                                        <h5><small class="text-left text-uppercase">Fecha de Entrega:</small>
                                                        </h5>
                                                        <div class="section mb5">
                                                            <label for="packages_delivery_date" class="field prepend-icon">
                                                                <?php
                                                                print($this->html->input(
                                                                    'packages_delivery_date',
                                                                    'text',
                                                                    isset($value['packages_delivery_date']) ? $this->html->formatDate($value['packages_delivery_date']) : "",
                                                                    array(
                                                                        "id" => 'packages_delivery_date',
                                                                        "class" => "gui-input form-control text-right date",
                                                                        $disabled => $disabled,
                                                                        "readonly" => 'true'
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
                                                        <h5><small class="text-left text-uppercase">Costo:</small></h5>
                                                        <div class="section mb5">
                                                            <label for="packages_cost" class="field prepend-icon">
                                                                <?php
                                                                print($this->html->input(
                                                                    'packages_cost',
                                                                    'text',
                                                                    isset($value['packages_cost']) ? $value['packages_cost'] : "",
                                                                    array(
                                                                        "id" => 'packages_cost',
                                                                        "class" => "gui-input text-uppercase",
                                                                        $disabled => $disabled,
                                                                        "readonly" => 'true'
                                                                    ),
                                                                    false
                                                                ));
                                                                ?>
                                                                <label for="packages_cost" class="field-icon">
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
                                                    <div class="col-md-4">
                                                        <h5><small class="text-left text-uppercase">Tipo de Pago:</small></h5>
                                                        <div class="section mb5">
                                                            <label for="packages_payment_methods_id" class="field prepend-icon">
                                                                <?php

                                                                //print_r($this->customersList);
                                                                print($this->html->input(
                                                                    'packages_payment_methods_id',
                                                                    'select',
                                                                    $this->paymentmethodsList['select'],
                                                                    array(
                                                                        "id" => 'packages_payment_methods_id',
                                                                        "class" => "select2-single form-control",
                                                                        $disabled => $disabled,
                                                                        "default" => array("value" => $value['packages_payment_methods_id'], "option" => $this->paymentmethodsList['type'][$value['packages_payment_methods_id']]),
                                                                    ),
                                                                    false
                                                                ));
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!-- end section -->

                                                </div>
                                                <!--END SECTION ROW -->


                                                <!-- panel-title -->
                                                <div class="panel panel-danger panel-heading panel-border panel-title text-uppercase text-center top fs14">
                                                    <span class="text-center text-danger-lighter"><strong>Información
                                                            Administrativa</strong></span>
                                                </div>
                                                <!-- end panel-title -->

                                                <!--SECTION ROW -->
                                                <div class="section row">

                                                    <!-- section -->
                                                    <div class="col-md-4">
                                                        <h5><small class="text-left text-uppercase">Registrador Por:</small>
                                                        </h5>
                                                        <div class="section mb5">
                                                            <label for="users_sellers_id" class="field prepend-icon field-icon">
                                                                <?php
                                                                print($this->html->tags(
                                                                    'users_sellers_id',
                                                                    'label',
                                                                    '<i class="fa fa-address-card-o"></i> ' . $value['sellers_description'],
                                                                    array(
                                                                        "id" => 'users_sellers_id',
                                                                        "class" => "gui-input form-control field prepend-icon"
                                                                    )
                                                                ));
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
                                                                print($this->html->tags(
                                                                    'bookshop_description',
                                                                    'label',
                                                                    '<i class="fa fa-home"></i> ' . $value['bookshop_description'],
                                                                    array(
                                                                        "id" => 'bookshop_description',
                                                                        "class" => "gui-input form-control field prepend-icon"
                                                                    )
                                                                ));
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!-- end section -->

                                                    <!-- section -->
                                                    <div class="col-md-4">
                                                        <h5><small class="text-left text-uppercase">Estatus:</small></h5>
                                                        <div class="section mb5">
                                                            <label for="packages_is_active" class="field prepend-icon">
                                                                <?php
                                                                print($this->html->input(
                                                                    'packages_is_active',
                                                                    'select',
                                                                    $this->statusType['select'],
                                                                    array(
                                                                        "id" => 'packages_is_active',
                                                                        "class" => "select2-single form-control",
                                                                        $disabled => $disabled,
                                                                        "default" => array("value" => $value['packages_is_active'], "option" => $this->statusType['type'][$value['packages_is_active']]),
                                                                    ),
                                                                    false
                                                                ));
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

<?php endforeach;
endif;
?>
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

  <!-- begin: .tray-center -->
  <div class="tray tray-center">

    <?php

    //print('<pre>');print_r($this->request);print('</pre>');

    ?>

    <!-- recent activity table -->
    <div class="panel">

      <div class="panel panel-danger panel-border top mbn">
        <div class="panel-heading">
          <span class="panel-title text-uppercase text-center"><?php print($this->title); ?></span>

          <?php
          print($this->html->link(
            "<i class='imoon imoon-plus fs18' ></i>",
            array(
              'id' => 'dock-push',
              'controller' => 'Packages',
              'action' => 'add',
              "title" => "Agregar Paquete",
              'class' => 'btn text-danger-lighter pull-right'
            )
          ));
          ?>

        </div>
      </div>

      <div class="panel-body pn ">
        <div class="table-responsive ">
          <table id="packagestable" class="table table-striped table-hover dataTable no-footer fs12">
            <thead>
              <tr class="bg-light">
                <th class="text-center bg-danger">SELECCIÓN</th>
                <th class="text-center bg-danger">CÓDIGO</th>
                <th class="text-center bg-danger">CLIENTE</th>
                <th class="text-center bg-danger">COSTO</th>
                <th class="text-center bg-danger">REGISTRO</th>
                <th class="text-center bg-danger">ESTATUS</th>
                <th class="text-center bg-danger">TIPO DE PAGO</th>
                <th class="text-center sorting_disabled bg-danger">MENU</th>
              </tr>
            </thead>
            <tbody class="text-uppercase">

            </tbody>


            <tfoot class="text-uppercase">
              <div class="col-md-2 pull-left" style="padding-left: 0px !important;height: 40px !important;">

                <button class="btn btn-default btn-block btn-sm" id="send" type="button" style="height: 38px !important;"><span class="ladda-label">ENVIAR RECIBOS</span></button>

              </div>

              <div class="col-md-2 pull-left" style="padding-left: 0px !important;height: 40px !important;">

                <button class="btn btn-default btn-block btn-sm" id="changeStatus" type="button" style="padding: 0px !important;height: 38px !important;"><span class="ladda-label">CAMBIAR ESTATUS</span></button>

              </div>
              
              <div class="col-md-2 pull-left" style="padding-right: 0px !important;padding-left: 0px !important;">

                <?php
                print($this->html->input(
                  'payment_methods_id',
                  'select',
                  $this->paymentmethodsList['select'],
                  array(
                    "id" => 'payment_methods_id',
                    "class" => "form-control"
                  ),
                  false
                ));
                ?>
              </div>
              <div class="col-md-2 pull-left" style="padding-right: 0px !important;padding-left: 10px !important;">

                <?php
                print($this->html->input(
                  'delivered',
                  'select',
                  $this->deliveredType['select'],
                  array(
                    "id" => 'delivered',
                    "class" => "form-control"
                  ),
                  false
                ));
                ?>
              </div>
              <tr>
                <th colspan="8" style="text-align:right">Page Total: </th>
              </tr>

            </tfoot>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- end: .tray-center -->

  <!-- begin: .tray-right -->
  <aside id="filter_packages" class="tray tray-right tray300">

    <div class="panel panel-danger panel-border top mb15">
      <div class="panel-heading">
        <span class="panel-title text-uppercase text-center">Opciones de Filtrado</span>
      </div>
    </div>

    <!-- menu quick links -->
    <div class="admin-form">

      <form name="form_filters" id="form_filters">
        <!-- section -->
        <h5><small class="text-left text-uppercase">C&oacute;digo de Paquete:</small></h5>
        <div class="section mb10">
          <label for="packages_code" class="field prepend-icon">
            <?php
            print($this->html->input(
              'packages_code',
              'text',
              '',
              array(
                "id" => 'packages_code',
                "class" => "gui-input",
                "placeholder" => 'C&oacute;digo'
              ),
              false
            ));
            ?>
            <label for="packages_code" class="field-icon">
              <i class="fa fa-hashtag"></i>
            </label>
          </label>
        </div>
        <!-- end section -->



        <!-- section -->
        <h5><small class="text-left text-uppercase">Fecha de Registro:</small></h5>
        <div class="section mb15">
          <label for="packages_registration_date" class="field prepend-icon form-group">
            <?php
            print($this->html->input(
              'packages_registration_date',
              'text',
              '',
              array(
                "id" => 'packages_registration_date',
                "class" => "gui-input form-control text-right date",
                "readonly" => 'true'
              ),
              false
            ));
            ?>
            <label for="packages_registration_date" class="field-icon">
              <i class="fa fa-calendar"></i>
            </label>
          </label>
        </div>
        <!-- end section -->

        <!--         section 
        <h5><small class="text-left text-uppercase">Peso del Paquete:</small></h5>
        <div class="section mb10">
          <label for="packages_weight" class="field prepend-icon">
            <?php
            //            print($this->html->input(
            //              'packages_weight',
            //              'text',
            //              '',
            //              array(
            //                "id" => 'packages_weight',
            //                "class" => "gui-input",
            //                "placeholder" => 'Peso del Paquete'
            //              ),
            //              false
            //            ));
            ?>
            <label for="packages_weight" class="field-icon">
              <i class="fa fa-hashtag"></i>
            </label>
          </label>
        </div>
         end section 

         section 
        <h5><small class="text-left text-uppercase">Volumen del Paquete:</small></h5>
        <div class="section mb10">
          <label for="packages_bulk" class="field prepend-icon">
            <?php
            //            print($this->html->input(
            //              'packages_bulk',
            //              'text',
            //              '',
            //              array(
            //                "id" => 'packages_bulk',
            //                "class" => "gui-input",
            //                "placeholder" => 'Volumen del Paquete'
            //              ),
            //              false
            //            ));
            ?>
            <label for="packages_bulk" class="field-icon">
              <i class="fa fa-hashtag"></i>
            </label>
          </label>
        </div>
         end section -->

        <!-- section -->

        <h5><small class="text-left text-uppercase">Cliente:</small></h5>
        <div class="section mb5">
          <label for="packages_customers_id" class="field prepend-icon">
            <?php

            //print_r($this->customersList);
            print($this->html->input(
              'packages_customers_id',
              'select',
              (count($this->customersList['select']) > 0) ? $this->customersList['select'] : [],
              array(
                "id" => 'packages_customers_id',
                "class" => "select2-single form-control"
              ),
              false
            ));
            ?>
          </label>
        </div>
        <!-- end section -->


        <!-- section -->
        <h5><small class="text-left text-uppercase">Estatus de Entrega:</small></h5>
        <div class="section mb15">
          <label for="packages_delivered" class="field form-group">
            <?php
            print($this->html->input(
              'packages_delivered',
              'select',
              $this->deliveredType['select'],
              array(
                "id" => 'packages_delivered',
                "class" => "select2-single form-control"
              ),
              false
            ));
            ?>
          </label>
        </div>
        <!-- end section -->

        <hr class="short">

        <div class="section container-fluid">
          <button class="btn btn-default btn-danger btn-block btn-sm" id="search" type="button"><span class="ladda-label">Aplicar Filtro</span></button>
          <button class="btn btn-default btn-danger btn-block btn-sm" id="reset" type="button"><span class="ladda-label">Quitar Filtro</span></button>
        </div>

      </form>
    </div>

  </aside>
  <!-- end: .tray-right -->

</section>
<!-- End: Content -->
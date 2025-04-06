<!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">
        <!-- begin: .tray-center -->
        <div class="tray tray-center">
            <?php 
            //print('<pre>');print_r($_SESSION);print('</pre>');
            //echo Hash::create('sha256', 'ma110842', HASH_PASSWORD_KEY).'<br>';
            //echo Hash::create('sha256', 'ma110842', HASH_PASSWORD_KEY).'<br>';
            ?>
          <!-- dashboard tiles -->
          <div class="row">
            <div class="col-sm-6 col-xl-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-body">
                  <h1 class="fs30 mt5 mbn"><?= $this->model->count('select * from customers where is_active=1')?></h1>
                  
                </div>
                <div class="panel-footer br-t p12">
                <h6 class="text-system">CLIENTES REGISTRADOS</h6>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xl-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-body">
                  <h1 class="fs30 mt5 mbn"><?= $this->model->count('select * from packages where delivered=3')?></h1>
                  
                </div>
                <div class="panel-footer br-t p12">
                  <span class="fs11">
                  <h6 class="text-success">PAQUETES ENTREGADOS</h6>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xl-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-body">
                  <h1 class="fs30 mt5 mbn"><?= $this->model->count('select * from packages where delivered=2')?></h1>
                  
                </div>
                <div class="panel-footer br-t p12">
                  <span class="fs11">
                  <h6 class="text-warning">PAQUETES EN TRANSITO</h6>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-xl-3 visible-xl">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-body">
                  <h1 class="fs30 mt5 mbn"><?= $this->model->count('select * from packages where delivered=1')?></h1>
                  
                </div>
                <div class="panel-footer br-t p12">
                  <span class="fs11">
                  <h6 class="text-danger">PAQUETES EN BODEGA</h6>
                  </span>
                </div>
              </div>
            </div>
          </div>

        

        </div>
        <!-- end: .tray-center -->

      </section>
      <!-- End: Content -->
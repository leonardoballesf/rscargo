<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

  <!-- begin: .tray-center -->
  <div class="tray tray-center">

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
          <table id="notificationstable" class="table table-striped table-hover dataTable no-footer fs12">
            <thead>
              <tr class="bg-light">
                <th class="text-center bg-danger">ID</th>
                <th class="text-center bg-danger">DE</th>
                <th class="text-center bg-danger">CLIENTE</th>
                <th class="text-center bg-danger">DESTINO</th>
                <th class="text-center bg-danger">ENTREGADO</th>
                <th class="text-center bg-danger">FECHA</th>
              </tr>
            </thead>
            <tbody class="text-uppercase">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- end: .tray-center -->


</section>
<!-- End: Content -->
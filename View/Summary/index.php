<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class="tray tray-center">

    <!-- dashboard tiles -->
    <div class="row">
      <div class="col-sm-6 col-xl-6">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">B/. <?= number_format($this->summary_daily[0]['totalday'], 2, ',', '.')?></h1>

          </div>
          <div class="panel-footer br-t p12">
            <h6 class="text-system">REGISTRO DIARIO DE INGRESOS AL [<?= $this->html->formatDateResum($this->summary_daily[0]['day'])?>]</h6>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-6 visible-xl">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">B/. <?= number_format($this->summary_month[0]['totalmonth'], 2, ',', '.')?></h1>

          </div>
          <div class="panel-footer br-t p12">
            <span class="fs11">
              <h6 class="text-danger">REGISTRO MENSUAL DE INGRESOS EN [<?= date('m Y') ?>]</h6>
            </span>
          </div>
        </div>
      </div>
    </div>



  </div>
  <!-- end: .tray-center -->

</section>
<!-- End: Content -->
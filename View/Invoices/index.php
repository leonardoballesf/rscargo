<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class="tray tray-center">
    <?php
    if(isset($this)){
          //print('<pre>');print_r($this);print('</pre>');
    }

    if(isset($this->user_errors)){
          //print('<pre>');print_r($this->user_errors);print('</pre>');
    }
    ?>
    <!-- dashboard tiles -->
    <div class="row">
      <div class="col-sm-4 col-xl-3">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">1,426</h1>
            <h6 class="text-system">NEW ORDERS</h6>
          </div>
          <div class="panel-footer br-t p12">
            <span class="fs11">
              <i class="fa fa-arrow-up pr5"></i> 3% INCREASE
              <b>1W AGO</b>
            </span>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-xl-3">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">63,262</h1>
            <h6 class="text-success">TOTAL SALES GROSS</h6>
          </div>
          <div class="panel-footer br-t p12">
            <span class="fs11">
              <i class="fa fa-arrow-up pr5"></i> 2.7% INCREASE
              <b>1W AGO</b>
            </span>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-xl-3">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">248</h1>
            <h6 class="text-warning">PENDING SHIPMENTS</h6>
          </div>
          <div class="panel-footer br-t p12">
            <span class="fs11">
              <i class="fa fa-arrow-up pr5 text-success"></i> 1% INCREASE
              <b>1W AGO</b>
            </span>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xl-3 visible-xl">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">6,718</h1>
            <h6 class="text-danger">UNIQUE VISITS</h6>
          </div>
          <div class="panel-footer br-t p12">
            <span class="fs11">
              <i class="fa fa-arrow-down pr5 text-danger"></i> 6% DECREASE
              <b>1W AGO</b>
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- recent activity table -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title hidden-xs"> Recent Activity</span>
        <ul class="nav panel-tabs panel-tabs-merge">
          <li class="active">
            <a href="#tab1_1" data-toggle="tab"> Top Sellers</a>
          </li>
          <li>
            <a href="#tab1_2" data-toggle="tab"> Most Viewed</a>
          </li>
          <li>
            <a href="#tab1_3" class="hidden-xs" data-toggle="tab"> New Customers</a>
          </li>
        </ul>
      </div>
      <div class="panel-body pn">
        <div class="table-responsive">
          <table class="table admin-form theme-warning tc-checkbox-1 fs13">
            <thead>
              <tr class="bg-light">
                <th class="">Image</th>
                <th class="">Product Title</th>
                <th class="">SKU</th>
                <th class="">Price</th>
                <th class="">Stock</th>
                <th class="text-right">Status</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="w100">
                  <img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_1.jpg">
                </td>
                <td class="">Apple Ipod 4G - Silver</td>
                <td class="">#21362</td>
                <td class="">$215</td>
                <td class="">1,400</td>
                <td class="text-right">
                  <div class="btn-group text-right">
                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                      <span class="caret ml5"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="#">Edit</a>
                      </li>
                      <li>
                        <a href="#">Delete</a>
                      </li>
                      <li>
                        <a href="#">Archive</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">Complete</a>
                      </li>
                      <li class="active">
                        <a href="#">Pending</a>
                      </li>
                      <li>
                        <a href="#">Canceled</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w100">
                  <img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_2.jpg">
                </td>
                <td class="">Apple Smart Watch - 1G</td>
                <td class="">#15262</td>
                <td class="">$455</td>
                <td class="">2,100</td>
                <td class="text-right">
                  <div class="btn-group text-right">
                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                      <span class="caret ml5"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="#">Edit</a>
                      </li>
                      <li>
                        <a href="#">Delete</a>
                      </li>
                      <li>
                        <a href="#">Archive</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">Complete</a>
                      </li>
                      <li class="active">
                        <a href="#">Pending</a>
                      </li>
                      <li>
                        <a href="#">Canceled</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w100">
                  <img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_6.jpg">
                </td>
                <td class="">Apple Macbook 4th Gen - Silver</td>
                <td class="">#66362</td>
                <td class="">$1699</td>
                <td class="">6,100</td>
                <td class="text-right">
                  <div class="btn-group text-right">
                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                      <span class="caret ml5"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="#">Edit</a>
                      </li>
                      <li>
                        <a href="#">Delete</a>
                      </li>
                      <li>
                        <a href="#">Archive</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">Complete</a>
                      </li>
                      <li class="active">
                        <a href="#">Pending</a>
                      </li>
                      <li>
                        <a href="#">Canceled</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w100">
                  <img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_7.jpg">
                </td>
                <td class="">Apple Iphone 16GB - Silver</td>
                <td class="">#51362</td>
                <td class="">$1299</td>
                <td class="">5,200</td>
                <td class="text-right">
                  <div class="btn-group text-right">
                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                      <span class="caret ml5"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="#">Edit</a>
                      </li>
                      <li>
                        <a href="#">Delete</a>
                      </li>
                      <li>
                        <a href="#">Archive</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">Complete</a>
                      </li>
                      <li class="active">
                        <a href="#">Pending</a>
                      </li>
                      <li>
                        <a href="#">Canceled</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- info traffic panels -->


  </div>
  <!-- end: .tray-center -->

</section>
<!-- End: Content -->

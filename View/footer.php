   
</section>
<!-- <footer id="content-footer">
        <div class="row">
          <div class="col-md-6">
            <span class="footer-legal text-muted-darker text-uppercase">
                <?=(isset($this->title)) ? $this->title : 'MVC'; ?>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <span class="footer-meta">

            </span>
            <a href="#content" class="footer-return-top">
              <span class="fa fa-arrow-up"></span>
            </a>
          </div>
        </div>
    </footer>-->
<!--   Start: Right Sidebar 
  <aside id="sidebar_right" class="nano affix">

     Start: Sidebar Right Content 
    <div class="sidebar-right-content nano-content p15">
        <h5 class="title-divider text-muted mb20"> Server Statistics
          <span class="pull-right"> 2013
            <i class="fa fa-caret-down ml5"></i>
          </span>
        </h5>
        <div class="progress mh5">
          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 44%">
            <span class="fs11">DB Request</span>
          </div>
        </div>
        <div class="progress mh5">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 84%">
            <span class="fs11 text-left">Server Load</span>
          </div>
        </div>
        <div class="progress mh5">
          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 61%">
            <span class="fs11 text-left">Server Connections</span>
          </div>
        </div>
        <h5 class="title-divider text-muted mt30 mb10">Traffic Margins</h5>
        <div class="row">
          <div class="col-xs-5">
            <h3 class="text-primary mn pl5">132</h3>
          </div>
          <div class="col-xs-7 text-right">
            <h3 class="text-success-dark mn">
              <i class="fa fa-caret-up"></i> 13.2% </h3>
          </div>
        </div>
        <h5 class="title-divider text-muted mt25 mb10">Database Request</h5>
        <div class="row">
          <div class="col-xs-5">
            <h3 class="text-primary mn pl5">212</h3>
          </div>
          <div class="col-xs-7 text-right">
            <h3 class="text-success-dark mn">
              <i class="fa fa-caret-up"></i> 25.6% </h3>
          </div>
        </div>
        <h5 class="title-divider text-muted mt25 mb10">Server Response</h5>
        <div class="row">
          <div class="col-xs-5">
            <h3 class="text-primary mn pl5">82.5</h3>
          </div>
          <div class="col-xs-7 text-right">
            <h3 class="text-danger mn">
              <i class="fa fa-caret-down"></i> 17.9% </h3>
          </div>
        </div>
        <h5 class="title-divider text-muted mt40 mb20"> Server Statistics
          <span class="pull-right text-primary fw600">USA</span>
        </h5>
      </div>

  </aside>
   End: Right Sidebar -->

</div>
<!-- End: Main -->


<!-- BEGIN: PAGE SCRIPTS -->
  <?php 
    if (isset($this->template->js)) 
    {
    echo PHP_EOL;
        
        foreach ($this->template->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'public/template/'.$js.'"></script>'. PHP_EOL;
        }
    }
    if (isset($this->app->js)) 
    {
        foreach ($this->app->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'public/'.$js.'"></script>'. PHP_EOL;
        }
    }
    echo PHP_EOL;
  ?>

<script type="text/javascript">
    $(document).ready(function() {
      "use strict";
      // Init Theme Core    
      Core.init();
      Demo.init();
      
    });
</script>

<!-- END: PAGE SCRIPTS -->

</body>
</html>
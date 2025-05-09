
<!DOCTYPE html>
<html>


<!-- Mirrored from admindesigns.com/demos/admin/theme/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Dec 2016 23:49:50 GMT -->
<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>AdminDesigns - A Responsive HTML5 Admin UI Framework</title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
  <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AdminDesigns">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme2.css">
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme3.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body class="dashboard-page sb-l-o sb-r-c">

<!-------------------------------------------------------------+ 
  <body> Helper Classes: 
---------------------------------------------------------------+ 
  '.sb-l-o' - Sets Left Sidebar to "open"
  '.sb-l-m' - Sets Left Sidebar to "minified"
  '.sb-l-c' - Sets Left Sidebar to "closed"

  '.sb-r-o' - Sets Right Sidebar to "open"
  '.sb-r-c' - Sets Right Sidebar to "closed"
---------------------------------------------------------------+
 Example: <body class="example-page sb-l-o sb-r-c">
 Results: Sidebar left Open, Sidebar right Closed
--------------------------------------------------------------->

  <!-- For Demo Purposes - Theme Settings Pane -->
  <div id="skin-toolbox">
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-icon">
          <i class="fa fa-gear text-primary"></i>
        </span>
        <span class="panel-title"> Theme Options</span>
      </div>
      <div class="panel-body pn">
        <ul class="nav nav-list nav-list-sm pl15 pt10" role="tablist">
          <li class="active">
            <a href="#toolbox-header" role="tab" data-toggle="tab">Navbar</a>
          </li>
          <li>
            <a href="#toolbox-sidebar" role="tab" data-toggle="tab">Sidebar</a>
          </li>
          <li>
            <a href="#toolbox-settings" role="tab" data-toggle="tab">Misc</a>
          </li>
        </ul>
        <div class="tab-content p20 ptn pb15">
          <div role="tabpanel" class="tab-pane active" id="toolbox-header">
            <form id="toolbox-header-skin">
              <h4 class="mv20">Header Skins</h4>
              <div class="skin-toolbox-swatches">
                <div class="checkbox-custom checkbox-disabled fill mb5">
                  <input type="radio" name="headerSkin" id="headerSkin8" checked value="">
                  <label for="headerSkin8">Light</label>
                </div>
                <div class="checkbox-custom fill checkbox-primary mb5">
                  <input type="radio" name="headerSkin" id="headerSkin1" value="bg-primary">
                  <label for="headerSkin1">Primary</label>
                </div>
                <div class="checkbox-custom fill checkbox-info mb5">
                  <input type="radio" name="headerSkin" id="headerSkin3" value="bg-info">
                  <label for="headerSkin3">Info</label>
                </div>
                <div class="checkbox-custom fill checkbox-warning mb5">
                  <input type="radio" name="headerSkin" id="headerSkin4" value="bg-warning">
                  <label for="headerSkin4">Warning</label>
                </div>
                <div class="checkbox-custom fill checkbox-danger mb5">
                  <input type="radio" name="headerSkin" id="headerSkin5" value="bg-danger">
                  <label for="headerSkin5">Danger</label>
                </div>
                <div class="checkbox-custom fill checkbox-alert mb5">
                  <input type="radio" name="headerSkin" id="headerSkin6" value="bg-alert">
                  <label for="headerSkin6">Alert</label>
                </div>
                <div class="checkbox-custom fill checkbox-system mb5">
                  <input type="radio" name="headerSkin" id="headerSkin7" value="bg-system">
                  <label for="headerSkin7">System</label>
                </div>
                <div class="checkbox-custom fill checkbox-success mb5">
                  <input type="radio" name="headerSkin" id="headerSkin2" value="bg-success">
                  <label for="headerSkin2">Success</label>
                </div>
                <div class="checkbox-custom fill mb5">
                  <input type="radio" name="headerSkin" id="headerSkin9" value="bg-dark">
                  <label for="headerSkin9">Dark</label>
                </div>
              </div>
            </form>
          </div>
          <div role="tabpanel" class="tab-pane" id="toolbox-sidebar">
            <form id="toolbox-sidebar-skin">
              <h4 class="mv20">Sidebar Skins</h4>
              <div class="skin-toolbox-swatches">
                <div class="checkbox-custom fill mb5">
                  <input type="radio" name="sidebarSkin" checked id="sidebarSkin3" value="">
                  <label for="sidebarSkin3">Dark</label>
                </div>
                <div class="checkbox-custom fill checkbox-disabled mb5">
                  <input type="radio" name="sidebarSkin" id="sidebarSkin1" value="sidebar-light">
                  <label for="sidebarSkin1">Light</label>
                </div>
                <div class="checkbox-custom fill checkbox-light mb5">
                  <input type="radio" name="sidebarSkin" id="sidebarSkin2" value="sidebar-light light">
                  <label for="sidebarSkin2">Lighter</label>
                </div>
              </div>
            </form>
          </div>
          <div role="tabpanel" class="tab-pane" id="toolbox-settings">
            <form id="toolbox-settings-misc">
              <h4 class="mv20 mtn">Layout Options</h4>
              <div class="form-group">
                <div class="checkbox-custom fill mb5">
                  <input type="checkbox" checked="" id="header-option">
                  <label for="header-option">Fixed Header</label>
                </div>
              </div>
              <div class="form-group">
                <div class="checkbox-custom fill mb5">
                  <input type="checkbox" checked="" id="sidebar-option">
                  <label for="sidebar-option">Fixed Sidebar</label>
                </div>
              </div>
              <div class="form-group">
                <div class="checkbox-custom fill mb5">
                  <input type="checkbox" id="breadcrumb-option">
                  <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                </div>
              </div>
              <div class="form-group">
                <div class="checkbox-custom fill mb5">
                  <input type="checkbox" id="breadcrumb-hidden">
                  <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                </div>
              </div>
              <h4 class="mv20">Layout Options</h4>
              <div class="form-group">
                <div class="radio-custom mb5">
                  <input type="radio" id="fullwidth-option" checked name="layout-option">
                  <label for="fullwidth-option">Fullwidth Layout</label>
                </div>
              </div>
              <div class="form-group mb20">
                <div class="radio-custom radio-disabled mb5">
                  <input type="radio" id="boxed-option" name="layout-option" disabled>
                  <label for="boxed-option">Boxed Layout
                    <b class="text-muted">(Coming Soon)</b>
                  </label>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="form-group mn br-t p15">
          <a href="#" id="clearLocalStorage" class="btn btn-primary btn-block pb10 pt10">Clear LocalStorage</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End: Theme Settings Pane -->

  <!-- Start: Main -->
  <div id="main">

    <!-----------------------------------------------------------------+ 
       ".navbar" Helper Classes: 
    -------------------------------------------------------------------+ 
       * Positioning Classes: 
        '.navbar-static-top' - Static top positioned navbar
        '.navbar-static-top' - Fixed top positioned navbar

       * Available Skin Classes:
         .bg-dark    .bg-primary   .bg-success   
         .bg-info    .bg-warning   .bg-danger
         .bg-alert   .bg-system 
    -------------------------------------------------------------------+
      Example: <header class="navbar navbar-fixed-top bg-primary">
      Results: Fixed top navbar with blue background 
    ------------------------------------------------------------------->

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top">
      <div class="navbar-branding">
        <a class="navbar-brand" href="dashboard.html">
          <b>Admin</b>Designs
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li>
          <a class="sidebar-menu-toggle" href="#">
            <span class="ad ad-ruby fs18"></span>
          </a>
        </li>
        <li>
          <a class="topbar-menu-toggle" href="#">
            <span class="ad ad-wand fs16"></span>
          </a>
        </li>
        <li class="hidden-xs">
          <a class="request-fullscreen toggle-active" href="#">
            <span class="ad ad-screen-full fs18"></span>
          </a>
        </li>
      </ul>
      <form class="navbar-form navbar-left navbar-search" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search..." value="Search...">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="ad ad-radio-tower fs18"></span>
          </a>
          <ul class="dropdown-menu media-list w350 animated animated-shorter fadeIn" role="menu">
            <li class="dropdown-header">
              <span class="dropdown-title"> Notifications</span>
              <span class="label label-warning">12</span>
            </li>
            <li class="media">
              <a class="media-left" href="#"> <img src="assets/img/avatars/5.jpg" class="mw40" alt="avatar"> </a>
              <div class="media-body">
                <h5 class="media-heading">Article
                  <small class="text-muted">- 08/16/22</small>
                </h5> Last Updated 36 days ago by
                <a class="text-system" href="#"> Max </a>
              </div>
            </li>
            <li class="media">
              <a class="media-left" href="#"> <img src="assets/img/avatars/2.jpg" class="mw40" alt="avatar"> </a>
              <div class="media-body">
                <h5 class="media-heading mv5">Article
                  <small> - 08/16/22</small>
                </h5>
                Last Updated 36 days ago by
                <a class="text-system" href="#"> Max </a>
              </div>
            </li>
            <li class="media">
              <a class="media-left" href="#"> <img src="assets/img/avatars/3.jpg" class="mw40" alt="avatar"> </a>
              <div class="media-body">
                <h5 class="media-heading">Article
                  <small class="text-muted">- 08/16/22</small>
                </h5> Last Updated 36 days ago by
                <a class="text-system" href="#"> Max </a>
              </div>
            </li>
            <li class="media">
              <a class="media-left" href="#"> <img src="assets/img/avatars/4.jpg" class="mw40" alt="avatar"> </a>
              <div class="media-body">
                <h5 class="media-heading mv5">Article
                  <small class="text-muted">- 08/16/22</small>
                </h5> Last Updated 36 days ago by
                <a class="text-system" href="#"> Max </a>
              </div>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="flag-xs flag-us"></span> US
          </a>
          <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">
            <li>
              <a href="javascript:void(0);">
                <span class="flag-xs flag-in mr10"></span> Hindu </a>
            </li>
            <li>
              <a href="javascript:void(0);">
                <span class="flag-xs flag-tr mr10"></span> Turkish </a>
            </li>
            <li>
              <a href="javascript:void(0);">
                <span class="flag-xs flag-es mr10"></span> Spanish </a>
            </li>
          </ul>
        </li>
        <li class="menu-divider hidden-xs">
          <i class="fa fa-circle"></i>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64 mr15"> John.Smith
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="dropdown-header clearfix">
              <div class="pull-left ml10">
                <select id="user-status">
                  <optgroup label="Current Status:">
                    <option value="1-1">Away</option>
                    <option value="1-2">Offline</option>
                    <option value="1-3" selected="selected">Online</option>
                  </optgroup>
                </select>
              </div>

              <div class="pull-right mr10">
                <select id="user-role">
                  <optgroup label="Logged in As:">
                    <option value="1-1">Client</option>
                    <option value="1-2">Editor</option>
                    <option value="1-3" selected="selected">Admin</option>
                  </optgroup>
                </select>
              </div>

            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-envelope"></span> Messages
                <span class="label label-warning">2</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-user"></span> Friends
                <span class="label label-warning">6</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Account Settings </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-bell"></span> Activity  </a>
            </li>
            <li class="dropdown-footer">
              <a href="#" class="">
              <span class="fa fa-power-off pr5"></span> Logout </a>
            </li>
          </ul>
        </li>
      </ul>

    </header>
    <!-- End: Header -->

    <!-----------------------------------------------------------------+ 
       "#sidebar_left" Helper Classes: 
    -------------------------------------------------------------------+ 
       * Positioning Classes: 
        '.affix' - Sets Sidebar Left to the fixed position 

       * Available Skin Classes:
         .sidebar-dark (default no class needed)
         .sidebar-light  
         .sidebar-light.light   
    -------------------------------------------------------------------+
       Example: <aside id="sidebar_left" class="affix sidebar-light">
       Results: Fixed Left Sidebar with light/white background
    ------------------------------------------------------------------->

    <!-- Start: Sidebar Left -->
    <aside id="sidebar_left" class="nano nano-primary affix">

      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

          <!-- Sidebar Widget - Menu (Slidedown) -->
          <div class="sidebar-widget menu-widget">
            <div class="row text-center mbn">
              <div class="col-xs-4">
                <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                  <span class="glyphicon glyphicon-home"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                  <span class="glyphicon glyphicon-inbox"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                  <span class="glyphicon glyphicon-bell"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                  <span class="fa fa-desktop"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="fa fa-gears"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                  <span class="fa fa-flask"></span>
                </a>
              </div>
            </div>
          </div>

          <!-- Sidebar Widget - Author (hidden)  -->
          <div class="sidebar-widget author-widget hidden">
            <div class="media">
              <a class="media-left" href="#">
                <img src="assets/img/avatars/3.jpg" class="img-responsive">
              </a>
              <div class="media-body">
                <div class="media-links">
                   <a href="#" class="sidebar-menu-toggle">User Menu -</a> <a href="pages_login(alt).html">Logout</a>
                </div>
                <div class="media-author">Michael Richards</div>
              </div>
            </div>
          </div>

          <!-- Sidebar Widget - Search (hidden) -->
          <div class="sidebar-widget search-widget hidden">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
              <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
            </div>
          </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Left Menu -->
        <ul class="nav sidebar-menu">
          <li class="sidebar-label pt20">Menu</li>
          <li>
            <a href="pages_calendar.html">
              <span class="fa fa-calendar"></span>
              <span class="sidebar-title">Calendar</span>
              <span class="sidebar-title-tray">
                <span class="label label-xs bg-primary">New</span>
              </span>
            </a>
          </li>
          <li>
            <a href="http://admindesigns.com/demos/admin/README/index.html">
              <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">Documentation</span>
            </a>
          </li>
          <li class="active">
            <a href="dashboard.html">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-label pt15">Exclusive Tools</li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="fa fa-columns"></span>
              <span class="sidebar-title">Layout Templates</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa fa-arrows-h"></span>
                  Sidebars
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="layout_sidebar-left-static.html">
                      Left Static </a>
                  </li>
                  <li>
                    <a href="layout_sidebar-left-fixed.html">
                      Left Fixed </a>
                  </li>
                  <li>
                    <a href="layout_sidebar-left-widgets.html">
                      Left Widgets </a>
                  </li>
                  <li>
                    <a href="layout_sidebar-left-minified.html">
                      Left Minified </a>
                  </li>
                  <li>
                    <a href="layout_sidebar-left-light.html">
                      Left White </a>
                  </li>
                  <li>
                    <a href="layout_sidebar-right-static.html">
                      Right Static </a>
                  </li>
                  <li>
                    <a href="layout_sidebar-right-fixed.html">
                      Right Fixed </a>
                  </li>
                  <li>
                    <a href="layout_sidebar-right-menu.html">
                      Right w/Menu </a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-arrows-v"></span>
                  Navbar
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="layout_navbar-static.html">
                      Navbar Static </a>
                  </li>
                  <li>
                    <a href="layout_navbar-fixed.html">
                      Navbar Fixed </a>
                  </li>
                  <li>
                    <a href="layout_navbar-menus.html">
                      Navbar Menus </a>
                  </li>
                  <li>
                    <a href="layout_navbar-contextual.html">
                      Contextual Example </a>
                  </li>
                  <li>
                    <a href="layout_navbar-search-alt.html">
                      Search Alt Style </a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-hand-o-up"></span>
                  Topbar
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="layout_topbar.html">
                      Default Style </a>
                  </li> 
                  <li>
                    <a href="layout_topbar-menu.html">
                      Default w/Menu </a>
                  </li>  
                  <li>
                    <a href="layout_topbar-alt.html">
                      Alternate Style </a>
                  </li>  
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-arrows-v"></span>
                  Content Body
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="layout_content-blank.html">
                      Blank Starter </a>
                  </li>
                  <li>
                    <a href="layout_content-fixed.html">
                      Fixed Window </a>
                  </li>
                  <li>
                    <a href="layout_content-heading.html">
                      Content Heading </a>
                  </li>
                  <li>
                    <a href="layout_content-tabs.html">
                      Content Tabs </a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-pause"></span>
                  Content Trays
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="layout_tray-left.html">
                      Tray Left Static </a>
                  </li> 
                  <li>
                    <a href="layout_tray-left-fixed.html">
                      Tray Left Fixed </a>
                  </li> 
                  <li>
                    <a href="layout_tray-right.html">
                      Tray Right Static </a>
                  </li> 
                  <li>
                    <a href="layout_tray-right-fixed.html">
                      Tray Right Fixed </a>
                  </li> 
                  <li>
                    <a href="layout_tray-both.html">
                      Left + Right Static </a>
                  </li> 
                  <li>
                    <a href="layout_tray-both-fixed.html">
                      Left + Right Fixed </a>
                  </li> 
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-plus-square-o"></span>
                  Boxed Layout
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="layout_boxed.html">
                      Default </a>
                  </li>
                  <li>
                    <a href="layout_boxed-horizontal.html">
                      Horizontal Menu </a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-arrow-circle-o-up"></span>
                  Horizontal Menu
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="layout_horizontal-sm.html">
                      Small Size</a>
                  </li>
                  <li>
                    <a href="layout_horizontal-md.html">
                      Medium Size</a>
                  </li>
                  <li>
                    <a href="layout_horizontal-lg.html">
                      Large Size</a>
                  </li>
                  <li>
                    <a href="layout_horizontal-light.html">
                      Light Skin</a>
                  </li>
                  <li>
                    <a href="layout_horizontal-topbar.html">
                      With Topbar</a>
                  </li>
                  <li>
                    <a href="layout_horizontal-topbar-alt.html">
                      With Alt Topbar</a>
                  </li>
                  <li>
                    <a href="layout_horizontal-collapsed.html">
                      Collapsed onLoad</a>
                  </li>
                  <li>
                    <a href="layout_horizontal-boxed.html">
                      In Boxed Layout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-fire"></span>
              <span class="sidebar-title">Admin Plugins</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a href="admin_plugins-panels.html">
                  <span class="glyphicon glyphicon-book"></span> Admin Panels </a>
              </li>
              <li>
                <a href="admin_plugins-modals.html">
                  <span class="glyphicon glyphicon-modal-window"></span> Admin Modals </a>
              </li>
              <li>
                <a href="admin_plugins-dock.html">
                  <span class="glyphicon glyphicon-equalizer"></span> Admin Dock </a>
              </li>
            </ul>
          </li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-check"></span>
              <span class="sidebar-title">Admin Forms</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a href="admin_forms-elements.html">
                  <span class="glyphicon glyphicon-edit"></span> Admin Elements </a>
              </li>
              <li>
                <a href="admin_forms-widgets.html">
                  <span class="glyphicon glyphicon-calendar"></span> Admin Widgets </a>
              </li>
              <li>
                <a href="admin_forms-validation.html">
                  <span class="glyphicon glyphicon-check"></span> Admin Validation </a>
              </li>
              <li>
                <a href="admin_forms-layouts.html">
                  <span class="fa fa-desktop"></span> Admin Layouts </a>
              </li>
              <li>
                <a href="admin_forms-wizard.html">
                  <span class="fa fa-clipboard"></span> Admin Wizard </a>
              </li>
            </ul>
          </li>

          <li class="sidebar-label pt20">Systems</li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="fa fa-diamond"></span>
              <span class="sidebar-title">Widget Packages</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a href="widgets_tile.html">
                  <span class="fa fa-cube"></span> Tile Widgets</a>
              </li>
              <li>
                <a href="widgets_panel.html">
                  <span class="fa fa-desktop"></span> Panel Widgets </a>
              </li>
              <li>
                <a href="widgets_scroller.html">
                  <span class="fa fa-columns"></span> Scroller Widgets </a>
              </li>
              <li>
                <a href="widgets_data.html">
                  <span class="fa fa-dot-circle-o"></span> Admin Widgets </a>
              </li>
            </ul>
          </li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-shopping-cart"></span>
              <span class="sidebar-title">Ecommerce</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a href="ecommerce_dashboard.html">
                  <span class="glyphicon glyphicon-shopping-cart"></span> Dashboard
                  <span class="label label-xs bg-primary">New</span>
                </a>
              </li>
              <li>
                <a href="ecommerce_products.html">
                  <span class="glyphicon glyphicon-tags"></span> Products </a>
              </li>
              <li>
                <a href="ecommerce_orders.html">
                  <span class="fa fa-money"></span> Orders </a>
              </li>
              <li>
                <a href="ecommerce_customers.html">
                  <span class="fa fa-users"></span> Customers </a>
              </li>
              <li>
                <a href="ecommerce_settings.html">
                  <span class="fa fa-gears"></span> Store Settings </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="email_templates.html">
              <span class="fa fa-envelope-o"></span>
              <span class="sidebar-title">Email Templates</span>
            </a>
          </li>

          <!-- sidebar resources -->
          <li class="sidebar-label pt20">Elements</li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-bell"></span>
              <span class="sidebar-title">UI Elements</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a href="ui_alerts.html">
                  <span class="fa fa-warning"></span> Alerts </a>
              </li>
              <li>
                <a href="ui_animations.html">
                  <span class="fa fa-spinner"></span> Animations </a>
              </li>
              <li>
                <a href="ui_buttons.html">
                  <span class="fa fa-plus-square-o"></span> Buttons </a>
              </li>
              <li>
                <a href="ui_typography.html">
                  <span class="fa fa-text-width"></span> Typography </a>
              </li>
              <li>
                <a href="ui_portlets.html">
                  <span class="fa fa-archive"></span> Portlets </a>
              </li>
              <li>
                <a href="ui_progress-bars.html">
                  <span class="fa fa-bars"></span> Progress Bars </a>
              </li>
              <li>
                <a href="ui_tabs.html">
                  <span class="fa fa-toggle-off"></span> Tabs </a>
              </li>
              <li>
                <a href="ui_icons.html">
                  <span class="fa fa-hand-o-right"></span> Icons </a>
              </li>
              <li>
                <a href="ui_grid.html">
                  <span class="fa fa-th-large"></span> Grid </a>
              </li>
              <li>
                <a href="ui_grid.html">
                  <span class="fa fa-th-large"></span> Grid </a>
              </li>
            </ul>
          </li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-hdd"></span>
              <span class="sidebar-title">Form Elements</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a href="form_inputs.html">
                  <span class="fa fa-magic"></span> Basic Inputs </a>
              </li>
              <li>
                <a href="form_plugins.html">
                  <span class="fa fa-bell-o"></span> Plugin Inputs
                  <span class="label label-xs bg-primary">New</span>
                </a>
              </li>
              <li>
                <a href="form_editors.html">
                  <span class="fa fa-clipboard"></span> Editors </a>
              </li>
              <li>
                <a href="form_treeview.html">
                  <span class="fa fa-tree"></span> Treeview </a>
              </li>
              <li>
                <a href="form_nestable.html">
                  <span class="fa fa-tasks"></span> Nestable </a>
              </li>
              <li>
                <a href="form_image-tools.html">
                  <span class="fa fa-cloud-upload"></span> Image Tools
                  <span class="label label-xs bg-primary">New</span>
                </a>
              </li>
              <li>
                <a href="form_uploaders.html">
                  <span class="fa fa-cloud-upload"></span> Uploaders </a>
              </li>
              <li>
                <a href="form_notifications.html">
                  <span class="fa fa-bell-o"></span> Notifications </a>
              </li>
              <li>
                <a href="form_content-sliders.html">
                  <span class="fa fa-exchange"></span> Content Sliders </a>
              </li>
            </ul>
          </li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-tower"></span>
              <span class="sidebar-title">Plugins</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-globe"></span> Maps
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="maps_advanced.html">Admin Maps</a>
                  </li>
                  <li>
                    <a href="maps_basic.html">Basic Maps</a>
                  </li>
                  <li>
                    <a href="maps_vector.html">Vector Maps</a>
                  </li>
                  <li>
                    <a href="maps_full.html">Full Map</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-line-chart"></span> Charts
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="charts_highcharts.html">Highcharts</a>
                  </li>
                  <li>
                    <a href="charts_d3.html">D3 Charts</a>
                  </li>
                  <li>
                    <a href="charts_flot.html">Flot Charts</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-table"></span> Tables
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="tables_basic.html"> Basic Tables</a>
                  </li>
                  <li>
                    <a href="tables_datatables.html"> DataTables </a>
                  </li>
                  <li>
                    <a href="tables_datatables-editor.html"> Editable Tables </a>
                  </li>
                  <li>
                    <a href="tables_footable.html"> FooTables </a>
                  </li>
                  <li>
                    <a href="tables_pricing.html"> Pricing Tables </a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-flask"></span> Misc
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="misc_tour.html"> Site Tour</a>
                  </li>
                  <li>
                    <a href="misc_timeout.html"> Session Timeout</a>
                  </li>
                  <li>
                    <a href="misc_nprogress.html"> Page Progress Loader </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-duplicate"></span>
              <span class="sidebar-title">Pages</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-gears"></span> Utility
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="landing-page/landing1/index.html" target="_blank"> Landing Page </a>
                  </li>
                  <li>
                    <a href="pages_confirmation.html" target="_blank"> Confirmation
                      <span class="label label-xs bg-primary">New</span>
                    </a>
                  </li>
                  <li>
                    <a href="pages_login.html" target="_blank"> Login </a>
                  </li>
                  <li>
                    <a href="pages_login(alt).html" target="_blank"> Login Alt
                      <span class="label label-xs bg-primary">New</span>
                    </a>
                  </li>
                  <li>
                    <a href="pages_register.html" target="_blank"> Register </a>
                  </li>
                  <li>
                    <a href="pages_register(alt).html" target="_blank"> Register Alt
                      <span class="label label-xs bg-primary">New</span>
                    </a>
                  </li>
                  <li>
                    <a href="pages_screenlock.html" target="_blank"> Screenlock </a>
                  </li>
                  <li>
                    <a href="pages_screenlock(alt).html" target="_blank"> Screenlock Alt
                      <span class="label label-xs bg-primary">New</span>
                    </a>
                  </li>
                  <li>
                    <a href="pages_forgotpw.html" target="_blank"> Forgot Password </a>
                  </li>
                  <li>
                    <a href="pages_forgotpw(alt).html" target="_blank"> Forgot Password Alt
                      <span class="label label-xs bg-primary">New</span>
                    </a>
                  </li>
                  <li>
                    <a href="pages_coming-soon.html" target="_blank"> Coming Soon
                    </a>
                  </li>
                  <li>
                    <a href="pages_404.html"> 404 Error </a>
                  </li>
                  <li>
                    <a href="pages_500.html"> 500 Error </a>
                  </li>
                  <li>
                    <a href="pages_404(alt).html"> 404 Error Alt </a>
                  </li>
                  <li>
                    <a href="pages_500(alt).html"> 500 Error Alt </a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-desktop"></span> Basic
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="pages_search-results.html">Search Results
                      <span class="label label-xs bg-primary">New</span>
                    </a>
                  </li>
                  <li>
                    <a href="pages_profile.html"> Profile </a>
                  </li>
                  <li>
                    <a href="pages_timeline.html"> Timeline Split </a>
                  </li>
                  <li>
                    <a href="pages_timeline-single.html"> Timeline Single </a>
                  </li>
                  <li>
                    <a href="pages_faq.html"> FAQ Page </a>
                  </li>
                  <li>
                    <a href="pages_calendar.html"> Calendar </a>
                  </li>
                  <li>
                    <a href="pages_messages.html"> Messages </a>
                  </li>
                  <li>
                    <a href="pages_messages(alt).html"> Messages Alt </a>
                  </li>
                  <li>
                    <a href="pages_gallery.html"> Gallery </a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="accordion-toggle" href="#">
                  <span class="fa fa-usd"></span> Misc
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li>
                    <a href="pages_invoice.html"> Printable Invoice </a>
                  </li>
                  <li>
                    <a href="pages_blank.html"> Blank </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

          <!-- sidebar bullets -->
          <li class="sidebar-label pt20">Projects</li>
          <li class="sidebar-proj">
            <a href="#projectOne">
              <span class="fa fa-dot-circle-o text-primary"></span>
              <span class="sidebar-title">Website Redesign</span>
            </a>
          </li>
          <li class="sidebar-proj">
            <a href="#projectTwo">
              <span class="fa fa-dot-circle-o text-info"></span>
              <span class="sidebar-title">Ecommerce Panel</span>
            </a>
          </li>
          <li class="sidebar-proj">
            <a href="#projectTwo">
              <span class="fa fa-dot-circle-o text-danger"></span>
              <span class="sidebar-title">Adobe Mockup</span>
            </a>
          </li>
          <li class="sidebar-proj">
            <a href="#projectThree">
              <span class="fa fa-dot-circle-o text-warning"></span>
              <span class="sidebar-title">SSD Upgrades</span>
            </a>
          </li>

          <!-- sidebar progress bars -->
          <li class="sidebar-label pt25 pb10">User Stats</li>
          <li class="sidebar-stat">
            <a href="#projectOne" class="fs11">
              <span class="fa fa-inbox text-info"></span>
              <span class="sidebar-title text-muted">Email Storage</span>
              <span class="pull-right mr20 text-muted">35%</span>
              <div class="progress progress-bar-xs mh20 mb10">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                  <span class="sr-only">35% Complete</span>
                </div>
              </div>
            </a>
          </li>
          <li class="sidebar-stat">
            <a href="#projectOne" class="fs11">
              <span class="fa fa-dropbox text-warning"></span>
              <span class="sidebar-title text-muted">Bandwidth</span>
              <span class="pull-right mr20 text-muted">58%</span>
              <div class="progress progress-bar-xs mh20">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 58%">
                  <span class="sr-only">58% Complete</span>
                </div>
              </div>
            </a>
          </li>
        </ul>
        <!-- End: Sidebar Menu -->

	      <!-- Start: Sidebar Collapse Button -->
	      <div class="sidebar-toggle-mini">
	        <a href="#">
	          <span class="fa fa-sign-out"></span>
	        </a>
	      </div>
	      <!-- End: Sidebar Collapse Button -->

      </div>
      <!-- End: Sidebar Left Content -->

    </aside>
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- Start: Topbar-Dropdown -->
      <div id="topbar-dropmenu">
        <div class="topbar-menu row">
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
              <span class="glyphicon glyphicon-inbox"></span>
              <span class="metro-title">Messages</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
              <span class="glyphicon glyphicon-user"></span>
              <span class="metro-title">Users</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
              <span class="glyphicon glyphicon-headphones"></span>
              <span class="metro-title">Support</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
              <span class="fa fa-gears"></span>
              <span class="metro-title">Settings</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
              <span class="glyphicon glyphicon-facetime-video"></span>
              <span class="metro-title">Videos</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
              <span class="glyphicon glyphicon-picture"></span>
              <span class="metro-title">Pictures</span>
            </a>
          </div>
        </div>
      </div>
      <!-- End: Topbar-Dropdown -->

      <!-- Start: Topbar -->
      <header id="topbar">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-active">
              <a href="dashboard.html">Dashboard</a>
            </li>
            <li class="crumb-icon">
              <a href="dashboard.html">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="dashboard.html">Home</a>
            </li>
            <li class="crumb-trail">Dashboard</li>
          </ol>
        </div>
        <div class="topbar-right">
          <div class="ib topbar-dropdown">
            <label for="topbar-multiple" class="control-label pr10 fs11 text-muted">Reporting Period</label>
            <select id="topbar-multiple" class="hidden">
              <optgroup label="Filter By:">
                <option value="1-1">Last 30 Days</option>
                <option value="1-2" selected="selected">Last 60 Days</option>
                <option value="1-3">Last Year</option>
              </optgroup>
            </select>
          </div>
          <div class="ml15 ib va-m" id="toggle_sidemenu_r">
            <a href="#" class="pl5">
              <i class="fa fa-sign-in fs22 text-primary"></i>
              <span class="badge badge-danger badge-hero">3</span>
            </a>
          </div>
        </div>
      </header>
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="animated fadeIn">

        <!-- Dashboard Tiles -->
        <div class="row mb10">
          <div class="col-sm-6 col-md-3">
            <div class="panel bg-alert light of-h mb10">
              <div class="pn pl20 p5">
                <div class="icon-bg">
                  <i class="fa fa-comments-o"></i>
                </div>
                <h2 class="mt15 lh15">
                  <b>523</b>
                </h2>
                <h5 class="text-muted">Comments</h5>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="panel bg-info light of-h mb10">
              <div class="pn pl20 p5">
                <div class="icon-bg">
                  <i class="fa fa-twitter"></i>
                </div>
                <h2 class="mt15 lh15">
                  <b>348</b>
                </h2>
                <h5 class="text-muted">Tweets</h5>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="panel bg-danger light of-h mb10">
              <div class="pn pl20 p5">
                <div class="icon-bg">
                  <i class="fa fa-bar-chart-o"></i>
                </div>
                <h2 class="mt15 lh15">
                  <b>267</b>
                </h2>
                <h5 class="text-muted">Reach</h5>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="panel bg-warning light of-h mb10">
              <div class="pn pl20 p5">
                <div class="icon-bg">
                  <i class="fa fa-envelope"></i>
                </div>
                <h2 class="mt15 lh15">
                  <b>714</b>
                </h2>
                <h5 class="text-muted">Comments</h5>
              </div>
            </div>
          </div>
        </div>

        <!-- Admin-panels -->
        <div class="admin-panels fade-onload">

          <div class="row">

            <!-- Three Pane Widget -->
            <div class="col-md-12 admin-grid">

              <div class="panel sort-disable" id="p0">
                <div class="panel-heading">
                  <span class="panel-title">Data Panel Widget</span>
                </div>
                <div class="panel-body mnw700 of-a">
                  <div class="row">

                    <!-- Chart Column -->
                    <div class="col-md-4 pln br-r mvn15">
                      <h5 class="ml5 mt20 ph10 pb5 br-b fw600">Visitors
                        <small class="pull-right fw600">13,253
                          <span class="text-primary">(8,251 unique)</span>
                        </small>
                      </h5>
                      <div id="high-column2" style="width: 100%; height: 255px; margin: 0 auto"></div>
                    </div>

                    <!-- Multi Text Column -->
                    <div class="col-md-4 br-r">
                      <h5 class="mt5 mbn ph10 pb5 br-b fw600">Top Referrals
                        <small class="pull-right fw600 text-primary">View Report </small>
                      </h5>
                      <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                        <thead>
                          <tr class="hidden">
                            <th>Source</th>
                            <th>Count</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <i class="fa fa-circle text-warning fs8 pr15"></i>
                              <span>www.google.com</span>
                            </td>
                            <td>1,926</td>
                          </tr>
                          <tr>
                            <td>
                              <i class="fa fa-circle text-warning fs8 pr15"></i>
                              <span>www.yahoo.com</span>
                            </td>
                            <td>1,254</td>
                          </tr>
                          <tr>
                            <td>
                              <i class="fa fa-circle text-warning fs8 pr15"></i>
                              <span>www.themeforest.com</span>
                            </td>
                            <td>783</td>
                          </tr>
                        </tbody>
                      </table>
                      <h5 class="mt15 mbn ph10 pb5 br-b fw600">Top Search Terms
                        <small class="pull-right fw600 text-primary">View Report </small>
                      </h5>
                      <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                        <thead>
                          <tr class="hidden">
                            <th>Source</th>
                            <th>Count</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <i class="fa fa-circle text-warning fs8 pr15"></i>
                              <span>admin theme</span>
                            </td>
                            <td>988</td>
                          </tr>
                          <tr>
                            <td>
                              <i class="fa fa-circle text-warning fs8 pr15"></i>
                              <span>admin dashboard</span>
                            </td>
                            <td>612</td>
                          </tr>
                          <tr>
                            <td>
                              <i class="fa fa-circle text-warning fs8 pr15"></i>
                              <span>admin template</span>
                            </td>
                            <td>256</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <!-- Flag/Icon Column -->
                    <div class="col-md-4">
                      <h5 class="mt5 ph10 pb5 br-b fw600">Traffic Sources
                        <small class="pull-right fw600 text-primary">View Stats </small>
                      </h5>
                      <table class="table mbn">
                        <thead>
                          <tr class="hidden">
                            <th>#</th>
                            <th>First Name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="va-m fw600 text-muted">
                              <span class="flag-xs flag-us mr5 va-b"></span> United States</td>
                            <td class="fs15 fw600 text-right">28%</td>
                          </tr>
                          <tr>
                            <td class="va-m fw600 text-muted">
                              <span class="flag-xs flag-tr mr5 va-b"></span> Turkey</td>
                            <td class="fs15 fw600 text-right">25%</td>
                          </tr>
                          <tr>
                            <td class="va-m fw600 text-muted">
                              <span class="flag-xs flag-fr mr5 va-b"></span> France</td>
                            <td class="fs15 fw600 text-right">22%</td>
                          </tr>
                          <tr>
                            <td class="va-m fw600 text-muted">
                              <span class="flag-xs flag-in mr5 va-b"></span> India</td>
                            <td class="fs15 fw600 text-right">18%</td>
                          </tr>
                          <tr>
                            <td class="va-m fw600 text-muted">
                              <span class="flag-xs flag-es mr5 va-b"></span> Spain</td>
                            <td class="fs15 fw600 text-right">15%</td>
                          </tr>
                          <tr>
                            <td class="va-m fw600 text-muted">
                              <span class="flag-xs flag-de mr5 va-b"></span> Germany</td>
                            <td class="fs15 fw600 text-right">12%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end: .col-md-12.admin-grid -->

          </div>
          <!-- end: .row -->

          <div class="row">

            <div class="col-md-6 col-lg-5 admin-grid">

              <!-- Column Graph -->
              <div class="panel" id="p6">
                <div class="panel-heading">
                  <span class="panel-title">Column Graph</span>
                </div>
                <div class="panel-body pn">
                  <div class="row table-layout">
                    <div class="col-xs-5 va-m">
                      <div id="high-column" style="width: 100%; height: 197px; margin: 0 auto"></div>
                    </div>
                    <div class="col-xs-7 br-l pn">
                      <div class="admin-form">
                        <!-- Panel Break Smart Widget -->
                        <div class="smart-widget sm-right smr-50">
                          <label class="field">
                            <input type="text" name="sub" id="sub" class="gui-input br-n br-b" placeholder="Add Social Network">
                          </label>
                          <button type="submit" class="button br-n br-b br-l">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                      <table class="table mbn tc-med-1 tc-bold-last">
                        <thead>
                          <tr class="hidden">
                            <th>#</th>
                            <th>First Name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <span class="fa fa-circle text-warning fs14 mr10"></span>Behance</td>
                            <td>24%</td>
                          </tr>
                          <tr>
                            <td>
                              <span class="fa fa-circle text-info fs14 mr10"></span>Twitter</td>
                            <td>7%</td>
                          </tr>
                          <tr>
                            <td>
                              <span class="fa fa-circle text-primary fs14 mr10"></span>Facebook</td>
                            <td>14%</td>
                          </tr>
                          <tr>
                            <td>
                              <span class="fa fa-circle text-alert fs14 mr10"></span>Dribble</td>
                            <td>21%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Stats Top Graph Bot -->
              <div class="panel" id="p7">
                <div class="panel-heading">
                  <span class="panel-title">Area Graph</span>
                </div>
                <div class="panel-body pn">
                  <div class="br-b admin-form">
                    <div class="smart-widget sm-right smr-50">
                      <label class="field">
                        <input type="text" name="sub" id="sub" class="gui-input br-n" placeholder="Search State">
                      </label>
                      <button type="submit" class="button br-n br-l">
                        <i class="fa fa-caret-down"></i>
                      </button>
                    </div>
                    <table class="table mbn br-t">
                      <thead>
                        <tr class="hidden">
                          <th>#</th>
                          <th>First Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="va-m fw600 text-muted">
                            <span class="fa fa-female text-primary fs14 ml5 mr10"></span>Male</td>
                          <td class="fs14 fw600 text-right">54%</td>
                        </tr>
                        <tr>
                          <td class="va-m fw600 text-muted">
                            <span class="fa fa-male text-info fs14 ml5 mr10"></span>Female</td>
                          <td class="fs14 fw600 text-right">46%</td>
                        </tr>
                        <tr>
                          <td class="va-m fw600 text-muted">
                            <span class="fa fa-child text-warning fs15 ml5 mr10"></span>Unemployed</td>
                          <td class="fs14 fw600 text-right">14%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div id="high-line3" style="width: 100%; height: 210px; margin: 0 auto"></div>
                </div>
              </div>

             <!-- Pie Chart -->
              <div class="panel" id="p10">
                <div class="panel-heading">
                  <span class="panel-title">Pie Chart</span>
                </div>
                <div class="panel-body pn">
                  <div id="high-pie" style="width: 100%; height: 200px; margin: 0 auto"></div>
                </div>
              </div>

              <!-- Column Graph -->
              <div class="panel" id="p8">
                <div class="panel-heading">
                  <span class="panel-title">State Icon</span>
                </div>
                <div class="panel-body pn">
                  <div class="row table-layout">
                    <div class="col-xs-4 text-center posr">
                      <span data-toggle="tooltip" data-placement="top" title="Missouri" class="stateface stateface-mo fs70 text-info light t-center"></span>
                    </div>
                    <div class="col-xs-8 br-l pn admin-form">
                      <div class="smart-widget sm-right smr-50">
                        <label class="field">
                          <input type="text" name="sub" id="sub" class="gui-input br-n br-b" placeholder="Search State">
                        </label>
                        <button type="submit" class="button br-n br-b br-l">
                          <i class="fa fa-caret-down"></i>
                        </button>
                      </div>
                      <table class="table mbn">
                        <thead>
                          <tr class="hidden">
                            <th>#</th>
                            <th>First Name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="va-m fw600 text-muted">
                              <span class="fa fa-female text-primary fs14 mr10"></span>Male</td>
                            <td class="fs14 fw600 text-right">54%</td>
                          </tr>
                          <tr>
                            <td class="va-m fw600 text-muted">
                              <span class="fa fa-male text-info fs14 mr10"></span>Female</td>
                            <td class="fs14 fw600 text-right">46%</td>
                          </tr>
                          <tr>
                            <td class="va-m fw600 text-muted">
                              <span class="fa fa-child text-warning fs15 mr10"></span>Unemployed</td>
                            <td class="fs14 fw600 text-right">14%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Geo Map + Table Stats -->
              <div class="panel" id="p9">
                <div class="panel-heading">
                  <span class="panel-title">Visitor Geography</span>
                </div>
                <div class="panel-body">
                  <div id="WidgetMap" class="jvector-colors hide-jzoom" style="width: 100%; height: 220px;"></div>
                </div>
                <div class="panel-menu admin-form pn">
                  <!-- Panel Break Smart Widget -->
                  <div class="smart-widget sm-right smr-50">
                    <label class="field">
                      <input type="text" name="sub" id="sub" class="gui-input br-n" placeholder="United States of America" disabled>
                    </label>
                    <button type="submit" class="button br-n br-l">
                      <i class="fa fa-caret-down"></i>
                    </button>
                  </div>
                </div>
                <div class="panel-body pn">
                  <table class="table mbn">
                    <thead>
                      <tr class="hidden">
                        <th>#</th>
                        <th>First Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="va-m fw600 text-muted">
                          <span class="fa fa-circle text-alert fs14 mr10"></span>New York</td>
                        <td class="fs15 fw600 text-right">7%</td>
                      </tr>
                      <tr>
                        <td class="va-m fw600 text-muted">
                          <span class="fa fa-circle text-info fs14 mr10"></span>Missouri</td>
                        <td class="fs15 fw600 text-right">14%</td>
                      </tr>
                      <tr>
                        <td class="va-m fw600 text-muted">
                          <span class="fa fa-circle text-primary fs14 mr10"></span>Texas</td>
                        <td class="fs15 fw600 text-right">7%</td>
                      </tr>
                      <tr>
                        <td class="va-m fw600 text-muted">
                          <span class="fa fa-circle text-warning fs14 mr10"></span>California</td>
                        <td class="fs15 fw600 text-right">24%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- end: .col-md-5-->

            <div class="col-md-6 col-lg-4 admin-grid">

              <!-- Column Graph -->
              <div class="panel" id="p11">
                <div class="panel-heading">
                  <span class="panel-title">Response Time</span>
                </div>
                <div class="panel-menu pn bg-white">
                  <ul class="nav nav-justified text-center fw600 chart-legend" data-chart-id="#high-column3">
                    <li>
                      <a href="#" class="legend-item" data-chart-id="0"> Tech </a>
                    </li>
                    <li class="br-l">
                      <a href="#" class="legend-item" data-chart-id="1"> Support </a>
                    </li>
                    <li class="br-l">
                      <a href="#" class="legend-item" data-chart-id="2"> Service </a>
                    </li>
                    <li class="br-l">
                      <a href="#" class="legend-item" data-chart-id="3"> Another </a>
                    </li>
                  </ul>
                </div>
                <div class="panel-body pbn">
                  <div id="high-column3" style="width: 100%; height: 400px; margin: 0 auto"></div>
                </div>
                <div class="panel-footer p15">
                  <p class="text-muted text-center mbn">A percent measure of tickets with
                    <b class="text-info">first</b> reply time</p>
                </div>
              </div>


              <!-- Circle Stats -->
              <div class="panel" id="p5">
                <div class="panel-heading">
                  <span class="panel-title">Circulars</span>
                </div>
                <div class="panel-body">
                  <div class="mb20 text-right">
                    <span class="fs11 text-muted ml10">
                      <i class="fa fa-circle text-primary fs12 pr5"></i> Facebook</span>
                    <span class="fs11 text-muted ml10">
                      <i class="fa fa-circle text-info fs12 pr5"></i> Twitter</span>
                    <span class="fs11 text-muted ml10">
                      <i class="fa fa-circle text-warning fs12 pr5"></i> Google+</span>
                  </div>
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <div class="info-circle" id="c1" value="80" data-circle-color="primary"></div>
                    </div>
                    <div class="col-xs-4">
                      <div class="info-circle" id="c2" value="30" data-circle-color="info"></div>
                    </div>
                    <div class="col-xs-4">
                      <div class="info-circle" id="c3" value="55" data-circle-color="warning"></div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- Bar Graph -->
              <div class="panel" id="p12">
                <div class="panel-heading">
                  <span class="panel-title">Bar Graph</span>
                </div>
                <div class="panel-menu">
                  <div class="chart-legend" data-chart-id="#high-bars">
                    <a data-chart-id="0" class="legend-item btn btn-warning btn-sm mr5">Data 1</a>
                    <a data-chart-id="1" class="legend-item btn btn-primary btn-sm mr5">Data 2</a>
                    <a data-chart-id="2" class="legend-item btn btn-info btn-sm">Data 3</a>
                  </div>
                </div>
                <div class="panel-body pn">
                  <div id="high-bars" style="width: 100%; height: 140px; margin: 0 auto"></div>
                </div>
              </div>

              <!-- Sparklines -->
              <div class="panel" id="p13">
                <div class="panel-heading">
                  <span class="panel-title">Sparklines</span>
                </div>
                <div class="panel-body pn of-a">
                  <table class="table mbn">
                    <thead>
                      <tr class="hidden">
                        <th class="mw30">1</th>
                        <th>Data</th>
                        <th>Sparkline</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fs18 text-center w30">
                          <span class="fa fa-desktop text-warning"></span>
                        </td>
                        <td class="fw600 text-muted">Desktop Viewers</td>
                        <td>
                          <span class="inlinesparkline pull-right" data-spark-color="warning" values="5,6,7,9,9,5,3,2,2,4,6"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="fs18 text-center">
                          <span class="fa fa-tablet text-primary"></span>
                        </td>
                        <td class="fw600 text-muted">Tablet Viewers</td>
                        <td>
                          <span class="inlinesparkline pull-right" data-spark-color="info" values="4,6,7,9,9,5,3,2,2,4,6,7"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="fs18 text-center">
                          <span class="fa fa-phone text-info"></span>
                        </td>
                        <td class="fw600 text-muted">Customer Support</td>
                        <td>
                          <span class="inlinesparkline pull-right" data-spark-color="primary" values="7,3,2,2,4,6,7,6,7,9"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="fs18 text-center">
                          <span class="fa fa-rocket text-success"></span>
                        </td>
                        <td class="fw600 text-muted">Rocket Explosions</td>
                        <td>
                          <span class="inlinesparkline pull-right" data-spark-color="alert" values="2,6,7,9,9,5,3,2,2,4,6,7"></span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Area Graph -->
              <div class="panel" id="p14">
                <div class="panel-heading">
                  <span class="panel-title">Area Graph</span>
                </div>
                <div class="panel-menu">
                  <div class="chart-legend" data-chart-id="#high-area">
                    <a data-chart-id="0" class="legend-item btn btn-sm btn-warning ph20 mr10">Data 1</a>
                    <a data-chart-id="1" class="legend-item btn btn-sm btn-primary mr10">Data 2</a>
                    <a data-chart-id="2" class="legend-item btn btn-sm btn-info mr10">Data 3</a>
                  </div>
                </div>
                <div class="panel-body pn">
                  <div id="high-area" style="width: 100%; height: 230px; margin: 0 auto"></div>
                </div>
              </div>

            </div>
            <!-- end: .col-md-4-->

            <div class="col-md-6 col-lg-3 admin-grid">

              <!-- Dot List -->
              <div class="panel" id="p15">
                <div class="panel-heading">
                  <span class="panel-title">Dot List</span>
                </div>
                <div class="panel-menu admin-form pn">
                  <!-- Panel Break Smart Widget -->
                  <div class="smart-widget sm-right smr-50">
                    <label class="field">
                      <input type="text" name="sub" id="sub" class="gui-input br-n" placeholder="Add Social Network">
                    </label>
                    <button type="submit" class="button br-n br-l">
                      <i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="panel-body pn">
                  <table class="table mbn tc-med-1 tc-bold-last">
                    <thead>
                      <tr class="hidden">
                        <th>#</th>
                        <th>First Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="fa fa-circle text-warning fs14 mr10"></span>Behance</td>
                        <td>24%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-circle text-info fs14 mr10"></span>Twitter</td>
                        <td>7%</td>
                      </tr>
                      <tr>
                        <td class="va-m fw600 text-muted">
                          <span class="fa fa-circle text-primary fs14 mr10"></span>Facebook</td>
                        <td>14%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Country List -->
              <div class="panel" id="p16">
                <div class="panel-heading">
                  <span class="panel-title">Country List</span>
                </div>
                <div class="panel-body pn">
                  <table class="table mbn tc-med-1 tc-bold-last">
                    <thead>
                      <tr class="hidden">
                        <th>#</th>
                        <th>First Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="flag-xs flag-us mr5 va-b"></span>United States</td>
                        <td>24%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="flag-xs flag-de mr5 va-b"></span>Germany</td>
                        <td>7%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="flag-xs flag-fr mr5 va-b"></span>France</td>
                        <td>14%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="flag-xs flag-tr mr5 va-b"></span>Turkey</td>
                        <td>31%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="flag-xs flag-es mr5 va-b"></span>Spain</td>
                        <td>22%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Search List -->
              <div class="panel" id="p17">
                <div class="panel-heading">
                  <span class="panel-title">Crawler List</span>
                </div>
                <div class="panel-body pn">
                  <table class="table mbn tc-med-1 tc-bold-last">
                    <thead>
                      <tr class="hidden">
                        <th>#</th>
                        <th>First Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="favicons google va-t mr10"></span>pages.com/article/7</td>
                        <td>24%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="favicons google va-t mr10"></span>pages.com/img/15</td>
                        <td>7%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="favicons yahoo va-t mr10"></span>pages.com/popular</td>
                        <td>14%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="favicons google va-t mr10"></span>pages.com/news/3</td>
                        <td>31%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="favicons bing va-t mr10"></span>pages.com/featured/16</td>
                        <td>22%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Browser List -->
              <div class="panel" id="p18">
                <div class="panel-heading">
                  <span class="panel-title">Browser List</span>
                </div>
                <div class="panel-body pn">
                  <table class="table mbn tc-med-1 tc-bold-2">
                    <thead>
                      <tr class="hidden">
                        <th>#</th>
                        <th>First Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="favicons chrome va-t mr10"></span>United States</td>
                        <td>39%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="favicons firefox va-t mr10"></span>Germany</td>
                        <td>43%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="favicons ie va-t mr10"></span>France</td>
                        <td>14%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="favicons safari va-t mr10"></span>Spain</td>
                        <td>3%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Icon List -->
              <div class="panel" id="p19">
                <div class="panel-heading">
                  <span class="panel-title">Icon List</span>
                </div>
                <div class="panel-body pn">
                  <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                    <thead>
                      <tr class="hidden">
                        <th class="mw30">#</th>
                        <th>First Name</th>
                        <th>Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="fa fa-desktop text-warning"></span>
                        </td>
                        <td>T.V.</td>
                        <td>
                          <i class="fa fa-caret-up text-info pr10"></i>$855,913</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-microphone text-primary"></span>
                        </td>
                        <td>Radio</td>
                        <td>
                          <i class="fa fa-caret-down text-danger pr10"></i>$349,712</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-newspaper-o text-info"></span>
                        </td>
                        <td>Paper</td>
                        <td>
                          <i class="fa fa-caret-up text-info pr10"></i>$95,342</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-android text-alert"></span>
                        </td>
                        <td>Android</td>
                        <td>
                          <i class="fa fa-caret-up text-info pr10"></i>$452,672</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-power-off text-system"></span>
                        </td>
                        <td>Digital</td>
                        <td>
                          <i class="fa fa-caret-up text-info pr10"></i>$12,352</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Dot Stats -->
              <div class="panel" id="p20">
                <div class="panel-heading">
                  <span class="panel-title">Dot/Addon Stats</span>
                </div>
                <div class="panel-body pn">
                  <table class="table mbn tc-med-1 tc-bold-last ">
                    <thead>
                      <tr class="hidden">
                        <th>#</th>
                        <th>First Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="fa fa-circle text-warning fs14 mr10"></span>Behance</td>
                        <td>24%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-circle text-info fs14 mr10"></span>Twitter</td>
                        <td>7%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-circle text-primary fs14 mr10"></span>Facebook</td>
                        <td>14%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-circle text-alert fs14 mr10"></span>Google Plus</td>
                        <td>24%</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-circle text-system fs14 mr10"></span>Dribble</td>
                        <td>7%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Text List -->
              <div class="panel" id="p21">
                <div class="panel-heading">
                  <span class="panel-title">Text List</span>
                </div>
                <div class="panel-body pn">
                  <table class="table mbn tc-list-1 tc-text-muted-2 tc-fw600-2">
                    <thead>
                      <tr class="hidden">
                        <th class="w30">#</th>
                        <th>First Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td>Lorem ipsum dolor sit</td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Lorem ipsc beyond ray</td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Amet, consectetur adipi</td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Lorem consec iscing</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- end: .col-md-3-->

          </div>
          <!-- end: .row -->

        </div>

      </section>
      <!-- End: Content -->

      <!-- Begin: Page Footer -->
      <footer id="content-footer">
        <div class="row">
          <div class="col-md-6">
            <span class="footer-legal">© 2015 AdminDesigns</span>
          </div>
          <div class="col-md-6 text-right">
            <span class="footer-meta">10GB of <b>250GB</b> Free</span>
            <a href="#content" class="footer-return-top">
              <span class="fa fa-arrow-up"></span>
            </a>
          </div>
        </div>
      </footer>
      <!-- End: Page Footer -->

    </section>
    <!-- End: Content-Wrapper -->

    <!-- Start: Right Sidebar -->
    <aside id="sidebar_right" class="nano affix">

      <!-- Start: Sidebar Right Content -->
      <div class="sidebar-right-content nano-content">

        <div class="tab-block sidebar-block br-n">
          <ul class="nav nav-tabs tabs-border nav-justified hidden">
            <li class="active">
              <a href="#sidebar-right-tab1" data-toggle="tab">Tab 1</a>
            </li>
            <li>
              <a href="#sidebar-right-tab2" data-toggle="tab">Tab 2</a>
            </li>
            <li>
              <a href="#sidebar-right-tab3" data-toggle="tab">Tab 3</a>
            </li>
          </ul>
          <div class="tab-content br-n">
            <div id="sidebar-right-tab1" class="tab-pane active">

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

              <h5 class="title-divider text-muted mt40 mb20"> User Activity
                <span class="pull-right text-primary fw600">1 Hour</span>
              </h5>

              <div class="media">
                <a class="media-left" href="#">
                  <img src="assets/img/avatars/6.jpg" class="mw40 br64" alt="holder-img">
                </a>
                <div class="media-body">
                  <h5 class="media-heading">Article
                    <small class="text-muted">- 08/16/22</small>
                  </h5>Updated 36 days ago by
                  <a class="text-system" href="#"> Max </a>
                </div>
              </div>
              <div class="media">
                <a class="media-left" href="#">
                  <img src="assets/img/avatars/4.jpg" class="mw40 br64" alt="holder-img">
                </a>
                <div class="media-body">
                  <h5 class="media-heading">Richard
                    <small class="text-muted">@cloudesigns</small>
                    <small class="pull-right text-muted">6h</small>
                  </h5>Updated 36 days ago by
                  <a class="text-system" href="#"> Max </a>
                </div>
              </div>
              <div class="media">
                <a class="media-left" href="#">
                  <img src="assets/img/avatars/3.jpg" class="mw40 br64" alt="holder-img">
                </a>
                <div class="media-body">
                  <h5 class="media-heading">1,610 kcal
                    <span class="fa fa-caret-down text-primary pl5"></span>
                  </h5>Updated 36 days ago by
                  <a class="text-system" href="#"> Max </a>
                </div>
              </div>
              <div class="media">
                <a class="media-left" href="#">
                  <img src="assets/img/avatars/2.jpg" class="mw40 br64" alt="holder-img">
                </a>
                <div class="media-body">
                  <h5 class="media-heading">1,610 kcal
                    <span class="label label-xs label-system ml5">Featured</span>
                  </h5>Updated 36 days ago by
                  <a class="text-system" href="#"> Max </a>
                </div>
              </div>
              <div class="media">
                <a class="media-left" href="#">
                  <img src="assets/img/avatars/5.jpg" class="mw40 br64" alt="holder-img">
                </a>
                <div class="media-body">
                  <h5 class="media-heading">1,610 kcal</h5>
                  Updated ago by
                  <a class="text-system" href="#"> Max </a>
                </div>
                <a class="media-right pl30" href="#">
                  <span class="fa fa-pencil text-muted mb5"></span>
                  <br>
                  <span class="fa fa-remove text-danger-light"></span>
                </a>
              </div>
            </div>
            <div id="sidebar-right-tab2" class="tab-pane"></div>
            <div id="sidebar-right-tab3" class="tab-pane"></div>
          </div>
          <!-- end: .tab-content -->
        </div>

      </div>
    </aside>
    <!-- End: Right Sidebar -->

  </div>
  <!-- End: Main -->

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- HighCharts Plugin -->
  <script src="vendor/plugins/highcharts/highcharts.js"></script>

  <!-- Sparklines Plugin -->
  <script src="vendor/plugins/sparkline/jquery.sparkline.min.js"></script>

  <!-- Simple Circles Plugin -->
  <script src="vendor/plugins/circles/circles.js"></script>

  <!-- JvectorMap Plugin + US Map (more maps in plugin/assets folder) -->
  <script src="vendor/plugins/jvectormap/jquery.jvectormap.min.js"></script>
  <script src="vendor/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script> 

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/demo/demo.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Widget Javascript -->
  <script src="assets/js/demo/widgets.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core      
    Core.init();

    // Init Demo JS
    Demo.init();

    // Init Widget Demo JS
    // demoHighCharts.init();

    // Because we are using Admin Panels we use the OnFinish 
    // callback to activate the demoWidgets. It's smoother if
    // we let the panels be moved and organized before 
    // filling them with content from various plugins

    // Init plugins used on this page
    // HighCharts, JvectorMap, Admin Panels

    // Init Admin Panels on widgets inside the ".admin-panels" container
    $('.admin-panels').adminpanel({
      grid: '.admin-grid',
      draggable: true,
      preserveGrid: true,
      mobile: false,
      onStart: function() {
        // Do something before AdminPanels runs
      },
      onFinish: function() {
        $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

        // Init the rest of the plugins now that the panels
        // have had a chance to be moved and organized.
        // It's less taxing to organize empty panels
        demoHighCharts.init();
        runVectorMaps(); // function below
      },
      onSave: function() {
        $(window).trigger('resize');
      }
    });

    // Widget VectorMap
    function runVectorMaps() {

      // Jvector Map Plugin
      var runJvectorMap = function() {
        // Data set
        var mapData = [900, 700, 350, 500];
        // Init Jvector Map
        $('#WidgetMap').vectorMap({
          map: 'us_lcc_en',
          //regionsSelectable: true,
          backgroundColor: 'transparent',
          series: {
            markers: [{
              attribute: 'r',
              scale: [3, 7],
              values: mapData
            }]
          },
          regionStyle: {
            initial: {
              fill: '#E5E5E5'
            },
            hover: {
              "fill-opacity": 0.3
            }
          },
          markers: [{
            latLng: [37.78, -122.41],
            name: 'San Francisco,CA'
          }, {
            latLng: [36.73, -103.98],
            name: 'Texas,TX'
          }, {
            latLng: [38.62, -90.19],
            name: 'St. Louis,MO'
          }, {
            latLng: [40.67, -73.94],
            name: 'New York City,NY'
          }],
          markerStyle: {
            initial: {
              fill: '#a288d5',
              stroke: '#b49ae0',
              "fill-opacity": 1,
              "stroke-width": 10,
              "stroke-opacity": 0.3,
              r: 3
            },
            hover: {
              stroke: 'black',
              "stroke-width": 2
            },
            selected: {
              fill: 'blue'
            },
            selectedHover: {}
          },
        });
        // Manual code to alter the Vector map plugin to 
        // allow for individual coloring of countries
        var states = ['US-CA', 'US-TX', 'US-MO',
          'US-NY'
        ];
        var colors = [bgWarningLr, bgPrimaryLr, bgInfoLr, bgAlertLr];
        var colors2 = [bgWarning, bgPrimary, bgInfo, bgAlert];
        $.each(states, function(i, e) {
          $("#WidgetMap path[data-code=" + e + "]").css({
            fill: colors[i]
          });
        });
        $('#WidgetMap').find('.jvectormap-marker')
          .each(function(i, e) {
            $(e).css({
              fill: colors2[i],
              stroke: colors2[i]
            });
          });
      }

      if ($('#WidgetMap').length) {
        runJvectorMap();
      }
    }



  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>
</html>
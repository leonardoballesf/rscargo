<?php Session::init(); ?>
<!doctype html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title><?= (isset($this->title)) ? $this->title : 'MVC'; ?></title>

  <!-- Stylesheet -->
  <?php
  echo PHP_EOL;
  if (isset($this->app->css)) {
    foreach ($this->app->css as $css) {
      echo '<link rel="stylesheet" type="text/css" href="' . URL . 'public/' . $css . '">' . PHP_EOL;
    }
  }

  if (isset($this->template->css)) {
    foreach ($this->template->css as $css) {
      echo '<link rel="stylesheet" type="text/css" href="' . URL . 'public/template/' . $css . '">' . PHP_EOL;
    }
  }
  echo '<!-- Stylesheet -->' . PHP_EOL;

  /*<!-- Favicon -->*/

  print($this->html->favicon(
    'public/template/assets/img/favicon.ico',
    array(
      "rel" => "shortcut icon"
    )
  ));
  ?>
</head>

<body class="ecommerce-page sb-l-o sb-r-c">
  <!-- Start: Main -->
  <div id="main">
    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top bg-danger">
      <!--<div class="navbar-branding">-->
      <?php
      //            print($this->html->link('<p class="dropcap dropcap-danger dropcap-fill">'.''.'</p>',
      //                    array(
      //                        'controller' => 'Index',
      //                        'action' => '',
      //                        'class'=>'navbar-brand'
      //                    )
      //                  )
      //            ); 
      ?>
      <!--</div>-->

      <ul class="nav navbar-nav navbar-left">

        <li>
          <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
        </li>

        <?php if (Session::get('role') == 3) : ?>

          <li>
            <a class="topbar-menu-toggle" id="seguridad" href="#">
              <span class="ad glyphicons glyphicons-shield fs18"></span>
            </a>
          </li>
          <li>
            <a class="topbar-menu-toggle" id="contactos" href="#">
              <span class="ad glyphicons glyphicons-adress_book fs18"></span>
            </a>
          </li>
          <li>
            <a class="topbar-menu-toggle" id="mantenimiento" href="#">
              <span class="ad glyphicons glyphicons-show_thumbnails fs18"></span>
            </a>
          </li>
          <li>
            <a class="topbar-menu-toggle" id="configuracion" href="#">
              <span class="ad glyphicons glyphicons-adjust_alt fs18"></span>
            </a>
          </li>

        <?php endif; ?>


      </ul>

      <ul class="nav navbar-nav navbar-right">


        <!--        <li class="menu-divider hidden-xs">
          <i class="fa fa-circle"></i>
        </li>-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
            <?php
            print($this->html->image(
              URL . 'public/template/assets/img/avatars/avatar.png',
              array(
                "class" => 'mw30 br64 mr15',
                "alt" => 'login'
              )
            ));
            echo Session::get('description');
            ?>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w300" role="menu">

            <!-- <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Perfil de Usuario </a>
            </li> -->
            <li class="list-group-item">
              <?php
              print($this->html->link(
                '<span class="fa fa-power-off"></span> Salir',
                array(
                  'controller' => 'Login',
                  'action' => 'Logout',
                  'class' => 'animated animated-short fadeInUp'
                )
              ));
              ?>
            </li>
          </ul>
        </li>
      </ul>

    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-primary sidebar-default affix has-scrollbar sidebar-light light has-scrollbar">

      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

          <!-- Sidebar Widget - Menu (Slidedown) -->
          <div class="sidebar-widget menu-widget menu-widget-open" style="display: block;background-color: #FFFFFF !important;">

            <div class="row text-center mbn">
              <div class="col-md-4 ">
                <?php
                print($this->html->image(
                  Session::get('business_logo'),
                  array(
                    "class" => 'hidden-xs',
                    "height" => "110",
                    "width" => "208",
                    "alt" => '' . Session::get('business_description') . ''
                  )
                ));
                ?>
              </div>
            </div>
          </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu" id="MenuLeft">

          <li>

            <a class="accordion-toggle menu-open" id="op_principal" href="#">
              <span class="fa fa-dashboard"></span>
              <span class="sidebar-title sidebar-label text-muted fs12">Menu Principal</span>
              <span class="caret"></span>
            </a>

            <ul class="nav sub-nav">

              <li id="v_menu_index" menu="op_principal">
                <?php
                print($this->html->link(
                  '<span class="glyphicon glyphicon-home"></span>Inicio',
                  array(
                    'controller' => 'Index',
                    'action' => '',
                    'target' => '_parent'
                  )
                ));
                ?>
              </li>

              <li id="v_menu_customers" menu="op_principal">
                <?php
                print($this->html->link(
                  '<span class="fa fa-users"></span> Clientes',
                  array(
                    'controller' => 'Customers',
                    'action' => ''
                  )
                ));
                ?>
              </li>


              <li id="v_menu_packages" menu="op_principal">
                <?php
                print($this->html->link(
                  '<span class="fa fa-archive"></span> Paquetes',
                  array(
                    'controller' => 'Packages',
                    'action' => ''
                  )
                ));
                ?>
              </li>

              <li id="v_menu_resumen" menu="op_principal">
                <?php
                print($this->html->link(
                  '<span class="fa fa-money"></span> Resumen',
                  array(
                    'controller' => 'Summary',
                    'action' => ''
                  )
                ));
                ?>
              </li>

              <li id="v_menu_notifications" menu="op_principal">
                <?php
                print($this->html->link(
                  '<span class="fa fa-envelope-o"></span> Notificaciones',
                  array(
                    'controller' => 'Notifications',
                    'action' => ''
                  )
                ));
                ?>
              </li>
              <!-- <li id="v_menu_packages" menu="op_principal">
                <?php
                /* print($this->html->link('<span class="fa fa-usd"></span> Tarifas',
                        array(
                            'controller' => 'Tariffs',
                            'action' => ''
                        )
                      )
                );  */
                ?>                    
              </li> -->

            </ul>
          </li>

          <?php if (Session::get('role') == 3) : ?>

            <li>
              <a class="accordion-toggle" id="op_seguridad" href="#">
                <span class="fa fa-shield"></span>
                <span class="sidebar-title sidebar-label text-muted fs12">Seguridad</span>
                <span class="caret"></span>
              </a>

              <ul class="nav sub-nav">

                <li id="hs_menu_sellers" menu="op_seguridad">
                  <?php
                  print($this->html->link(
                    '<span class="fa fa-address-card-o" aria-hidden="true"></span>Empleados',
                    array(
                      'controller' => 'Sellers',
                      'action' => ''
                    )
                  ));
                  ?>
                </li>

                <li id="vs_menu_users" menu="op_seguridad">
                  <?php
                  print($this->html->link(
                    '<span class="fa fa-user-circle" aria-hidden="true"></span>Usuarios',
                    array(
                      'controller' => 'Users',
                      'action' => ''
                    )
                  ));
                  ?>
                </li>

              </ul>
            </li>

          <?php endif; ?>





        </ul>

      </div>
      <!-- End: Sidebar Left Content -->
    </aside>


    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <?php if (Session::get('role') == 3) : ?>

        <!-- Start: Topbar-Dropdown -->
        <div id="topbar-dropmenu" class="mantenimiento">
          <div class="topbar-menu row">

            <div class="container-fluid">

              <?php /*ACCESO DIRECTO MENU ADMINISTRADOR*/ ?>


              <div class="col-sm-2">
                <?php
                print($this->html->link(
                  '<span class="metro-icon glyphicons glyphicons-usd fs30"></span>
                                         <p class="metro-title-template">Tarifas</p>',
                  array(
                    'controller' => 'Tariffs',
                    'action' => '',
                    'class' => 'metro-tile'
                  )
                ));
                ?>
              </div>

            </div>


            <?php /*FIN ACCESO DIRECTO MENU ADMINISTRADOR*/ ?>

          </div>
        </div>
        <!-- End: Topbar-Dropdown -->

        <!-- Start: Topbar-Dropdown -->
        <div id="topbar-dropmenu" class="seguridad">
          <div class="topbar-menu row">

            <div class="container-fluid">
              <?php /*ACCESO DIRECTO MENU ADMINISTRADOR*/ ?>
              <div class="col-sm-2">
                <?php
                print($this->html->link(
                  '<span class="metro-icon glyphicons glyphicons-vcard fs30"></span>
                                         <p class="metro-title-template">Empleados</p>',
                  array(
                    'controller' => 'Sellers',
                    'action' => '',
                    'class' => 'metro-tile'
                  )
                ));
                ?>
              </div>
              <div class="col-sm-2">
                <?php
                print($this->html->link(
                  '<span class="metro-icon glyphicon glyphicon-user fs30"></span>
                                         <p class="metro-title-template">Usuarios</p>',
                  array(
                    'controller' => 'Users',
                    'action' => '',
                    'class' => 'metro-tile'
                  )
                ));
                ?>
              </div>

              <div class="col-sm-2">
                <?php
                print($this->html->link(
                  '<span class="metro-icon glyphicons glyphicons-adjust_alt fs30"></span>
                                         <p class="metro-title-template">Configuración</p>',
                  array(
                    'controller' => 'Business',
                    'action' => '',
                    'class' => 'metro-tile'
                  )
                ));
                ?>
              </div>

            </div>


            <?php /*FIN ACCESO DIRECTO MENU ADMINISTRADOR*/ ?>

          </div>
        </div>
        <!-- End: Topbar-Dropdown -->

        <!-- Start: Topbar-Dropdown -->
        <div id="topbar-dropmenu" class="contactos">
          <div class="topbar-menu row">

            <div class="container-fluid">
              <?php /*ACCESO DIRECTO MENU ADMINISTRADOR*/ ?>
              <div class="col-sm-2">
                <?php
                print($this->html->link(
                  '<span class="metro-icon glyphicons glyphicons-parents fs30"></span>
                                         <p class="metro-title-template" >Clientes</p>',
                  array(
                    'controller' => 'Customers',
                    'action' => '',
                    'class' => 'metro-tile'
                  )
                ));
                ?>
              </div>


            </div>


            <?php /*FIN ACCESO DIRECTO MENU ADMINISTRADOR*/ ?>

          </div>
        </div>
        <!-- End: Topbar-Dropdown -->

        <!-- Start: Topbar-Dropdown -->
        <div id="topbar-dropmenu" class="configuracion">
          <div class="topbar-menu row">

            <div class="container-fluid">
              <?php /*ACCESO DIRECTO MENU ADMINISTRADOR*/ ?>
              <div class="col-sm-2">
                <?php
                print($this->html->link(
                  '<span class="metro-icon glyphicons glyphicons-adjust_alt fs30"></span>
                                         <p class="metro-title-template">Configuración</p>',
                  array(
                    'controller' => 'Business',
                    'action' => '',
                    'class' => 'metro-tile'
                  )
                ));
                ?>
              </div>

            </div>


            <?php /*FIN ACCESO DIRECTO MENU ADMINISTRADOR*/ ?>

          </div>
        </div>
        <!-- End: Topbar-Dropdown -->


      <?php endif; ?>

      <!-- Start: Topbar -->
      <header id="topbar" class="ph10">
        <div class="topbar-left">
          <ul class="nav nav-list nav-list-topbar pull-left" id="MenuHeader">
            <li id="h_menu_index" menu="op_principal">
              <?php
              print($this->html->link(
                'Inicio',
                array(
                  'controller' => 'Index',
                  'action' => '',
                  'target' => '_parent'
                )
              ));
              ?>
            </li>
            <li id="h_menu_customers" menu="op_principal">
              <?php
              print($this->html->link(
                'Clientes',
                array(
                  'controller' => 'Customers',
                  'action' => '',
                  'target' => '_parent'
                )
              ));
              ?>
            </li>

          </ul>
        </div>


      </header>
      <!-- End: Topbar -->
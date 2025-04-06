<?php
    session_start();
    if($_SESSION['loggedIn']){
        header('location: ' . URL .  'Index');
        exit;
    }
?>
<!doctype html>
<html>
<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title><?=(isset($this->title)) ? $this->title : 'MVC'; ?></title>

  <!-- Font CSS (Via CDN) -->
  <!--<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>-->
   <?php 
    if (isset($this->template->css)) 
    {
        foreach ($this->template->css as $css)
        {
            echo '<link rel="stylesheet" type="text/css" href="'.URL.'public/template/'.$css.'">';
        }
    }
    ?>
  <!-- Favicon -->
  <link rel="shortcut icon" href="public/template/assets/img/favicon.ico">

</head>

<body class="external-page external-alt sb-l-c sb-r-c">

  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- Begin: Content -->
      <section id="content">

        <div class="admin-form theme-info mw500" id="login">

        <?php
        if(isset($this->msg)){
            print($this->msg);
        }
        //print('<pre>');print_r($_SESSION);print('</pre>');
        
        ?>  
            
          <!-- Login Panel/Form -->
          <div class="panel mt10 mb10">
          
              <div id="message" class="p10" style="padding-bottom:  0px 0px 0px 0px;" >
                  <img class="" src="/public/template/assets/img/logos/logo.png" width="480">
                      
              </div>
              
                      

              <form name="login_form" id="login_form" method="post" action="Login/run" >
              <div class="panel-body bg-light p10 pt5">

                <!-- Divider -->
                <div class="section-divider mv30">
                  <span>INICIO DE SESIÓN</span>
                </div>

                <!-- Username Input -->
                <div class="section">
                  <label for="username" class="field-label text-muted fs18 mb10">Usuario</label>
                  <label for="username" class="field prepend-icon">
                    <input type="text" name="username" id="username" class="gui-input" placeholder="Ingrese el Usuario">
                    <label for="username" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
                </div>

                <!-- Password Input -->
                <div class="section">
                  <label for="password" class="field-label text-muted fs18 mb10">Contraseña</label>
                  <label for="password" class="field prepend-icon">
                    <input type="password" name="password" id="password" class="gui-input" placeholder="Ingrese la Contraseña">
                    <label for="password" class="field-icon">
                      <i class="fa fa-lock"></i>
                    </label>
                  </label>
                </div>

                <div class="smart-widget sm-left sml-120">
                        <label for="verification" class="field prepend-icon">
                          <input type="text" name="verification" id="verification" class="gui-input" placeholder="Codigó de verificación">
                          <label for="verification" class="field-icon">
                            <i class="fa fa-shield"></i>
                          </label>
                        </label>
                        <label for="verification" class="button" id="label_verification"> </label>
                </div>                
                
                
              </div>
                     
              <div class="panel-footer clearfix">
                <button type="submit" class="button btn-danger mr10 pull-right">Ingresar</button>
              </div>
            </form>
          </div>
        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->
  </div>
  <!-- End: Main -->


 <!-- BEGIN: PAGE SCRIPTS -->
  <?php 
    if (isset($this->template->js)) 
    {
        foreach ($this->template->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'public/template/'.$js.'"></script>';
        }
    }
  ?>

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";
    // Init Theme Core      
   Core.init();

    $.validator.methods.smartCaptcha = function(value, element, param) {
      return value == param;
    };

    var a=Math.floor((Math.random() * 100) + 1);
    var b=Math.floor((Math.random() * 100) + 1);
    var label= a + b;
    $("#label_verification").html(a + " + " + b + " =");
    var captcha= label; 

    $("form#login_form").validate({
    
      /* @validation states + elements 
      ------------------------------------------- */
      errorClass: "state-error",
      validClass: "state-success",
      errorElement: "em",
      /* @validation rules 
      ------------------------------------------ */
    submitHandler: function(form) {
       
    var postData = $("form#login_form").serialize();
    var formURL =  $("form#login_form").attr("action");
    
    $.post( formURL, postData, null, null )
    .done(function( data, textStatus, jqXHR ) {
        
        var response=JSON.parse(JSON.stringify(data));
        
        if(response.message_type==1){

            var dialog = bootbox.dialog({
                title: 'MENSAJE DE INICIO DE SESIÓN',
                message: '<p><i class="fa fa-spin fa-spinner"></i> Espere por favor...</p>'
            });
            dialog.init(function(){
                setTimeout(function(){
                    localStorage.removeItem('h_menu_active_id');
                    localStorage.removeItem('v_menu_active_id');
                    localStorage.removeItem('op_menu-open'); 
                    dialog.find('.bootbox-body').html(response.message + ' ¡Usted será redireccionando a la página principal en unos segundos!');
                    setTimeout(function(){
                    location.href=response.redirect;
                    }, 3000);
                }, 3000);
            });
        
        }else{

            var dialog = bootbox.dialog({
                title: 'MENSAJE DE INICIO DE SESIÓN',
                message: '<p><i class="fa fa-spin fa-spinner"></i> Espere por favor...</p>'
            });
            dialog.init(function(){
                setTimeout(function(){
                    dialog.find('.bootbox-body').html(response.message);
                    setTimeout(function(){
                       dialog.modal('hide');        
                        //location.href=response.redirect;
                    }, 3000);
                }, 3000);
            });
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "La solicitud a fallado: " +  textStatus);
        }
    });
    },  
      rules: {
        username: {
          required: true
        },
        password: {
          required: true,
          minlength: 4,
          maxlength: 16
        },
        verification: {
          required: true,
          smartCaptcha: captcha
        }
      },
      /* @validation error messages 
      ---------------------------------------------- */
      messages: {
        username: {
          required: 'El nombre de usuario es requerido'
        },
        password: {
          required: 'La contraseña es requerida'
        },
        verification: {
          required: 'Ingrese el código de verificación',
          smartCaptcha: 'Error - Codigó de verificación incorrecto'
        }
      },

      /* @validation highlighting + error placement  
      ---------------------------------------------------- */

      highlight: function(element, errorClass, validClass) {    
        $(element).closest('.field').addClass(errorClass).removeClass(validClass);
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).closest('.field').removeClass(errorClass).addClass(validClass);
      },
      errorPlacement: function(error, element) {
        if (element.is(":radio") || element.is(":checkbox")) {
          element.closest('.option-group').after(error);
        } else {
          error.insertAfter(element.parent());
        }
      }
    });
  });
  </script>
  <!-- END: PAGE SCRIPTS -->
</body>
</html>
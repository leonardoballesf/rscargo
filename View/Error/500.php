      <!-- Begin: Content -->
      <section id="content" class="pn animated fadeIn">
        <div class="center-block mt50 mw800">
          <h1 class="error-title"> Error 500! </h1>
          <h2 class="error-subtitle"><?php print($this->msg);?></h2>
        </div>
          <?php
            print($this->html->link('<i class="fa fa-arrow-left fa-3x text-danger"></i><span> Regresar <br> al Inicio </span>',
                    array(
                        'controller' => 'Index',
                        'action' => '',
                        'class'=>'navbar-brand',
                        "id"=>'return-arrow'
                    )
                  )
            );           
          ?>
      </section>
      <!-- End: Content -->

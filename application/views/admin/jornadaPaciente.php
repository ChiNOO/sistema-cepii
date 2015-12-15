    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Sistema CEPII_control_jornadas</title>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />

        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>css/jquery-ui.min.css" rel="stylesheet" />
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
        <script type="text/javascript" src="<?php echo base_url('js/funciones.js') ?>"></script>
        <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/assets/img/icon.png">
        
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">

        <link href="<?php echo base_url(); ?>assets/css/jquery.tagit.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>assets/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
        <!--agregué esto-->
        <script type="text/javascript">
          function ver(url){
            location.href=url;
          }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#myTags").tagit();
            });
        </script>

        <script type="text/javascript">
        $(document).ready(function($){

           $('#nombreP').autocomplete({
            source:'<?php echo base_url('Paciente/show_Paciente');?>',
            minLength:1,
            // optional
            html: true,

            // optional (if other layers overlap the autocomplete list)
            open: function(event, ui) {
             $(".ui-autocomplete").css("z-index", 1000);
            }
           });
          });
        </script>

        <script type="text/javascript">
        $(document).ready(function($){

           $('#Espacio').autocomplete({
            source:'<?php echo base_url('espacios/show_Espacios_G');?>',
            minLength:1,
            // optional
            html: true,

            // optional (if other layers overlap the autocomplete list)
            open: function(event, ui) {
             $(".ui-autocomplete").css("z-index", 1000);
            }
           });
          });
        </script>

        <script type="text/javascript">
        $(document).ready(function($){

           $('#Nombrep').autocomplete({
            source:'<?php echo base_url('Profesionales/show_profesionals');?>',
            minLength:1,
            // optional
            html: true,

            // optional (if other layers overlap the autocomplete list)
            open: function(event, ui) {
             $(".ui-autocomplete").css("z-index", 1000);
            }
           });
          });
        </script>

    <!--Agregué esto para que autocomplete a pacientes-->
      <script type="text/javascript">
        $(document).ready(function($){

           $('#Persona').autocomplete({
            source:'<?php echo base_url('Paciente/show_patient');?>',
            minLength:1,
            // optional
            html: true,

            // optional (if other layers overlap the autocomplete list)
            open: function(event, ui) {
             $(".ui-autocomplete").css("z-index", 1000);
            }
           });
          });
        </script>

<!--Hasta aquí-->
<!--Atocompletar jornadas-->
  <script type="text/javascript">
        $(document).ready(function($){

           $('#Tservicio').autocomplete({
            source:'<?php echo base_url('jornadas/show_jor');?>',
            minLength:1,
            // optional
            html: true,

            // optional (if other layers overlap the autocomplete list)
            open: function(event, ui) {
             $(".ui-autocomplete").css("z-index", 1000);
            }
           });
          });
        </script>


<!--Hasta aquí-->
    </head>
    <body style="background-color:#e5e5e5;">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header" style="margin:5px;">
            <img src="<?php echo base_url(); ?>assets/img/logo.png">
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav" style="margin:5px;">
                <li><a style="color:#FFF; font-size:45px;"> CEPII</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <div style="color:#FFF;">
                        <i class="fa fa-user"></i>     Administrador
                        <span class="caret"></span>
                    </div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Perfil</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url().'login/logout'?>">Cerrar Sesión</a></li>
                  </ul>
                </li>
              </ul>
          </div>
        </div>
      </nav>


      <section class="menu-section">
        <div>
          <div class="row">
            <div class="col-md-12">
              <div class="navbar-collapse collapse ">
                <ul id="menu-top" class="nav navbar-nav navbar-right">
                  <li>
                    <a href="<?php echo base_url().'Agenda'; ?>">
                      <div>
                        <i class="fa fa-calendar"></i>     Agenda
                      </div>
                    </a>
                  </li>
                                                                                      <li>
                    <a href="<?php echo base_url().'Paciente'; ?>">
                      <div>
                        <i class="fa fa-users"></i>     Pacientes
                      </div>
                    </a>
                  </li>
                  <li>
                   <a href="<?php echo base_url().'Donativos'; ?>">
                      <div>
                        <i class="fa fa-money"></i>     Donativos
                      </div>
                    </a>
                  </li>
                  <li>
                  <li class="dropdown">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <div>
                          <i class="fa fa-file-text-o"></i>     Administración
                          <span class="caret"></span>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url().'Profesionales'; ?>">Profesionales</a></li>
                      <li><a href="<?=base_url()?>espacios/">Espacios</a></li>
                      <li><a href="<?=base_url()?>conferencias/">Conferencias</a></li>
                      <li><a href="<?=base_url()?>cursos_taller/">Cursos</a></li>
                      <li><a href="<?=base_url()?>jornadas/">Jornadas</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="">
                      <div>
                        <i class="fa fa-bar-chart"></i>     Reportes
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- Tabla -->

    <div class="content-wrapper" style="background-color: #e5e5e5; margin-top: 0px;">
      <br>
      
      <div id="Conferencias" class="tab">
        <table class="table">
          <thead>
            <tr>
              <th>Nombre del paciente</th>
            </tr>
          </thead>

          <?php foreach ($query as $row): ?>
            <tr>  
              <td><?php echo $row->nombrePersona.' '.$row->apaPersona.' '.$row->amaPersona; ?></td>
            </tr>
          <?php endforeach ?>
        </table>


      </div>
    </div>
            
      <!-- Pie de página-->

      <footer style="width: 100%;border-top: 1px solid #fff;bottom: 0; position: fixed; padding: 0rem;">
        <div class="container">
              &copy; 2015 SISTEMA CEPII | BY : <a href="http://www.uv.mx/Fei/" target="_blank">FEI UV</a>
        </div>
      </footer>

    </body>
</html>
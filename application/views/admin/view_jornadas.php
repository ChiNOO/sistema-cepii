<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Sistema CEPII_control_conferencias</title>
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
      <ul  class="nav nav-pills">
        <li  data-toggle="tab">
          <a href="#2b" data-toggle="tab">
            <i class="fa fa-heartbeat"></i>     Jornadas
          </a>
        </li>

        <li data-toggle="tab" >
          <a href="#5b" data-toggle="tab">
            <i class="fa fa-file-text-o"></i>     Registrar Jornadas
          </a>
        </li>
      </ul>

      <div style="background-color:#e5e5e5; height: 0px;"></div>

      <div class="tab-content clearfix">
        <div class="tab-pane" id="1b">
          <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
        </div>
        <div class="tab-pane active" id="2b">
          <!-- Table -->
          <table class="table">
            <tr>
              <td>
                <input data-provide="datepicker" data-provide="timepicker">

              </td>
              <td>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Ciudad</th>
                      <th>Municipio</th>
                      <th>Calle</th>
                      <th>C-P</th>
                      <th>Donativo</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Fin</th>
                    </tr>
                  </thead>  
                  <tbody>
                    <td>Ama tu vida</td><td>Xalapa</td><td>Xalapa, Ver</td><td>Avenida Xalapa</td><td>91130</td><td>300</td><td>1 Diciembre 2015</td><td>20 Diciembre 2015</td>                
                  </tbody>             
                </table>
              </td>
            </tr>
          </table>

           <!-- fin Table -->
        </div>

        <div class="tab-pane" id="3b">
          <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
        </div>
        <div class="tab-pane" id="4b">
          <h3>We use css to change the background color of the content to be equal to the tab</h3>
        </div>


        <div class="tab-pane" id="5b">
          <?=  form_open(base_url().'Conferencias/new_conference')?>
          <h2 style="text-align:center;">Datos Jornadas</h2>
          <br>

          <div style="margin-left:5px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon1" >Nombre de Conferencia</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon1" name="TemaConferencia" placeholder="Ejemplo: Ama tu cuerpo">
              </div>

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon1" >Ciudad</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon1" name="TemaConferencia" placeholder="Ejemplo: Xalapa">
              </div>

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon3" >Municipio</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon3" name="TemaConferencia" placeholder="Ejemplo: Xalapa, Ver">
              </div>
              
            </div>
          </div>

          <div style="margin-left:5px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon4" >Calle</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon4" name="TemaConferencia" placeholder="Ejemplo: Avenida Xalapa">
              </div>

             <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon5" >C-P</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon5" name="TemaConferencia" placeholder="Ejemplo: 91130">
              </div>

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon5" >Donativo</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon5" name="TemaConferencia" placeholder="Ejemplo: 400">
              </div>

            </div>
          </div>

          <div style="margin-left:5px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

            <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon4" >Fecha de Inicio</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon4" name="TemaConferencia" placeholder="Ejemplo: 1 Diciembre 2015">
              </div>

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon4" >Fecha de Fin</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon4" name="TemaConferencia" placeholder="Ejemplo: 7 Diciembre 2015">
              </div>

            </div>
          </div>

          <br>

          <input type="submit"  value="Guardar" class="btn btn-primary btn-lg pull-right" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">
          <br><br>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </div>


  <!-- Pie de página-->

  <footer style="width: 100%;border-top: 1px solid #fff;bottom: 0; position: fixed; padding: 0rem;">
    <div class="container">
          &copy; 2015 SISTEMA CEPII | BY : <a href="http://www.uv.mx/Fei/" target="_blank">FEI UV</a>
    </div>
  </footer>

</body>
<script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function() {
    jQuery("#datepicker").datepicker();
});
</script>
</html>
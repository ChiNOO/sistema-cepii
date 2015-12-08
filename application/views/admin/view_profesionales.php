<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Sistema CEPII</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/jquery-ui.min.css" rel="stylesheet" />
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/icon.png">
</head>
<body style="background-color:#e5e5e5;">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header" style="margin:5px;">
        <img src="assets/img/logo.png">
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
    <div >
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
                <a href="">
                  <div>
                    <i class="fa fa-users"></i>     Pacientes
                  </div>
                </a>
              </li>
              <li>
                <a href="">
                  <div>
                    <i class="fa fa-money"></i>     Donativos
                  </div>
                </a>
              </li>
              <li class="dropdown">
                <a href="#" class="menu-top-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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

  <div class="content-wrapper" style="background-color: #e5e5e5; margin-top:0px;">
    <br>
    <div id="exTab3" class="tab"> 
      <ul  class="nav nav-pills">
        <li>
          <a>
            <i class="fa fa-heartbeat"></i>     Gestión de profesionales
          </a>
        </li>
        <li class="active" data-toggle="tab">
          <a href="#1b" data-toggle="tab">
            <i class="fa fa-user-md"></i>     Habilitados
          </a>
        </li>
        <div>
          <input type="submit" href="http://www.google.col-md-12"  value="Nuevo" class="btn btn-primary btn-lg pull-right" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">
        </div> 
      </ul>

      <div style="background-color:#e5e5e5; height:3px;"></div>

      <div class="tab-content clearfix">
        <div class="tab-pane active" id="1b">
          <!-- Table -->
          <table class="table">
            <tr>
              <td>
                <table class="table">
                  <?php foreach($query as $row): ?>
                  <tr style="margin-top:5px; margin-bottom:5px;">
                    <td>
                      <?php echo $row->cedulaProfesional; ?>
                    </td>
                    <td>
                      <i class="fa fa-user-md"></i>     Dr.(a) <?php echo $row->nombrePro.' '.$row->apaPro.' '.$row->amaPro; ?>                      
                    </td>
                    <td>
                      <i class="fa fa-mobile"></i>     <?php echo $row->celPro; ?>
                    </td>
                    <td>
                      <i class="fa fa-envelope-o"></i>    <?php echo $row->correo; ?>
                    </td>
                    <td>
                      <?php echo $row->ramaMedica; ?>
                    </td>
                    <td>
                      <?php echo $row->usuario; ?>
                    </td>
                    <td>
                      <button style="background-color:#f4d2e1">
                        <i class="fa fa-pencil-square-o">
                          Editar Datos
                        </i>
                      </button>
                    </td>
                    <td>
                      <button style="background-color:#F30000; color:#FFF">
                        <i class="fa fa-trash-o">
                          Eliminar
                        </i>
                      </button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </table>
              </td>
            </tr>
          </table>
        </div>
        <div class="tab-pane" id="3b">
          <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
        </div>
        <div class="tab-pane" id="4b">
          <h3>We use css to change the background color of the content to be equal to the tab</h3>
        </div>
        <div class="tab-pane" id="5b">
          <?=form_open(base_url().'citas/new_appointment')?>
          <h2 style="text-align:center;">Datos del paciente</h2>
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-5">
                <span class="input-group-addon" id="sizing-addon2">Nombre Paciente</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="nombreP">
              </div>
              <div class="col-xs-3">
                <span class="input-group-addon" id="sizing-addon2">Teléfono</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="telP">
              </div>
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Sexo</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="sexoP">
              </div>
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Fecha Naciemiento</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="FNP">
              </div>
            </div>
          </div>
          <br>
          <div style="background-color:#e5e5e5; height:3px;"></div>

          <h2 style="text-align:center;">Datos del profesional</h2>
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-6">
                <span class="input-group-addon" id="sizing-addon2">Nombre Profesional</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="nombrePRO">
              </div>
              <div class="col-xs-3">
                <span class="input-group-addon" id="sizing-addon2">Area</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="area">
              </div>
              <div class="col-xs-3">
                <span class="input-group-addon" id="sizing-addon2">Teléfono</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="telPRO">
              </div>
            </div>
          </div> 
          <br>
          <div style="background-color:#e5e5e5; height:3px;"></div>

          <h2 style="text-align:center;">Datos de cita</h2>
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Fecha</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" data-provide="datepicker" id="datepicker" name="fecha">
              </div>
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Hora</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="hora">
              </div>
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Consultorio</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="consultorio">
              </div>
              <div class="col-xs-6">
                <span class="input-group-addon" id="sizing-addon2">Información Adicional</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="info">
              </div>
            </div>
          </div>
          <input type="submit"  value="Guardar" class="btn btn-primary btn-lg pull-right" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">
          <br><br>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </div>
  <!-- CONTENT-WRAPPER SECTION END-->
  
  <footer style="width: 100%;border-top: 2px solid #fff;bottom: 0; position: fixed; padding: 1rem;">
    <div class="container">
          &copy; 2015 SISTEMA CEPII | BY : <a href="http://www.uv.mx/Fei/" target="_blank">FEI UV</a>
    </div>
  </footer>

</body>
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function() {
    jQuery("#datepicker").datepicker();
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[name="hora"]').ptTimeSelect();
    });
</script>
</html>

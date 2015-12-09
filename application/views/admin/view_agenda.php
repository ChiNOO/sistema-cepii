  <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Sistema CEPII</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/jquery-ui.min.css" rel="stylesheet" />

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/icon.png">
    <script>
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
    <script>
    $(document).ready(function($){
     $('#nombrePRO').autocomplete({
      source:'<?php echo base_url('Profesionales/show_profesional');?>',
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
    <div >
      <div class="row">
        <div class="col-md-12">
          <div class="navbar-collapse collapse ">
            <ul id="menu-top" class="nav navbar-nav navbar-right">
              <li>
                <a class="menu-top-active" href="<?php echo base_url().'Agenda'; ?>">
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
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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

  <div class="content-wrapper" style="background-color: #e5e5e5; margin-top:0px;">
    <br>
    <div id="exTab3" class="tab">
      <ul  class="nav nav-pills">
        <li>
          <a>
            <i class="fa fa-calendar"></i>     Agenda
          </a>
        </li>
        <li class="active" data-toggle="tab">
          <a href="#2b" data-toggle="tab">
            <i class="fa fa-list"></i>     Diaria
          </a>
        </li>
        <li data-toggle="tab">
          <a href="#3b" data-toggle="tab">
            <i class="fa fa-table"></i>     Semanal
          </a>
        </li>
        <li data-toggle="tab">
          <a href="#4b" data-toggle="tab">
            <i class="fa fa-users"></i>     Diaria Global
          </a>
        </li>
        <li data-toggle="tab" style="background-color:#f4d2e1; border-radius:4px;">
          <a href="#5b" data-toggle="tab">
            <i class="fa fa-heart"></i>     Dar cita
          </a>
        </li>
        <div>
          <a href="<?php echo base_url().'Paciente'; ?>">
            <input type="submit" href="http://www.google.col-md-12"  value="Nuevo Paciente" class="btn btn-primary btn-lg pull-right" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">
          </a>
        </div> 
      </ul>

      <div style="background-color:#e5e5e5; height:3px;"></div>

      <div class="tab-content clearfix">
        <div class="tab-pane" id="1b">
          <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
        </div>
        <div class="tab-pane active" id="2b">
          <!-- Table -->
          <table class="table">
            <tr>
              <td>
                <input data-provide="datepicker">

              </td>
              <td>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Hora</th>
                      <th>Paciente</th>
                      <th>Profesional</th>
                      <th>Consultorio</th>
                      <th>Estado de la lista</th>
                      <th></th>
                    </tr>
                  </thead>

                  <?php foreach($query as $row): ?>
                  <tr style="margin-top:5px; margin-bottom:5px;">
                    <?php if($row->ramaMedica == "Psicología"): ?>
                      <td style="background-color:#F2DEDE">
                        <?php echo $row->hora; ?>
                      </td>
                    <?php endif; ?>

                    <?php if($row->ramaMedica == "Nutrición"): ?>
                      <td style="background-color:#BCE8F1">
                        <?php echo $row->hora; ?>
                      </td>
                    <?php endif; ?>

                    <?php if($row->ramaMedica == "Medicina"): ?>
                      <td style="background-color:#DFF0D8">
                        <?php echo $row->hora; ?>
                      </td>
                    <?php endif; ?>
                    <td>
                      <?php echo $row->nombrePaciente." ".$row->amaPaciente." ".$row->apaPaciente; ?>
                      <?php echo "<br>"; ?>
                      <a>
                        <i class="fa fa-mobile"></i>     <?php echo $row->celPaciente; ?>
                      </a>
                    </td>
                    <td>
                      <a>
                        <i class="fa fa-user-md"></i>     Dr.(a) <?php echo $row->nombrePro." ".$row->amaPro." ".$row->apaPro; ?>
                      </a>
                    </td>
                    <td>
                      <?php echo $row->consultorio; ?>
                    </td>
                    <td>
                      <select>
                        <option>Atendido</option>
                        <option>holo</option>
                        <option>casa</option>
                        <option>holo</option>
                        <option>casa</option>
                      </select>
                    </td>
                    <td>
                      <button style="background-color:#f4d2e1">Cancelar</button>
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
          <?=  form_open(base_url().'citas/new_appointment')?>
          <h2 style="text-align:center;">Datos del paciente</h2>
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-7">
                <span class="input-group-addon">Nombre Paciente</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" id="nombreP" name="nombreP">
              </div>
              <div class="col-xs-5">
                <span class="input-group-addon">Clave Paciente</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" id="claveP" name="claveP">
              </div>
            </div>
          </div>
          <br>
          <div style="background-color:#e5e5e5; height:3px;"></div>
          <h2 style="text-align:center;">Datos del profesional</h2>
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-12">
                <span class="input-group-addon" id="sizing-addon2">Nombre Profesional</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" id="nombrePRO" name="nombrePRO">
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
  jQuery(document).ready(function() {
      jQuery("#datepicker").datepicker();
  });
</script>



</html>

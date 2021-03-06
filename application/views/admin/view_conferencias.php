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

    <script>
    $(document).ready(function () {
    $("#Direccion").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url().'espacios/show_Espacios' ?>",
                dataType: "json",
                minLength:1,
                data: {
                    term: request.term,
                      },
                success: function(data) {
                    response(data);
                    //alert('You selected:');
                }
            });
        },
    });
    });
    </script>

    <script>
    $(document).ready(function () {
    $("#NombrePonente").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url().'Profesionales/show_profesionals' ?>",
                dataType: "json",
                minLength:1,
                data: {
                    term: request.term,
                      },
                success: function(data) {
                    response(data);
                    //alert('You selected:');
                }
            });
        },
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
            <i class="fa fa-microphone"></i>     Conferencias
          </a>
        </li>

        <li data-toggle="tab" >
          <a href="#5b" data-toggle="tab">
            <i class="fa fa-file-text-o"></i>     Registrar Conferencias
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
                <table class="table table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                      <th>Acompañantes</th>
                      <th>Ponentes</th>
                      <th>Máx. Asistentes</th>
                      <th>Lugar</th>
                      <th WIDTH=100>Fecha</th>
                      <th>Hora</th>
                      <th>Espacio</th>
                    </tr>
                  </thead>  
                  <?php                   
                    if ($enlaces!=FALSE){
                      foreach ($enlaces->result() as $row) {
                      echo "<tr>";
                      echo "<td>".$row->descripcion."</td>";
                      echo "<td>".$row->acompañantes."</td>";
                      echo "<td>".$row->nombrePonente."</td>";
                      echo "<td>".$row->numAsistentes."</td>";
                      echo "<td>".$row->lugar."</td>";
                      echo "<td>".$row->fecha."</td>";
                      echo "<td>".$row->hora."</td>";
                      echo "<td>".$row->direccion."</td>";
                      echo "<td><a href='".base_url()."conferencias/editar/$row->idConferencia'> <i class='fa fa-pencil'></i></a></td>";
                      echo "<td><a href='".base_url()."conferencias/eliminar/$row->idConferencia'> <i class='fa fa-times'></i></a></td>";        
                      echo "</tr>";
                      }   
                    }    
                    else{
                       echo "<div class='alert alert-warning'><p class='text-center'>No hay conferencias registradas</p></div>";
                        }
                  ?>            
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
          <?=  form_open(base_url().'Conferencias/agregarConferencia')?>
          <h2 style="text-align:center;">Datos Conferencia</h2>
          <br>

          <div style="margin-left:5px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon2">Descripción</span>
               <textarea class="form-control" rows="2" name="Descripcion"></textarea>
              </div>

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon3" >Nombre Ponente</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon3" name="NombrePonente" id="NombrePonente" placeholder="Ejemplo: Omar Farid Gómez Arcos">
              </div>

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon1" >Acompañantes</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon1" name="Acompañantes" placeholder="Ejemplo: Ing. Rafael Murrieta García">
              </div>
             
            </div>
          </div>

          <div style="margin-left:5px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon4" >Máximo número de Asistentes</span>
              <input type="number" class="form-control" aria-describedby="sizing-addon4" name="NumAsistentes" placeholder="Ejemplo: 50">
              </div>

             <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon5" >Lugar</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon5" name="Lugar" placeholder="Ejemplo: Centro CEPII">
              </div>

              <div class="col-xs-4">
                <span class="input-group-addon" id="sizing-addon6">Fecha</span>
                <input type="date" class="form-control" aria-describedby="sizing-addon6" data-provide="datepicker" id="datepicker" name="Fecha">
              </div>

            </div>
          </div>

          <div style="margin-left:5px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

            <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon4" >Hora</span>
              <input type="time" class="form-control" aria-describedby="sizing-addon4" name="Hora">
              </div>

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon4" >Espacio</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon4" name="Direccion" id="Direccion" placeholder="Ejemplo: Escuela Ricardo Flores Magón">
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
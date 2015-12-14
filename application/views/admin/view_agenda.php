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
    $(document).ready(function () {
    $("#espacio").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url().'espacios/show_Espacios' ?>",
                dataType: "json",
                minLength:1,
                data: {
                    term: request.term,
                    nombrePro: $("#nombrePRO").val(),
                    fecha:   $("#fecha").val(),
                    horaIni: $("#horaIni").val(),
                    horaFin: $("#horaFin").val(),
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
    $("#nombrePRO").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url().'Profesionales/show_profesional' ?>",
                dataType: "json",
                minLength:1,
                data: {
                    term: request.term,
                    ramaMedica: $("#ramaMedica").val(),
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

  <!--Agregué -->

<script type="text/javascript">
  function cancela(url){
  if (confirm("¿Está seguro que desea eliminar la cita?") ){
    location.href=url;
  }
}
</script>
<!--Fin-->  

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
            <i class="fa fa-calendar"></i>     Agenda de Citas
          </a>
        </li>
        <li class="active" data-toggle="tab">
          <a href="#2b" data-toggle="tab">
            <i class="fa fa-list"></i>     Diaria
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
                <?=  form_open(base_url().'Agenda')?>
                  <label>Buscar citas por fecha</label>
                  <input type="date" class="form-control" value="<?php echo $fecha; ?>" aria-describedby="sizing-addon2" data-provide="datepicker" name="fechaSearch" id="fechaSearch">
                  <br>
                  <input type="submit" value="Buscar" id="Buscar" name="Buscar" class="btn btn-primary btn-lg">
                <?=form_close()?> 
              </td>
              <td>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Hora Inicio</th>
                      <th></th>
                      <th>Hora Fin</th>
                      <th>Paciente</th>
                      <th>Profesional</th>
                      <th>Consultorio</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <?php foreach($query as $row): ?>
                  <tr style="margin-top:5px; margin-bottom:5px;">
                    <?php if($row->ramaMedica == "Psicología"): ?>
                      <td style="background-color:#F2DEDE">
                        <?php echo $row->horaIni; ?>
                      </td>
                      <td style="background-color:#F2DEDE">
                        -
                      </td>
                      <td style="background-color:#F2DEDE">
                        <?php echo $row->horaFin; ?>
                      </td>
                    <?php endif; ?>

                    <?php if($row->ramaMedica == "Nutrición"): ?>
                      <td style="background-color:#BCE8F1">
                        <?php echo $row->horaIni; ?>
                      </td>
                      <td style="background-color:#BCE8F1">
                        -
                      </td>
                      <td style="background-color:#BCE8F1">
                        <?php echo $row->horaFin; ?>
                      </td>
                    <?php endif; ?>

                    <?php if($row->ramaMedica == "Medicina"): ?>
                      <td style="background-color:#DFF0D8">
                        <?php echo $row->horaIni; ?>
                      </td>
                      <td style="background-color:#DFF0D8">
                        -
                      </td>
                      <td style="background-color:#DFF0D8">
                        <?php echo $row->horaFin; ?>
                      </td>
                    <?php endif; ?>
                    <td>
                      <?php echo $row->nombrePersona." ".$row->amaPersona." ".$row->apaPersona; ?>
                      <?php echo "<br>"; ?>
                      <a>
                        <i class="fa fa-mobile"></i>     <?php echo $row->celPersona; ?>
                      </a>
                    </td>
                    <td>
                      <a>
                        <i class="fa fa-user-md"></i>     Dr.(a) <?php echo $row->nombrePro." ".$row->amaPro." ".$row->apaPro; ?>
                      </a>
                    </td>
                    <td>
                      <?php echo $row->Nombre; ?>
                    </td>
                    <td>
                      <!--Botón  X <button style="background-color:#f4d2e1">Cancelar</button>-->
                       <td><a href='".base_url()."agenda/eliminar/$row->idConferencia'> <i class='fa fa-times'></i></a></td> 
                      <!--Aquí--> 
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </table>
              </td>
            </tr>
          </table>
        </div>
       
        <div class="tab-pane" id="5b">
          <?=  form_open(base_url().'citas/new_appointment')?>
          <h2 style="text-align:center;">Datos del paciente</h2>
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-12">
                <span class="input-group-addon">Nombre Paciente</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" id="nombreP" name="nombreP" required>
              </div>
            </div>
          </div>
          <br>
          <div style="background-color:#e5e5e5; height:3px;"></div>
          <h2 style="text-align:center;">Datos del profesional</h2>
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-5">
                <span class="input-group-addon" id="sizing-addon2">Rama Médica</span>
                <select class="form-control" value="ramaMedica" id="ramaMedica" required>
                  <option></option>
                  <option value="Medicina" name="Medicina">Medicina</option>
                  <option value="Nutrición" name="Nutrición">Nutrición</option>
                  <option value="Psicología" name="Psicología">Psicología</option>
                </select>

              </div>
              <div class="col-xs-7">
                <span class="input-group-addon" id="sizing-addon2">Nombre Profesional</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" id="nombrePRO" name="nombrePRO" required>
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
                <input type="date" class="form-control" aria-describedby="sizing-addon2" data-provide="datepicker" name="fecha" id="fecha" required>
              </div>
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Hora Inicio</span>
                <input type="time" class="form-control" aria-describedby="sizing-addon2" name="horaIni" id="horaIni" step="1800" required>
              </div>
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Hora Fin</span>
                <input type="time" class="form-control" aria-describedby="sizing-addon2" name="horaFin" step="1800" id="horaFin" required>
              </div>
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Consultorio</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="espacio" id="espacio" required>
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

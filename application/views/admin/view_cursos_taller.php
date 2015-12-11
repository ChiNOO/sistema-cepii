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

    <script type="text/javascript" src="<?php echo base_url('js/encuentra.js') ?>"></script>

    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/assets/img/icon.png">

    <script>
    $(document).ready(function($){
     $('#profesional').autocomplete({
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
    <div>
      <div class="row">
        <div class="col-md-12">
          <div class="navbar-collapse collapse ">
            <ul id="menu-top" class="nav navbar-nav navbar-right">
              <li>
                <a href="<?=base_url()?>agenda/">
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
                <a href="#" class="dropdown-toggle menu-top-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
            <a href="#1b" data-toggle="tab">
              <i class="glyphicon glyphicon-list-alt"></i>     Registro de cursos
            </a>
          </li>
          <li class="active" data-toggle="tab">
            <a href="#2b" data-toggle="tab">
              <i class="glyphicon glyphicon-search"></i>     Consulta de cursos
            </a>
          </li>
        </ul>

        <div style="background-color:#e5e5e5; height:3px;"></div>

        <div class="tab-content clearfix">
          <div class="tab-pane" id="1b">
          <form id="formulario" action="<?=base_url()?>index.php/cursos_taller/agrega" method="post" accept-charset="utf-8">
            <h3>Registro de cursos</h3>
            <h2 style="text-align:center;">Datos del curso</h2>
            <div style="margin-left:20px; margin-right:20px;">
              <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
                <div class="col-xs-2">
                  <span class="input-group-addon" id="sizing-addon2">Tipo</span>                  
                  <input list="browsers" class="form-control" aria-describedby="sizing-addon2" name="tipo" id="tipo" required="required">
                    <datalist id="browsers">
                      <option value="Curso">
                      <option value="Taller">                      
                      <option value="Certificación">
                      <option value="Dilplomado">
                    </datalist> 
                </div>
                
                <div class="col-xs-5">
                  <span class="input-group-addon" id="sizing-addon2">Profesional que lo imparte</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon2" name="profesional" id="profesional" required="required">
                </div>   
                <div class="col-xs-5">
                  <span class="input-group-addon" id="sizing-addon2">Lugar disponible</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon2" name="lugar" id="lugar" required="required">
                </div>                
                <br>
                <br>
                <br>
                <div class="col-xs-2">
                  <span class="input-group-addon" id="sizing-addon2">Numero de horas</span>
                  <input type="number" class="form-control" aria-describedby="sizing-addon2" name="n_horas" id="n_horas" required="required">
                </div>  
                
                 <div class="col-xs-2">
                  <span class="input-group-addon" id="sizing-addon2">Cantidad de personas</span>
                  <input type="number" class="form-control" aria-describedby="sizing-addon2" name="cantidad_personas" id="cantidad_personas" required="required">
                </div>             
                <div class="col-xs-2">
                  <span class="input-group-addon" id="sizing-addon2">Fecha de inicio</span>
                  <input type="date" class="form-control" aria-describedby="sizing-addon2" name="f_inicio" id="f_inicio" required="required">
                </div>
                <div class="col-xs-2">
                  <span class="input-group-addon" id="sizing-addon2">Fecha de fin</span>
                  <input type="date" class="form-control" aria-describedby="sizing-addon2" name="f_fin" id="f_fin" required="required">
                </div>
                <div class="col-xs-2">
                  <span class="input-group-addon" id="sizing-addon2">Hora de inicio</span>
                  <input type="time" class="form-control" aria-describedby="sizing-addon2" name="h_inicio" id="h_inicio" required="required">
                </div>
                <div class="col-xs-2">
                  <span class="input-group-addon" id="sizing-addon2">Hora de fin</span>
                  <input type="time" class="form-control" aria-describedby="sizing-addon2" name="h_fin" id="h_fin" required="required">
                </div>
              </div>
            </div>
            <br>
            <br>
            <input type="submit"  value="Guardar" class="btn btn-primary btn-lg pull-right" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">
            <br><br>
            </form>
          </div>


        <div class="tab-pane active" id="2b">
          <div class="content-wrapper" style="background-color: #e5e5e5; margin-top:0px;">
            <div id="exTab2" class="tab">
              <ul class="nav nav-pills">
                <li>
                  <a href="#todos" data-toggle="tab">
                    <i class="fa fa-calendar"></i>     Todos
                  </a>
                </li>
                <li>
                  <a href="#terminados" data-toggle="tab">
                    <i class="fa fa-calendar"></i>     Concluidos
                  </a>
                </li>
                <li>
                  <a href="#vigentes" data-toggle="tab">
                    <i class="fa fa-calendar"></i>     Vigentes
                  </a>
                </li>
                <li>
                  <a href="#proximos" data-toggle="tab">
                    <i class="fa fa-calendar"></i>     Por comenzar
                  </a>
                </li>
              </ul>
            </div>
          </div>

      


          <div class="tab-content clearfix">
            <div class="tab-pane" id="todos"> 
              <table class="table table-hover table-responsive">                
              <tr>
                <th>Tipo</th>
                <th>Personal que lo imparte</th>
                <th>Numero de horas</th>
                <th>Cantidad de personas</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Hora de inicio</th>
                <th>Hora de fin</th>
              </tr>
                <?php    
                  if ($search != null){
                    foreach($search->result() as $fila) {
                      echo "<tr>";
                        echo "<td>".$fila->tipo."</td>";
                        echo "<td>".$fila->nombrePro." ".$fila->apaPro." ".$fila->amaPro."</td>";
                        echo "<td>".$fila->num_horas."</td>";
                        echo "<td>".$fila->cantidad_personas."</td>";
                        echo "<td>".$fila->f_inicio."</td>";
                        echo "<td>".$fila->f_fin."</td>";
                        echo "<td>".$fila->h_inicio."</td>";
                        echo "<td>".$fila->h_fin."</td>";           
                      echo "</tr>";
                    }   
                  }  
                ?>
              </table>
            </div>

            <div class="tab-pane" id="terminados">              
              <table class="table table-hover table-responsive">                
              <tr>
                <th>Tipo</th>
                <th>Personal que lo imparte</th>
                <th>Numero de horas</th>
                <th>Cantidad de personas</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Hora de inicio</th>
                <th>Hora de fin</th>
              </tr>
                <?php    
                  if ($searchTerminados != null){
                    foreach($searchTerminados->result() as $fila) {
                      echo "<tr>";
                        echo "<td>".$fila->tipo."</td>";
                        echo "<td>".$fila->nombrePro." ".$fila->apaPro." ".$fila->amaPro."</td>";
                        echo "<td>".$fila->num_horas."</td>";
                        echo "<td>".$fila->cantidad_personas."</td>";
                        echo "<td>".$fila->f_inicio."</td>";
                        echo "<td>".$fila->f_fin."</td>";
                        echo "<td>".$fila->h_inicio."</td>";
                        echo "<td>".$fila->h_fin."</td>";           
                      echo "</tr>";
                    }   
                  }  
                ?>
              </table>
            </div>

            <div class="tab-pane" id="vigentes">              
              <table class="table table-hover table-responsive">                
              <tr>
                <th>Tipo</th>
                <th>Personal que lo imparte</th>
                <th>Numero de horas</th>
                <th>Cantidad de personas</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Hora de inicio</th>
                <th>Hora de fin</th>
              </tr>
                <?php    
                  if ($searchVigentes != null){
                    foreach($searchVigentes->result() as $fila) {
                      echo "<tr>";
                        echo "<td>".$fila->tipo."</td>";
                        echo "<td>".$fila->nombrePro." ".$fila->apaPro." ".$fila->amaPro."</td>";
                        echo "<td>".$fila->num_horas."</td>";
                        echo "<td>".$fila->cantidad_personas."</td>";
                        echo "<td>".$fila->f_inicio."</td>";
                        echo "<td>".$fila->f_fin."</td>";
                        echo "<td>".$fila->h_inicio."</td>";
                        echo "<td>".$fila->h_fin."</td>";           
                      echo "</tr>";
                    }   
                  }  
                ?>
              </table>
            </div>

            <div class="tab-pane" id="proximos">              
              <table class="table table-hover table-responsive">                
              <tr>
                <th>Tipo</th>
                <th>Personal que lo imparte</th>
                <th>Numero de horas</th>
                <th>Cantidad de personas</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Hora de inicio</th>
                <th>Hora de fin</th>
              </tr>
                <?php    
                  if ($searchProximos != null){
                    foreach($searchProximos->result() as $fila) {
                      echo "<tr>";
                        echo "<td>".$fila->tipo."</td>";
                        echo "<td>".$fila->nombrePro." ".$fila->apaPro." ".$fila->amaPro."</td>";
                        echo "<td>".$fila->num_horas."</td>";
                        echo "<td>".$fila->cantidad_personas."</td>";
                        echo "<td>".$fila->f_inicio."</td>";
                        echo "<td>".$fila->f_fin."</td>";
                        echo "<td>".$fila->h_inicio."</td>";
                        echo "<td>".$fila->h_fin."</td>";           
                      echo "</tr>";
                    }   
                  }  
                ?>
              </table>
            </div>

          </div>
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
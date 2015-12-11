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
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/icon.png">

</head>
<body style="background-color:#e5e5e5;">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header" style="margin:5px;">
        <img src="<?php echo base_url() ?>assets/img/logo.png">
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
                <a class="menu-top-active" href="<?php echo base_url().'Paciente'; ?>">
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
                <a href="#" class="menu-top" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
        <li class="active" data-toggle="tab">
          <a href="#1b" data-toggle="tab">
            <i class="fa fa-list"></i>     Editar Paciente
          </a>
        </li>
      </ul>
      
      <div style="background-color:#e5e5e5; height:3px;"></div>

      <div class="tab-content clearfix">
        
        <div class="tab-pane active" id="1b">
          <?=  form_open(base_url().'Paciente/upDate')?>
          <br>
          <h2 style="text-align:center;">Datos del paciente</h2>
          <input type="hidden" value="<?php echo $query['0']->idpersona ?>" name="id" id="id">
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-4">
                <span class="input-group-addon">Nombre Paciente</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="nombre" value="<?php echo $query['0']->nombrePersona ?>" required>
              </div>
              <div class="col-xs-4">
                <span class="input-group-addon">Apellido Paterno</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="paterno" value="<?php echo $query['0']->apaPersona ?>" required>
              </div>
              <div class="col-xs-4">
                <span class="input-group-addon">Apellido Materno</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="materno" value="<?php echo $query['0']->amaPersona ?>" required>
              </div>
            </div>
          </div>
          
          <br><br>
          
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-5">
                <span class="input-group-addon">Calle</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="calle" value="<?php echo $query['0']->callePersona ?>" required>
              </div>
              <div class="col-xs-3">
                <span class="input-group-addon">Número</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="numero" value="<?php echo $query['0']->numDirPersona ?>" required>
              </div>
              <div class="col-xs-4">
                <span class="input-group-addon">Colonia</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="colonia" value="<?php echo $query['0']->coloniaPersona ?>" required>
              </div>
            </div>        
          </div>

          <br><br>

          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Fecha</span>
                <input type="date" class="form-control" aria-describedby="sizing-addon2" data-provide="datepicker" name="fecha" value="<?php echo $query['0']->fechaNa ?>" required>
              </div>
              <div class="col-xs-1">
                <span class="input-group-addon" id="sizing-addon2">Sexo</span>
                <select class="form-control" name="sexo" value="<?php echo $query['0']->sexo ?>" required>
                  <option></option>
                  <option value="M">M</option>
                  <option value="F">F</option>
                </select>
              </div>
              <div class="col-xs-5">
                <span class="input-group-addon" id="sizing-addon2">Correo</span>
                <input type="email" class="form-control" aria-describedby="sizing-addon2" name="correo" value="<?php echo $query['0']->correoPersona ?>" required>
              </div>
              <div class="col-xs-4">
                <span class="input-group-addon" id="sizing-addon2">Teléfono</span>
                <input type="tel" class="form-control" aria-describedby="sizing-addon2" name="telefono" value="<?php echo $query['0']->celPersona ?>" required>
              </div>
            </div>
          </div>

          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <input type="submit"  value="Guardar" class="btn btn-primary btn-lg pull-right" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">
            </div>
          </div>

          <br>
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

</html>

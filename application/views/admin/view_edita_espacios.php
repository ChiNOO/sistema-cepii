<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Sistema CEPII</title>
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet" />

    <link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" />
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
        <img src="<?=base_url()?>assets/img/logo.png">
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav" style="margin:5px;">
            <li><a style="color:#FFF; font-size:45px;"> CEPII</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">

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
                <a >
                  <div>

                  </div>
                </a>
              </li>
              <li>
                <a href="">
                  <div>

                  </div>
                </a>
              </li>
              <li>
                <a href="">
                  <div>

                  </div>
                </a>
              </li>
              <li class="dropdown">
              
                <ul class="dropdown-menu">

                </ul>
              </li>
              <li>
                <a href="">
                  <div>
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
            <a href="#2b" data-toggle="tab">
              <i class="glyphicon glyphicon-pencil"></i>     Edicion de espacios
            </a>
          </li>
        </ul>
        <div style="background-color:#e5e5e5; height:3px;"></div>

        <div class="tab-content clearfix">
        <div class="tab-pane active" id="2b">
          <form id="formulario" action="<?=base_url()?>espacios/editarEspacio" method="post" accept-charset="utf-8">
            <h2 style="text-align:center;">Datos nuevos del espacio</h2>
            <div style="margin-left:20px; margin-right:20px;">
              <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
                <div class="col-xs-5">
                  <span class="input-group-addon" id="sizing-addon2">Nombre del espacio</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon2" value="<?=$Nombre?>"  name="nombre_espacio" id="nombre_espacio" required="required">
                </div>
                <div class="col-xs-3">
                  <span class="input-group-addon" id="sizing-addon2">Capacidad</span>
                  <input type="number" class="form-control" aria-describedby="sizing-addon2" value="<?=$Capacidad?>" name="capacidad" id="capacidad" required="required">
                </div>
                <div class="col-xs-2">
                  <span class="input-group-addon" id="sizing-addon2">Tipo del servicio</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon2" name="tipo_servicio" value="<?=$Tipo_Servicio?>" id="tipo_servicio" required="required">
                </div>
                <input type="hidden" name="idEspacio" value="<?=$idEspacio?>" id="idEspacio" maxlength="20" size="30" class="form-control" />

              </div>
            </div>
            <br>
            <br>
            <input type="submit"  value="Guardar Cambios" class="btn btn-primary btn-lg pull-right" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">
            <a class="btn btn-primary btn-lg pull-right" href="<?=base_url()?>espacios/" role="button" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">Cancelar</a>
            <br><br>
            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->

  <footer>
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

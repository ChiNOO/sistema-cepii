<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Sistema CEPII_Edita_Conferencias</title>
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
              <i class="fa fa-pencil"></i>     Editar Conferencia
            </a>
          </li>
        </ul>
        <div style="background-color:#e5e5e5; height:3px;"></div>

        <div class="tab-content clearfix">
        <div class="tab-pane active" id="2b">
          <form id="formulario" action="<?=base_url()?>conferencias/editarConferencia" method="post" accept-charset="utf-8">
            <h2 style="text-align:center;">Datos nuevos de la Conferencia</h2>

            <div style="margin-left:20px; margin-right:20px;">
              <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
                
               <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon1" >Tema de Conferencia</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon1" name="TemaConferencia" placeholder="Ejemplo: Constelaciones Familiares">
              </div>

                <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon2">Descripción</span>
               <textarea class="form-control" rows="2" name="Descripcion"></textarea>
              </div>

                <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon3" >Nombre Ponente</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon3" name="NombrePonente" placeholder="Ejemplo: Uzziel Asafmin Ojeda González">
              </div>

                <input type="hidden" name="idConferencia" value="<?=$idConferencia?>" id="idConferencia" maxlength="20" size="30" class="form-control" />

              </div>
            </div>

            <div style="margin-left:5px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon4" >Numero de Asistentes</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon4" name="NumAsistentes" placeholder="Ejemplo: 25">
              </div>

             <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon5" >Lugar</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon5" name="Lugar" placeholder="Ejemplo: Facultad de Estadística e Informática">
              </div>

              <div class="col-xs-4">
                <span class="input-group-addon bootstrap-timepicker timepicker" id="sizing-addon6">Fecha</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon6" data-provide="datepicker" id="datepicker" name="Fecha">
              </div>

            </div>
          </div>

          <div style="margin-left:5px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

            <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon4" >Hora</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon4" name="Hora" placeholder="Ejemplo: 8:00 AM">
              </div>

              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon4" >Dirección</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon4" name="Direccion" placeholder="Ejemplo: Av. Xalapa, s/n">
              </div>

            </div>
          </div>
            <!br>
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
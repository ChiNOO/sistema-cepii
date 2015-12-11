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
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
    <script type="text/javascript" src="<?php echo base_url('js/funciones.js') ?>"></script>


    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/icon.png">
    <script type="text/javascript">
    $(document).ready(function(){
    //utilizamos el evento keyup para coger la información
    //cada vez que se pulsa alguna tecla con el foco en el buscador
    $(".autocompletar").keyup(function(){
    //alert("Hello! I am an alert box!!");
    //en info tenemos lo que vamos escribiendo en el buscador
      var info = $(this).val();
      //hacemos la petición al método autocompletado del controlador home
      //pasando la variable info
      $.post('<?php echo base_url().'Paciente/autocompletar' ?>',{ info : info }, function(data){
        //si autocompletado nos devuelve algo
        if(data != ''){
          //$('.contenedor').show();
          $(".table").html(data);
        }else{
          $(".table").html('');
        }
      })
    })

    })
      function elimina(url){
        if (confirm("¿Está seguro que desea eliminar el paciente?") ){
          location.href=url;
        }
      }
      function editar(url){
        location.href=url;
      }
    </script>
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
            <i class="fa fa-list"></i>     Registro de Paciente
          </a>
        </li>
        <li data-toggle="tab">
          <a href="#2b" data-toggle="tab">
            <i class="glyphicon glyphicon-search"></i>     Busqueda de Pacientes
          </a>
        </li>
        <li data-toggle="tab">
          <a href="#3b" data-toggle="tab">
            <i class="fa fa-table"></i>     Pacientes Registrados
          </a>
        </li>
      </ul>

      <div style="background-color:#e5e5e5; height:3px;"></div>

      <div class="tab-content clearfix">
        
        <div class="tab-pane active" id="1b">
          <?=  form_open(base_url().'Paciente/agregarPaciente')?>
          <br>
          <h2 style="text-align:center;">Datos del paciente</h2>
          
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-4">
                <span class="input-group-addon">Nombre Paciente</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="nombre">
              </div>
              <div class="col-xs-4">
                <span class="input-group-addon">Apellido Paterno</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="paterno">
              </div>
              <div class="col-xs-4">
                <span class="input-group-addon">Apellido Materno</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="materno">
              </div>
            </div>
          </div>
          
          <br><br>
          
          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-5">
                <span class="input-group-addon">Calle</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="calle">
              </div>
              <div class="col-xs-3">
                <span class="input-group-addon">Número</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="numero">
              </div>
              <div class="col-xs-4">
                <span class="input-group-addon">Colonia</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" name="colonia">
              </div>
            </div>        
          </div>

          <br><br>

          <div style="margin-left:20px; margin-right:20px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
              <div class="col-xs-2">
                <span class="input-group-addon" id="sizing-addon2">Fecha</span>
                <input type="date" class="form-control" aria-describedby="sizing-addon2" data-provide="datepicker" name="fecha">
              </div>
              <div class="col-xs-1">
                <span class="input-group-addon" id="sizing-addon2">Sexo</span>
                <select class="form-control" name="sexo">
                  <option></option>
                  <option value="M">M</option>
                  <option value="F">F</option>
                </select>
              </div>
              <div class="col-xs-5">
                <span class="input-group-addon" id="sizing-addon2">Correo</span>
                <input type="email" class="form-control" aria-describedby="sizing-addon2" name="correo">
              </div>
              <div class="col-xs-4">
                <span class="input-group-addon" id="sizing-addon2">Teléfono</span>
                <input type="tel" class="form-control" aria-describedby="sizing-addon2" name="telefono">
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

        <div class="tab-pane" id="2b">
          <h4 style="padding-left:2%;">Búsqueda de Paciente</h4>
          <br/>
          <div class="col-xs-4">
            <input type="text" class="form-control autocompletar"  name="autocompletar" id="autocompletar" onpaste="return false"  aria-describedby="sizing-addon2" placeholder="Nombre del Paciente">
            <br/>
          </div>
          <table class="table table-hover table-responsive">
          </table>
        </div>

        <div class="tab-pane" id="3b">
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Calle</th>
                <th>Colonia</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Sexo</th>
                <th>Edad</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <?php foreach($query as $row): ?>
              <tr>
                <td><?php echo $row->nombrePersona.' '.$row->apaPersona.' '.$row->amaPersona; ?></td>
                <td><?php echo $row->callePersona.' #'.$row->numDirPersona; ?></td>
                <td><?php echo $row->coloniaPersona; ?></td>
                <td><?php echo $row->celPersona; ?></td>
                <td><?php echo $row->correoPersona; ?></td>
                <td><?php echo $row->sexo; ?></td>
                <td>
                  <?php
                    $then = date('Ymd', strtotime($row->fechaNa));
                    $diff = date('Ymd') - $then;
                    echo substr($diff, 0, -4);
                  ?>
                </td>
                <td>
                  <a href='#' onclick="editar('<?=base_url()?>paciente/modificar/<?=$row->idpersona?>');"><i class='glyphicon glyphicon-pencil'></i></a>
                </td>
                <td>
                  <a href='#' onclick="elimina('<?=base_url()?>paciente/deletePaciente/<?=$row->idpersona?>');"><i class='glyphicon glyphicon-trash'></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>

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
</html>

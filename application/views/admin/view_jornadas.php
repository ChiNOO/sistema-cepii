    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Sistema CEPII_control_jornadas</title>
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
        
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">

        <link href="<?php echo base_url(); ?>assets/css/jquery.tagit.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>assets/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
        <!--agregué esto-->
        <script type="text/javascript">
          function ver(url){
            location.href=url;
          }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#myTags").tagit();
            });
        </script>

        <script type="text/javascript">
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

        <script type="text/javascript">
        $(document).ready(function($){

           $('#Espacio').autocomplete({
            source:'<?php echo base_url('espacios/show_Espacios_G');?>',
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

        <script type="text/javascript">
        $(document).ready(function($){

           $('#Nombrep').autocomplete({
            source:'<?php echo base_url('Profesionales/show_profesionals');?>',
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

<!--Agregué esto para que autocomplete a pacientes-->
      <script type="text/javascript">
        $(document).ready(function($){

           $('#Persona').autocomplete({
            source:'<?php echo base_url('Paciente/show_patient');?>',
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

<!--Hasta aquí-->
<!--Atocompletar jornadas-->
  <script type="text/javascript">
        $(document).ready(function($){

           $('#Tservicio').autocomplete({
            source:'<?php echo base_url('jornadas/show_jor');?>',
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


<!--Hasta aquí-->
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

            <li data-toggle="tab" >
              <a href="#8b" data-toggle="tab">
                <i class="fa fa-child"></i>     Registrar Pacientes en Jornada
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
                <thead>
                  <tr>
                    <th>Nombre Jornada</th>
                    <th>Tipo de servicio</th>
                    <th>Detalle</th>
                    <th>Espacio</th>
                    <th>Nombre profesional</th>
                    <th>Mes</th>
                    <th>Fechas</th>
                    <th>Hora Inicial</th>
                    <th>Hora Final</th>
                    <th>Costo</th>
                    <th></th>
                  </tr>
                </thead>  
                  <?php foreach ($query as $row): ?>
                    <tr>
                      <td><?php echo $row->nombreJornada; ?></td>
                      <td><?php echo $row->tipo_servicio; ?></td>
                      <td><?php echo $row->detalle; ?></td>
                      <td><?php echo $row->Nombre; ?></td>
                      <td><?php echo $row->nombrePro.' '.$row->apaPro.' '.$row->amaPro; ?></td>
                      <td><?php echo $row->mes; ?></td>
                      <td><?php echo $row->fechas; ?></td>
                      <td><?php echo $row->hora_inicio; ?></td>
                      <td><?php echo $row->hora_fin; ?></td>
                      <td><?php echo '$'.$row->costo; ?></td>
                      <td><a href='#' onclick="ver('<?=base_url()?>jornadas/verPacientesJornada/<?=$row->idJornada?>');"><i class='glyphicon glyphicon-pencil'></i></a></td>
                    </tr>
                  <?php endforeach; ?>
              </table>

               <!-- fin Table -->

            </div>

            <!--Empieza Registrar jornadas-->
            <div class="tab-pane" id="5b">
              <?=  form_open(base_url().'jornadas/agregarJornada')?>
              <h2 style="text-align:center;">Datos Jornadas</h2>
              <br>

              <div style="margin-left:5px; margin-right:5px;">
                <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
                  
                  <div class="col-xs-3">
                    <span class="input-group-addon" id="sizing-addon3" >Nombre</span>
                    <input type="text" class="form-control" aria-describedby="sizing-addon3" name="nombreJornada" >
                  </div>

                  <div class="col-xs-3">
                    <span class="input-group-addon" id="sizing-addon2">Tipo de servicio</span>
                    <select class="form-control" value="servicio" id="servicio" name="servicio">
                      <option>
                        <option value="Terapia" name="servicio">Terapia</option>
                        <option value="Consulta" name="servicio">Consulta</option>
                        <option value="Curso" name="servicio">Curso</option>
                      </option>
                    </select>
                  </div>
            
                  <div class="col-xs-3">
                  <span class="input-group-addon" id="sizing-addon3" >Detalle</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon3" name="Detalle" placeholder="Ejemplo: Jornada para personas entre 20-40 años">
                  </div>
                
                    <div class="col-xs-3">
                  <span class="input-group-addon" id="sizing-addon5" >Espacio</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon5" id="Espacio" name="Espacio" placeholder="Ejemplo: Laboratorio A">
                  </div>

                </div>
            </div>

               <div style="margin-left:5px; margin-right:5px;">
                <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

                <div class="col-xs-4">
                  <span class="input-group-addon" id="sizing-addon5" >Nombre profesional</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon5" name="Nombrep" id="Nombrep" placeholder="Ejemplo: Doctora Azucena">
                  </div>
                  
                 <div class="col-xs-4">
                  <span class="input-group-addon" id="sizing-addon3" >Mes</span>
                  <select class="form-control" name="mes" id="mes">
                  <option>
                  <option value="Enero" name="mes">Enero</option>
                  <option value="Febrero" name="mes">Febrero</option>
                  <option value="Marzo" name="mes">Marzo</option>
                  <option value="Abril" name="mes">Abril</option>
                  <option value="Mayo" name="mes">Mayo</option>
                  <option value="Junio" name="mes">Junio</option>
                  <option value="Julio" name="mes">Julio</option>
                  <option value="Agosto" name="mes">Agosto</option>
                  <option value="Septiembre" name="mes">Septiembre</option>
                  <option value="Octubre" name="mes">Octubre</option>
                  <option value="Noviembre" name="mes">Noviembre</option>
                  <option value="Diciembre" name="mes">Diciembre</option>  
                  </option>
                  </select>
                </div>
              
                 <div class="col-xs-4">
                  <span class="input-group-addon" id="sizing-addon3" >Días</span>
                  <input id="myTags" type="text" class="form-control" id="tags" placeholder="" name="tags">
                  </div>
              </div> 
            </div> 


              <div style="margin-left:5px; margin-right:5px;">
                <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

                <div class="col-xs-4">
                <span class="input-group-addon" id="sizing-addon4" >Hora inicio</span>
                <input type="time" class="form-control" aria-describedby="sizing-addon4" name="Horai">
                </div> 
                  
                <div class="col-xs-4">
                <span class="input-group-addon" id="sizing-addon4" >Hora fin</span>
                <input type="time" class="form-control" aria-describedby="sizing-addon4" name="Horaf">
                </div>

                 <div class="col-xs-4">
                  <span class="input-group-addon" id="sizing-addon2">Costo</span>
                  <input type="number" class="form-control" aria-describedby="sizing-addon2" name="Costo" placeholder="$" required="required">
                </div>

                </div>
              </div>

             <div style="margin-left:5px; margin-right:5px;">
                <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
                </div>
                 <br>
                <input type="submit"  value="Guardar" class="btn btn-primary btn-lg pull-right" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">
                <br>
            </div>
          </form>
          </div>

          <!--TERMINA-->

          <!--Clase personas-->
            <div class="tab-pane" id="8b" >
              <?=  form_open(base_url().'jornadas/agregarPa')?>
              <h2 style="text-align:center;">Agregar participantes a jornadas</h2>
              <br>

              <div class="col-xs-4">
                <span class="input-group-addon" id="sizing-addon5" >Paciente</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon5" name="Persona" id="Persona" placeholder="Ejemplo: Christian Vargas">
              </div>

              <div class="col-xs-4">
                <span class="input-group-addon" id="sizing-addon5" >Nombre Jornada</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon5" name="Tservicio" id="Tservicio" placeholder="Ejemplo: Terapia">
              </div>
          
              <div style="margin-left:5px; margin-right:5px;">
                <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
                </div>   
              </div>

              <br>
              <input type="submit"  value="Guardar" class="btn btn-primary btn-lg pull-right" style="margin-top:20px; margin-bottom:20px; margin-right:40px;">
              <br>
            </form>
            </div>


         <!--Termina la clase-->
            <div class="tab-pane" id="6b">
              <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
            </div>
            <div class="tab-pane" id="7b">
              <h3>We use css to change the background color of the content to be equal to the tab</h3>
            </div>
            
      <!-- Pie de página-->

      <footer style="width: 100%;border-top: 1px solid #fff;bottom: 0; position: fixed; padding: 0rem;">
        <div class="container">
              &copy; 2015 SISTEMA CEPII | BY : <a href="http://www.uv.mx/Fei/" target="_blank">FEI UV</a>
        </div>
      </footer>

    </body>
</html>
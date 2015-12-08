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
                <li><a href="#">Action1</a></li>
                <li><a href="#">Action2</a></li>
                <li><a href="#">Action3</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Action4</a></li>
              </ul>
            </li>
          </ul>
      </div>
    </div>
  </nav>


  <section class="menu-section">
    <div class="container">
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
                <a href="" class="menu-top-active">
                  <div>
                    <i class="fa fa-money"></i>     Donativos
                  </div>
                </a>
              </li>
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <div>
                      <i class="fa fa-file-text-o"></i>     Administración
                      <span class="caret"></span>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url().'profesionales'; ?>">Profesionales</a></li>
                  <li><a href="<?=base_url()?>espacios/">Espacios</a></li>
                  <li><a href="#">Action3</a></li>
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
    <div id="exTab3" class="tab">
      <ul  class="nav nav-pills">
        <li  data-toggle="tab">
          <a href="#2b" data-toggle="tab">
            <i class="fa fa-usd"></i>     Donativos
          </a>
        </li>

        <li data-toggle="tab" >
          <a href="#5b" data-toggle="tab">
            <i class="fa fa-table"></i>     Registrar Donativo
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
                        <?php echo $row->rama; ?>
                      </td>
                    <?php endif; ?>

                    <?php if($row->ramaMedica == "Medicina"): ?>
                      <td style="background-color:#DFF0D8">
                        <?php echo $row->hora; ?>
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

           <!-- fin Table -->
        </div>

        <div class="tab-pane" id="3b">
          <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
        </div>
        <div class="tab-pane" id="4b">
          <h3>We use css to change the background color of the content to be equal to the tab</h3>
        </div>


        <div class="tab-pane" id="5b">
          <?=  form_open(base_url().'Donativos/new_appointment')?>
          <h2 style="text-align:center;">Datos de Donativos</h2>
          <br>

          <div style="margin-left:30px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">


             <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon2">Tipo
               </span>
                <select type="text" class="form-control" aria-describedby="sizing-addon2" name="Tipo">
                 <option>Monetario</option>
                 <option>Material</option>
               </select>
              </div>

              <div class="col-xs-4">
                <span class="input-group-addon" id="sizing-addon2">Fecha</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon2" data-provide="datepicker" id="datepicker" name="fecha">
              </div>
              <div class="col-xs-4">
              <span class="input-group-addon" id="sizing-addon2">Cantidad</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="nombreP" placeholder="$">
            </div>

            </div>
          </div>

          <div style="margin-left:30px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

            <div class="col-xs-6">
              <span class="input-group-addon" id="sizing-addon2" >Nombre Paciente</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="nombreP" placeholder="Ejemplo: Enrique Rodrìguez Becerra">
            </div>

              <div class="col-xs-6">
              <span class="input-group-addon" id="sizing-addon2">Nombre Taller, Curso o Terapia</span>
                <select type="text" class="form-control" aria-describedby="sizing-addon2" name="Tipo">
                 <option>Monetario</option>
                 <option>Material</option>
               </select>
              </div>

            </div>
          </div>

          <div style="margin-left:30px; margin-right:5px;">
            <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">

            <div class="col-xs-6">
              <span class="input-group-addon" id="sizing-addon2">Descripción</span>
            <textarea class="form-control" rows="3"></textarea>
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

  <footer style="width: 100%;border-top: 2px solid #fff;bottom: 0; position: absolute; padding: 1rem;">
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

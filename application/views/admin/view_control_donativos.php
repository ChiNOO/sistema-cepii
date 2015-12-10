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
  
      <script type="text/javascript"> 
      function habilitar(obj) { 
        var hab; 
        frm=obj.form; 
        num=obj.selectedIndex; 
        if (num==1) hab=true; 
        else if (num==2) hab=false; 
        frm.descri.disabled=hab; 
      } 
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
                 <a class="menu-top-active" href="<?php echo base_url().'Donativos'; ?>">
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
      <!-- 1a Margen entre barra Donativo y egistra donativo y tablas -->
      <div style="background-color:#e5e5e5; height: 0px;"></div>
       
         <!-- 1b tabla de contenido de consulta -->
      <div class="tab-content clearfix">
        <div class="tab-pane" id="1b">
          <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
        </div>
           <!-- Tabla de consulta donativos --> 
           <div class="tab-pane active" id="2b">
               <table class="table">
                 <tr>
              <!-- Campo de busqueda -->
                 <td>
                  <input data-provide="datepicker"> 
                 </td>
                 <td>
                   <table class="table">
                 <!-- Titulos de columnas -->
                     <thead>
                       <tr>  
                         <th>idDonativo</th>
                         <th>Nombre</th>
                         <th>Tipo</th>
                         <th>Cantidad</th>
                         <th>Fecha</th>
                         <th>Nombre donante</th>
                         <th></th>
                         </tr>
                    </thead>
                  
                  <?php foreach($query as $row): ?>
                  <tr style="margin-top:5px; margin-bottom:5px;">
                      <td>
                        <?php echo $row->idDonativo; ?>
                      </td>
                      <td >
                         <?php echo $row->Nombre; ?>
                      </td>   
                      <td >
                         <?php echo $row->TipoDonativo; ?>
                      </td>   
                      <td>
                         <?php echo $row->Cantidad; ?>
                      </td>   
                      <td >
                         <?php echo $row->Fecha; ?>
                      </td>   
                      <td >
                         <?php echo $row->nombrePersona." ".$row->amaPersona." ".$row->apaPersona; ?>
                      </td> 
                      <td>
                         <button style="background-color:#f4d2e1">Eliminar</button>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                   </table>
                  </td>
                 </tr>
               </table>
           </div>
           <!-- fin Table -->


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
                    <span class="input-group-addon" id="sizing-addon2">Tipo Donativo</span>
                    <select type="text" class="form-control" onchange="habilitarDescripcion(this)" aria-describedby="sizing-addon2" name="TipoDonativo">
                      <option>Especie</option>
                      <option>Monetario</option>
                    </select>
                  </div>
                
                <div class="col-xs-4">
                  <span class="input-group-addon" id="sizing-addon2">Fecha</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon2" data-provide="datepicker" id="datepicker" name="fechaDonativo" required="required">
                </div> 
                
                <div class="col-xs-4">
                  <span class="input-group-addon" id="sizing-addon2">Cantidad</span>
                  <input type="number" class="form-control" aria-describedby="sizing-addon2" name="cantidadDonativo" placeholder="$" required="required">
                </div>

              </div>
            </div>
           
          <!-- Apartado dombre Taller|curso|Terapia  --> 
            <div style="margin-left:30px; margin-right:5px;">
              <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
                
                <div class="col-xs-4">
                  <span class="input-group-addon" id="sizing-addon2">Servicio</span>
                  <select type="text" class="form-control" onchange="habilitar(this)" aria-describedby="sizing-addon2" name="servicioDonaciones" required="required">
                    <option  value="" disabled selected style="display: none;">Selecione...</option>
                    <option>Curso</option>
                    <option>Taller</option>
                    <option>cita</option>
                  </select>
                </div>
                
                <div class="col-xs-4">
                  <span class="input-group-addon" id="sizing-addon2" >Nombre Servicio</span>
                  <select type="text" class="form-control"  disabled="false "aria-describedby="sizing-addon2" name="nombreServicioDonativo">
                    <?php
                     foreach ($arrProfesiones as $i => $profesion)
                     echo '<option values="',$i,'">',$profesion,'</option>';
                    ?>
                   </select>
                 </div>

                 <div class="col-xs-4">
                   <span class="input-group-addon" id="sizing-addon2">Persona</span>
                     <select type="text" class="form-control" disabled="false"aria-describedby="sizing-addon2" name="NombrePersonaDonativo">
                       <option>Monetario</option>
                       <option>Material</option>
                     </select>
                 </div>

              </div>
            </div>
          <!-- Fin de Apartado dombre Taller|curso|Terapia  --> 
            <div style="margin-left:30px; margin-right:5px;">
              <div class="content-wrapper"  style="width:100%; min-height: auto; height:auto; margin-left;10px; margin-right:10px;">
                
                <div class="col-xs-6">
                  <span class="input-group-addon" id="sizing-addon2">Descripción</span>
                  <textarea class="form-control" name="descripcionDonativo"rows="3"></textarea>
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

              <script type="text/javascript"> 
                 function habilitarDescripcion(obj) { 
                 var hab; 
                 frm=obj.form; 
                 num=obj.selectedIndex; 
                  if (num== 1) hab=true; 
                  else if (num==2) hab=false;
                frm.descripcionDonativo.disabled=hab; 
               }        
              </script>

             <script type="text/javascript"> 
             function habilitar(obj) { 
             var hab; 
             frm=obj.form; 
             num=obj.selectedIndex; 
              if (num=> 0) hab=false; 
              else hab=true; 
             frm.nombreServicioDonativo.disabled=hab; 
             frm.NombrePersonaDonativo.disabled=hab; 
             } 
             </script>

       
           <!-- <script type="text/javascript">
              $(document).ready(function(){
               $('input[name="hora"]').ptTimeSelect();
              });
            </script>
            -->
</html>

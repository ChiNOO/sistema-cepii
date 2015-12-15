 <?php 
 $link = mysqli_connect("localhost", "root", "1234", "cepii"); 
 ?> 
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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
          <script src="https://code.highcharts.com/highcharts-3d.js"></script>
          <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <style type="text/css">
${demo.css}
    </style>
    <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Reportes Donativos por Mes'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Porcentaje',
            data: [
              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=01";
                    $sql = mysqli_query($link,$que);
                    $filasene = mysqli_num_rows($sql);
                    if ($filasene>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php         
              if($rows['Total']>0){    
              echo "['Enero' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=02";
                    $sql = mysqli_query($link,$que);
                    $filasfeb = mysqli_num_rows($sql);
                    if ($filasfeb>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Febrero' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=03";
                    $sql = mysqli_query($link,$que);
                    $filasmar = mysqli_num_rows($sql);
                    if ($filasmar>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Marzo' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=04";
                    $sql = mysqli_query($link,$que);
                    $filasabr = mysqli_num_rows($sql);
                    if ($filasabr>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Abril' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=05";
                    $sql = mysqli_query($link,$que);
                    $filasmay = mysqli_num_rows($sql);
                    if ($filasmay>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Mayo' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=06";
                    $sql = mysqli_query($link,$que);
                    $filasjun = mysqli_num_rows($sql);
                    if ($filasjun>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Junio' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=07";
                    $sql = mysqli_query($link,$que);
                    $filasjul = mysqli_num_rows($sql);
                    if ($filasjul>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Julio' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=08";
                    $sql = mysqli_query($link,$que);
                    $filasago = mysqli_num_rows($sql);
                    if ($filasago>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Agosto' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=09";
                    $sql = mysqli_query($link,$que);
                    $filassep = mysqli_num_rows($sql);
                    if ($filassep>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Septiembre' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=10";
                    $sql = mysqli_query($link,$que);
                    $filasoct = mysqli_num_rows($sql);
                    if ($filasoct>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Octubre' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=11";
                    $sql = mysqli_query($link,$que);
                    $filasnov = mysqli_num_rows($sql);
                    if ($filasnov>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Noviembre' , ".$rows['Total']." ],";
              };
              };

              ?>

              <?php 
                    $que = "SELECT SUM(Cantidad) AS Total FROM donativo WHERE month (Fecha)=12";
                    $sql = mysqli_query($link,$que);
                    $filasdic = mysqli_num_rows($sql);
                    if ($filasdic>0) {
                    $rows = mysqli_fetch_array($sql)
              ?>
              
              <?php             
              if($rows['Total']>0){
              echo "['Diciembre' , ".$rows['Total']." ],";
              };
              };

              ?>

              ]
        }]
    });
});
    </script>


    <script type="text/javascript">
$(function () {
    $('#containerse').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Porcentaje de Género de Pacientes Registrados'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Porcentaje',
            data: [
              <?php 
                    $que = "SELECT COUNT(sexo) AS Totalhom FROM persona WHERE sexo='M'";
                    $sql = mysqli_query($link,$que);
                    while ($rows = mysqli_fetch_array($sql)){
              ?>
                ['Hombres' , <?php echo $rows["Totalhom"]; ?>],
              <?php
              }
              ?>

              <?php $que = "SELECT COUNT(sexo) AS Totalmuj FROM persona WHERE sexo='F'";
                    $sql = mysqli_query($link,$que);
                    while ($rows = mysqli_fetch_array($sql)){
              ?>
                ['Mujeres' , <?php echo $rows["Totalmuj"]; ?>],
              <?php
              }
              ?>

              ]
        }]
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
                <a class="menu-top-active" href="<?php echo base_url().'Reportes'; ?>">
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

  <div class="content-wrapper" style="background-color: #e5e5e5; margin-top:0px;"></div>
   
    <br>
    <div id="exTab3" class="tab">
      
      <ul  class="nav nav-pills">
        <li class="active" data-toggle="tab">
          <a href="#1b" data-toggle="tab">
            <i class="fa fa-bar-chart"></i>     Donativos
          </a>
        </li>
        <li data-toggle="tab">
          <a href="#2b" data-toggle="tab">
            <i class="fa fa-bar-chart"></i>     Pacientes
          </a>
        </li>
      </ul>
    

    <div style="background-color:#e5e5e5; height:3px;"></div>

        


        <div class="tab-content clearfix">

        <div class="tab-pane active" id="1b">

         <div id="container" style="height: 400px"></div>
          
        </div>          
      



    <div style="background-color:#e5e5e5; height:3px;"></div>


      <div class="tab-pane" id="2b">
         
        <div id="containerse" style="height: 400px" align="center"></div>

      </div>

     </div>
  </div>
  </div>

    <footer style="width: 100%;border-top: 2px solid #fff;bottom: 0; position: fixed; padding: 1rem;">
    <div class="container">
          &copy; 2015 SISTEMA CEPII | BY : <a href="http://www.uv.mx/Fei/" target="_blank">FEI UV</a>
    </div>
  </footer>
  </html>

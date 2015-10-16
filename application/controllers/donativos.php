<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donativos extends CI_Controller {

 
  public function __construct(){
    		parent::__construct();
            $this->load->helper(array('url', 'form'));       
  		    $this->load->database('default');
    		$this->load->model('donativos_model');
	
	 
  	}
	public function index(){
		
	 //$servicioDonaciones = $this->input->post('servicioDonaciones');
	// $data ['query'] = $this->donativos_model->get_appointment();
	 $data ['cargaCurTall'] = $this->donativos_model->get_Cursos_taller();
   $data ['cargaJornadas'] = $this->donativos_model->get_Jornadas();
   $data ['cargaCitas'] = $this->donativos_model->get_Citas();
   $this->load->model('donativos_model');
	 $data['arrServicios'] = $this->donativos_model->get_servicios();
   
	 $this->load->view('admin/view_control_donativos', $data);
	//$this->load->database('default');
	//$this->load->view('admin/view_control_donativos');
	}	

	public function Busca_servicio_cita() {
        $TipoBusque = $this->input->post('TipoBusque');
        
        if($TipoBusque){
            $this->load->model('donativos_model');
            $arrDonativoCita = $this->donativos_model->getServicioCitas($TipoBusque);
            echo '<option value="0">Ciudades</option>';
            foreach($arrDonativoCita as $fila){
                echo '<option value="'. $fila->periodo .'">'. $fila->fecha .'</option>';
            }
        }  else {
            echo '<option value="0">Ciudades</option>';
        }
    } 

    ////////////////////777

	public function guardarDonativo(){
	 $TipoDonativo = $this->input->post('TipoDonativo');
     $data ['query'] = $this->donativos_model->get_appointment();
	 $data['arrProfesiones'] = $this->donativos_model->get_profesiones($TipoDonativo);
	 $this->load->view('admin/view_control_donativos', $data);
		
	}


////Funciones del botón actualizar montos cursos_talleres
public function Actualizar_monetario_CursoTaller() {
        $data['banderaTipo']="curso";
        $data['banderaID']=$id=$this->uri->segment(3);
        $this->load->model('donativos_model');
        $data['query'] = $this->donativos_model->getDonativoCursoIDmon($id);
        $this->load->view('admin/view_donativo_actualizar', $data);
      }


public function Actualizar_especie_CursoTaller(){
        $data['banderaTipo']="curso";
        $data['banderaID']=$id=$this->uri->segment(3);
        $this->load->model('donativos_model');
        $data['query'] = $this->donativos_model->getDonativoCursoIDesp($id);
        $this->load->view('admin/view_donativo_actualizar_Monetario', $data);
      
 }
//////////////////////77Fin de botónes cursos_talleres////////

//////Funciones del botón actualizar montos jornadas/////
public function Actualizar_monetario_jornada(){
        $data['banderaTipo']="jornada";
        $data['banderaID']=$id=$this->uri->segment(3);
       $this->load->model('donativos_model');
       $data['query'] = $this->donativos_model->getDonativoJornadaIDmon($id);
       $this->load->view('admin/view_donativo_actualizar', $data);

}
public function Actualizar_especie_jornada(){
       $data['banderaTipo']="jornada";
       $data['banderaID']=$id=$this->uri->segment(3);
       $this->load->model('donativos_model');
       $data['query'] = $this->donativos_model->getDonativoJornadaIDesp($id);
       $this->load->view('admin/view_donativo_actualizar_Monetario', $data); 
}
/////////////Fin de botón jornadas///////

////////Funcion  del boton actualizar montos citas
public function Actualizar_monetario_citas(){
       $data['banderaTipo']="cita";
       $data['banderaID']=$id=$this->uri->segment(3);
       $this->load->model('donativos_model');
       $data['query'] = $this->donativos_model->getDonativoCitaIDmon($id);
       $this->load->view('admin/view_donativo_actualizar', $data);
}
public function Actualizar_especie_citas(){
       $data['banderaTipo']="cita";
       $data['banderaID']=$id=$this->uri->segment(3);
       $this->load->model('donativos_model');
       $data['query'] = $this->donativos_model->getDonativoCitaIDesp($id);
       $this->load->view('admin/view_donativo_actualizar_Monetario', $data);
}
//////////Fin del botón actualizar monto




   public function registro_donativo(){
        $id = $this->input->post('banderaID');
        $tipo = $this->input->post('banderaTipo');
        $fecha = date('Y-m-d');
        $cantidad_monetario = $this->input->post('cantidad_monetario');
      
      if ($tipo=="cita") {
       $this->load->model('donativos_model');
       $insert = $this->donativos_model->agregarDonativoMonetarioCita($id, $fecha, $cantidad_monetario); 
      }elseif ($tipo=="jornada") {
          $insert = $this->donativos_model->agregarDonativoMonetarioJornada($id, $fecha, $cantidad_monetario); 
      }else  {
         $insert = $this->donativos_model->agregarDonativoMonetarioCurso($id, $fecha, $cantidad_monetario); 
      }
     
  }

    public function  registro_donativoEsp(){
        $id = $this->input->post('banderaID');
        $tipo = $this->input->post('banderaTipo');
       $fecha = date('Y-m-d');
       $cantidad_especie = $this->input->post('cantidad_especie');
       $descripcion = $this->input->post('descripcion');
       $this->load->model('donativos_model');
     
       if ($tipo=="cita") {
       $this->load->model('donativos_model');
       $insert = $this->donativos_model->agregarDonativoEspecieCita($id, $fecha, $cantidad_especie,$descripcion); 
      }elseif ($tipo=="jornada") {
          $insert = $this->donativos_model->agregarDonativoEspecieJornada($id, $fecha, $cantidad_especie,$descripcion); 
      }else  {
         $insert = $this->donativos_model->agregarDonativoEspecieCurso($id, $fecha, $cantidad_especie,$descripcion); 
      }

  }
  public function PeriodoCita(){
        
        $año = date('Y');
        $mes=date('m');
        $periodo=$año."-".$mes;
        $this->load->model('donativos_model');
        $insert = $this->donativos_model->agregarDonativoCitaPeriodo($año,$mes);  
  

  }

}
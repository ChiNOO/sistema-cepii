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
	 $data ['query'] = $this->donativos_model->get_appointment();
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

	 public function hacerAlgo() {
   $data ['query'] = $this->donativos_model->get_appointment();
     $this->load->model('donativos_model');
   $data['arrServicios'] = $this->donativos_model->get_servicios();
   $this->load->view('admin/view_control_donativos', $data);
  
    }


   public function registro_donativo(){
      $id=$this->uri->segment(3);
      $datos =  $this->donativos_model->getDonativo_taller($id);
    foreach ($datos->result() as $row) {
        $idEspacio = $row->idEspacio;
        $Nombre = $row->Nombre;
        $Capacidad = $row->Capacidad;
        $Tipo = $row->Tipo;
      }
      $data['idEspacio'] = $idEspacio;
      $data['Nombre'] = $Nombre;
      $data['Capacidad'] = $Capacidad;
      $data['Tipo'] = $Tipo;
      $this->load->view('admin/view_edita_espacios',$data);}

}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jornadas extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
    	$this->load->helper(array('url', 'form'));
  		$this->load->model('jornadas_model');
  		$this->load->database('default');
  		//$this->load->model('citas_model');
	}
  
	public function index(){
		$data['query'] = $this->jornadas_model->verTodos();
		$this->load->view('admin/view_jornadas',$data);
	}

    public function agregarJornada(){
    	$servicio = $this->input->post('servicio',TRUE);
		$detalle = $this->input->post('Detalle',TRUE);
		$espacio = $this->input->post('Espacio',TRUE);
		$Nombrep = $this->input->post('Nombrep',TRUE);
		$año = date('Y');
		$mes = $this->input->post('mes',TRUE);
		$fechas = $this->input->post('Fechas',TRUE);
		$hora_inicio = $this->input->post('Horai',TRUE);
		$hora_fin = $this->input->post('Horaf',TRUE);
		$costo = $this->input->post('Costo',TRUE);

    	$this->jornadas_model->guardar_jornada($servicio, $detalle, $espacio, $Nombrep, $año, $mes, $fechas, $hora_inicio, $hora_fin, $costo);
    	redirect('jornadas/');
  	}

//Agregué esto
 public function show_patient(){
        $q = strtolower($_GET['term']);
        $this->load->database('default');
        $this->load->model('jornadas_model');
        $valores = $this->jornadas_model->showPatient($q);
        echo json_encode($valores);  
  }
  //hasta aquí

}

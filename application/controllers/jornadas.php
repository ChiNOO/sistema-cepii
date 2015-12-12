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
	$todos_datos = array('enlaces' =>	$this->jornadas_model->verTodos());
	$this->load->view('admin/view_jornadas',$todos_datos);
    //$this->load->view('admin/view_jornadas');
	}

    public function agregarJornada(){
    $datos=array(
				'tipo_servicio' => $this->input->post('servicio',TRUE),
				'detalle' => $this->input->post('Detalle',TRUE),
				'espacio' => $this->input->post('Espacio',TRUE),
				'idProfesional' => $this->input->post('Nombrep',TRUE),
				'mes' => $this->input->post('mes',TRUE),
			    'fechas' => $this->input->post('Fechas',TRUE),
				'hora_inicio' => $this->input->post('Horai',TRUE),
				'hora_fin' => $this->input->post('Horaf',TRUE),
				'costo' => $this->input->post('Costo',TRUE),
			);

    $this->jornadas_model->guardar_jornada($datos);
    	redirect('jornadas/');
  }


}

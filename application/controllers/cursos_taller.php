<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_taller extends CI_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(array('url', 'form'));
  		$this->load->model('cursos_taller_model');
  		$this->load->database('default');
	}

	public function index(){
		$this->load->database('default');
		$search = $this->cursos_taller_model->buscador(); 
		$searchTerminados =$this->cursos_taller_model->buscadorTerminados(); 
		$searchVigentes =$this->cursos_taller_model->buscadorVigentes(); 
		$searchProximos =$this->cursos_taller_model->buscadorProximos(); 
		$data['search'] = $search;
		$data['searchTerminados'] = $searchTerminados;
		$data['searchVigentes'] = $searchVigentes;
		$data['searchProximos'] = $searchProximos;
		$this->load->view('admin/view_cursos_taller',$data);
	}

	public function agrega() {
		 $datos=array(
				'tipo' => $this->input->post('tipo',TRUE),
				'nombre' => $this->input->post('nombre',TRUE),
				'profesional_idProfesional' => $this->input->post('profesional',TRUE),
				'lugar' => $this->input->post('lugar',TRUE),
				'num_horas' => $this->input->post('n_horas',TRUE),
				'cantidad_personas' => $this->input->post('cantidad_personas',TRUE),
				'f_inicio' => $this->input->post('f_inicio',TRUE),
				'f_fin' => $this->input->post('f_fin',TRUE),
				'h_inicio' => $this->input->post('h_inicio',TRUE),
				'h_fin' => $this->input->post('h_fin',TRUE)
			);
		 //print_r($datos);
		$this->cursos_taller_model->guardar_curso_taller($datos);
    	redirect('cursos_taller/');
	}

	public function show_Espacio(){
		$q = strtolower($_GET['term']);
		$valores = $this->cursos_taller_model->get_Espacio($q);
		echo json_encode($valores);  
	}	
}

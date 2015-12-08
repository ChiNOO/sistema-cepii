<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
        $this->load->helper(array('url', 'form'));       
  		$this->load->model('paciente_model');
  		$this->load->database('default');
	}

	public function index(){
		$data['query'] = $this->paciente_model->getPacientes();
		$this->load->view('admin/view_persona', $data);
	}

	public function nuevoPaciente(){
		$this->load->view('admin/view_persona');
	}

	public function agregarPaciente(){
		$nombre = $this->input->post('nombre');
		$paterno = $this->input->post('paterno');
		$materno = $this->input->post('materno');
		$calle = $this->input->post('calle');
		$numero = $this->input->post('numero');
		$colonia = $this->input->post('colonia');
		$fecha = $this->input->post('fecha');
		$sexo = $this->input->post('sexo');
		$correo = $this->input->post('correo');
		$telefono = $this->input->post('telefono');
		$this->load->model('paciente_model');
		$insert = $this->paciente_model->agregarPaciente($nombre, $paterno, $materno, $calle, $numero, $colonia, $fecha, $sexo, $correo, $telefono);	
	}

	public function show_Paciente(){
		$q = strtolower($_GET['term']);
		$valores = $this->paciente_model->get_persona($q);
		echo json_encode($valores);  
	}

}

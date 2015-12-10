<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesionales extends CI_Controller {

	public function construc(){
		parent :: __construct();
		  $this->load->helper(array('url', 'form'));       
  		$this->load->model('login_model');
  		$this->load->database('default');
  		$this->load->model('citas_model');
  		
	}
	
	public function index(){
    $this->load->database('default');
    $this->load->model('profesional_model');
    $data['query'] = $this->profesional_model->getProfesional();
    $this->load->view('admin/view_profesionales', $data);
  }

  public function show_profesional(){
    $q = strtolower($_GET['term']);
    $rama = $_GET['ramaMedica'];
    /*print_r($rama);*/
    $this->load->database('default');
    $this->load->model('profesional_model');
    $valores = $this->profesional_model->showProfesional($q, $rama);
    echo json_encode($valores);  
  }

  public function agregarProfesional(){
    $nombre = $this->input->post('nombre');
    $paterno = $this->input->post('paterno');
    $materno = $this->input->post('materno');
    $ramaMedica = $this->input->post('ramaMedica');
    $correo = $this->input->post('correo');
    $telefono = $this->input->post('telefono');
    $usuario = $this->input->post('usuario');
    $contraseña = $this->input->post('contraseña');
    $this->load->model('profesional_model');
    $this->load->database('default');
    $insert = $this->profesional_model->agregarProfesional($nombre, $paterno, $materno, $ramaMedica, $correo, $telefono, $usuario, $contraseña);  
  }


}

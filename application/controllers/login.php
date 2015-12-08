<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper(array('url', 'form'));       
  		$this->load->model('login_model');
  		$this->load->database('default');
	}

	public function index(){
		$this->load->database('default');
		$this->load->view('view_login');
	}

	public function new_login(){
		$usuario = $this->input->post('usuario');
		$contrasena = $this->input->post('contrasena');
		$insert = $this->login_model->valida($usuario, $contrasena);
		//redirect(base_url().'Terapias');
		//$this->load->view('admin/view_control_terapias');

	}

	public function login_webService(){
		$usuario = $this->input->post('usuario');
		$contraseña = $this->input->post('contraseña');
		$this->load->model('profesional_model');
		$profesional = $this->profesional_model->get_profesional($usuario, $contraseña);
		print (json_encode($profesional));
	}
}

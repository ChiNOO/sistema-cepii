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
        $this->load->database('default');
        $this->load->model('profesional_model');
        $valores = $this->profesional_model->showProfesional($q);
        echo json_encode($valores);  
    }


}

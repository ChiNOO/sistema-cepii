<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
        $this->load->helper(array('url', 'form'));       
  		$this->load->model('login_model');
  		$this->load->database('default');
  		$this->load->model('citas_model');
	}

	public function index(){
		date_default_timezone_set('America/Monterrey');
		$fecha = date('Y-m-d');
		if ($this->input->post('Buscar')){
			$fecha = $this->input->post('fechaSearch');
		}
		$data ['fecha'] = $fecha;
		$data ['query'] = $this->citas_model->get_appointment($fecha);
		$this->load->view('admin/view_agenda', $data);
	}

	

}

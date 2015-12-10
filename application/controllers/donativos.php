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
	
	 $data ['query'] = $this->donativos_model->get_appointment();
	  $data['arrProfesiones'] = $this->donativos_model->get_profesiones();
	 $this->load->view('admin/view_control_donativos', $data);
	

	//$this->load->database('default');
	//$this->load->view('admin/view_control_donativos');
	}

	


}
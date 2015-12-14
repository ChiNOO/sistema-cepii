<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reportes extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper(array('url', 'form'));       
  		$this->load->database('default');
  		$this->load->model('reportes_model');
  		
	}

	public function index(){
		$this->load->view('admin/view_reportes');
	}  
		
}

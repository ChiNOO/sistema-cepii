<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donativos extends CI_Controller {

	
	public function construc(){
		parent :: __construct();
		$this->load->helper(array('url', 'form'));       
  		$this->load->model('login_model');
  		$this->load->database('default');
  	}
	public function index(){
	$this->load->database('default');
	$this->load->view('admin/view_control_donativos');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

	public function index(){
		$this->load->database('default');
		$this->load->view('admin/view_control_cursos');
	}

}

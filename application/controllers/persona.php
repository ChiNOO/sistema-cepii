<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
        $this->load->helper(array('url', 'form'));       
  		$this->load->model('persona_model');
  		$this->load->database('default');
	}

	public function index(){
		$data = $this->persona_model->get_persona();
		foreach($data->result() as $row){
	    	//echo "<li id=' $row[nombre']'></li>";
	    	echo "<li>$row->nombre</li>";
	    } 
	}

	public function show_persona(){
		$q = strtolower($_GET['term']);
		$valores = $this->persona_model->get_persona($q);
		echo json_encode($valores);  
	}

}

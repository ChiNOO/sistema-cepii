<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper(array('url', 'form'));       
  		$this->load->model('citas_model');
  		$this->load->database('default');		
	}

	public function new_appointment(){
		$nombreP = $this->input->post('nombreP');
		$claveP = $this->input->post('claveP');
		
		$nombrePRO = $this->input->post('nombrePRO');
		$fecha = $this->input->post('fecha');
		$hora = $this->input->post('hora');
		$consultorio = $this->input->post('consultorio');
		$info = $this->input->post('info');
		if ($claveP != ""){
			$insert = $this->citas_model->save_appointmentClv($claveP,$nombrePRO,$fecha,$hora,$consultorio,$info);
		}else{
			$insert = $this->citas_model->save_appointmentName($nombreP,$nombrePRO,$fecha,$hora,$consultorio,$info);
		}
		
		redirect(base_url().'Agenda');
	}

	public function get_citas(){
		$id =  $this->input->post('id');
		$this->load->model('citas_model');
		$citas = $this->citas_model->get_citas($id);
		print (json_encode($citas));
	}

}

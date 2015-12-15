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
		$horaIni = $this->input->post('horaIni');
		$horaFin = $this->input->post('horaFin');
		$espacio = $this->input->post('espacio');
		$insert = $this->citas_model->save_appointmentName($nombreP,$nombrePRO,$fecha,$horaIni, $horaFin,$espacio);
		
		redirect(base_url().'agenda');
	}

	public function get_citas(){
		$id =  $this->input->post('id');
		$this->load->model('citas_model');
		$citas = $this->citas_model->get_citas($id);
		print (json_encode($citas));
	}

	public function eliminar(){
        $id = $this->uri->segment(3);
        $this->load->model('citas_model');
        $delte = $this->citas_model->eliminar_cita($id);
    }

}

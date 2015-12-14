<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Donativos_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
  
    public function get_appointment(){
      
       $this->db->order_by('fecha_ini', 'asc');
        $query = $this->db->get('donativo_curso_taller');
        
        if($query->num_rows() > 0){
            return $query->result();
        }



    }

    public function get_servicios(){
    
        $this->db->order_by('nombre', 'asc');
        $servicios = $this->db->get('servicios');
        
        if($servicios->num_rows() > 0){
            return $servicios->result();
        }
    
  }
    public function getServicioCitas($TipoBusque){
       $this->db->where('id_servicio', $TipoBusque);
        $this->db->order_by('fecha', 'asc');
        $cita_donativo = $this->db->get('cita_donativo');
        
        if($cita_donativo->num_rows() > 0){
            return $cita_donativo->result();
        }
  }
}
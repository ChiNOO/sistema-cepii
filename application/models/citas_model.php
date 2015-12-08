<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Citas_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
 
    public function save_appointmentName($nombreP,$nombrePRO,$fecha,$hora,$consultorio,$info){
        
        $this->db->select('idPersona, CONCAT(nombrePersona," ", amaPersona," ",apaPersona) AS name', FALSE);
        $this->db->from('persona');
        $query = $this->db->get();
        print_r($query->result());
        foreach ($query->result() as $row) {
            if ($row->name == $nombreP) {
                $id = $row->idPersona;
            }
        }
        $this->db->select('idProfesional, CONCAT(nombrePro," ", amaPro," ",apaPro) AS name', FALSE);
        $this->db->from('profesional');
        $query2 = $this->db->get();
        foreach ($query2->result() as $row2) {
            if ($row2->name == $nombrePRO) {
                $idP = $row2->idProfesional;
            }
        }
        $array = array(
            'persona_idpersona' => $id,
            'profesional_idProfesional' => $idP,
            'hora' => $hora,
            'fecha' => $fecha,
            'consultorio' => $consultorio
            );
        
        $this->db->insert('cita', $array);
    }

    public function get_appointment(){
        $this->db->select('cita.hora, cita.fecha, cita.consultorio, cita.estado, profesional.nombrePro, profesional.amaPro,
                            profesional.apaPro, profesional.ramaMedica, persona.nombrePersona, persona.amaPersona,
                            persona.apaPersona, persona.celPersona');
        $this->db->from('cita');
        $this->db->join('persona', 'persona.idpersona = cita.persona_idpersona');
        $this->db->join('profesional', 'profesional.idProfesional = cita.profesional_idProfesional');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_citas($id){
        $this->db->select('cita.hora, cita.fecha, cita.consultorio, cita.estado, profesional.nombrePro, profesional.amaPro,
                            profesional.apaPro, profesional.ramaMedica, persona.nombrePersona, persona.amaPersona,
                            persona.apaPersona, persona.celPersona');
        $this->db->from('cita');
        $this->db->join('persona', 'persona.idpersona = cita.persona_idpersona');
        $this->db->join('profesional', 'profesional.idProfesional = cita.profesional_idProfesional');
        $this->db->where('profesional_idProfesional', $id);
        $this->db->order_by('hora'); 
        $query = $this->db->get();
        return $query->result();      
    }
}
//https://www.youtube.com/watch?v=I30kaZbjbfI
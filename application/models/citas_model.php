<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Citas_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
 
    public function save_appointmentName($nombreP,$nombrePRO,$fecha,$horaIni, $horaFin, $espacio){
        
        $this->db->select('idPersona, CONCAT(nombrePersona," ", amaPersona," ",apaPersona) AS name', FALSE);
        $this->db->from('persona');
        $query = $this->db->get();
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

        $this->db->select();
        $this->db->where('Nombre', $espacio);
        $query3 = $this->db->get('espacio');
        if ($query3->num_rows() == 1) {
            foreach ($query3->result() as $row) {
                $idEspacio = $row->idEspacio;
            }
        }

        $array = array(
            'persona_idpersona' => $id,
            'profesional_idProfesional' => $idP,
            'horaIni' => $horaIni,
            'horaFin' => $horaFin,
            'fecha' => $fecha,
            'espacio_idEspacio' => $idEspacio
            );
        
        $this->db->insert('cita', $array);
    }

    public function get_appointment($fecha){
        $this->db->select('cita.horaIni, cita.horaFin, cita.fecha, cita.espacio_idEspacio, profesional.nombrePro, profesional.amaPro,
                            profesional.apaPro, profesional.ramaMedica, persona.nombrePersona, persona.amaPersona,
                            persona.apaPersona, persona.celPersona, espacio.idEspacio, espacio.Nombre');
        $this->db->from('cita');
        $this->db->join('persona', 'persona.idpersona = cita.persona_idpersona');
        $this->db->join('profesional', 'profesional.idProfesional = cita.profesional_idProfesional');
        $this->db->join('espacio', 'espacio.idEspacio = cita.espacio_idEspacio');
        $this->db->where('fecha', $fecha);
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
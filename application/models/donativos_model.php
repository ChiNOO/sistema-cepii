<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Donativos_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
  
    public function get_appointment(){
        $this->db->select('donativo.idDonativo,donativo.Nombre, donativo.TipoDonativo, donativo.Cantidad, donativo.Fecha,persona.nombrePersona,persona.amaPersona,persona.apaPersona');
        $this->db->from('donativo');
        $this->db->join('persona', 'donativo.Persona_idPersona = persona.idpersona');
        $query = $this->db->get();
        return $query->result();
    }

    function get_profesiones($servicioDonaciones){
    
      if ($servicioDonaciones=="Citas") {
      
       $query = $this->db-> query('SELECT idcita,fecha FROM cita');
      //  $this->db->select();
       // $this->db->where('nombrePro', $TipoDonativo);
       // $query = $this->db->get('profesional');
      // si hay resultados
          if ($query->num_rows() > 0) {
             // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
            $arrDatos[htmlspecialchars($row->idcita, ENT_QUOTES)] = 
            htmlspecialchars($row->fecha, ENT_QUOTES);

            $query->free_result();
            return $arrDatos;
            }
    }
 
      if ($servicioDonaciones=="Curso") {
      
       $query = $this->db-> query('SELECT idcita,hora FROM cita');
      //  $this->db->select();
       // $this->db->where('nombrePro', $TipoDonativo);
       // $query = $this->db->get('profesional');
      // si hay resultados
          if ($query->num_rows() > 0) {
             // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
            $arrDatos[htmlspecialchars($row->idcita, ENT_QUOTES)] = 
            htmlspecialchars($row->hora, ENT_QUOTES);

            $query->free_result();
            return $arrDatos;
            }
    }


  }
    



}
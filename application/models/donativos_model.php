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

    function get_profesiones(){
      // armamos la consulta
          $query = $this->db-> query('SELECT idProfesional,nombrePro FROM profesional');

      // si hay resultados
          if ($query->num_rows() > 0) {
             // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
            $arrDatos[htmlspecialchars($row->idProfesional, ENT_QUOTES)] = 
            htmlspecialchars($row->nombrePro, ENT_QUOTES);

            $query->free_result();
            return $arrDatos;
            }
    }



}
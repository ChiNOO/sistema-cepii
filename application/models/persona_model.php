<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Persona_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    function get_persona($q){
        $this->db->select();
        $this->db->like('nombrePersona', $q);
        $this->db->or_like('amaPersona', $q);
        $this->db->or_like('apaPersona', $q);
        $query = $this->db->get('persona');
        $query->num_rows();

        if($query->num_rows > 0){
            foreach ($query->result() as $row){
                $new_row['id'] = htmlentities(stripslashes($row->idpersona));
                $new_row['value'] = htmlentities(stripslashes($row->nombrePersona.' '.$row->amaPersona.' '.$row->apaPersona));
                $row_set[] = $new_row;
            }
            return $row_set;
        }
    }
 
  
}
//https://www.youtube.com/watch?v=I30kaZbjbfI
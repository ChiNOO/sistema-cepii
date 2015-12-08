<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profesional_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }


    function get_profesional($usuario, $contraseña){
        $this->db->select();
        $this->db->where('usuario', $usuario);
        $this->db->where('contraseña', $contraseña);
        $query = $this->db->get('profesional');
        if ($query -> num_rows() == 1) {
            return $query->result();
        }else{
            return array('usuario' => "" , 'contraseña' => "");
        }
        
    }  

    function getProfesional(){
        $this->db->select();
        $query = $this->db->get('profesional');
        return $query->result();       
    }  

    function showProfesional($q){
        $this->db->select();
        $this->db->like('nombrePro', $q);
        $this->db->or_like('amaPro', $q);
        $this->db->or_like('apaPro', $q);
        $query = $this->db->get('profesional');
        $query->num_rows();

        if($query->num_rows > 0){
            foreach ($query->result() as $row){
                $new_row['id'] = htmlentities(stripslashes($row->cedulaProfesional));
                $new_row['value'] = htmlentities(stripslashes($row->nombrePro.' '.$row->amaPro.' '.$row->apaPro));
                $row_set[] = $new_row;
            }
            return $row_set;
        }
    }  
}

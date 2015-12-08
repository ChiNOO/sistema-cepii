<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }
 
    public function valida($usuario, $contrasena){
        print_r($usuario);
        $this->db->select();
        $this->db->where('usuario', $usuario);
        $this->db->where('contraseña', $contrasena);
        $query = $this->db->get('profesional');

        if ($query->num_rows() == 1) {
            //return $query->row();
            redirect(base_url().'Agenda');    
        }else{
            redirect(base_url());
        }
    }
}

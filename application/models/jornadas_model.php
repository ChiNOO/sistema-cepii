<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jornadas_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
 
public function guardar_jornada($datos){
      $this->db->insert('jornada', $datos);
    }


  }

  
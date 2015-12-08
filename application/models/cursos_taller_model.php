<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cursos_taller_model extends CI_Model{
  public function __construct() {
    parent::__construct();
  }

  public function guardar_curso_taller($datos){
    $this->db->insert('curso_taller', $datos);
  }

  function buscador(){
    $this->db->select('tipo, profesional, lugar, direccion, num_horas, f_inicio, f_fin, h_inicio, h_fin');
    //$this->db->like('tipo',$abuscar,'after');
    $this->db->order_by("f_inicio","desc");
    $resultados = $this->db->get('curso_taller', 22);
     //si existe algún resultado lo devolvemos
      if($resultados->num_rows() > 0)
      {

        return $resultados;

      //en otro caso devolvemos false
      }else{

        return FALSE;

      }
  }
}

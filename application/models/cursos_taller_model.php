<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cursos_taller_model extends CI_Model{
  public function __construct() {
    parent::__construct();
  }

  public function guardar_curso_taller($datos){
    $this->db->select('idProfesional, CONCAT(nombrePro," ", amaPro," ",apaPro) AS name', FALSE);
    $this->db->from('profesional');
    $query2 = $this->db->get();
    foreach ($query2->result() as $row2) {
        if ($row2->name == $datos['profesional_idProfesional']) {
            $datos['profesional_idProfesional'] = $row2->idProfesional;
        }
    }
    $this->db->insert('curso_taller', $datos);
  }

  function buscador(){
    $this->db->select('profesional.idProfesional, profesional.nombrePro, profesional.apaPro, profesional.amaPro, curso_taller.tipo, curso_taller.profesional_idProfesional, curso_taller.lugar, curso_taller.num_horas,
      curso_taller.cantidad_personas, curso_taller.f_inicio, curso_taller.f_fin, curso_taller.h_inicio, curso_taller.h_fin');
    //$this->db->like('tipo',$abuscar,'after');
    $this->db->order_by("f_inicio","desc");
    $this->db->from('curso_taller');
    $this->db->join('profesional', 'profesional.idProfesional = curso_taller.profesional_idProfesional');
    $resultados = $this->db->get();
     //si existe algún resultado lo devolvemos
      if($resultados->num_rows() > 0)
      {

        return $resultados;

      //en otro caso devolvemos false
      }else{

        return FALSE;

      }
  }

  function buscadorTerminados(){
    $dia=date("d")-1;
    $mes= date("m");
    $year= date("Y");
    $this->db->select('profesional.idProfesional, profesional.nombrePro, profesional.apaPro, profesional.amaPro, curso_taller.tipo, curso_taller.profesional_idProfesional, curso_taller.lugar, curso_taller.num_horas,
      curso_taller.cantidad_personas, curso_taller.f_inicio, curso_taller.f_fin, curso_taller.h_inicio, curso_taller.h_fin');
    $this->db->from('curso_taller');
    $this->db->join('profesional', 'profesional.idProfesional = curso_taller.profesional_idProfesional');
    $this->db->where('f_fin <='.'"'.$year.'-'.$mes.'-'.$dia.'"');
    $this->db->order_by("f_inicio","desc");
    $resultados = $this->db->get();
     //si existe algún resultado lo devolvemos
      if($resultados->num_rows() > 0)
      {

        return $resultados;

      //en otro caso devolvemos false
      }else{

        return FALSE;

      }
  }

  function buscadorVigentes(){
    $dia=date("d")-1;
    $mes= date("m");
    $year= date("Y");
    $this->db->select('profesional.idProfesional, profesional.nombrePro, profesional.apaPro, profesional.amaPro, curso_taller.tipo, curso_taller.profesional_idProfesional, curso_taller.lugar, curso_taller.num_horas,
      curso_taller.cantidad_personas, curso_taller.f_inicio, curso_taller.f_fin, curso_taller.h_inicio, curso_taller.h_fin');
    $this->db->from('curso_taller');
    $this->db->join('profesional', 'profesional.idProfesional = curso_taller.profesional_idProfesional');
    $this->db->where('f_fin >='.'"'.$year.'-'.$mes.'-'.$dia.'"');
    $this->db->where('f_inicio <='.'"'.$year.'-'.$mes.'-'.$dia.'"');
    $this->db->order_by("f_inicio","desc");
    $resultados = $this->db->get();
     //si existe algún resultado lo devolvemos
      if($resultados->num_rows() > 0)
      {

        return $resultados;

      //en otro caso devolvemos false
      }else{

        return FALSE;

      }
  }

  function buscadorProximos(){
    $dia=date("d")-1;
    $mes= date("m");
    $year= date("Y");
    $this->db->select('profesional.idProfesional, profesional.nombrePro, profesional.apaPro, profesional.amaPro, curso_taller.tipo, curso_taller.profesional_idProfesional, curso_taller.lugar, curso_taller.num_horas,
      curso_taller.cantidad_personas, curso_taller.f_inicio, curso_taller.f_fin, curso_taller.h_inicio, curso_taller.h_fin');
    $this->db->from('curso_taller');
    $this->db->join('profesional', 'profesional.idProfesional = curso_taller.profesional_idProfesional');
    $this->db->where('f_inicio >'.'"'.$year.'-'.$mes.'-'.$dia.'"');
    $this->db->order_by("f_inicio","desc");
    $resultados = $this->db->get();
     //si existe algún resultado lo devolvemos
      if($resultados->num_rows() > 0) {
        return $resultados;
      //en otro caso devolvemos false
      }else{
        return FALSE;
      }
  }


}

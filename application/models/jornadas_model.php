<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jornadas_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
 
  public function guardar_jornada($servicio, $detalle, $espacio, $Nombrep, $año, $mes, $fechas, $hora_inicio, $hora_fin, $costo){
    
    $this->db->select('idProfesional, CONCAT(nombrePro," ", amaPro," ",apaPro) AS name', FALSE);
    $this->db->from('profesional');
    $query2 = $this->db->get();
    foreach ($query2->result() as $row2) {
        if ($row2->name == $Nombrep) {
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
  
    $datos=array(
          'tipo_servicio' => $servicio,
          'detalle' => $detalle,
          'espacio_idEspacio' => $idEspacio,
          'idProfesional' => $idP,
          'año' => date('Y'),
          'mes' => $mes,
          'fechas' => $fechas,
          'hora_inicio' => $hora_inicio,
          'hora_fin' => $hora_fin,
          'costo' => $costo,
        );
        $this->db->insert('jornada', $datos);
  }

  public function verTodos(){
    $this->db->select('jornada.idJornada, jornada.tipo_servicio, jornada.detalle, jornada.espacio_idEspacio, jornada.idProfesional,
                      jornada.año, jornada.mes, jornada.fechas, jornada.hora_inicio, jornada.hora_fin, jornada.costo,
                      espacio.idEspacio, espacio.Nombre, profesional.idProfesional, profesional.nombrePro, profesional.apaPro, profesional.amaPro');
    $this->db->from('jornada');
    $this->db->join('espacio', 'espacio.idEspacio = jornada.espacio_idEspacio');
    $this->db->join('profesional', 'profesional.idProfesional = jornada.idProfesional');
    $query = $this->db->get();
    if ($query->num_rows() > 0){
      return $query->result();
    }else{
      return FALSE;
    }
  }
}

  
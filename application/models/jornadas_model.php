<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jornadas_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
 
  public function guardar_jornada($nombreJornada, $servicio, $detalle, $espacio, $Nombrep, $año, $mes, $fechas, $hora_inicio, $hora_fin, $costo){
    
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
          'nombreJornada' => $nombreJornada,
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
    $this->db->select('jornada.idJornada, jornada.nombreJornada, jornada.tipo_servicio, jornada.detalle, jornada.espacio_idEspacio, jornada.idProfesional,
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

//AGREGUÉ ESTO
function showPatient($q){
        $this->db->select();
        $this->db->like('nombrePersona', $q);
        $this->db->or_like('apaPersona', $q);
        $this->db->or_like('amaPersona', $q);
        $query = $this->db->get('persona');
        $query->num_rows();

        if($query->num_rows > 0){
            foreach ($query->result() as $row){
                    $new_row['id'] = htmlentities(stripslashes($row->idpersona));
                    $new_row['value'] = htmlentities(stripslashes($row->nombrePersona.' '.$row->apaPersona.' '.$row->amaPersona));
                    $row_set[] = $new_row;                
            }
            return $row_set;
        }
    }  
//AGREGUÉ ESTO

//Agregué esto para ver la jornada
function showJor($q){
        $this->db->select();
        $this->db->like('nombreJornada', $q);
        $query = $this->db->get('jornada');
        $query->num_rows();

        if($query->num_rows > 0){
            foreach ($query->result() as $row){
                    $new_row['id'] = htmlentities(stripslashes($row->idJornada));
                    $new_row['value'] = htmlentities(stripslashes($row->nombreJornada));
                    $row_set[] = $new_row;                
            }
            return $row_set;
        }
    }  

//Aquí agregué

public function guardar_pa($idpersona, $idJornada){
    
    $this->db->select('idpersona, CONCAT(nombrePersona," ", apaPersona," ",amaPersona) AS name', FALSE);
    $this->db->from('persona');
    $query2 = $this->db->get();
    foreach ($query2->result() as $row2) {
        if ($row2->name == $Persona) {
            $idP = $row2->idpersona;
        }
    }
    $this->db->select('idJornada, tipo_servicio) AS name', FALSE);
    $this->db->from('jornada');
    $query2 = $this->db->get();
    foreach ($query2->result() as $row2) {
        if ($row2->name == $Tservicio) {
            $idP = $row2->idJornada;
        }
    }
  
    $datos=array(
          'idPersona' => $Persona,
          'idJornada' => $Tservicio,
        );
        $this->db->insert('jornada_persona', $datos);
  }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Espacios_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    public function guardar_espacio($datos){
      $this->db->insert('Espacio', $datos);
    }

    function verTodos() {
      $query = $this->db->get('espacio');
  		if ($query->num_rows() > 0){
  		  return $query;
  		}else{
  		  return FALSE;
  		}
  	}
    public function getEspacio($id){
      $this->db->select('idEspacio,Nombre, Capacidad,Tipo');
		  $this->db->from('Espacio AS A');
      $this->db->where('A.idEspacio ='.$id);
		  $query = $this->db->get();

		if ($query->num_rows() > 0){
		 return $query;
		}else{
		  return FALSE;
		}
    }

    function actualizar($id,$arreglo){
      $this->db->where('idEspacio', $id["idEspacio"]);
      $this->db->update('Espacio', $arreglo);

        //print_r ($arreglo);
    }

    function eliminar_espacio($id){
      $this->db->where('idEspacio', $id);
      $this->db->delete('Espacio');
    }
    public function buscador($abuscar)
    {
      //usamos after para decir que empiece a buscar por
      //el principio de la cadena
      //ej SELECT localidad from localidades_es
      //WHERE localidad LIKE '%$abuscar' limit 12
      $this->db->select('idEspacio, Nombre, Capacidad, Tipo');

      $this->db->like('Nombre',$abuscar,'after');

      $resultados = $this->db->get('Espacio', 22);

      //si existe algún resultado lo devolvemos
      if($resultados->num_rows() > 0)
      {

        return $resultados;

      //en otro caso devolvemos false
      }else{

        return FALSE;

      }

    }

    public function get_espacio($q, $nombrePro, $fecha, $horaIni, $horaFin){
      $this->db->select('idProfesional, CONCAT(nombrePro," ", amaPro," ",apaPro) AS name', FALSE);
      $this->db->from('profesional');
      $query2 = $this->db->get();

      foreach ($query2->result() as $row2) {
          if ($row2->name == $nombrePro) {
              $idP = $row2->idProfesional;
          }
      }
      $this->db->select();
      $this->db->where('profesional_idProfesional', $idP);
      $this->db->where('fecha', $fecha);
      $this->db->where('horaIni <=', $horaIni);
      $this->db->where('horaFin >=', $horaFin);
      $query = $this->db->get('cita');
      if ($query->num_rows() >= 1) {
          $new_row['id'] = htmlentities(stripslashes(0));
          $new_row['value'] = htmlentities(stripslashes("El profesional se encuentra ocupado en esa fecha"));
          $row_set[] = $new_row;
          return $row_set;
      }else{

        $this->db->select('cita.espacio_idEspacio, cita.horaIni, cita.horaFin, cita.fecha, espacio.idEspacio, espacio.Nombre');
        $this->db->from('cita');
        $this->db->join('espacio', 'espacio.idEspacio = cita.espacio_idEspacio');
        $this->db->like('Nombre', $q);
        $this->db->where('fecha', $fecha);
        $this->db->where('horaIni <=', $horaIni);
        $this->db->where('horaFin >=', $horaFin);
        $query3 = $this->db->get();
        if($query3->num_rows() >= 1){
          $new_row['id'] = htmlentities(stripslashes(0));
          $new_row['value'] = htmlentities(stripslashes("El espacio se encuentra ocupado en esa fecha"));
          $row_set[] = $new_row;
          return $row_set;
        }else{
          $this->db->select();
          $this->db->like('Nombre', $q);
          $query4 = $this->db->get('espacio');
          foreach ($query4->result() as $row){
            $new_row['id'] = htmlentities(stripslashes($row->idEspacio));
            $new_row['value'] = htmlentities(stripslashes($row->Nombre));
            $row_set[] = $new_row;
          }
          return $row_set;
        }

      }

      
  }
}

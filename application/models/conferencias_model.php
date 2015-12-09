<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Conferencias_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    public function guardar_conferencia($datos){
      $this->db->insert('conferencias', $datos);
    }

    function verTodos() {
      $query = $this->db->get('conferencias');
  		if ($query->num_rows() > 0){
  		  return $query;
  		}else{
  		  return FALSE;
  		}
  	}
    public function getConferencia($id){
      $this->db->select('idConferencia,tema, descripcion, nombrePonente', 'numAsistentes', 'lugar', 'fecha', 'hora', 'direccion');
		  $this->db->from('Conferencias AS C');
      $this->db->where('C.idConferencia ='.$id);
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

    function eliminar_conferencia($id){
      $this->db->where('idEspacio', $id);
      $this->db->delete('Espacio');
    }
    public function buscador($abuscar)
    {
      //usamos after para decir que empiece a buscar por
      //el principio de la cadena
      //ej SELECT localidad from localidades_es
      //WHERE localidad LIKE '%$abuscar' limit 12
      $this->db->select('idEspacio, Nombre, Capacidad, Tipo_Servicio');

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
}
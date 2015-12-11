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
      $this->db->select('idConferencia,acompañantes, descripcion, nombrePonente, numAsistentes, lugar, fecha, hora, direccion');
		  $this->db->from('Conferencias');
      $this->db->where('Conferencias.idConferencia ='.$id);
		  $query = $this->db->get();

		if ($query->num_rows() > 0){
		 return $query;
		}else{
		  return FALSE;
		}
    }

    function actualizar($id,$arreglo){
      $this->db->where('idConferencia', $id["idConferencia"]);
      $this->db->update('conferencias', $arreglo);

        //print_r ($arreglo);
    }

    function eliminar_conferencia($id){
      $this->db->where('idConferencia', $id);
      $this->db->delete('Conferencias');
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
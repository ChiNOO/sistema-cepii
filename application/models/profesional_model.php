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

    function showProfesional($q, $rama){
        $this->db->select();
        $this->db->like('nombrePro', $q);
        $this->db->or_like('amaPro', $q);
        $this->db->or_like('apaPro', $q);
        $query = $this->db->get('profesional');
        $query->num_rows();

        if($query->num_rows > 0){
            foreach ($query->result() as $row){
                if($row->ramaMedica == $rama){
                    $new_row['id'] = htmlentities(stripslashes($row->idProfesional));
                    $new_row['value'] = htmlentities(stripslashes($row->nombrePro.' '.$row->amaPro.' '.$row->apaPro));
                    $row_set[] = $new_row;
                }
                
            }
            return $row_set;
        }
    }  

    public function agregarProfesional($nombre, $paterno, $materno, $ramaMedica, $correo, $telefono, $usuario, $contraseña){
        $profesional = array('nombrePro' => $nombre,
                            'apaPro' => $paterno,
                            'amaPro' => $materno,
                            'celPro' => $telefono,
                            'correoPro' => $correo,
                            'ramaMedica' => $ramaMedica,
                            'usuario' => $usuario,
                            'contraseña' => $contraseña);
        $this->db->insert('profesional', $profesional);
        redirect(base_url().'Profesionales');
    }

    public function delete_profesional($id){
        $this->db->where('idProfesional', $id);
        $this->db->delete('profesional');
        redirect(base_url().'Profesionales');
    }

    public function upDateProfesional($id){
        $this->db->select();
        $this->db->where('idProfesional', $id);
        $query = $this->db->get('profesional');
        return $query->result();
    }

    public function upDateProfesionalId($id, $nombre, $paterno, $materno, $ramaMedica, $correo, $telefono, $usuario){
        $profesional = array('nombrePro' => $nombre,
                            'apaPro' => $paterno,
                            'amaPro' => $materno,
                            'celPro' => $telefono,
                            'correoPro' => $correo,
                            'ramaMedica' => $ramaMedica,
                            'usuario' => $usuario);
        $this->db->where('idProfesional', $id);
        $this->db->update('profesional', $profesional);
        redirect(base_url().'Profesionales');
    }

    public function buscador($abuscar){
      //usamos after para decir que empiece a buscar por
      //el principio de la cadena
      //ej SELECT localidad from localidades_es
      //WHERE localidad LIKE '%$abuscar' limit 12
      $this->db->select();

      $this->db->or_like('nombrePro',$abuscar,'after');
      $this->db->or_like('apaPro',$abuscar,'after');
      $this->db->or_like('amaPro',$abuscar,'after');

      $resultados = $this->db->get('profesional', 22);

      //si existe algún resultado lo devolvemos
      if($resultados->num_rows() > 0){
        return $resultados;
      //en otro caso devolvemos false
      }else{
        return FALSE;
      }

    }
}

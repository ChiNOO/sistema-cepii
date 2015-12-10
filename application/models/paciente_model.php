<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paciente_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    function get_persona($q){
        $this->db->select();
        $this->db->like('nombrePersona', $q);
        $this->db->or_like('amaPersona', $q);
        $this->db->or_like('apaPersona', $q);
        $query = $this->db->get('persona');
        $query->num_rows();

        if($query->num_rows > 0){
            foreach ($query->result() as $row){
                $new_row['id'] = htmlentities(stripslashes($row->idpersona));
                $new_row['value'] = htmlentities(stripslashes($row->nombrePersona.' '.$row->amaPersona.' '.$row->apaPersona));
                $row_set[] = $new_row;
            }
            return $row_set;
        }
    }

    function getPacientes(){
        $query = $this->db->get('persona');
        return $query->result();

    }

    function getPacienteId($id){
        $this->db->select();
        $this->db->where('idpersona', $id);
        $query = $this->db->get('persona');
        return $query->result();
    }

    function delete_Paciente($id){
        $this->db->where('idpersona', $id);
        $this->db->delete('persona');
        redirect(base_url().'Paciente');
    }

    function agregarPaciente($nombre, $paterno, $materno, $calle, $numero, $colonia, $fecha, $sexo, $correo, $telefono){
        $datos = array('nombrePersona' => $nombre,
                        'apaPersona' => $paterno,
                        'amaPersona' => $materno,
                        'callePersona' => $calle,
                        'numDirPersona' => $numero,
                        'coloniaPersona' => $colonia,
                        'celPersona' => $telefono,
                        'correoPersona' => $correo,
                        'sexo' => $sexo,
                        'fechaNa' => $fecha);
        $this->db->insert('persona', $datos);
        redirect(base_url().'Paciente');
    }
    
    function upDatePaciente($id, $nombre, $paterno, $materno, $calle, $numero, $colonia, $fecha, $sexo, $correo, $telefono){
        $datos = array('nombrePersona' => $nombre,
                        'apaPersona' => $paterno,
                        'amaPersona' => $materno,
                        'callePersona' => $calle,
                        'numDirPersona' => $numero,
                        'coloniaPersona' => $colonia,
                        'celPersona' => $telefono,
                        'correoPersona' => $correo,
                        'sexo' => $sexo,
                        'fechaNa' => $fecha);
        $this->db->where('idpersona', $id);
        $this->db->update('persona', $datos);

        redirect(base_url().'Paciente');
    }
  
}

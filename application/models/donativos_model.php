<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Donativos_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
  
    public function get_Cursos_taller(){
      
       $this->db->order_by('fecha_ini', 'asc');
        $query = $this->db->get('donativo_curso_taller');
        
        if($query->num_rows() > 0){
            return $query->result();
        }
}
   public function get_Jornadas(){
      
       $this->db->order_by('nombreJornadaD', 'asc');
        $query = $this->db->get('donativo_jornadas');
        
        if($query->num_rows() > 0){
            return $query->result();
        }
    }
     public function get_Citas(){
      
       $this->db->order_by('año', 'asc');
        $query = $this->db->get('donativo_citas');
        
        if($query->num_rows() > 0){
            return $query->result();
        }

    }
        public function agregarDonativoCitaPeriodo($año,$mes){
          

        $this->db->select();
        $this->db->where('mes', $mes);
        $query = $this->db->get('donativo_citas');
        
        if($query->num_rows() == 0){
         
          $datos = array('año' => $año,
                        'mes' => $mes,
                        'monto_monetario' => 0,
                        'monto_especie'=> 0);
          $this->db->insert('donativo_citas', $datos);
          redirect(base_url().'donativos');
        }else {
          redirect(base_url().'donativos');
            # code...
        }

}
///////////////////////////////////////////////////////////7
    public function agregarDonativoMonetarioCita($id, $fecha, $cantidad_monetario){

          $datos = array('id_donativo_cita' => $id,
                        'fecha' => $fecha,
                        'cantidad'=> $cantidad_monetario);
       $this->db->insert('monto_monetario_cita', $datos);
         redirect(base_url().'donativos');
     
    }
    public function agregarDonativoMonetarioJornada($id, $fecha, $cantidad_monetario){

          $datos = array('id_donativo_jornada' => $id,
                        'fecha' => $fecha,
                        'cantidad'=> $cantidad_monetario);
       $this->db->insert('monto_monetario_jornada', $datos);
         redirect(base_url().'donativos');
     
    }
    public function agregarDonativoMonetarioCurso($id, $fecha, $cantidad_monetario){

          $datos = array('id_donativo_cur_tall' => $id,
                        'fecha' => $fecha,
                        'cantidad'=> $cantidad_monetario);
       $this->db->insert('monto_monetario_cur_tall', $datos);
         redirect(base_url().'donativos');
     
    }
///////////////////////////////////////////////////////////////////////

    public function agregarDonativoEspecieCita($id, $fecha, $cantidad_especie,$descripcion){

          $datos = array('id_donativo_cita' => $id,
                        'fecha' => $fecha,
                        'cantidad' => $cantidad_especie,
                        'descripcion'=> $descripcion);
       $this->db->insert('monto_especie_cita', $datos);
        redirect(base_url().'donativos');

    }

     public function agregarDonativoEspecieJornada($id, $fecha, $cantidad_especie,$descripcion){

          $datos = array('id_donativo_jornada' => $id,
                        'fecha' => $fecha,
                        'cantidad' => $cantidad_especie,
                        'descripcion'=> $descripcion);
       $this->db->insert('monto_especie_jornada', $datos);
        redirect(base_url().'donativos');

    }

     public function agregarDonativoEspecieCurso($id, $fecha, $cantidad_especie,$descripcion){

          $datos = array('id_donativo_cur_tall' => $id,
                        'fecha' => $fecha,
                        'cantidad' => $cantidad_especie,
                        'descripcion'=> $descripcion);
       $this->db->insert('monto_especie_cur_tall', $datos);
        redirect(base_url().'donativos');

    }




///////////////////Obtener id curso o taller//////////////////////
    public function getDonativoCursoIDmon($id){
        $this->db->select();
        $this->db->where('id_donativo_cur_tall', $id);
        $query = $this->db->get('donativo_curso_taller');
        return $query->result();
    }

    public function getDonativoCursoIDesp($id){
        $this->db->select();
        $this->db->where('id_donativo_cur_tall', $id);
        $query = $this->db->get('donativo_curso_taller');
        return $query->result();
    }
//////////////////////////////////////////7
public function getDonativoJornadaIDmon($id){
        $this->db->select();
        $this->db->where('id_donativo_jornada', $id);
        $query = $this->db->get('donativo_jornadas');
        return $query->result();
}
public function getDonativoJornadaIDesp($id){
        $this->db->select();
        $this->db->where('id_donativo_jornada', $id);
        $query = $this->db->get('donativo_jornadas');
        return $query->result();
}
////////////////////7////////////////////
////////////////////////////////////////
public function getDonativoCitaIDmon($id){
        $this->db->select();
        $this->db->where('id_donativo_cita', $id);
        $query = $this->db->get('donativo_citas');
        return $query->result();
}
public function getDonativoCitaIDesp($id){
        $this->db->select();
        $this->db->where('id_donativo_cita', $id);
        $query = $this->db->get('donativo_citas');
        return $query->result();
}
///////////////////////////////////////






    public function get_servicios(){
    
        $this->db->order_by('nombre', 'asc');
        $servicios = $this->db->get('servicios');
        
        if($servicios->num_rows() > 0){
            return $servicios->result();
        }
    
  }
    public function getServicioCitas($TipoBusque){
       $this->db->where('id_servicio', $TipoBusque);
        $this->db->order_by('fecha', 'asc');
        $cita_donativo = $this->db->get('cita_donativo');
        
        if($cita_donativo->num_rows() > 0){
            return $cita_donativo->result();
        }
  }
}
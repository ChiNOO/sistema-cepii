<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
        $this->load->helper(array('url', 'form'));       
  		$this->load->model('paciente_model');
  		$this->load->database('default');
	}

	public function index(){
		$data['query'] = $this->paciente_model->getPacientes();
		$this->load->view('admin/view_persona', $data);
	}

	public function nuevoPaciente(){
		$this->load->view('admin/view_persona');
	}

	public function agregarPaciente(){
		$nombre = $this->input->post('nombre');
		$paterno = $this->input->post('paterno');
		$materno = $this->input->post('materno');
		$calle = $this->input->post('calle');
		$numero = $this->input->post('numero');
		$colonia = $this->input->post('colonia');
		$fecha = $this->input->post('fecha');
		$sexo = $this->input->post('sexo');
		$correo = $this->input->post('correo');
		$telefono = $this->input->post('telefono');
		$this->load->model('paciente_model');
		$insert = $this->paciente_model->agregarPaciente($nombre, $paterno, $materno, $calle, $numero, $colonia, $fecha, $sexo, $correo, $telefono);	
	}

	public function upDate(){
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$paterno = $this->input->post('paterno');
		$materno = $this->input->post('materno');
		$calle = $this->input->post('calle');
		$numero = $this->input->post('numero');
		$colonia = $this->input->post('colonia');
		$fecha = $this->input->post('fecha');
		$sexo = $this->input->post('sexo');
		$correo = $this->input->post('correo');
		$telefono = $this->input->post('telefono');
		$this->load->model('paciente_model');
		$insert = $this->paciente_model->upDatePaciente($id, $nombre, $paterno, $materno, $calle, $numero, $colonia, $fecha, $sexo, $correo, $telefono);	
	}
	public function show_Paciente(){
		$q = strtolower($_GET['term']);
		$valores = $this->paciente_model->get_persona($q);
		echo json_encode($valores);  
	}
//Agregué esto
	public function show_patient(){
        $q = strtolower($_GET['term']);
        $this->load->database('default');
        $this->load->model('paciente_model');
        $valores = $this->paciente_model->showPatient($q);
        echo json_encode($valores);  
  }
  //Hasta aquí

	public function deletePaciente(){
		$id = $this->uri->segment(3);
		$this->load->model('paciente_model');
		$delete = $this->paciente_model->delete_Paciente($id);
	}

	public function modificar(){
		$id = $this->uri->segment(3);
		$this->load->model('paciente_model');
		$data['query'] = $this->paciente_model->getPacienteId($id);
		$this->load->view('admin/view_persona_edit', $data);
	}

	public function autocompletar(){
    $this->load->database('default');
    $this->load->model('paciente_model');
      $data = array();
    //si es una petición ajax y existe una variable post
    //llamada info dejamos pasar
    if($this->input->is_ajax_request() && $this->input->post('info')){
      $abuscar = $this->security->xss_clean($this->input->post('info'));
      $search = $this->paciente_model->buscador(trim($abuscar));
      //si search es distinto de false significa que hay resultados
      //y los mostramos con un loop foreach
      if($search !== FALSE){
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Calle</th>";
        echo "<th>Colonia</th>";
        echo "<th>Teléfono</th>";
        echo "<th>Correo</th>";
        echo "<th>Sexo</th>";
        echo "<th>Edad</th>";
        echo "<th></th>";
        echo "<th>  </th>";
        echo "</tr>";
        foreach($search->result() as $fila){
        	$then = date('Ymd', strtotime($fila->fechaNa));
            $diff = date('Ymd') - $then;
            $edad = substr($diff, 0, -4);
          	echo "<tr>";
            echo "<td>".$fila->nombrePersona.' '.$fila->apaPersona.' '.$fila->amaPersona."<td>";
            echo "<td>".$fila->callePersona.' #'.$fila->numDirPersona."</td>";
            echo "<td>".$fila->coloniaPersona."</td>";
            echo "<td>".$fila->celPersona."</td>";
            echo "<td>".$fila->correoPersona."</td>";
            echo "<td>".$fila->sexo."</td>";
            echo "<td>".$edad."</td>";
            echo "<td><a href='".base_url()."paciente/modificar/$fila->idpersona'> <i class='glyphicon glyphicon-pencil'></i></a></td>";
            echo "<td><a href='".base_url()."paciente/deletePaciente/$fila->idpersona'> <i class='glyphicon glyphicon-trash'></i></a></td>";
            echo "</tr>";
        ?>
        <?php
        /*
        foreach ($empleados->result() as $row){

        }
        */
        }
      //en otro caso decimos que no hay resultados
      }else{
      ?>
        <p><?php  echo "<div class='alert alert-warning'><p class='text-center'>No hay pacientes registrados con el nombre introducido</p></div>"; ?></p>
      <?php
      }
    }

  }

}

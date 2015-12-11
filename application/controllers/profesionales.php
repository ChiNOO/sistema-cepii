<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesionales extends CI_Controller {

	public function construc(){
		parent :: __construct();
		  $this->load->helper(array('url', 'form'));       
  		$this->load->model('login_model');
  		$this->load->database('default');
  		$this->load->model('citas_model');
  		
	}
	
	public function index(){
    $this->load->database('default');
    $this->load->model('profesional_model');
    $data['query'] = $this->profesional_model->getProfesional();
    $this->load->view('admin/view_profesionales', $data);
  }

  public function show_profesional(){
    $q = strtolower($_GET['term']);
    $rama = $_GET['ramaMedica'];
    /*print_r($rama);*/
    $this->load->database('default');
    $this->load->model('profesional_model');
    $valores = $this->profesional_model->showProfesional($q, $rama);
    echo json_encode($valores);  
  }

  public function show_profesionals(){
        $q = strtolower($_GET['term']);
        $this->load->database('default');
        $this->load->model('profesional_model');
        $valores = $this->profesional_model->showProfesionals($q);
        echo json_encode($valores);  
  }

  public function agregarProfesional(){
    $nombre = $this->input->post('nombre');
    $paterno = $this->input->post('paterno');
    $materno = $this->input->post('materno');
    $ramaMedica = $this->input->post('ramaMedica');
    $correo = $this->input->post('correo');
    $telefono = $this->input->post('telefono');
    $usuario = $this->input->post('usuario');
    $contraseña = $this->input->post('contraseña');
    $this->load->model('profesional_model');
    $this->load->database('default');
    $insert = $this->profesional_model->agregarProfesional($nombre, $paterno, $materno, $ramaMedica, $correo, $telefono, $usuario, $contraseña);  
  }

  public function deleteProfesional(){
    $this->load->database('default');
    $id = $this->uri->segment(3);
    $this->load->model('profesional_model');
    $delete = $this->profesional_model->delete_profesional($id);
  }

  public function modificar(){
    $this->load->database('default');
    $id = $this->uri->segment(3);
    $this->load->model('profesional_model');
    $data['query'] = $this->profesional_model->upDateProfesional($id);
    $this->load->view('admin/view_profesionales_edit', $data);
  }

  public function upDateProfesional(){
    $id = $this->input->post('id');
    $nombre = $this->input->post('nombre');
    $paterno = $this->input->post('paterno');
    $materno = $this->input->post('materno');
    $ramaMedica = $this->input->post('ramaMedica');
    $correo = $this->input->post('correo');
    $telefono = $this->input->post('telefono');
    $usuario = $this->input->post('usuario');
    $contraseña = $this->input->post('contraseña');
    $this->load->model('profesional_model');
    $this->load->database('default');
    $insert = $this->profesional_model->upDateProfesionalId($id, $nombre, $paterno, $materno, $ramaMedica, $correo, $telefono, $usuario);  
  }

  public function autocompletar(){
    $this->load->database('default');
    $this->load->model('profesional_model');
      $data = array();
    //si es una petición ajax y existe una variable post
    //llamada info dejamos pasar
    if($this->input->is_ajax_request() && $this->input->post('info')){
      $abuscar = $this->security->xss_clean($this->input->post('info'));
      $search = $this->profesional_model->buscador(trim($abuscar));
      //si search es distinto de false significa que hay resultados
      //y los mostramos con un loop foreach
      if($search !== FALSE){
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Teléfono</th>";
        echo "<th>Correo</th>";
        echo "<th>Area</th>";
        echo "<th>Usuario</th>";
        echo "<th></th>";
        echo "<th>  </th>";
        echo "</tr>";
        foreach($search->result() as $fila){
          echo "<tr>";
            echo "<td>".$fila->nombrePro.' '.$fila->apaPro.' '.$fila->amaPro."<td>";
            echo "<td>".$fila->celPro."</td>";
            echo "<td>".$fila->correoPro."</td>";
            echo "<td>".$fila->ramaMedica."</td>";
            echo "<td>".$fila->usuario."</td>";
            echo "<td><a href='".base_url()."profesionales/modificar/$fila->idProfesional'> <i class='glyphicon glyphicon-pencil'></i></a></td>";
            echo "<td><a href='".base_url()."profesionales/deleteProfesional/$fila->idProfesional'> <i class='glyphicon glyphicon-trash'></i></a></td>";
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
        <p><?php  echo "<div class='alert alert-warning'><p class='text-center'>No hay profesionales registrados con el nombre introducido</p></div>"; ?></p>
      <?php
      }
    }

  }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Espacios extends CI_Controller {

	public function __construct(){
		parent::__construct();
    $this->load->helper(array('url', 'form'));
  		$this->load->model('espacios_model');
  		$this->load->database('default');
  		//$this->load->model('citas_model');
	}

	public function index(){
		//$data ['query'] = $this->citas_model->get_appointment();
		$todos_datos = array('enlaces' =>	$this->espacios_model->verTodos());
		$this->load->view('admin/view_espacios',$todos_datos);
	}

  public function agregarEspacio(){
		$es_espacio_interno;
		if (isset($_REQUEST['espacio_interno']))
  	{
				$es_espacio_interno=1;
				echo $es_espacio_interno;
  	}else {
				$es_espacio_interno=0;
					echo $es_espacio_interno;
  	}
    $datos=array(
				'Nombre' => $this->input->post('nombre_espacio',TRUE),
				'Capacidad' => $this->input->post('capacidad',TRUE),
				'Tipo' => ($es_espacio_interno)
			);

    $this->espacios_model->guardar_espacio($datos);
    	redirect('espacios/');
  }

 function editar(){
		$id=$this->uri->segment(3);
		//echo $folio;
		$datos =  $this->espacios_model->getEspacio($id);
		foreach ($datos->result() as $row) {
				$idEspacio = $row->idEspacio;
				$Nombre = $row->Nombre;
				$Capacidad = $row->Capacidad;
				$Tipo = $row->Tipo;
			}
			$data['idEspacio'] = $idEspacio;
			$data['Nombre'] = $Nombre;
			$data['Capacidad'] = $Capacidad;
			$data['Tipo'] = $Tipo;
			$this->load->view('admin/view_edita_espacios',$data);
	}

	function eliminar(){
		$id=$this->uri->segment(3);
		$this->espacios_model->eliminar_espacio($id);
		redirect('espacios/');
	}

	function editarEspacio(){
			$es_espacio_interno;
		//creamos el arreglo de datos necesario para actualizar a la tabla espacios
		$id  = array(
			'idEspacio' => $this->input->post('idEspacio',TRUE)
		);
		if (isset($_REQUEST['espacio_interno']))
		{
				$es_espacio_interno=1;
				echo $es_espacio_interno;
		}else {
				$es_espacio_interno=0;
					echo $es_espacio_interno;
		}
			$ArrDatos = array(
				'Nombre' => $this->input->post('nombre_espacio',TRUE),
				'Capacidad' => $this->input->post('capacidad',TRUE),
				'Tipo' => ($es_espacio_interno)
			);
			//actualizamos la tabla
			$this->espacios_model->actualizar($id,$ArrDatos);
			redirect('espacios/');
				//print_r ($ArrDatos);
	}
	public function autocompletar()
	{
			$data = array();
		//si es una petición ajax y existe una variable post
		//llamada info dejamos pasar
		if($this->input->is_ajax_request() && $this->input->post('info'))
        {

			$abuscar = $this->security->xss_clean($this->input->post('info'));

			$search = $this->espacios_model->buscador(trim($abuscar));

			//si search es distinto de false significa que hay resultados
			//y los mostramos con un loop foreach
			if($search !== FALSE)
			{
				echo "<tr>";
				echo "<th>Nombre del espacio</th>";
				echo "<th>Capacidad</th>";
				echo "<th>Tipo de espacio</th>";
				echo "</tr>";
				foreach($search->result() as $fila)
				{

					echo "<tr>";
						echo "<td>".$fila->Nombre."</td>";
						echo "<td>".$fila->Capacidad."</td>";
						echo "<td>";
						if ($fila->Tipo==1){
							echo "Espacio Interno";
						}
						if ($fila->Tipo==0){
							echo "Espacio Externo";
						}
						echo "</td>";
						echo "<td><a href='".base_url()."espacios/editar/$fila->idEspacio'> <i class='glyphicon glyphicon-pencil'></i></a></td>";
						echo "<td><a href='".base_url()."espacios/eliminar/$fila->idEspacio'> <i class='glyphicon glyphicon-trash'></i></a></td>";

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
				<p><?php  echo "<div class='alert alert-warning'><p class='text-center'>No hay espacios registrados con el nombre introducido</p></div>"; ?></p>
			<?php
			}
		}

	}

	public function show_Espacios(){
		$q = strtolower($_GET['term']);
		$nombrePro = $_GET['nombrePro'];
		$fecha = $_GET['fecha'];
		$horaIni = $_GET['horaIni'];
		$horaFin = $_GET['horaFin'];
		$valores = $this->espacios_model->get_espacio($q, $nombrePro, $fecha, $horaIni, $horaFin);
		echo json_encode($valores);  
	}

	public function show_Espacios_G(){
		$q = strtolower($_GET['term']);
		$valores = $this->espacios_model->get_espacio_g($q);
		echo json_encode($valores);  
	}
}

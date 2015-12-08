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
    $datos=array(
				'Nombre' => $this->input->post('nombre_espacio',TRUE),
				'Capacidad' => $this->input->post('capacidad',TRUE),
				'Tipo_Servicio' => $this->input->post('tipo_servicio',TRUE)
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
				$Tipo_Servicio = $row->Tipo_Servicio;
			}
			$data['idEspacio'] = $idEspacio;
			$data['Nombre'] = $Nombre;
			$data['Capacidad'] = $Capacidad;
			$data['Tipo_Servicio'] = $Tipo_Servicio;
			$this->load->view('admin/view_edita_espacios',$data);
	}

	function eliminar(){
		$id=$this->uri->segment(3);
		$this->espacios_model->eliminar_espacio($id);
		redirect('espacios/');
	}

	function editarEspacio(){
		//creamos el arreglo de datos necesario para actualizar a la tabla espacios
		$id  = array(
			'idEspacio' => $this->input->post('idEspacio',TRUE)
		);
			$ArrDatos = array(
				'Nombre' => $this->input->post('nombre_espacio',TRUE),
				'Capacidad' => $this->input->post('capacidad',TRUE),
				'Tipo_Servicio' => $this->input->post('tipo_servicio',TRUE)
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
				echo "<th>Tipo de servicio en el espacio</th>";
				echo "</tr>";
				foreach($search->result() as $fila)
				{

					echo "<tr>";
						echo "<td>".$fila->Nombre."</td>";
						echo "<td>".$fila->Capacidad."</td>";
						echo "<td>".$fila->Tipo_Servicio."</td>";
						echo "<td><a href='".base_url()."espacios/editar/$fila->idEspacio'> <i class='glyphicon glyphicon-pencil'></i></a></td>";
						echo "<td><a href='".base_url()."espacios/eliminar/$fila->idEspacio'> <i class='glyphicon glyphicon-remove'></i></a></td>";

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
				<p><?php echo 'No hay resultados' ?></p>
			<?php
			}
		}

	}

}

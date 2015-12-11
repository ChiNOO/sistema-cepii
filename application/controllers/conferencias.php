<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Conferencias extends CI_Controller {

	public function __construct(){
		parent::__construct();
    $this->load->helper(array('url', 'form'));
  		$this->load->model('conferencias_model');
  		$this->load->database('default');
  		//$this->load->model('citas_model');
	}

	public function index(){
		//$data ['query'] = $this->citas_model->get_appointment();
		$todos_datos = array('enlaces' =>	$this->conferencias_model->verTodos());
		$this->load->view('admin/view_conferencias',$todos_datos);
	}

  public function agregarConferencia(){
    $datos=array(
				'acompañantes' => $this->input->post('Acompañantes',TRUE),
				'descripcion' => $this->input->post('Descripcion',TRUE),
				'nombrePonente' => $this->input->post('NombrePonente',TRUE),
				'numAsistentes' => $this->input->post('NumAsistentes',TRUE),
				'lugar' => $this->input->post('Lugar',TRUE),
				'fecha' => $this->input->post('Fecha',TRUE),
				'hora' => $this->input->post('Hora',TRUE),
				'direccion' => $this->input->post('Direccion',TRUE),
			);

    $this->conferencias_model->guardar_conferencia($datos);
    	redirect('conferencias/');
  }

 function editar(){
		$id=$this->uri->segment(3);
		//echo $folio;
		$datos =  $this->conferencias_model->getConferencia($id);
		foreach ($datos->result() as $row) {
				$idConferencia = $row->idConferencia;
				$acompañantes = $row->acompañantes;
				$descripcion = $row->descripcion;
				$nombrePonente = $row->nombrePonente;
				$numAsistentes = $row->numAsistentes;
				$lugar = $row->lugar;
				$fecha = $row->fecha;
				$hora = $row->hora;
				$direccion = $row->direccion;

			}
			$data['idConferencia'] = $idConferencia;
			$data['acompañantes'] = $acompañantes;
			$data['descripcion'] = $descripcion;
			$data['nombrePonente'] = $nombrePonente;
			$data['numAsistentes'] = $numAsistentes;
			$data['lugar'] = $lugar;
			$data['fecha'] = $fecha;
			$data['hora'] = $hora;
			$data['direccion'] = $direccion;
			$this->load->view('admin/view_edita_conferencias',$data);
	}

	function eliminar(){
		$id=$this->uri->segment(3);
		$this->conferencias_model->eliminar_conferencia($id);
		redirect('conferencias/');
	}

	function editarConferencia(){
		//creamos el arreglo de datos necesario para actualizar a la tabla espacios
		$id  = array(
			'idConferencia' => $this->input->post('idConferencia',TRUE)
		);
			$ArrDatos = array(
				'acompañantes' => $this->input->post('Acompañantes',TRUE),
				'descripcion' => $this->input->post('Descripcion',TRUE),
				'nombrePonente' => $this->input->post('NombrePonente',TRUE),
				'numAsistentes' => $this->input->post('NumAsistentes',TRUE),
				'lugar' => $this->input->post('Lugar',TRUE),
				'fecha' => $this->input->post('Fecha',TRUE),
				'hora' => $this->input->post('Hora',TRUE),
				'direccion' => $this->input->post('Direccion',TRUE)
			);
			//actualizamos la tabla
			$this->espacios_model->actualizar($id,$ArrDatos);
			redirect('conferencias/');
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

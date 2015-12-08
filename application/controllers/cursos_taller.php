<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_taller extends CI_Controller {

	public function __construct(){
		parent::__construct();
    $this->load->helper(array('url', 'form'));
  		$this->load->model('cursos_taller_model');
  		$this->load->database('default');
  		//$this->load->model('citas_model');
	}

	public function index(){
		$this->load->database('default');
		$this->load->view('admin/view_cursos_taller');
	}

	public function agrega() {
		 $datos=array(
				'tipo' => $this->input->post('tipo',TRUE),
				'profesional' => $this->input->post('profesional',TRUE),
				'lugar' => $this->input->post('lugar',TRUE),
				'direccion' => $this->input->post('direccion',TRUE),
				'num_horas' => $this->input->post('n_horas',TRUE),
				'f_inicio' => $this->input->post('f_inicio',TRUE),
				'f_fin' => $this->input->post('f_fin',TRUE),
				'h_inicio' => $this->input->post('h_inicio',TRUE),
				'h_fin' => $this->input->post('h_fin',TRUE)
			);
		 //print_r($datos);
		$this->cursos_taller_model->guardar_curso_taller($datos);
    	redirect('cursos_taller/');
	}
	
	public function autocompletar(){
		
		if($this->input->is_ajax_request() && $this->input->post('info')) {

			$abuscar = $this->security->xss_clean($this->input->post('info'));
			$search = $this->cursos_taller_model->buscador(trim($abuscar));
			if($search !== FALSE)
			{
				echo "<tr>";
				echo "<th>Tipo</th>";
				echo "<th>Personal que lo imparte</th>";
				echo "<th>Dirección</th>";
				echo "<th>Numero de horas</th>";
				echo "<th>Fecha de inicio</th>";
				echo "<th>Fecha de fin</th>";
				echo "<th>Hora de inicio</th>";
				echo "<th>Hora de fin</th>";
				echo "</tr>";
				foreach($search->result() as $fila) {
					echo "<tr>";
						echo "<td>".$fila->tipo."</td>";
						echo "<td>".$fila->profesional."</td>";
						echo "<td>".$fila->direccion."</td>";
						echo "<td>".$fila->num_horas."</td>";
						echo "<td>".$fila->f_inicio."</td>";
						echo "<td>".$fila->f_fin."</td>";
						echo "<td>".$fila->h_inicio."</td>";
						echo "<td>".$fila->h_fin."</td>";						
					echo "</tr>";
				}				
			}else{
			?>
				<p><?php echo 'No hay resultados' ?></p>
			<?php
			}
		}

	}
}

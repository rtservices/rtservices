<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejecucion extends CI_Controller {

	private $idAsistencia_actual;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_asistencia');
		$this->load->model('mdl_clase');
		$this->load->model('mdl_persona');
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		if ($this->input->get('idclase'))
		{
			$id_clase = $this->input->get('idclase');
			$data['titulo'] = 'Control de clases';
			$data['idclase'] = $id_clase;
			$clase_info = $this->mdl_clase->listarClase($id_clase)->row();
			$data['clase'] = $clase_info;
			$data['instructor'] = $this->mdl_persona->listarIdJugador($clase_info->IdPersonaRol_det)->row();
			$this->load->view('msp/cabecera', $data);
			$this->load->view('ejecucion/ejecucion', $data);
			$this->load->view('msp/footer');
			$this->load->view('ejecucion/add');
		}
		else
		{
			redirect('clase/seleccionplay');
		}

	}

	public function cargarTabla($iIdClase)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_asistencia->cargarTabla($iIdClase) as $asistencia)
			{			
				$row = array();
				$row[] = $asistencia->Codigo;
				$row[] = $asistencia->FechaRegistro;

				$row[] = '
				<center>
					<a class="btn btn-info btn-expand" style="color:white; background-color: #2A2A2A;" href="' . base_url().'clase/generarReporte/' . $asistencia->IdAsistencia . '" target="_blank" title="Generar reporte de asistencia"><i class="fa fa-file-text"></i></a>
					<a class="btn btn-info btn-expand" style="color:white; background-color: #2A2A2A;"   title="Más información" onclick="listarClases('.$asistencia->IdAsistencia.')"><i class="fa fa-info-circle"></i></a>
					<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;" href="" title="Administrar asistencia"><i class="fa fa-pencil"></i></a>
				</center>';

				$data[] = $row;
			}
			$output = array("data" => $data);

			echo json_encode($output);
		}
		else 
		{
			redirect('error404');
		}
	}

	public function cargarJugadores($iIdClase)
	{
		$peticion = $this->mdl_clase->cargarTablaJugadorClase($iIdClase);
		echo json_encode($peticion);
	}

	public function regitrarasistencia()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array(
				'IdClase_deb' => $this->input->post('clase'),
				'FechaRegistro' => $this->input->post('fecharegistro'),
				'FechaSistema' => date('Y-m-d')
				);

			$res = $this->mdl_asistencia->registrarAsistencia($data);

			if ($res)
			{
				echo $res;
			}
			else
			{
				echo "no";
			}
		}
		else
		{
			redirect('error404');
		}
	}

	public function variarEstadoAsistencia()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$estado = 0;
			foreach ($this->mdl_asistencia->asistencia_byid($id) as $val) {
				if($val->Estado == 1) { $estado = 0; } else { $estado = 1; }
				break;
			}
			$data = array(
				'Estado' => $estado
				);

			if ($this->mdl_asistencia->actualizarAsistencia($data, $id))
			{
				echo 'ok';
			}
			else
			{
				echo 'no';
			}
		}
		else
		{
			redirect('error404');
		}
	}
}

/* End of file clase.php */
/* Location: ./application/controllers/clase.php */

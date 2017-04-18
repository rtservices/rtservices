<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejecucion extends CI_Controller {

	private $idAsistencia_actual;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_asistencia');
		$this->load->model('mdl_clase');
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}

		if (!is_null($this->input->get('idclase')))
		{
			$data['titulo'] = 'Control de clases';
			$data['idclase'] = $this->input->get('idclase');
			$this->load->view('msp/cabecera', $data);
			$this->load->view('ejecucion/ejecucion', $data);
			$this->load->view('msp/footer');
			$this->load->view('ejecucion/add');
		}
		else
		{
			redirect('clase');
		}

	}

	public function cargarTabla($iIdClase)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_asistencia->cargarTabla($iIdClase) as $asistencia)
			{
				if ($asistencia->Estado == 1) 
				{
					$accion = 'Inhabilitar asistencia';
					$color = ' color: #F13A3A; background-color: #2A2A2A;';
					$estilo = 'danger';
					$estado = '<a style="color: #31B404">Activo</a>';
					$edit = '<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;" href="" title="Administrar asistencia"><i class="fa fa-pencil"></i></a>';
					
				}

				else
				{
					$accion = 'Habilitar asistencia';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$estilo = 'success';
					$estado = '<a style="color: #8A0808">Inactivo</a>';
					$edit = '<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;"   title="Debes tener activa esta asistencia para poder administrarla." disabled="true"><i class="fa fa-pencil"></i></a>';
				}
				
				$row = array();
				$row[] = $estado;
				$row[] = $asistencia->FechaRegistro;
				$row[] = $asistencia->NombreClase;
				$row[] = $asistencia->Dia.' - '.$asistencia->HoraInicio .' a '.$asistencia->HoraFinal;

				$row[] = '
				<center>
					<a class="btn btn-info btn-expand" style="color:white; background-color: #2A2A2A;"   title="Más información" onclick="listarClases('.$asistencia->IdAsistencia.')"><i class="fa fa-info-circle"></i></a>
					'.$edit.'
					<a class="btn btn-'.$estilo.' btn-expand" style="'.$color.'"   title="'.$accion.'" onclick="variarEstadoAsistencia('.$asistencia->IdAsistencia.')"><i class="fa fa-exchange"></i></a>
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

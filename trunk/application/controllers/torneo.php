<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Torneo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_torneo');
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		$data['titulo'] = 'Gestión de torneos';
		$this->load->view('msp/cabecera', $data);
		$this->load->view('torneo/torneo');
		$this->load->view('msp/footer');
		$this->load->view('torneo/add');
	}

	public function cargarTabla()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_torneo->cargarTabla() as $torneo)
			{ 
				if ($torneo->Estado == 1) 
				{
					$accion = 'Inhabilitar '.$torneo->NombreTorneo.'';
					$color = 'color: #F13A3A; background-color: #2A2A2A';
					$estilo = 'danger';
					$estado = 'Activo';
					$edit = '<a class="btn btn-primary btn-expand" style="color: white; background-color: #2A2A2A; color: #81B71A;" href="javascript:void()" title="Editar el torneo '.$torneo->NombreTorneo.'" onclick="listarPersona('.$torneo->IdTorneo.')"><i class="fa fa-pencil"></i></a>';	
					$estadoE1 = 'onclick="listarEtapa('.$torneo->IdTorneo.',1);"';
					$estadoE2 = 'onclick="listarEtapa('.$torneo->IdTorneo.',2);"';
					$estadoE3 = 'onclick="listarEtapa('.$torneo->IdTorneo.',3);"';
					$estadoE4 = 'onclick="listarEtapa('.$torneo->IdTorneo.',4);"';
					$estadoE5 = 'onclick="listarEtapa('.$torneo->IdTorneo.',5);"';
					$estadoE6 = 'onclick="listarEtapa('.$torneo->IdTorneo.',6);"';
				}
				else
				{
					$accion = 'Habilitar '.$torneo->NombreTorneo.'';
					$color = 'background-color: #2A2A2A; color: #81B71A;';
					$estado = 'Inactivo';
					$estilo = 'success';
					$edit = '<a class="btn btn-primary btn-expand" style="color: white; background-color: #2A2A2A;" title="Debes tener activo '.$torneo->NombreTorneo.' para poder editarlo." disabled="true"><i class="fa fa-pencil"></i></a>';
					$estadoE1 = 'disabled="true"';
					$estadoE2 = 'disabled="true"';
					$estadoE3 = 'disabled="true"';
					$estadoE4 = 'disabled="true"';
					$estadoE5 = 'disabled="true"';
					$estadoE6 = 'disabled="true"';
				}

				$row = array();
				$row[] = $estado;
				$row[] = $torneo->NombreTorneo;
				$row[] = $torneo->FechaInicio.' a '.$torneo->FechaFinal;
				$row[] = '
				<center>
					<a class="btn btn-success btn-expand" style="background-color: #2A2A2A; color: #white;" href="javascript:void()" title="Gestionar etapa 1" '.$estadoE1.' ><i class="fa fa-bookmark-o" style="color: white"></i> - 1</a>
					<a class="btn btn-success btn-expand" style="background-color: #2A2A2A; color: #white;" href="javascript:void()" title="Gestionar etapa 2" '.$estadoE2.' ><i class="fa fa-bookmark-o" style="color: white"></i> - 2</a>
					<a class="btn btn-success btn-expand" style="background-color: #2A2A2A; color: #white;" href="javascript:void()" title="Gestionar etapa 3" '.$estadoE3.' ><i class="fa fa-bookmark-o" style="color: white"></i> - 3</a>
					<a class="btn btn-success btn-expand" style="background-color: #2A2A2A; color: #white;" href="javascript:void()" title="Gestionar etapa 4" '.$estadoE4.' ><i class="fa fa-bookmark-o" style="color: white"></i> - 4</a>
					<a class="btn btn-success btn-expand" style="background-color: #2A2A2A; color: #white;" href="javascript:void()" title="Gestionar etapa 5" '.$estadoE5.' ><i class="fa fa-bookmark-o" style="color: white"></i> - 5</a>
					<a class="btn btn-success btn-expand" style="background-color: #2A2A2A; color: #white;" href="javascript:void()" title="Gestionar etapa 6" '.$estadoE6.' ><i class="fa fa-bookmark-o" style="color: white"></i> - 6</a>
				</center>';

				$row[] = '
				<center>
					<a class="btn btn-info btn-expand" style="background-color: #2A2A2A; color: #81B71A;" href="javascript:void()" title="Mas información" onclick="listarInformacion('.$torneo->IdTorneo.');"><i class="fa fa-info"></i></a>
					'.$edit.'
					<a class="btn btn-'.$estilo.' btn-expand" style="'.$color.'" href="javascript:void()" title="'.$accion.'" onclick="variarEstadoTorneo('.$torneo->IdTorneo.');"><i class="fa fa-exchange"></i></a>
				</center>';

				$data[] = $row;
			}

			$output = array(
				"data" => $data
				);

			echo json_encode($output);
		}
		else
		{
			redirect('error404');
		}
	}

	public function listarInscritosEtapa($idetapa)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_torneo->listarInscritosEtapa($idetapa) as $insEtapa)
			{ 
				$row = array();
				$row[] = $insEtapa->NombreCategoria;
				$row[] = $insEtapa->Documento;
				$row[] = $insEtapa->Nombre.' '.$insEtapa->Apellidos;

				$row[] = '
				<center>
					<a class="btn btn-danger btn-expand" style="color: #F13A3A; background-color: #2A2A2A" href="javascript:void()" title="Eliminar inscripcion de jugador." onclick="eliminarInscripcionJugador('.$insEtapa->IdEtapaJugador.');"><i class="fa fa-times"></i></a>
				</center>';

				$data[] = $row;
			}

			$output = array(
				"data" => $data
				);

			echo json_encode($output);
		}
		else
		{
			redirect('error404');
		}
	}

	public function eliminarInscripcionJugador()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			if ($this->mdl_torneo->eliminarInscripcionJugador($id))
			{
				echo "ok";
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

	public function variarEstadoTorneo()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$estado;
			foreach ($this->mdl_torneo->listarTorneo($id) as $torneo) {
				if ($torneo->Estado == 1) { $estado = 0; } else { $estado = 1; }
				break;
			}

			$data = array('Estado' => $estado);
			if ($this->mdl_torneo->actualizarTorneo($id,$data))
			{
				echo "ok";
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

	public function listarEtapa()
	{
		if ($this->input->is_ajax_request())
		{
			$data = $this->mdl_torneo->listarEtapa($this->input->post('id'),$this->input->post('etapa'));
			echo json_encode($data);
		}
		else
		{
			redirect('error404');
		}
	}

}

/* End of file torneo.php */
/* Location: ./application/controllers/torneo.php */
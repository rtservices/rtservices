<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gesetapa extends CI_Controller {

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

		$idetapa = $this->input->get('idetapa');
		if (!empty($idetapa))
		{
			$etapainfo = $this->mdl_torneo->validarEtapa($idetapa);
			if ($etapainfo)
			{
				foreach ($etapainfo as $valEtapa)
				{
					$data['titulo'] = 'Etapa';
					$data['fechaIni'] = $valEtapa->FechaInicio;
					$data['fechaFin'] = $valEtapa->FechaFin;
					$data['nEtapa'] = $valEtapa->NombreEtapa;
					$data['eEtapa'] = $valEtapa->Estado == 1 ? 'activo' : 'inactivo';
					$data['idetapa'] = $idetapa;
					$data['idEtapaActual'] = $idetapa;
					$data['selJugador'] = $this->mdl_torneo->cargarComboJugador();
					$this->load->view('msp/cabecera', $data);
					$this->load->view('etapa/etapa', $data);
					$this->load->view('msp/footer');
					$this->load->view('etapa/add');

					break;
				}
			}
			else
			{
				redirect('error404');
			}
		}
		else
		{
			redirect('error404');
		}
	}

	public function cargarTablaEtapa($id)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_torneo->cargarTablaEtapa($id) as $infoEtapa) {
				if ($infoEtapa->Estado == 1) 
				{
					$titulo = 'Inhabilitar jugador inscrito';
					$estilo = 'danger';
					$estado = 'Activo';
				}
				else
				{
					$titulo = 'Habilitar jugador inscrito';
					$estilo = 'success';
					$estado = 'Inactivo';
				}

				$row = array();
				$row[]= $estado;
				$row[]= $infoEtapa->Documento;
				$row[]= $infoEtapa->NombreP.' '.$infoEtapa->ApellidosP;
				$row[]= ($infoEtapa->Genero == 'H') ? $infoEtapa->NombreCategoria.' masculina' : $infoEtapa->NombreCategoria.' femenina' ;
				
				
				$row[] = '<center><a class="btn btn-lg btn-'.$estilo.' btn-expand" style="background-color: #2A2A2A;"" title="'.$titulo.'" href="javascript:void()" onclick="cambiarEstado('.$infoEtapa->IdEtapaJugador.')"><i class="fa fa-exchange"></i></a></center>';
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

	public function modificaretapa()
	{
		if ($this->input->is_ajax_request())
		{
			$idetapa = $this->input->post('idetapa');
			$nombre = $this->input->post('nombreEtapa');
			$estado = $this->input->post('estadoEtapa') == 'activo' ? 1 : 0 ;
			$fechaini = $this->input->post('fechaInicio');
			$fechafin = $this->input->post('fechaFin');

			$data = array(
				'NombreEtapa' => $nombre, 
				'Estado' => $estado, 
				'FechaInicio' => $fechaini, 
				'FechaFin' => $fechafin
				);

			$res = $this->mdl_torneo->actualizarEtapa($idetapa, $data);

			if ($res == 'raices')
			{
				echo "raices";
			}
			else if ($res == true)
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

	public function incripcionEtapa()
	{
		if ($this->input->is_ajax_request())
		{
			$idjugador = $this->input->post('selJugador');

			if ($this->mdl_torneo->inscripcionJugador($idjugador))
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

	public function cambiarEstado($idjugador)
	{
		if ($this->input->is_ajax_request())
		{
			$estado;

			foreach ($this->mdl_torneo->inscripcionJugador_id($idjugador) as $valJug) {
				if($valJug->Estado == 1) { $estado = 0; } else { $estado = 1; }
			}

			$data = array('Estado' => $estado );

			if ($this->mdl_torneo->actualizarInscripcion($idjugador,$data))
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

}

/* End of file gesetapa.php */
/* Location: ./application/controllers/gesetapa.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planclase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		$this->load->model('mdl_planclase');
	}

	// Estados a manejar en plan clase:
	// 1 = activo
	// 2 = enespera
	// 3 terminado

	public function index()
	{
		$iIdPC = $this->input->get('idPc');
		if ($iIdPC)
		{
			$resJugador = $this->mdl_planclase->consultarJugador($iIdPC);
			// $jugador = 'DNI ' . $resJugador->Documento . ' | ' . $resJugador->Nombre . ' ' . $resJugador->Apellidos;
			$data['nomJugador'] = $resJugador->Nombre . ' ' . $resJugador->Apellidos;
			$data['IdJugador'] = $resJugador->IdPersonaRol;
			$data['titulo'] = 'Planes de Clase';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('planclase/planclase');
			$this->load->view('msp/footer');
			$this->load->view('planclase/add');
		}
		else
		{
			redirect('persona');
		}
	}

	public function cargarTabla($iIdPlanclase)
	{
		if ($this->input->is_ajax_request())
		{

	// 1 = activo
	// 2 = enespera
	// 3 terminado

			$data = array();
			foreach ($this->mdl_planclase->cargarTablaPC($iIdPlanclase) as $resPC)
			{
				$row = array();

				if ($resPC->Estado == 1) 
				{
					$accion = '';
					$color = '';
					$clase = 'danger';
					$estado = 'Activo';
					$eliminar = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;"   title="No se puede eliminar un plan de clase que esta activo." disabled="true"><i class="fa fa-close"></i></a>';
				}
				else if ($resPC->Estado == 2) 
				{
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$clase = 'danger';
					$estado = 'En Espera';
					$eliminar = '<a class="btn btn-'.$clase.' btn-lg btn-expand" style="color: #F13A3A; background-color: #2A2A2A;"   title="Eliminar este plan de clase" onclick="eliminarPC('.$resPC->IdPlanClase.')"><i class="fa fa-close"></i></a>';
				}
				else if ($resPC->Estado == 3) 
				{
					$estado = 'Terminado';
					$eliminar = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;"   title="No se puede eliminar un plan de clase que esta terminado." disabled="true"><i class="fa fa-close"></i></a>';
				}

				$row = array();
				$row[] = $estado;
				$row[] = $resPC->FechaInicio;
				$row[] = $resPC->DiasRestantes;

				$row[] = '
				<center>
					'.$eliminar.'
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

	public function addPlanClaseJugador()
	{
		if ($this->input->is_ajax_request())
		{
			$sTipoPlan = $this->input->post('tipoPlan');
			$iIdJugador = $this->input->post('idJugador');

			if ($sTipoPlan != 'noselect')
			{
				$data = array(
					'FechaInicio' => date('Y-m-d'),
					'DiasRestantes' => ($sTipoPlan * 8),
					'Estado' => (($this->mdl_planclase->pcActivos($iIdJugador) > 1) ? 2 : 1),
					'IdPersonaRol_det' => $iIdJugador
					);

				if ($this->mdl_planclase->addPlanClaseJugador($data))
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
				echo "cvacio";
			}
		}
		else
		{
			redirect('error404');
		}
	}

	public function eliminarPC()
	{
		if ($this->input->is_ajax_request())
		{
			$idpc = $this->input->post('idpc');
			if ($this->mdl_planclase->eliminarPC($idpc)) 
			{
				echo "ok";
			}
			else
			{
				echo "no";
			}
		}
	}

}

/* End of file planclase */
/* Location: ./application/controllers/planclase */
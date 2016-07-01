<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clase extends CI_Controller {

	private $idClaseActual_principal;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_clase');
		$this->idClaseActual_principal = ($this->input->get('clase')) ? $this->input->get('clase') : null;
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		if (is_null($this->idClaseActual_principal))
		{
			$data['cpersona'] = $this->mdl_login->cargarUsuario();
			$data['titulo'] = 'Gestión de Clases';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('clase/clase');
			$this->load->view('msp/footer');
			$this->load->view('clase/add');
		}
		else
		{
			$data['idClase'] = $this->idClaseActual_principal;
			$data['cpersona'] = $this->mdl_login->cargarUsuario();
			foreach ($this->mdl_clase->cargarClase_id($this->idClaseActual_principal) as $infoClase) 
			{
				$data['titulo'] = 'Gestión de Clases - ' . $infoClase->NombreClase; 
				$data['nombreClase'] = $infoClase->NombreClase . ' - ' . $infoClase->Dia; 
				$data['idClase'] = $infoClase->IdClase;
				$data['nClase'] = $infoClase->NombreClase;
				$data['eClase'] = $infoClase->Estado;
				$data['hInicio'] = $infoClase->HoraInicio;
				$data['hFin'] = $infoClase->HoraFinal;
				$data['cDia'] = $infoClase->Dia;
				$data['cInstructor'] = $infoClase->IdPersonaRol_det;
				break;
			}
			$this->load->view('msp/cabecera', $data);
			$this->load->view('clase/gesclase', $data);
			$this->load->view('msp/footer');
			$this->load->view('clase/addGC');
		}
	}

	public function cargarTabla()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_clase->cargarTabla() as $clase)
			{
				if ($clase->Estado == 1) 
				{
					$accion = 'Inhabilitar clase';
					$color = ' color: #F13A3A; background-color: #2A2A2A;';
					$estilo = 'danger';
					$estado = '<a style="color: #31B404">Activo</a>';
					$edit = '<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;" href="clase?clase='.$clase->IdClase.'" title="Administrar clase"><i class="fa fa-pencil"></i></a>';
				}
				else
				{
					$accion = 'Habilitar clase';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$estilo = 'success';
					$estado = '<a style="color: #8A0808">Inactivo</a>';
					$edit = '<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Debes tener activa esta clase para poder administrarla." disabled="true"><i class="fa fa-pencil"></i></a>';
				}

				if ($clase->CantidadJugadores < 10)
				{
					$colorCJ = 'color: #31B404';
				}
				else if ($clase->CantidadJugadores >= 10 && $clase->CantidadJugadores < 14)
				{
					$colorCJ = 'color: #DBA901';
				}
				else if ($clase->CantidadJugadores >= 14)
				{
					$colorCJ = 'color: #FE2E2E';
				}
				
				
				$row = array();
				$row[] = $estado;
				$row[] = $clase->NombreClase;
				$row[] = $clase->Dia.' - '.$clase->HoraInicio .' a '.$clase->HoraFinal;
				$row[] = '<a style="'. $colorCJ .'">'.$clase->CantidadJugadores.'</a> inscritos.';

				$row[] = '
				<center>
					<a class="btn btn-info btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Más información" onclick="verClase('.$clase->IdClase.')"><i class="fa fa-info-circle"></i></a>
					'.$edit.'
					<a class="btn btn-'.$estilo.' btn-expand" style="'.$color.'" href="javascript:void()" title="'.$accion.'" onclick="variarEstadoClase('.$clase->IdClase.')"><i class="fa fa-exchange"></i></a>
				</center>';

				$data[] = $row;
			}
			$output = array("data" => $data);

			echo json_encode($output);
		} else 
		{
			redirect('error404');
		}
	}

	public function cargarTablaJC($idTablaJugadorClase)
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_clase->cargarTablaJugadorClase($idTablaJugadorClase) as $clase)
			{			
				$row = array();
				$row[] = $clase->Documento;
				$row[] = $clase->Nombre.' '.$clase->Apellidos;
				$row[] = '
				<center>
					<a class="btn btn-danger btn-expand" style="color: #F13A3A; background-color: #2A2A2A;" href="javascript:void()" title="Eliminar inscripción de '. $clase->Nombre.' '.$clase->Apellidos .' de esta clase." onclick="eliminarInscripcionClase('.$clase->IdClasejugador.')"><i class="fa fa-close"></i></a>
				</center>';

				$data[] = $row;
			}
			$output = array("data" => $data);

			echo json_encode($output);
		} else 
		{
			redirect('error404');
		}
	}

	public function cargarJugadorClase($id)
	{
		if ($this->input->is_ajax_request())
		{
			$data = $this->mdl_clase->cargarJugadoresClase($id);
			echo json_encode($data);
		}
		else
		{
			redirect('error404');
		}
	}

	public function cargarJugadores($id)
	{
		if ($this->input->is_ajax_request())
		{
			
			$data = array(
				'NombreClase' => $this->input->post('claseR'),
				'HoraInicio' => $this->input->post('horainicioR'),
				'HoraFinal' => $this->input->post('horafinalR'),
				'Dia' => $this->input->post('diaR'),
				'CantidadJugadores' => 0,
				'IdPersonaRol_det' => $this->input->post('instructorR'),
				'Estado' => 1
				);

			$res = $this->mdl_clase->listarJugadores($id);
			if ($res != false)
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

	public function variarEstadoClase()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('idclase');
			$estado;
			foreach ($this->mdl_clase->listarClase($id)->result() as $clase) {
				if ($clase->Estado == 1) 
				{ 
					$estado = 0; 
				} 
				else 
				{ 
					$estado = 1; 
				} 
				break;
			}

			$data = array('Estado' => $estado);

			if ($this->mdl_clase->actualizarClase($id,$data))
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
	public function registrarClase()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array(
				"Estado" => 1,
				'NombreClase' => $this->input->post('claseR'),
				'HoraInicio' => $this->input->post('HorainicioR'),
				'HoraFinal' => $this->input->post('HorafinalR'),
				'Dia' => $this->input->post('DiaR')
				);

			$instructorArr = "";
			foreach ($this->mdl_clase->listarInstructores() as $instructor)
			{
				$instructorArr .= '<option value="'.$instructor->IdPersonaRol.'"> DNI: '.$instructor->Documento.' - '.$instructor->Nombre.' '.$instructor->Apellidos.'</option>';
			}

			//PENDIENTE  **
		} 
		else 
		{
			redirect('error404');
		}

	}

	public function modificarClase()
	{
		if ($this->input->is_ajax_request())
		{
			$idClase = $this->input->post('idClaseActual');
			$data = array(
				'NombreClase' => $this->input->post('nombreClase'),
				'Dia' => $this->input->post('diaClase'),
				'HoraInicio' => $this->input->post('horaInicio'),
				'HoraFinal' => $this->input->post('horaFin'),
				'IdPersonaRol_det' => $this->input->post('instructorClase')
				);

			if ($this->mdl_clase->actualizarClase($idClase, $data))
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

	public function addJugadorClase()
	{
		if ($this->input->is_ajax_request())
		{
			$idPlanJugador = $this->input->post('selPlanJugador');
			$idClase = $this->input->post('idClaseActual');
			$arrJugadores = array();
			foreach ($this->mdl_clase->jugadoresInscritos($idClase) as $idJUG)
			{
				$arrJugadores[] = $idJUG->IdPlanClase;
			}
			
			if (!in_array($idPlanJugador, $arrJugadores))
			{
				$data = array(
					'Estado' => 1,
					'IdClase_deb' =>  $idClase,
					'IdPlanClase_deb' => $idPlanJugador
					);

				if ($this->mdl_clase->inscribirPlanJugadorClase($data))
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
				echo "yaEsta";
			}
		}
		else
		{
			redirect('error404');
		}
	}

	public function eliminarInscripcionClase($id)
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->mdl_clase->eliminarInscripcionClase($id))
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

/* End of file clase.php */
/* Location: ./application/controllers/clase.php */

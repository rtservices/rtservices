<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clase extends CI_Controller {

	private $idClaseActual_principal;
	private $registro;

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
		if (is_null($this->idClaseActual_principal)) {
			$data['cpersona'] = $this->mdl_login->cargarUsuario();
			$data['titulo'] = 'Gestión de Clases';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('clase/clase');
			$this->load->view('msp/footer');
			$this->load->view('clase/add');
		} else {
			$data['idClase'] = $this->idClaseActual_principal;
			$data['cpersona'] = $this->mdl_login->cargarUsuario();
			foreach ($this->mdl_clase->cargarClase_id($this->idClaseActual_principal) as $infoClase) {
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

	public function programacion($idclase = null)
	{
		if (is_null($idclase))
		{
			$data['titulo'] = 'Programación de Clases';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('programacion/programacion');
			$this->load->view('msp/footer');
			$this->load->view('programacion/add');
		}
		else
		{
			$clase = 
			$data['titulo'] = 'Programación de Clases';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('programacion/programacion_u');
			$this->load->view('msp/footer');
			$this->load->view('programacion/add_u');
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
					$mateclas = '<a class="btn btn-success btn-expand" style="color:white; background-color: #2A2A2A;"   title="Gestionar material de la clase" onclick="materialclase('.$clase->IdClase.')"><i class="fa fa-book"></i></a>';
					$asisclas = '<a class="btn btn-success btn-expand" style="color:white; background-color: #2A2A2A;"   title="Gestionar asistencias de la clase" onclick="asistenciaclase('.$clase->IdClase.')"><i class="fa fa-list-alt"></i></a>';
				}
				else
				{
					$accion = 'Habilitar clase';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$estilo = 'success';
					$estado = '<a style="color: #8A0808">Inactivo</a>';
					$edit = '<a class="btn btn-primary btn-expand" style="color:white; background-color: #2A2A2A;"   title="Debes tener activa esta clase para poder administrarla." disabled="true"><i class="fa fa-pencil"></i></a>';
					$mateclas = '<a class="btn btn-success btn-expand" style="color:white; background-color: #2A2A2A;"   title="Debes tener activa esta clase para poder administrarla." disabled="true"><i class="fa fa-book"></i></a>';
					$asisclas = '<a class="btn btn-success btn-expand" style="color:white; background-color: #2A2A2A;"   title="Debes tener activa esta clase para poder administrarla." disabled="true"><i class="fa fa-list-alt"></i></a>';
				}

				if ($clase->cantidad_jugadores < 10)
				{
					$colorCJ = 'color: #31B404';
				}
				else if ($clase->cantidad_jugadores >= 10 && $clase->cantidad_jugadores < 14)
				{
					$colorCJ = 'color: #DBA901';
				}
				else if ($clase->cantidad_jugadores >= 14)
				{
					$colorCJ = 'color: #FE2E2E';
				}
				
				
				$row = array();
				$row[] = $estado;
				$row[] = $clase->NombreClase;
				$row[] = $clase->Dia.' - '.$clase->HoraInicio .' a '.$clase->HoraFinal;
				$row[] = 'Jugadores inscritos <a style="'. $colorCJ .'">[ '.$clase->cantidad_jugadores.' ] </a>';
				$row[] = 'DNI '.$clase->Documento.' - '.$clase->Nombre.' '.$clase->Apellidos;

				$row[] = '
				<center>
					<a class="btn btn-info btn-expand" style="color:white; background-color: #2A2A2A;" href="' . base_url().'clase/generarReporte/' . $clase->IdClase . '" target="_blank" title="Generar reporte de clase"><i class="fa fa-file-text"></i></a>
					'.$edit.'
					'.$mateclas.'
					<a class="btn btn-'.$estilo.' btn-expand" style="'.$color.'"   title="'.$accion.'" onclick="variarEstadoClase('.$clase->IdClase.')"><i class="fa fa-exchange"></i></a>
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

	public function todasClases()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array();
			foreach ($this->mdl_clase->cargarTabla() as $clase)
			{
				if ($clase->cantidad_jugadores < 10)
				{
					$colorCJ = 'color: #31B404';
				}
				else if ($clase->cantidad_jugadores >= 10 && $clase->cantidad_jugadores < 14)
				{
					$colorCJ = 'color: #DBA901';
				}
				else if ($clase->cantidad_jugadores >= 14)
				{
					$colorCJ = 'color: #FE2E2E';
				}
				
				
				$row = array();
				$row[] = $clase->NombreClase;
				$row[] = $clase->Dia.' - '.$clase->HoraInicio .' a '.$clase->HoraFinal;
				$row[] = 'Jugadores inscritos <a style="'. $colorCJ .'">[ '.$clase->cantidad_jugadores.' ] </a>';

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
					<a class="btn btn-danger btn-expand" style="color: #F13A3A; background-color: #2A2A2A;"   title="Eliminar inscripción de '. $clase->Nombre.' '.$clase->Apellidos .' de esta clase." onclick="eliminarInscripcionClase('.$clase->IdClasejugador.')"><i class="fa fa-close"></i></a>
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
			$res = $this->mdl_clase->listarJugadores();
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
			if (!empty($idPlanJugador))
			{
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
						echo "error";
					}
				}
				else
				{
					echo "yaEsta";
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
	
	//Registrar de la clase
	public function registrarClase()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array(
				"Estado" => 1,
				'NombreClase' => $this->input->post('nombreClaseR'),
				'HoraInicio' => $this->input->post('horaInicioR'),
				'HoraFinal' => $this->input->post('horaFinR'),
				'Dia' => $this->input->post('diaClaseR'),
				'IdPersonaRol_det' => $this->input->post('instructorClaseR')
				);

			echo $this->mdl_clase->registrarClase($data);
		} 
		else 
		{
			redirect('error404');
		}

	}
//
	public function listarClase()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id');
			$data = $this->mdl_clase->listarClases($id);
			echo json_encode($data->row());
		}
		else
		{
			redirect('error404');
		}
	}

	public function generarReporte($id)
	{
		require_once "vendor/autoload.php";
		$mpdf = new mPDF('c', 'A4');

		$info = $this->mdl_clase->listarClases($id)->row();
		$jugadores = $this->mdl_clase->cargarTablaJugadorClase($id);
		$jugadores_c_u = '';
		
		foreach ($jugadores as $valor) {
			$clase_color = '';
			if ($valor->DiasRestantes > 8) {
				$clase_color = 'background-color: #7bfd7b; padding: 5px;';
			} else if ($valor->DiasRestantes < 8 && $valor->DiasRestantes > 6) {
				$clase_color = 'background-color: #ebf184; padding: 5px;';
			} else {
				$clase_color = 'background-color: #ff7d7d; padding: 5px;';
			}

			$jugadores_c_u .= '
			<tr style="'.$clase_color.'">
				<td class="service">'.$valor->Documento.'</td>
				<td class="desc">'.$valor->Nombre.' '.$valor->Apellidos.'</td>
			</tr>';
		}

		$titulo = $info->NombreClase.' - '.$info->Dia.' '.$info->HoraInicio.' a '.$info->HoraFinal;

		date_default_timezone_set('America/Bogota');
		$html_asd = '
		<html>
		<head>
			<title>'.$titulo.'.pdf</title>
			<link href="assets/img/icon/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
			<link href="assets/img/icon/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
			<link href="assets/img/icon/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
			<link href="assets/img/icon/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
			<link href="assets/img/icon/apple-touch-icon.png" rel="shortcut icon">
		</head>
		<body>
			<header class="clearfix">
				<div id="logo">
					<img src="assets/img/logo-vertical.png" style="width: 200px;">
				</div>
				<h1>'.$titulo.'</h1>
				<div id="project">
					<div><span>Clase - Dia: </span> '.$info->NombreClase.' - '.$info->Dia.'</div>
					<div><span>Horario: </span> '.$info->HoraInicio.' a '.$info->HoraFinal.'</div>
					<div><span>Fecha y hora actual: </span> '.date("d/m/Y G:i:s").'</div>
					<div><span>Documento del instructor: </span> '.$info->Documento.'</div>
					<div><span>Instructor: </span> '.$info->Nombre.' '.$info->Apellidos.'</div>
				</div>
			</header>
			<main>
				<table>
					<thead>
						<tr>
							<th class="service">DOCUMENTO</th>
							<th class="desc">JUGADOR</th>
						</tr>
					</thead>
					<tbody>
						'.$jugadores_c_u.'
					</tbody>
				</table>
				<hr>
				<div id="notices">
					<div>NOTAS:</div>
					<div class="notice">
						<p>Los jugadores que aparecen en color <span class="span_verde"><strong> VERDE </strong></span> tienen mas de 1 mes de clases disponibles.</p>
						<p>Los jugadores que aparecen en color <span class="span_amarillo"><strong> AMARILLO </strong></span> tienen al menos de 8 a 6 clases disponibles.</p>
						<p>Los jugadores que aparecen en color <span class="span_rojo"><strong> ROJO </strong></span> tienen solo 2 o menos clases disponibles.</p>
					</div>
				</div>
			</main>
			<footer>
				Generado el dia *HOY* - RTServices 2017
			</footer>
		</body>
		</html>
		';
		$css = file_get_contents('assets/plantillas/pdf/style.css');
		$mpdf->WriteHTML($css, 1);
		$mpdf->WriteHTML($html_asd);

		$mpdf->Output();
		exit;
	}
}

/* End of file clase.php */
/* Location: ./application/controllers/clase.php */

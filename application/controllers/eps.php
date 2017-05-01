<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eps extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_eps');
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		$data['titulo'] = 'Gestion de eps';
		$this->load->view('msp/cabecera',$data);
		$this->load->view('eps/eps');
		$this->load->view('msp/footer');
		$this->load->view('eps/add');
	}

	public function cargarTablaEps()
	{
		if ($this->input->is_ajax_request()) 
		{
			foreach ($this->mdl_eps->tablaEps() as $eps) {
				if ($eps->Estado == 1) 
				{
					$titulo = 'Inhabilitar estado';
					$estilo = 'danger';
					$estado = 'Activo';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="background-color: #2A2A2A;" title="'.$titulo.'"   onclick="listarEps('.$eps->IdEps.')"><i class="fa fa-pencil"></i></a>';
				}
				else
				{
					$titulo = 'Habilitar estado';
					$estilo = 'success';
					$estado = 'Inactivo';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="background-color: #2A2A2A;" disabled="true"><i class="fa fa-pencil"></i></a>';
				}

				$row = array();
				$row[]= $eps->NombreEps;
				$row[]= $eps->Telefono;
				$row[]= $estado;
				
				$row[] = '<center>'.$edit.' <a class="btn btn-lg btn-'.$estilo.' btn-expand" style="background-color: #2A2A2A;"" title="'.$titulo.'"   onclick="cambiarE('.$eps->IdEps.')"><i class="fa fa-exchange"></i></a></center>';
				$data[] = $row;
			}

			$output = array(
				"data" => $data,
				);

			echo json_encode($output);
		}
		else
		{
			echo "error";
		}
	}

	public function guardarEps()
	{
		if ($this->input->is_ajax_request()) 
		{
			$data = array(
				'NombreEps' => $this->input->post('nombreepsR'),
				'Telefono' => $this->input->post('telefonoepsR'),
				'Estado' => 1
				);

			if ($this->mdl_eps->guardarEps($data))
			{
				echo 'ok';		
			}
			else
			{
				echo 'error';
			}
		}
		else
		{
			redirect('error404');
		}
	}

	public function variaEstadoEps()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('idE');
			$est;

			foreach ($this->mdl_eps->listarEps($id)->result() as $est) {
				if ($est->Estado == 0) { $est = 1; } else { $est = 0; }
				break;
			}

			$data = array('Estado' => $est);

			if ($this->mdl_eps->actualizarEps($id,$data))
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

	public function listarEps($id)
	{
		if ($this->input->is_ajax_request()) 
		{
			$data = $this->mdl_eps->listarEps($id);
			echo json_encode($data->row());
		}
		else 
		{
			redirect("error404");
		}
	}

	public function actualizarEps()
	{
		if ($this->input->is_ajax_request()) {
			
			$id = $this->input->post('ideps');
			$data = array(
				'NombreEps' => $this->input->post('nombreeps'),
				'Telefono' => $this->input->post('telefonoeps') 
				);
			
			if ($this->mdl_eps->actualizarEps($id,$data))
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
			redirect('error404');
		}
	}

}

/* End of file eps.php */
/* Location: ./application/controllers/eps.php */
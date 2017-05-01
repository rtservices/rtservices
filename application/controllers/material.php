<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_material');
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		$data['cpersona'] = $this->mdl_login->cargarUsuario();
		$data['titulo'] = 'Gestion de Materiales';
		$this->load->view('msp/cabecera', $data);
		$this->load->view('material/material');
		$this->load->view('msp/footer');
		$this->load->view('material/add');	
	}

	public function cargarTabla()
	{
		$data = array();
		if ($this->input->is_ajax_request())
		{
			foreach ($this->mdl_material->cargarTabla() as $material)
			{
				if ($material->Estado == 1) 
				{
					$accion = 'Inhabilitar material';
					$color = ' color: #F13A3A; background-color: #2A2A2A;';
					$clase = 'danger';
					$estado = 'Activo';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;"   title="Editar material" onclick="editarMaterial('.$material->IdMaterial.')"><i class="fa fa-pencil"></i></a>';
				}
				else
				{
					$accion = 'Habilitar material';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$clase = 'success';
					$estado = 'Inactivo';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;"   title="Debes tener activo este material para poder editarlo." disabled="true"><i class="fa fa-pencil"></i></a>';
				}
				$row = array();
				$row[] = $material->DescripcionMaterial;
				$row[] = $estado;

				$row[] = '
				<center>
					'.$edit.'
					<a class="btn btn-'.$clase.' btn-lg btn-expand" style="'.$color.'"   title="'.$accion.'" onclick="variarEstadoMaterial('.$material->IdMaterial.')"><i class="fa fa-exchange"></i></a>
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

	public function variarEstadoMaterial()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('idmaterial');
			$estado;
			foreach ($this->mdl_material->listarMaterial($id)->result() as $material) {
				if ($material->Estado == 1) 
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

			if ($this->mdl_material->actualizarMaterial($id,$data))
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


	public function registrarMaterial()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array(
				'Estado'=>1,
				'DescripcionMaterial' =>$this->input->post('materialR'));
			if ($this->mdl_material->registrarMaterial($data)) {
				echo "ok";
			} else{
				echo "error";
			}
		} else {
			redirect('error404');
		}

	}

	public function listarMaterial($id)
	{
		if ($this->input->is_ajax_request()) 
		{
			$data = $this->mdl_material->listarMaterial($id);
			echo json_encode($data->row());
		} 
		else
		{
			redirect('error404');
		}
	}

	public function guardarMaterial()
	{
		if ($this->input->is_ajax_request()) 
		{
			$id = $this->input->post('idmaterial');
			$data = array('DescripcionMaterial' =>$this->input->post('material'));
			if($this->mdl_material->actualizarMaterial($id,$data))
			{
				echo "ok";
			} else
			{
				echo "error";
			}
		} else
		{
			redirect('error404');
		}
	}
}

/* End of file material.php */
/* Location: ./application/controllers/material.php */
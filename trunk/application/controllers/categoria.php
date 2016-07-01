<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_categoria');
	}
	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		$data['cpersona'] = $this->mdl_login->cargarUsuario();
		$data['titulo'] = 'Gestion de categorias';
		$this->load->view('msp/cabecera', $data);
		$this->load->view('categoria/categoria');
		$this->load->view('msp/footer');
		$this->load->view('categoria/add');		
	}

	public function cargarTabla()
	{
		$data = array();
		if ($this->input->is_ajax_request())
		{
			foreach ($this->mdl_categoria->cargarTabla() as $categoria)
			{
				if ($categoria->Estado == 1) 
				{
					$accion = 'Inhabilitar categoria';
					$color = ' color: #F13A3A; background-color: #2A2A2A;';
					$clase = 'danger';
					$estado = 'Activo';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Editar categoria" onclick="editarCategoria('.$categoria->IdCategoria.')"><i class="fa fa-pencil"></i></a>';
				}
				else
				{
					$accion = 'Habilitar categoria';
					$color = 'color:#81B71A; background-color: #2A2A2A;';
					$clase = 'success';
					$estado = 'Inactivo';
					$edit = '<a class="btn btn-primary btn-lg btn-expand" style="color:white; background-color: #2A2A2A;" href="javascript:void()" title="Debes tener activa esta categoria para poder editarlo." disabled="true"><i class="fa fa-pencil"></i></a>';
				}
				$row = array();
				$row[] = $categoria->NombreCategoria;
				$row[] = $estado;

				$row[] = '
				<center>
					'.$edit.'
					<a class="btn btn-'.$clase.' btn-lg btn-expand" style="'.$color.'" href="javascript:void()" title="'.$accion.'" onclick="variarEstadoCategoria('.$categoria->IdCategoria.')"><i class="fa fa-exchange"></i></a>
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

	public function variarEstadoCategoria()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('idcategoria');
			$estado;
			foreach ($this->mdl_categoria->listarCategoria($id)->result() as $categoria) {
				if ($categoria->Estado == 1) 
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

			if ($this->mdl_categoria->actualizarCategoria($id,$data))
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

	public function registrarCategoria()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array(
				'Estado'=>1,
				'NombreCategoria' =>$this->input->post('categoriaR'));
			if ($this->mdl_categoria->registrarCategoria($data)) {
				echo "ok";
			} else{
				echo "error";
			}
		} else {
			redirect('error404');
		}

	}

	public function listarCategoria($id)
	{
		if ($this->input->is_ajax_request()) 
		{
			$data = $this->mdl_categoria->listarCategoria($id);
			echo json_encode($data->row());
		} 
		else
		{
			redirect('error404');
		}
	}

	public function guardarCategoria()
	{
		if ($this->input->is_ajax_request()) 
		{
			$id = $this->input->post('idcategoria');
			$data = array('NombreCategoria' =>$this->input->post('categoria'));
			if($this->mdl_categoria->actualizarCategoria($id,$data))
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

/* End of file categoria.php */
/* Location: ./application/controllers/categoria.php */
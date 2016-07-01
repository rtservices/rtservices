<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_login');
	}

	public function index()
	{
		if ($this->session->userdata('usuario_id')) 
		{
			redirect('menu');
		}
		$this->load->view('login/login');
	}

	public function validarUsuario()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array('usuario' => $this->input->post('usuario'), 'pass' => $this->input->post('pass'));

			if ($this->mdl_login->validarUsuario($data)) 
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

	public function salir()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_menu');
		$this->load->model('mdl_login');
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		$data['cpersona'] = $this->mdl_login->cargarUsuario();
		$data['titulo'] = 'Menu principal';
		$data['iTotalPersonas'] = $this->mdl_menu->conteoPersonas()->total;
		$data['iTotalJugadores'] = $this->mdl_menu->conteoPersonasRol(3)->total;
		$data['iTotalInstructores'] = $this->mdl_menu->conteoPersonasRol(2)->total;
		$data['iTotalAdministradores'] = $this->mdl_menu->conteoPersonasRol(1)->total;
		$this->load->view('msp/cabecera',$data);
		$this->load->view('menu/menu',$data);
		$this->load->view('msp/footer');
		$this->load->view('menu/add');
	}

}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */

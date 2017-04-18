<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_login');
	}

	public function index()
	{
		$this->load->view('inicio/inicio');
	}

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */
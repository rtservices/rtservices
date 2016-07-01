<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planclase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
		$idpc = ($this->input->get('idpc')) ? $this->input->get('idpc') : null;
		if (is_null($idpc))
		{
			$data['titulo'] = 'G. Planes de clase';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('planclase/planclase');
			$this->load->view('msp/footer');
			$this->load->view('planclase/add');
		}
		else
		{
			$data['titulo'] = 'G. Plan de clase';
			$this->load->view('msp/cabecera', $data);
			$this->load->view('planclase/planclaseG', $data);
			$this->load->view('msp/footer');
			$this->load->view('planclase/addG');
		}
	}

}

/* End of file planclase.php */
/* Location: ./application/controllers/planclase.php */
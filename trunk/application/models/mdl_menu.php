<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_menu extends CI_Model {

	public $tabla;

	public function __construct()
	{
		parent::__construct();
	}

	public function cargarTabla()
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$res = $this->db->get()->result();

		return $res;
	}

}

/* End of file mdl_menu.php */
/* Location: ./application/models/mdl_menu.php */
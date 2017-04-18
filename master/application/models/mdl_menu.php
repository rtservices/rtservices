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

	public function conteoPersonas()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('rtspersona_deb');
		$res = $this->db->get()->row();

		return $res;
	}

	public function conteoPersonasRol($idrol)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('rtspersonarol_det');
		$this->db->where('IdRol', $idrol);
		$this->db->where('Estado', 1);
		$res = $this->db->get()->row();

		return $res;
	}

}

/* End of file mdl_menu.php */
/* Location: ./application/models/mdl_menu.php */

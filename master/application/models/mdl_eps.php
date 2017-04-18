<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_eps extends CI_Model {

	var $tabla = 'rtseps';

	public function __construct()
	{
		parent::__construct();
	}

	function tablaEps()
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$res = $this->db->get()->result();

		return $res;
	}

	public function listarEps($idEp)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('idEps',$idEp);
		$res = $this->db->get();

		return $res;
	}

	public function guardarEps($data)
	{
		$res = $this->db->insert($this->tabla, $data);
		return $res;
	}
	
	public function actualizarEps($idE,$data)
	{
		$this->db->where('idEps', $idE);
		$res = $this->db->update($this->tabla,$data);
		return $res;
	}
}

/* End of file mdl_eps.php */
/* Location: ./application/models/mdl_eps.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_material extends CI_Model {

public $tabla = 'RtsMaterial';
	
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

	public function actualizarMaterial($id,$data)
	{
		$this->db->where('IdMaterial', $id);
		$res = $this->db->update($this->tabla, $data);

		return $res;
	}
		public function listarMaterial($id)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('IdMaterial', $id);
		$res = $this->db->get();

		return $res;
	}

		public function registrarMaterial($data)
	{
		$res = $this->db->insert($this->tabla, $data);
		return $res;
	}

}

/* End of file mdl_material.php */
/* Location: ./application/models/mdl_material.php */
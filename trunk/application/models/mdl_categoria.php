<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_categoria extends CI_Model {

	public $tabla = 'RtsCategoria';
	
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

	public function actualizarCategoria($id,$data)
	{
		$this->db->where('IdCategoria', $id);
		$res = $this->db->update($this->tabla, $data);

		return $res;
	}
		public function listarCategoria($id)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('IdCategoria', $id);
		$res = $this->db->get();

		return $res;
	}

		public function registrarCategoria($data)
	{
		$res = $this->db->insert($this->tabla, $data);
		return $res;
	}

}

/* End of file mdl_categoria.php */
/* Location: ./application/models/mdl_categoria.php */
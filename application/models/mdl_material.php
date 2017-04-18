<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_material extends CI_Model {

public $tabla = 'rtsmaterial';
	
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

	public function actualizarMaterialClase($id,$data)
	{
		$this->db->where('IdMaterialClase', $id);
		$res = $this->db->update('rtsmaterialclase_det', $data);

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

	public function listarMaterialClases($id)
	{
		$this->db->select('*');
		$this->db->from('rtsmaterialclase_det');
		$this->db->where('IdMaterialClase', $id);
		$res = $this->db->get();

		return $res;
	}

	public function registrarMaterial($data)
	{
		$res = $this->db->insert($this->tabla, $data);
		return $res;
	}

	//------------Material clase-----------------

	public function cargarTablaMc($idClase)
	{
		$this->db->select('rmc.*, rc.NombreClase,rm.DescripcionMaterial');
		$this->db->from('rtsmaterialclase_det AS rmc');
		$this->db->join('rtsmaterial AS rm','rmc.IdMaterial = rm.IdMaterial','INNER');
		$this->db->join('rtsclase_deb AS rc','rmc.IdClase_deb = rc.IdClase','INNER');
		$this->db->where('rmc.IdClase_deb',$idClase);
		$res = $this->db->get()->result();

		return $res;
	}

    public function registrarMaterialClase($data)
	{
		$res = $this->db->insert('rtsmaterialclase_det', $data);
		return $res;
	}

	public function listarMateriales()
	{
		$this->db->select('*');
		$this->db->from('rtsmaterial');
		$this->db->where('Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

	public function materialesInscriptos($id)
	{
		$this->db->select('rm.IdMaterial');
		$this->db->from('rtsmaterial AS rm');
		$this->db->join('rtsmaterialclase_det AS rmc','rm.IdMaterial = rmc.IdMaterial','INNER');
		$this->db->where('rmc.IdClase_deb', $id);
		$this->db->where('rm.Estado',1 );	
		$res = $this->db->get()->result();

		return $res;
	}

	public function listarClases()
	{
		$this->db->select('*');
		$this->db->from('rtsclase_deb');
		$this->db->where('Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

	public function cargarClase_id($id)
	{
		$this->db->select('*');
		$this->db->from('rtsclase_deb');
		$this->db->where('IdClase', $id);
		$res = $this->db->get()->result();

		return $res;
	}
	//Eliminar material clase
	public function eliminarMaterialClases($id)
	{
		$this->db->where('IdMaterialClase', $id);
		$res = $this->db->delete('rtsmaterialclase_det');
		return $res;
	}
}

/* End of file mdl_material.php */
/* Location: ./application/models/mdl_material.php */
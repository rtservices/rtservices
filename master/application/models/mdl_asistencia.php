<?php
defined('BASEPATH') Or exit('No direct script access allowed');

class Mdl_asistencia extends CI_Model {

	public $tabla = 'rtsasistencia_deb';

	public function __construct()
	{
		parent::__construct();
	}

	public function cargarTabla($iIdClase)
	{
		$this->db->select('rtsasistencia_deb.IdAsistencia, rtsclase_deb.NombreClase, rtsasistencia_deb.FechaRegistro, rtsclase_deb.HoraInicio, rtsclase_deb.HoraFinal, rtsclase_deb.Dia, rtsasistencia_deb.Estado');
		$this->db->from($this->tabla);
		$this->db->join('rtsclase_deb','rtsasistencia_deb.IdClase_deb = rtsclase_deb.IdClase','INNER');
		$this->db->where('rtsclase_deb.IdClase', $iIdClase);
		$res = $this->db->get()->result();

		return $res;
	}

	public function registrarAsistencia($data)
	{
		$res = $this->db->insert($this->tabla, $data);
		if ($res) 
		{
			$res = $this->db->insert_id();
		}

		return $res;
	}

	public function asistencia_byid($id)
	{
		$this->db->select('IdAsistencia, FechaRegistro, FechaSistema, Estado');
		$this->db->from($this->tabla);
		$this->db->where('IdAsistencia', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function actualizarAsistencia($data, $id)
	{
		$this->db->where('IdAsistencia', $id);
		$res = $this->db->update($this->tabla, $data);

		return $res;
	}
}

/* End of file mdl_clase.php */
/* Location: ./application/models/mdl_clase.php */
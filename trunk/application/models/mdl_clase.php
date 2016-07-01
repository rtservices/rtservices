<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_clase extends CI_Model {

	public $tabla = 'RtsClase_deb';

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

	public function actualizarClase($id,$data)
	{
		$this->db->where('IdClase', $id);
		$res = $this->db->update($this->tabla, $data);

		return $res;
	}

	public function listarClase($id)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('IdClase', $id);
		$res = $this->db->get();

		return $res;
	}

	public function registrarClase($data)
	{
		$res = $this->db->insert($this->tabla, $data);
		return $res;
	}

	public function listarInstructores()
	{
		$this->db->select('Documento, Nombre, Apellidos, IdPersonaRol');
		$this->db->from('RtsPersonaRol_det');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->where('RtsPersona_deb.Estado', 1);
		$this->db->where('RtsPersonaRol_det.Estado', 1);
		$this->db->where('RtsPersonaRol_det.IdRol', 2);
		$res = $this->db->get()->result();

		return $res;
	}

	public function listarJugadores()
	{
		$this->db->select('Documento, Nombre, Apellidos, IdPersonaRol');
		$this->db->from('RtsPersonaRol_det');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->where('RtsPersona_deb.Estado', 1);
		$this->db->where('RtsPersonaRol_det.Estado', 1);
		$this->db->where('RtsPersonaRol_det.IdRol', 3);
		$res = $this->db->get()->result();

		return $res;
	}

	public function cargarJugadoresClase($id)
	{
		$this->db->select('RtsClaseJugador_det.*, ');
		$this->db->from('RtsClaseJugador_det');
		$this->db->join('RtsPlanClase_deb', 'RtsClaseJugador_det.IdPlanClase_deb = RtsPlanClase_deb.IdPlanClase', 'INNER');
		$this->db->join('RtsPersonaRol_det', 'RtsPlanClase_deb.IdPersonaRol_det = RtsPersonaRol_det.IdPersonaRol', 'INNER');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->where('RtsClaseJugador_det.IdClase_deb', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function cargarClase_id($id)
	{
		$this->db->select('RtsClase_deb.*');
		$this->db->from($this->tabla);
		$this->db->join('RtsPersonaRol_det', 'RtsClase_deb.IdPersonaRol_det = RtsPersonaRol_det.IdPersonaRol', 'INNER');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->where('RtsClase_deb.IdClase', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function selJugadorPlan()
	{
		$this->db->select('RtsPlanClase_deb.*, RtsPersonaRol_det.*, RtsPersona_deb.Documento, RtsPersona_deb.Nombre, RtsPersona_deb.Apellidos');
		$this->db->from('RtsPlanClase_deb');
		$this->db->join('RtsPersonaRol_det', 'RtsPlanClase_deb.IdPersonaRol_det = RtsPersonaRol_det.IdPersonaRol', 'INNER');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->where('RtsPlanClase_deb.Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

	public function cargarTablaJugadorClase($idClase)
	{
		$this->db->select('RtsClaseJugador_det.*, RtsPlanClase_deb.*, RtsPersonaRol_det.*, RtsPersona_deb.Documento, RtsPersona_deb.Nombre, RtsPersona_deb.Apellidos');
		$this->db->from('RtsPlanClase_deb');
		$this->db->join('RtsPersonaRol_det', 'RtsPlanClase_deb.IdPersonaRol_det = RtsPersonaRol_det.IdPersonaRol', 'INNER');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->join('RtsClaseJugador_det', 'RtsPlanClase_deb.IdPlanClase = RtsClaseJugador_det.IdPlanClase_deb', 'INNER');
		$this->db->where('RtsClaseJugador_det.IdClase_deb', $idClase);
		$res = $this->db->get()->result();

		return $res;
	}

	public function jugadoresInscritos($id)
	{
		$this->db->select('RtsPlanClase_deb.IdPlanClase');
		$this->db->from('RtsPlanClase_deb');
		$this->db->join('RtsClaseJugador_det', 'RtsPlanClase_deb.IdPlanClase = RtsClaseJugador_det.IdPlanClase_deb', 'INNER');
		$this->db->where('RtsClaseJugador_det.IdClase_deb', $id);
		$this->db->where('RtsPlanClase_deb.Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

	public function inscribirPlanJugadorClase($data)
	{
		$res = $this->db->insert('RtsClaseJugador_det', $data);
		return $res;
	}

	public function eliminarInscripcionClase($id)
	{
		$this->db->where('IdClasejugador', $id);
		$res = $this->db->delete('RtsClaseJugador_det');

		return $res;
	}
}

/* End of file mdl_clase.php */
/* Location: ./application/models/mdl_clase.php */
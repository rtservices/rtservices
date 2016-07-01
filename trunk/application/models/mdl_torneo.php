<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_torneo extends CI_Model {

	public $tabla = 'RtsTorneo';

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

	public function listarTorneo($id)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('IdTorneo', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function actualizarTorneo($id,$data)
	{
		$this->db->where('IdTorneo', $id);
		$res = $this->db->update($this->tabla, $data);

		return $res;
	}

	public function listarEtapa($id,$etapa)
	{
		$this->db->select('*');
		$this->db->from('RtsEtapa_deb');
		$this->db->where('IdTorneo', $id);
		$this->db->like('NombreEtapa', $etapa, 'both');
		$res = $this->db->get()->row();

		return $res;
	}

	public function listarInscritosEtapa($id)
	{
		$this->db->select('RtsPersona_deb.Documento, RtsPersona_deb.Nombre, RtsPersona_deb.Apellidos, RtsCategoria.NombreCategoria, RtsEtapaJugador_det.IdEtapaJugador');
		$this->db->from('RtsEtapaJugador_det');
		$this->db->join('RtsPersonaRol_det', 'RtsEtapaJugador_det.IdPersonaRol_det = RtsPersonaRol_det.IdPersonaRol', 'JOIN');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersonaRol = RtsPersona_deb.IdPersona', 'JOIN');
		$this->db->join('RtsCategoria', 'RtsEtapaJugador_det.IdCategoria = RtsCategoria.IdCategoria', 'JOIN');
		$this->db->join('RtsEtapa_deb', 'RtsEtapaJugador_det.IdEtapa_deb = RtsEtapa_deb.IdEtapa', 'JOIN');
		$this->db->where('RtsEtapa_deb.IdEtapa', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function eliminarInscripcionJugador($id)
	{
		$this->db->where('IdEtapaJugador', $id);
		$res = $this->db->delete('RtsEtapaJugador_det');

		return $res;
	}

	// etapas - validaciones y otros

	public function cargarTablaEtapa($id)
	{
		$this->db->select('RtsEtapaJugador_det.*, RtsPersona_deb.Documento, RtsPersona_deb.Genero, RtsPersona_deb.Nombre as NombreP, RtsPersona_deb.Apellidos as ApellidosP, RtsCategoria.NombreCategoria');
		$this->db->from('RtsEtapaJugador_det');
		$this->db->join('RtsCategoria', 'RtsEtapaJugador_det.IdCategoria = RtsCategoria.IdCategoria', 'INNER');
		$this->db->join('RtsPersonaRol_det', 'RtsEtapaJugador_det.IdPersonaRol_det = RtsPersonaRol_det.IdPersonaRol', 'INNER');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->join('RtsEtapa_deb', 'RtsEtapaJugador_det.IdEtapa_deb = RtsEtapa_deb.IdEtapa', 'INNER');
		$this->db->where('RtsEtapa_deb.IdEtapa', $id);

		$res = $this->db->get()->result();
		return $res;
	}

	public function validarEtapa($id)
	{
		$this->db->select('*');
		$this->db->from('RtsEtapa_deb');
		$this->db->where('IdEtapa', $id);

		$res = $this->db->get()->result();
		return $res;
	}

	public function actualizarEtapa($id, $data)
	{
		$this->db->select('*');
		$this->db->from('RtsEtapaJugador_det');
		$this->db->where('IdEtapa_deb', $id);
		$dato = $this->db->get();
		if ($dato->num_rows() > 0)
		{
			$res = 'raices';
		}
		else
		{
			$this->db->where('IdEtapa', $id);
			$res = $this->db->update('RtsEtapa_deb', $data);
		}

		return $res;
	}

	public function cargarComboJugador()
	{
		$this->db->select('RtsPersona_deb.*');
		$this->db->from('RtsPersonaRol_det');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->where('RtsPersona_deb.Estado', 1);
		$this->db->where('RtsPersonaRol_det.Estado', 1);
		$this->db->where('RtsPersonaRol_det.IdRol', 3);

		$res = $this->db->get()->result();
		return $res;
	}

	public function inscripcionJugador_id($id)
	{
		$this->db->select('*');
		$this->db->from('RtsEtapaJugador_det');
		$this->db->where('IdEtapaJugador', $id);

		$res = $this->db->get()->result();

		return $res;
	}

	public function actualizarInscripcion($id,$data)
	{
		$this->db->where('IdEtapaJugador', $id);
		$res = $this->db->update('RtsEtapaJugador_det', $data);

		return $res;
	}

}

/* End of file mdl_torneo.php */
/* Location: ./application/models/mdl_torneo.php */
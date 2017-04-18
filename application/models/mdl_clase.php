<?php
defined('BASEPATH') Or exit('No direct script access allowed');

class Mdl_clase extends CI_Model {

	public $tabla = 'rtsclase_deb';

	public function __construct()
	{
		parent::__construct();
	}

	public function cargarTabla()
	{
		$this->db->select('rp.Documento, rp.Nombre, rp.Apellidos,rc.*,(SELECT COUNT(*) FROM rtsclasejugador_det AS rcj WHERE rcj.IdClase_deb = rc.IdClase ) AS cantidad_jugadores');
		$this->db->from('rtsclase_deb AS rc');
		//$this->db->join('rtsclasejugador_det AS rcj','rc.IdClase = rcj.IdClase_deb','INNER');
		$this->db->join('rtspersonarol_det AS rpr','rc.IdPersonaRol_det = rpr.IdPersonaRol','INNER');
		$this->db->join('rtspersona_deb AS rp','rpr.IdPersona_deb = rp.IdPersona','INNER');
		$this->db->where('rpr.IdRol',2);
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
		if ($res) 
		{
			$res = $this->db->insert_id();
		}
		
		return $res;
	}

	public function listarInstructores()
	{
		$this->db->select('Documento, Nombre, Apellidos, rtspersonarol_det.IdPersonaRol');
		$this->db->from('rtspersonarol_det');
		$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'INNER');
		$this->db->where('rtspersona_deb.Estado', 1);
		$this->db->where('rtspersonarol_det.Estado', 1);
		$this->db->where('rtspersonarol_det.IdRol', 2);
		$this->db->where('rtspersona_deb.IdPersona <> 1');
		$res = $this->db->get()->result();

		return $res;
	}

	public function listarJugadores()
	{
		$this->db->select('Documento, Nombre, Apellidos, IdPersonaRol');
		$this->db->from('rtspersonarol_det');
		$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'INNER');
		$this->db->where('rtspersona_deb.Estado', 1);
		$this->db->where('rtspersonarol_det.Estado', 1);
		$this->db->where('rtspersonarol_det.IdRol', 3);
		$res = $this->db->get()->result();

		return $res;
	}

	public function cargarJugadoresClase($id)
	{
		$this->db->select('rtsclasejugador_det.*, ');
		$this->db->from('rtsclasejugador_det');
		$this->db->join('rtsplanclase_deb', 'rtsclasejugador_det.IdPlanClase_deb = rtsplanclase_deb.IdPlanClase', 'INNEr');
		$this->db->join('rtspersonarol_det', 'rtsplanclase_deb.IdPersonarol_det = rtspersonarol_det.IdPersonarol', 'INNEr');
		$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'INNEr');
		$this->db->where('rtsclasejugador_det.IdClase_deb', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function cargarClase_id($id)
	{
		$this->db->select('rtsclase_deb.*');
		$this->db->from($this->tabla);
		$this->db->join('rtspersonarol_det', 'rtsclase_deb.IdPersonarol_det = rtspersonarol_det.IdPersonarol', 'INNEr');
		$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'INNEr');
		$this->db->where('rtsclase_deb.IdClase', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function selJugadorPlan()
	{
		$this->db->select('rtsplanclase_deb.*, rtspersonarol_det.*, rtspersona_deb.Documento, rtspersona_deb.Nombre, rtspersona_deb.Apellidos');
		$this->db->from('rtsplanclase_deb');
		$this->db->join('rtspersonarol_det', 'rtsplanclase_deb.IdPersonarol_det = rtspersonarol_det.IdPersonarol', 'INNEr');
		$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'INNER');
		$this->db->where('rtsplanclase_deb.Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

	public function cargarTablaJugadorClase($idClase)
	{
		$this->db->select('rtsclasejugador_det.*, rtsplanclase_deb.*, rtspersonarol_det.*, rtspersona_deb.Documento, rtspersona_deb.Nombre, rtspersona_deb.Apellidos');
		$this->db->from('rtsplanclase_deb');
		$this->db->join('rtspersonarol_det', 'rtsplanclase_deb.IdPersonarol_det = rtspersonarol_det.IdPersonarol', 'INNER');
		$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'INNEr');
		$this->db->join('rtsclasejugador_det', 'rtsplanclase_deb.IdPlanClase = rtsclasejugador_det.IdPlanClase_deb', 'INNER');
		$this->db->where('rtsclasejugador_det.IdClase_deb', $idClase);
		$res = $this->db->get()->result();

		return $res;
	}

	public function jugadoresInscritos($id)
	{
		$this->db->select('rtsplanclase_deb.IdPlanClase');
		$this->db->from('rtsplanclase_deb');
		$this->db->join('rtsclasejugador_det', 'rtsplanclase_deb.IdPlanClase = rtsclasejugador_det.IdPlanClase_deb', 'INNEr');
		$this->db->where('rtsclasejugador_det.IdClase_deb', $id);
		$this->db->where('rtsplanclase_deb.Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}



	public function inscribirPlanJugadorClase($data)
	{
		$res = $this->db->insert('rtsclasejugador_det', $data);
		return $res;
	}

	public function eliminarInscripcionClase($id)
	{
		$this->db->where('IdClasejugador', $id);
		$res = $this->db->delete('rtsclasejugador_det');

		return $res;
	}

	//Listar clases para informacion
	public function listarClases($id)
	{
		$this->db->select('rp.Documento, rp.Nombre, rp.Apellidos,rc.*,(SELECT COUNT(*) FROM rtsclasejugador_det AS rcj WHERE rcj.IdClase_deb = rc.IdClase ) AS cantidad_jugadores');
		$this->db->from('rtsclase_deb AS rc');
		$this->db->join('rtspersonarol_det AS rpr','rc.IdPersonaRol_det = rpr.IdPersonaRol','INNER');
		$this->db->join('rtspersona_deb AS rp','rpr.IdPersona_deb = rp.IdPersona','INNER');
		$this->db->where('rpr.IdRol',2);
		$this->db->where('rc.IdClase',$id);
		$res = $this->db->get();

		return $res;
	}

	public function listarClasesSelect()
	{
		$this->db->select('IdClase, NombreClase, Dia, HoraInicio, HoraFinal');
		$this->db->from($this->tabla);
		$this->db->where('Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}
	
}

/* End of file mdl_clase.php */
/* Location: ./application/models/mdl_clase.php */
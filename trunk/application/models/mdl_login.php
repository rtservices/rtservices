<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_login extends CI_Model {

	public $tabla = 'RtsLogin_deb';

	public function __construct()
	{
		parent::__construct();
	}

	public function validarUsuario($data)
	{
		$this->db->select('*');
		$this->db->from('RtsLogin_deb');
		$this->db->join('RtsPersonaRol_det','RtsLogin_deb.IdPersonaRol_det = RtsPersonaRol_det.IdPersonaRol','INNER');
		$this->db->join('RtsRol','RtsPersonaRol_det.IdRol = RtsRol.IdRol','INNER');
		$this->db->join('RtsPersona_deb','RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona','INNER');
		$this->db->where('RtsLogin_deb.Usuario',$data['usuario']);
		$this->db->where('RtsLogin_deb.Estado','1');
		$this->db->where('RtsPersonaRol_det.Estado','1');
		$this->db->where('RtsPersona_deb.Estado','1');

		$login = $this->db->get()->result();

		foreach ($login as $val)
		{
			if(password_verify($data['pass'], $val->Clave))
			{
				$this->session->set_userdata('usuario_activo',$this->session->userdata('session_id'));
				$this->session->set_userdata('usuario_id',$val->IdPersona);
				return true;
				break;
			}
		}
	}

	public function cargarUsuario()
	{
		$this->db->select('RtsPersona_deb.*,RtsRol.NombreRol,RtsEps.NombreEps');
		$this->db->from('RtsPersona_deb');
		$this->db->where('IdPersona', $this->session->userdata('usuario_id'));
		$this->db->join('RtsEps', 'RtsEps.IdEps = RtsPersona_deb.IdEps', 'left');
		$this->db->join('RtsPersonarol_det', 'RtsPersona_deb.IdPersona = RtsPersonarol_det.IdPersona_deb', 'INNER');
		$this->db->join('RtsRol', 'RtsPersonarol_det.IdRol = RtsRol.idRol', 'INNER');
		$this->db->where('RtsPersonaRol_det.Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

	public function recuperarPass($correo)
	{
		$this->db->select('*');
		$this->db->from('RtsLogin_deb');
		$this->db->join('RtsPersonaRol_det', 'RtsLogin_deb.IdPersonaRol_det = RtsPersonarol_det.IdPersonaRol', 'INNER');
		$this->db->join('RtsPersona_deb', 'RtsPersonarol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->where('RtsPersona_deb.Correo', $correo);
		$res = $this->db->get()->result();

		return $res;
	}

	public function validarToken($token, $idper)
	{
		$this->db->select('*');
		$this->db->from('RtsLogin_deb');
		$this->db->join('RtsResset_deb', 'RtsLogin_deb.IdLogin = RtsResset_deb.IdLogin_deb', 'INNER');
		$this->db->where('RtsResset_deb.Estado', 1);
		$this->db->where('RtsResset_deb.Token', $token);
		$this->db->where('RtsResset_deb.IdLogin_deb', $idper);
		$res = $this->db->get()->result();

		return $res;
	}

	public function prepararMail($correo)
	{
		$this->db->select('*');
		$this->db->from('RtsPersona_deb');
		$this->db->join('RtsPersonaRol_det', 'RtsPersona_deb.IdPersona = RtsPersonarol_det.IdPersona_deb', 'INNER');
		$this->db->join('RtsLogin_deb', 'RtsPersonarol_det.IdPersonaRol = RtsLogin_deb.IdPersonaRol_det', 'INNER');
		$this->db->where('RtsPersonarol_det.Estado', 1);
		$this->db->where('Correo', $correo);
		$res = $this->db->get()->result();

		return $res;
	}

	public function registrarToken($data)
	{
		$res = $this->db->insert('RtsResset_deb', $data);

		return $res;
	}

	public function verificarResset($correo)
	{
		$this->db->select('*');
		$this->db->from('RtsResset_deb');
		$this->db->join('RtsLogin_deb', 'RtsResset_deb.IdLogin_deb = RtsLogin_deb.IdLogin', 'INNER');
		$this->db->join('RtsPersonarol_det', 'RtsLogin_deb.IdPersonaRol_det = RtsPersonarol_det.IdPersonaRol', 'INNER');
		$this->db->join('RtsPersona_deb', 'RtsPersonarol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->where('Correo', $correo);
		$this->db->where('RtsResset_deb.Estado', 1);
		$res = $this->db->get()->result();
		
		return $res;
	}

	public function setPass($id, $data)
	{
		$this->db->where('IdLogin', $id);
		$res = $this->db->update('RtsLogin_deb', $data);

		if ($res)
		{
			$this->db->where('IdLogin_deb', $id);
			$resDel = $this->db->update('RtsResset_deb', array('Estado' => 0));
			if ($resDel)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}

	}
}

/* End of file mdl_login.php */
/* Location: ./application/models/mdl_login.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_login extends CI_Model {

	public $tabla = 'rtslogin_deb';

	public function __construct()
	{
		parent::__construct();
	}

	public function validarUsuario($data)
	{
		try
		{
			$this->db->select('*');
			$this->db->from('rtslogin_deb');
			$this->db->join('rtspersona_deb','rtslogin_deb.IdPersona = rtspersona_deb.IdPersona','INNER');
			$this->db->join('rtspersonarol_det','rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb','INNER');
			$this->db->where('rtslogin_deb.Usuario',$data['usuario']);
			$this->db->where('rtslogin_deb.Clave', md5($data['pass']));
			$this->db->where('rtslogin_deb.Estado','1');
			$this->db->where('rtspersonarol_det.Estado','1');
			$this->db->where('rtspersona_deb.Estado','1');

			$login = $this->db->get()->row();

			$this->db->select('Estado');
			$this->db->from('rtspersonarol_det');
			$this->db->where('IdPersona_deb', $login->IdPersona);
			$this->db->where('IdRol', 1);

			$admin = $this->db->get()->row();
			$admin_ = $admin->Estado;

			$this->db->select('Estado');
			$this->db->from('rtspersonarol_det');
			$this->db->where('IdPersona_deb', $login->IdPersona);
			$this->db->where('IdRol', 2);

			$instructor = $this->db->get()->row();
			$instructor_ = $instructor->Estado;

			if (($instructor_ == 1 && $admin_ == 1) || ($admin_ == 1 && $instructor_ == 0) || ($admin_ == 0 && $instructor_ == 1)) {
				$this->session->set_userdata('usuario_activo',$this->session->userdata('session_id'));
				$this->session->set_userdata('usuario_id',$login->IdPersona);

				$this->db->select('Correo');
				$this->db->from('rtspersona_deb');
				$this->db->where('IdPersona', 1);

				$this->session->set_userdata('correo_generico',$this->db->get()->row()->Correo);
				return true;
			} else {
				return false;
			}
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}

	public function cargarUsuario()
	{
		try
		{
			$this->db->select('rtspersona_deb.*,rtsrol.NombreRol,rtseps.NombreEps');
			$this->db->from('rtspersona_deb');
			$this->db->where('IdPersona', $this->session->userdata('usuario_id'));
			$this->db->join('rtseps', 'rtseps.IdEps = rtspersona_deb.IdEps', 'left');
			$this->db->join('rtspersonarol_det', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'INNER');
			$this->db->join('rtsrol', 'rtspersonarol_det.IdRol = rtsrol.idRol', 'INNER');
			$this->db->where('rtspersonarol_det.Estado', 1);
			$res = $this->db->get()->result();

			return $res;
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}

	public function recuperarPass($correo)
	{
		try
		{
			$this->db->select('*');
			$this->db->from('rtslogin_deb');
			$this->db->join('rtspersonarol_det', 'rtslogin_deb.IdPersonaRol_det = rtspersonarol_det.IdPersonaRol', 'INNER');
			$this->db->join('rtspersona_deb', 'rtspersonarol_det.IdPersona_deb = rtspersona_deb.IdPersona', 'INNER');
			$this->db->where('rtspersona_deb.Correo', $correo);
			$res = $this->db->get()->result();

			return $res;
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}

	public function validarToken($token, $idper)
	{
		try
		{
			$this->db->select('*');
			$this->db->from('rtslogin_deb');
			$this->db->join('rtsresset_deb', 'rtslogin_deb.IdLogin = rtsresset_deb.IdLogin_deb', 'INNER');
			$this->db->where('rtsresset_deb.Estado', 1);
			$this->db->where('rtsresset_deb.Token', $token);
			$this->db->where('rtsresset_deb.IdLogin_deb', $idper);
			$res = $this->db->get()->result();

			return $res;
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}

	public function prepararMail($correo)
	{
		try
		{
			$this->db->select('*');
			$this->db->from('rtspersona_deb');
			$this->db->join('rtspersonarol_det', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'INNER');
			$this->db->join('rtslogin_deb', 'rtspersona_deb.IdPersona = rtslogin_deb.IdPersona', 'INNER');
			$this->db->where('rtspersonarol_det.Estado', 1);
			$this->db->where('Correo', $correo);
			$res = $this->db->get()->result();

			return $res;
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}

	public function registrarToken($data)
	{
		try
		{
			$res = $this->db->insert('rtsresset_deb', $data);

			return $res;
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}

	public function verificarResset($correo)
	{
		try
		{
			$this->db->select('*');
			$this->db->from('rtsresset_deb');
			$this->db->join('rtslogin_deb', 'rtsresset_deb.IdLogin_deb = rtslogin_deb.IdLogin', 'INNER');
			$this->db->join('rtspersona_deb', 'rtslogin_deb.IdPersona = rtspersona_deb.IdPersona', 'INNER');
			$this->db->join('rtspersonarol_det', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'INNER');
			$this->db->where('Correo', $correo);
			$this->db->where('rtsresset_deb.Estado', 1);
			$res = $this->db->get()->result();

			return $res;
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}

	public function setPass($id, $data)
	{
		try
		{
			$this->db->where('IdLogin', $id);
			$res = $this->db->update('rtslogin_deb', $data);

			if ($res)
			{
				$this->db->where('IdLogin_deb', $id);
				$resDel = $this->db->update('rtsresset_deb', array('Estado' => 0));
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
		catch (Exception $e)
		{
			echo $e;
		}

	}
}

/* End of file mdl_login.php */
/* Location: ./application/models/mdl_login.php */
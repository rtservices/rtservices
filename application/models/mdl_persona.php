<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_persona extends CI_Model {

	public $tabla = 'rtspersona_deb';

	public function __construct()
	{
		parent::__construct();
	}

    // Se carga la tabla principal

	public function cargarTabla($res = null)
	{
		if (is_null($res))
		{
			$this->db->select('IdPersona, Documento, Nombre, Apellidos, Genero, Correo, DireccionResidencia, Telefono, Celular, FechaNacimiento, FechaIngreso, Estado, IdEps');
			$this->db->from($this->tabla);
			if ($this->session->userdata('usuario_id') != 1) {
				$this->db->where('IdPersona <> 1');
			}
			return $this->db->get()->result();
		}
		else
		{
			$query = $this->db->query("SELECT * FROM vistajugadores");
			return $query->result();
		}
	}

    // Se listan los roles que tiene cada persona

	public function cargarRoles($id)
	{
		$this->db->select('*');
		$this->db->from('rtspersonarol_det');
		$this->db->where('IdPersona_deb', $id);
		$res = $this->db->get()->result();

		return $res;
	}

    // Se listan las eps para el combobox(select) EPS

	public function listarEps()
	{
		$this->db->select('*');
		$this->db->from('rtseps');
		$this->db->where('Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

	// Función que registra y retorna el id del ultimo registro

	public function nuevaPersona($data)
	{
		$res = $this->db->insert($this->tabla, $data);

		if ($res)
		{
			return $this->db->insert_id();
		}
		else
		{
			return $res;
		}
	}

    // Función que actualiza la información de las persona

	public function actualizarPersona($id,$data)
	{
		$this->db->where('IdPersona', $id);
		$res = $this->db->update($this->tabla, $data);

		return $res;
	}

	// Función para listar todos los roles que estan activos en la persona elegida

	public function listarAllRol($idpersona)
	{
		$this->db->select('*');
		$this->db->from('rtspersonarol_det');
		$this->db->where('IdPersona_deb', $idpersona);
		$this->db->where('Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

    // Lista un rol por id

	public function listarRol($idpersona,$rol)
	{
		$this->db->select('rtspersonarol_det.*');
		$this->db->from('rtspersonarol_det');
		$this->db->where('IdPersona_deb', $idpersona);
		$this->db->where('IdRol', $rol);
		$res = $this->db->get()->result();

		return $res;
	}

    // Lista las cuentas de la persona

	public function listarCuenta($id,$tipo)
	{
		$this->db->select('*');
		$this->db->from('rtslogin_deb');
		$this->db->join('rtspersona_deb','rtslogin_deb.IdPersona = rtspersona_deb.IdPersona','INNER');
		$this->db->join('rtspersonarol_det','rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb','INNER');
		$this->db->where('rtspersona_deb.IdPersona', $id);
		$this->db->where('rtspersonarol_det.IdRol', $tipo);
		$res = $this->db->get()->row();

		return $res;
	}

    // Permite asociar la persona a los 3 roles que existen en el sistema

	public function registrarRol($data)
	{
		$res = $this->db->insert('rtspersonarol_det', $data);
		return $res;
	}

    // Permite listar la persona para mostrar su información

	public function listarPersona($id)
	{
		$this->db->select('rtspersona_deb.*,rtseps.NombreEps, rtseps.Telefono as TelefonoEps');
		$this->db->from($this->tabla);
		$this->db->join('rtseps', 'rtspersona_deb.IdEps = rtseps.IdEps', 'INNER');
		$this->db->where('IdPersona', $id);
		$res = $this->db->get();

		return $res;
	}

	// Listar responsables de usuario

	public function cargarResponsable($id)
	{
		$this->db->select('rtspersona_deb.IdPersona, RtsResponsableJugador_det.IdResponsableJugador, rtspersona_deb.Documento, rtspersona_deb.Nombre, rtspersona_deb.Apellidos, rtspersona_deb.Celular, rtspersona_deb.Telefono, RtsResponsableJugador_det.Estado');
		$this->db->from('RtsResponsableJugador_det');
		$this->db->join('rtspersonarol_det', 'RtsResponsableJugador_det.IdPersonaRol_det = rtspersonarol_det.IdPersonaRol', 'inner');
		$this->db->join('rtspersona_deb', 'RtsResponsableJugador_det.IdPersona_deb = rtspersona_deb.IdPersona', 'inner');
		$this->db->where('rtspersonarol_det.IdPersonaRol', $id);

		$res = $this->db->get()->result();
		return $res;
	}

    // Cargar persona para modal

	public function listarResponsables($id)
	{
		$this->db->select('rtspersona_deb.Nombre, rtspersona_deb.Apellidos, rtspersona_deb.Documento, rtspersonarol_det.IdPersonaRol');
		$this->db->from($this->tabla);
		$this->db->join('rtspersonarol_det', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'inner');
		$this->db->where('rtspersona_deb.IdPersona', $id);
		$this->db->where('rtspersonarol_det.IdRol', 3);
		$res = $this->db->get()->row();

		return $res;
	}

	// Listar jugadores para responsable

	public function listarResponsableCombo()
	{
		$this->db->select('*');
		$this->db->from('rtspersona_deb');
		$this->db->where('Estado', 1);
		$this->db->where('IdPersona <> 1');
		$res = $this->db->get()->result();

		return $res;
	}

	// Listar persona asociada a la tabla personarol

	public function listarPersona_Rol($id)
	{
		$this->db->select('rtspersona_deb.*,rtseps.NombreEps, rtseps.Telefono as TelefonoEps, IdPersonaRol, IdRol');
		$this->db->from($this->tabla);
		$this->db->join('rtseps', 'rtspersona_deb.IdEps = rtseps.IdEps', 'INNER');
		$this->db->join('rtspersonarol_det', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'INNER');
		$this->db->where('IdPersona', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	//Carga el id de la persona por medio del id de personarol

	public function listarIdJugador($id)
	{
		$this->db->select('*');
		$this->db->from('rtspersona_deb');
		$this->db->join('rtspersonarol_det', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'INNER');
		$this->db->where('rtspersonarol_det.IdPersonaRol', $id);
		$res = $this->db->get();

		return $res;
	}

	//Valida que el jugador y el responsable no esten asociados ya.

	public function validarRJugador($idres, $idprol)
	{
		$this->db->select('*');
		$this->db->from('RtsResponsableJugador_det');
		$this->db->where('IdPersonaRol_det', $idprol);
		$this->db->where('IdPersona_deb', $idres);
		$res = $this->db->get();

		return $res;
	}

    // Permite inhabilitar (cambia el estado a 0) de todos los registros que en su IdPersona_deb tengan el id del registro
    // a inhabilitar (esta asociado con el inhabilitar o habilitar persona).

	public function actualizarRolInactivo($id,$data)
	{
		$this->db->where('IdPersona_deb', $id);
		$res = $this->db->update('rtspersonarol_det', $data);

		return $res;
	}

    //Gestiona los roles de las personas, los habilita (1) o los inhabilita (0)

	public function actualizarRol($id,$data)
	{
		$this->db->where('IdPersonaRol', $id);
		$res = $this->db->update('rtspersonarol_det', $data);

		return $res;
	}

    // Permite al administrador gestionar el nombre de usuario de los usuarios.

	public function actualizarUsuario($id,$data)
	{
		$this->db->where('IdLogin', $id);
		$res = $this->db->update('rtslogin_deb', $data);

		return $res;
	}

	// Luego de tener un registro de cada rol, se consultan los ultimos ID registrados

	public function ultimoAdmin()
	{
		$this->db->from('rtspersonarol_det');
		$res = $this->db->insert_id();

		return $res;
	}

	public function ultimoInst()
	{
		$this->db->from('rtspersonarol_det');
		$res = $this->db->insert_id();

		return $res;
	}

	// Registro de cuentas

	public function registrarCuenta($data)
	{
		$res = $this->db->insert('rtslogin_deb', $data);

		return $res;
	}

	// Actualizacion de cuentas

	public function actualizarCuenta($data, $id)
	{
		$this->db->where('IdLogin', $id);
		$res = $this->db->update('rtslogin_deb', $data);

		return $res;
	}

	// Luego de tener todo listo, insertamos nuestras cuentas

	public function registrarCuentaA($data)
	{
		$res = $this->db->insert('rtslogin_deb', $data);

		return $res;
	}

	public function registrarCuentaI($data)
	{
		$res = $this->db->insert('rtslogin_deb', $data);
		
		return $res;
	}

	// Esta validacion solo consulta y retorna el idpersonarol (solo es para ver el id de instructor o administrador)

	public function getValidarIdPersonaRol($id, $tipo)
	{
		$this->db->select('IdPersonaRol');
		$this->db->from('rtspersona_deb');
		$this->db->join('rtspersonarol_det', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'INNER');
		$this->db->where('rtspersonarol_det.IdPersona_deb', $id);
		$this->db->where('rtspersonarol_det.IdRol', $tipo);
		$res = $this->db->get()->row();

		return $res;
	}

	public function getVerificarCuentas($id, $tipo)
	{
		$this->db->select('IdLogin');
		$this->db->from('rtslogin_deb');
		$this->db->join('rtspersona_deb', 'rtslogin_deb.IdPersona_deb = rtspersona_deb.IdPersona', 'INNER');
		$this->db->join('rtspersonarol_det', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'INNER');
		$this->db->where('rtspersona_deb.IdPersona', $id);
		$this->db->where('rtspersonarol_det.IdRol', $tipo);
		$res = $this->db->get()->result();

		return $res;
	}

	// Retorna el correo de la persona
	public function listarPersona_notificación($id)
	{
		$this->db->select('rtspersona_deb.*');
		$this->db->from($this->tabla);
		$this->db->join('rtslogin_deb', 'rtspersona_deb.IdPersona = rtslogin_deb.IdPersona', 'INNER');
		$this->db->where('rtslogin_deb.IdLogin', $id);
		$res = $this->db->get()->row();

		return $res;
	}

	// Retorna información referente a los jugadores en los planes de clase
	public function listarJugador_planclase($id)
	{
		$this->db->select("Documento, IdPersona, IdPersonaRol, Nombre, Apellidos");
		$this->db->from('rtspersona_deb');
		$this->db->join('rtspersonarol_det', 'rtspersona_deb.IdPersona = rtspersonarol_det.IdPersona_deb', 'INNER');
		$this->db->where('IdRol', 3);
		$this->db->where('IdPersona', $id);
		$res = $this->db->get()->row();

		return $res;
	}

	public function tablaJugador_planclase($id)
	{
		$this->db->select('IdPlanClase, FechaInicio, DiasRestantes, Estado');
		$this->db->from('rtsplanclase_deb');
		$this->db->where('IdPersonaRol_det', $id);
		$res = $this->db->get()->result();

		return $res;
	}

	public function selPersonas()
	{
		$this->db->select('IdPersona, Documento, Nombre, Apellidos, FechaNacimiento');
		$this->db->from($this->tabla);
		$this->db->where('Estado', 1);
		$this->db->where('IdPersona <> 1');
		$res = $this->db->get()->result();

		return $res;
	}

	public function cargarTablaResponsables($iIdJugador)
	{
		$this->db->select('rjd.IdResponsableJugador, rjd.Estado, rjd.Parentesco, j.Documento AS JDocumento, j.Nombre AS JNombre,j.Apellidos AS JApellidos, r.Documento AS RDocumento, r.Nombre AS RNombre, r.Apellidos AS RApellidos, r.Telefono, r.Celular');
		$this->db->from('rtsresponsablejugador_det AS rjd');
		// Se hace el primer join para cargar los datos del jugador
		$this->db->join('rtspersonarol_det AS pr', 'rjd.IdPersonaRol_det = pr.IdPersonaRol', 'INNER');
		$this->db->join('rtspersona_deb AS j', 'pr.IdPersona_deb = j.IdPersona', 'INNER');
		// Se hace el segundo join para cargar los datos del responsable
		$this->db->join('rtspersona_deb AS r', 'rjd.IdPersona_deb = r.IdPersona', 'INNER');

		$this->db->where('j.IdPersona', $iIdJugador);
		$this->db->where('pr.IdRol', 3);

		$res = $this->db->get()->result();
		return $res;
	}

	public function asignarResponsable($data)
	{
		$res = $this->db->insert('rtsresponsablejugador_det', $data);
		return $res;
	}

	public function listResponsable($id)
	{
		$this->db->select('IdResponsableJugador, Documento, Nombre, Apellidos, Parentesco, rtsresponsablejugador_det.Estado');
		$this->db->from($this->tabla);
		$this->db->join('rtsresponsablejugador_det', 'rtspersona_deb.IdPersona = rtsresponsablejugador_det.IdPersona_deb', 'INNER');
		$this->db->where('rtsresponsablejugador_det.IdResponsableJugador', $id);
		$res = $this->db->get();

		return $res;
	}

	public function actualizarResponsable($data, $iIdResponsableJugador)
	{
		$this->db->where('rtsresponsablejugador_det.IdResponsableJugador', $iIdResponsableJugador);
		$res = $this->db->update('rtsresponsablejugador_det', $data);

		return $res;
	}

	public function listarPersonaporId($Id)
	{
		$this->db->select('Nombre + \' \' + Apellidos ');
		$this->db->from('rtspersona_deb');
		$this->db->where('IdPersona', $Id);
		$res = $this->db->get()->row();

		return $res;
	}

	public function validarCorreo($sCorreo)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('Correo', $sCorreo);
		$res = $this->db->get()->result();

		return $res;
	}

	public function validarDocumento($iDocumento)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('Documento', $iDocumento);
		$res = $this->db->get()->result();

		return $res;
	}

}

/* End of file mdl_persona.php */
/* Location: ./application/models/mdl_persona.php */
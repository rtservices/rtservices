<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_persona extends CI_Model {

	public $tabla = 'RtsPersona_deb';

	public function __construct()
	{
		parent::__construct();
	}

    // Se carga la tabla principal

	public function cargarTabla()
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$res = $this->db->get()->result();

		return $res;
	}

    // Se listan los roles que tiene cada persona

	public function cargarRoles($id)
	{
		$this->db->select('*');
		$this->db->from('RtsPersonaRol_det');
		$this->db->where('IdPersona_deb', $id);
		$res = $this->db->get()->result();

		return $res;
	}

    // Se listan las eps para el combobox(select) EPS

	public function listarEps()
	{
		$this->db->select('*');
		$this->db->from('RtsEps');
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
		$this->db->from('RtsPersonaRol_det');
		$this->db->where('IdPersona_deb', $idpersona);
		$this->db->where('Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

    // Lista un rol por id

	public function listarRol($idpersona,$rol)
	{
		$this->db->select('RtsPersonaRol_det.*');
		$this->db->from('RtsPersonaRol_det');
		$this->db->where('IdPersona_deb', $idpersona);
		$this->db->where('IdRol', $rol);
		$res = $this->db->get()->result();

		return $res;
	}

    // Lista las cuentas de la persona

	public function listarCuenta($id,$tipo)
	{
		$this->db->select('*');
		$this->db->from('RtsLogin_deb');
		$this->db->join('RtsPersonaRol_det', 'RtsLogin_deb.IdPersonaRol_det = RtsPersonaRol_det.IdPersonaRol', 'INNER');
		$this->db->join('RtsPersona_deb', 'RtsPersonaRol_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'INNER');
		$this->db->where('RtsPersona_deb.IdPersona', $id);
		$this->db->where('RtsPersonaRol_det.IdRol', $tipo);
		$res = $this->db->get()->row();

		return $res;
	}

    // Permite asociar la persona a los 3 roles que existen en el sistema

	public function registrarRol($data)
	{
		$res = $this->db->insert('RtsPersonaRol_det', $data);
		return $res;
	}

    // Permite listar la persona para mostrar su información

	public function listarPersona($id)
	{
		$this->db->select('RtsPersona_deb.*,RtsEps.NombreEps, RtsEps.Telefono as TelefonoEps');
		$this->db->from($this->tabla);
		$this->db->join('RtsEps', 'RtsPersona_deb.IdEps = RtsEps.IdEps', 'INNER');
		$this->db->where('IdPersona', $id);
		$res = $this->db->get();

		return $res;
	}

	// Listar responsables de usuario

	public function cargarResponsable($id)
	{
		$this->db->select('RtsPersona_deb.IdPersona, RtsResponsableJugador_det.IdResponsableJugador, RtsPersona_deb.Documento, RtsPersona_deb.Nombre, RtsPersona_deb.Apellidos, RtsPersona_deb.Celular, RtsPersona_deb.Telefono, RtsResponsableJugador_det.Estado');
		$this->db->from('RtsResponsableJugador_det');
		$this->db->join('RtsPersonaRol_det', 'RtsResponsableJugador_det.IdPersonaRol_det = RtsPersonaRol_det.IdPersonaRol', 'inner');
		$this->db->join('RtsPersona_deb', 'RtsResponsableJugador_det.IdPersona_deb = RtsPersona_deb.IdPersona', 'inner');
		$this->db->where('RtsPersonaRol_det.IdPersonaRol', $id);

		$res = $this->db->get()->result();
		return $res;
	}

    // Cargar persona para modal

	public function listarResponsables($id)
	{
		$this->db->select('RtsPersona_deb.Nombre, RtsPersona_deb.Apellidos, RtsPersona_deb.Documento, RtsPersonaRol_det.IdPersonaRol');
		$this->db->from($this->tabla);
		$this->db->join('RtsPersonaRol_det', 'RtsPersona_deb.IdPersona = RtsPersonaRol_det.IdPersona_deb', 'inner');
		$this->db->where('RtsPersona_deb.IdPersona', $id);
		$this->db->where('RtsPersonaRol_det.IdRol', 3);
		$res = $this->db->get()->row();

		return $res;
	}

	// Listar jugadores para responsable

	public function listarResponsableCombo()
	{
		$this->db->select('*');
		$this->db->from('RtsPersona_deb');
		$this->db->where('Estado', 1);
		$res = $this->db->get()->result();

		return $res;
	}

	//Carga el id de la persona por medio del id de personarol

	public function listarIdJugador($id)
	{
		$this->db->select('*');
		$this->db->from('RtsPersona_deb');
		$this->db->join('RtsPersonaRol_det', 'RtsPersona_deb.IdPersona = RtsPersonaRol_det.IdPersona_deb', 'INNER');
		$this->db->where('RtsPersonaRol_det.IdPersonaRol', $id);
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

	//Asocia el jugador con el responsable y asocia un parentesco.

	public function asignarResponsable($data)
	{
		$res = $this->db->insert('RtsResponsableJugador_det', $data);
		return $res;
	}

    // Permite inhabilitar (cambia el estado a 0) de todos los registros que en su IdPersona_deb tengan el id del registro
    // a inhabilitar (esta asociado con el inhabilitar o habilitar persona).

	public function actualizarRolInactivo($id,$data)
	{
		$this->db->where('IdPersona_deb', $id);
		$res = $this->db->update('RtsPersonaRol_det', $data);

		return $res;
	}

    //Gestiona los roles de las personas, los habilita (1) o los inhabilita (0)

	public function actualizarRol($id,$data)
	{
		$this->db->where('IdPersonaRol', $id);
		$res = $this->db->update('RtsPersonaRol_det', $data);

		return $res;
	}

    // Permite al administrador gestionar el nombre de usuario de los usuarios.

	public function actualizarUsuario($id,$data)
	{
		$this->db->where('IdLogin', $id);
		$res = $this->db->update('RtsLogin_deb', $data);

		return $res;
	}

	// Luego de tener un registro de cada rol, se consultan los ultimos ID registrados

	public function ultimoAdmin()
	{
		$this->db->from('RtsPersonaRol_det');
		$res = $this->db->insert_id();

		return $res;
	}

	public function ultimoInst()
	{
		$this->db->from('RtsPersonaRol_det');
		$res = $this->db->insert_id();

		return $res;
	}

	// Luego de tener todo listo, insertamos nuestras cuentas

	public function registrarCuentaA($data)
	{
		$res = $this->db->insert('RtsLogin_deb', $data);

		return $res;
	}

	public function registrarCuentaI($data)
	{
		$res = $this->db->insert('RtsLogin_deb', $data);
		
		return $res;
	}

	// Esta validacion solo consulta y retorna el idpersonarol (solo es para ver el id de instructor o administrador)

	public function getValidarIdPersonaRol($id, $tipo)
	{
		$this->db->select('IdPersonaRol');
		$this->db->from('RtsPersona_deb');
		$this->db->join('RtsPersonaRol_det', 'RtsPersona_deb.IdPersona = RtsPersonaRol_det.IdPersona_deb', 'INNER');
		$this->db->where('RtsPersonaRol_det.IdPersona_deb', $id);
		$this->db->where('RtsPersonaRol_det.IdRol', $tipo);
		$res = $this->db->get()->row();

		return $res;
	}

	public function getVerificarCuentas($id, $tipo)
	{
		$this->db->select('IdLogin');
		$this->db->from('RtsPersona_deb');
		$this->db->join('RtsPersonaRol_det', 'RtsPersona_deb.IdPersona = RtsPersonaRol_det.IdPersona_deb', 'INNER');
		$this->db->join('RtsLogin_deb', 'RtsPersonaRol_det.IdPersonaRol = RtsLogin_deb.IdPersonaRol_det', 'INNER');
		$this->db->where('RtsPersona_deb.IdPersona', $id);
		$this->db->where('RtsPersonaRol_det.IdRol', $tipo);
		$res = $this->db->get()->result();

		return $res;
	}


}

/* End of file mdl_persona.php */
/* Location: ./application/models/mdl_persona.php */
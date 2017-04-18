<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_notificacion extends CI_Model {

	private $correodestino;
	private $tipo;
	private $notificar;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_persona');
	}

	public function setCorreo($Correo)
	{
		$this->correodestino = $Correo;
	}

	public function setTipo($Tipo)
	{
		$this->tipo = $Tipo;
	}

	public function setNotificar($Notificar)
	{
		$this->notificar = $Notificar;
	}

	public function getCorreo()
	{
		return $this->correodestino;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function getNotificar()
	{
		return $this->notificar;
	}

	public function notificacion()
	{
		$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'rackettenisservices@gmail.com',
			'smtp_pass' => 'Neiderman18',
			'smtp_port' => 465,
			'crlf' => "\r\n",
			'newline' => "\r\n"
			));


		$tipoNotificacion = '';

		switch ($this->tipo)
		{
			case 'informacionpersonal':
			$tipoNotificacion = 'Recientemente el administrador ' . $this->mdl_persona->listarPersonaporId($this->session->userdata('usuario_id')) . ' de la aplicación ha realizado cambios en tu información personal';
			break;
			case 'informacioncuenta':
			$tipoNotificacion = 'Recientemente el administrador ' . $this->mdl_persona->listarPersonaporId($this->session->userdata('usuario_id')) . ' de la aplicación ha realizado cambios en tu información de inicio de sesión';
			break;
			
			default:
			$tipoNotificacion = 'Recientemente el administrador de la aplicación ha realizado cambios que involucran tu información en el sistema';
			break;
		}

		$mensaje = "<html>
		<head>
			<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' >
			<script src='https://code.jquery.com/jquery-2.2.3.min.js'></script>
			<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
		</head>
		<body style='font-family: Agency FB'>
			<div class='row'>
				<div class='col-md-2 col-sm-2 col-xs-2'><br></div>
				<div class='col-md-8 col-sm-8 col-xs-8'>
					<div style='padding: 20px; border-radius: 27px 27px 27px 27px;	-moz-border-radius: 27px 27px 27px 27px; -webkit-border-radius: 27px 27px 27px 27px; border: 18px ridge rgba(150,150,150,0.8); background: rgba(255,255,255,0.7);'>
						<center><img src='http://rtservicesv-nman.rhcloud.com/assets/img/logo-vertical.png'></center>
						<br>
						<center><h2 style='font-size: 25pt;'>Notificaciones - RTSERVICES</h2></center>
						<center><p style='font-size: 18pt;'>" . $tipoNotificacion . ".</p></center>
						<br>
					</div>
				</div>
				<div class='col-md-2 col-sm-2 col-xs-2'><br></div>
			</div>
		</body>
		</html>";

		$this->email->from('rackettenisservices@gmail.com', 'Administración RTSERVICES');
		$this->email->to($this->correodestino);
		$this->email->subject('Notificaciones - RTSERVICES');
		$this->email->message($mensaje);
		
		if ($this->email->send())
		{
			return true;
		}
		else
		{
			echo $this->email->print_debugger();
		}
	}

}

/* End of file mdl_mail.php */
/* Location: ./application/models/mdl_mail.php */
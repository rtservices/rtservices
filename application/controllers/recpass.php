<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recpass extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('usuario_id')) 
		{
			redirect('login');
		}
	}

	//token = Token generado por el sistema para el usuario.
    //idpl = Id del Login personal

	public function index()
	{
		$idpersonalog = $this->input->get('idpl');
		$tokengen = $this->input->get('token');

		if (empty($tokengen) || empty($idpersonalog))
		{
			$this->load->view('recpass/recpass');
		}
		else
		{
			if ($this->mdl_login->validarToken($tokengen, $idpersonalog))
			{
				$data['usuario'] = '';
				$data['idperlog'] = '';

				foreach ($this->mdl_login->validarToken($tokengen, $idpersonalog) as $valRec) 
				{
					$data['idperlog'] = $idpersonalog;
					break;
				}
				$this->load->view('recpassch/recpassch', $data);
			}
			else
			{
				redirect('error404');
			}
		}
	}

	public function recpassch()
	{
		if ($this->input->is_ajax_request())
		{
			$correo = $this->input->post('correoRec');

			if (!$this->mdl_login->verificarResset($correo))
			{
				$prepareMail = $this->mdl_login->prepararMail($correo);
				if ($prepareMail)
				{
					foreach ($prepareMail as $valRec)
					{
						$idLogin = $valRec->IdLogin;
						$an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ.";
						$su = strlen($an) - 1;
						$tokengen = '';

						for ($i = 0; $i < 120; $i++)
						{ 
							$tokengen .= substr($an, rand(0, $su), 1);
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
										<center><img src='".base_url()."assets/img/logo-vertical.png'></center>
										<br>
										<center><h2 style='font-size: 25pt;'>Recuperación de contraseña - RTSERVICES</h2></center>
										<center><p style='font-size: 18pt;'>Recientemente has solicitado un cambio de contraseña, por lo cual te enviamos este correo para que puedas validar y recuperar tu cuenta.</p></center>
										<br>
										<center><a href='".base_url()."recpass?idpl=".$idLogin."&token=".$tokengen."' target='_blank'><button class='btn btn-success'>Ir a arreglar mi cuenta.</button></a></center>
									</div>
								</div>
								<div class='col-md-2 col-sm-2 col-xs-2'><br></div>
							</div>
						</body>
						</html>";

						$this->email->from($this->session->userdata('correo_generico'), 'Administración RTSERVICES');
						$this->email->to($correo);
						$this->email->subject('Recuperación de cuenta - RTSERVICES');
						$this->email->message($mensaje);

						if ($this->email->send())
						{
							$data = array(
								'Token' => $tokengen,
								'FechaGenerada' => date("Y").'-'.date("m").'-'.date("d"),
								'Estado' => 1,
								'IdLogin_deb' => $idLogin
								);

							if ($this->mdl_login->registrarToken($data))
							{
								echo "ok";
							}
							else
							{
								echo "noRegistroToken";
							}
						}
						else
						{
							echo $this->email->print_debugger();
						}

						break;					
					}
				}
				else
				{
					redirect('login');
				}
			}
			else
			{
				echo "yaGenero";
			}
		}
		else
		{
			redirect('error404');
		}
	}

	public function chpass()
	{
		if ($this->input->is_ajax_request())
		{
			$pass_original = $this->input->post('passo');
			$pass_rep = $this->input->post('passr');
			$idlog_set = $this->input->post('idlog');

			if ($pass_original === $pass_rep)
			{
				$data = array('Clave' => md5($pass_rep));

				if ($this->mdl_login->setPass($idlog_set, $data))
				{
					echo "ok";
				}
				else
				{
					echo "no";
				}
			}
			else
			{
				echo "noIgual";
			}
		}
		else
		{
			redirect('error404');
		}
	}
}

/* End of file recpass.php */
/* Location: ./application/controllers/recpass.php */
<html>
<head>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' >
	<script src='https://code.jquery.com/jquery-2.2.3.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
</head>
<body style='font-family: Agency FB'>
		<div class='col-md-6 col-sm-6 col-xs-6'>
			<div style='padding: 20px; border-radius: 27px 27px 27px 27px;	-moz-border-radius: 27px 27px 27px 27px; -webkit-border-radius: 27px 27px 27px 27px; border: 18px ridge rgba(150,150,150,0.8); background: rgba(255,255,255,0.7);'>
				<center><img src='http://localhost:91/rtservicesapp/assets/img/logo-vertical.png'></center>
				<br>
				<center><h2 style="font-size: 20pt;">Recuperación de contraseña - RTSERVICES</h2></center>
				<center><p style="font-size: 15pt;">Recientemente has solicitado un cambio de contraseña, por lo cual te enviamos este correo para que puedas validar y recuperar tu cuenta.</p></center>
				<br>
				<center><a href='http://localhost:91/rtservicesapp/recpass?idpl=".$idLogin."&token=".$tokengen."' target='_blank'><button class='btn btn-success'>Ir a arreglar mi cuenta.</button></a></center>
			</div>
		</div>

</body>
</html>
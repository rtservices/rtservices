$(document).ready(function() {
	NProgress.start();
	$('#login').submit(function(event) {
		event.preventDefault();
		if ($("#login").validate().form() != false)
		{
			NProgress.start();
			$.ajax({
				url: 'login/validarUsuario',
				type: 'POST',
				data: $('#login').serialize(),
				success:function(res)
				{
					if (res == 'ok') 
					{
						NProgress.done();
						location.href = 'menu';
					}
					else
					{
						NProgress.done();
						sweetAlert("Oops...", "Error en datos de usuario.", "error");
					}
				}
			});
		}
	});

	$('#formRecuperar').submit(function(event) {
		event.preventDefault();
		if ($('#formRecuperar').validate().form() != false)
		{
			NProgress.start();
			$.ajax({
				url: 'recpass/recpassch',
				type: 'POST',
				data: $('#formRecuperar').serialize(),
				success:function(res)
				{
					if (res === 'ok')
					{
						NProgress.done();
						sweetAlert("Perfecto!", "Al parecer todo ha salido bien ya puedes revisar tu correo electrónico, no olvides revisar la bandeja de spam.", "success");	
					}
					else if(res === 'noRegistroToken')
					{
						NProgress.done();
						sweetAlert("Oops...", "Al parecer no puedes recuperar tu contraseña ya sea porque no estas registrado o por que no te encuentras activo en el sistema, contacta al administrador para solucionar este problema.", "error");
					}
					else if (res === 'yaGenero')
					{
						NProgress.done();
						sweetAlert("Oops...", "Al parecer ya has generado un token, revisa tu correo.", "error");
					}
					else
					{
						NProgress.done();
						sweetAlert("Oops...", "Al parecer no pudimos hacer nada, contacta con un administrador.", "error");
					}
				}
			});			
		}
	});

	$('#formsetpass').submit(function(event) {
		event.preventDefault();

		if ($('#formsetpass').validate().form() != false)
		{
			NProgress.start();
			$.ajax({
				url: 'recpass/chpass',
				type: 'POST',
				data: $('#formsetpass').serialize(),
				success:function(res)
				{
					if (res == 'ok')
					{
						swal({   
							title: "Perfecto!",   
							text: "Al parecer todo ha salido bien ya puedes ingresar con tu nueva contraseña.",   
							type: "success",     
							confirmButtonText: "Perfecto, ir al login",   
							closeOnConfirm: false 
						}).then(function() { 
							location.href = 'login';
						});

						NProgress.done();

					}
					else if(res == 'noIgual')
					{
						NProgress.done();
						sweetAlert("Oops...", "Algo no ha salido bien, recarga la página por favor.", "error");
					}
					else
					{
						NProgress.done();
						sweetAlert("Oops...", "Al parecer no puedes recuperar tu contraseña ya sea porque no estas registrado o por que no te encuentras activo en el sistema, contacta al administrador para solucionar este problema.", "error");
					}
				}
			});			
		}
	});

});

$(window).load(function() {
	NProgress.done();
});

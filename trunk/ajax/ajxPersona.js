var tabla;

$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaPersona').DataTable({ "ajax": "persona/cargarTabla" });
});

$(window).load(function() {
	NProgress.done();
});

function actualizar()
{
	tabla.ajax.reload(null, false);
}

function nuevaPersona()
{
	NProgress.start();
	$('#registro')[0].reset();
	$('#modalRegistro').modal('show');
	NProgress.done();
}

function listarPersona(id)
{
	NProgress.start();
	$('#editar')[0].reset();
	$.ajax({
		url: 'persona/listarPersona',
		type: 'POST',
		dataType: 'JSON',
		data: {id: id},
		success:function(res)
		{
			$('#modalEditar').modal('show');
			setTimeout(function(){

				$('[id = "documentoM"]').val(res.Documento);
				$('[id = "generoM"]').val(res.Genero);
				$('[id = "nombreM"]').val(res.Nombre);
				$('[id = "apellidosM"]').val(res.Apellidos);
				$('[id = "correoM"]').val(res.Correo);
				$('[id = "direccionM"]').val(res.DireccionResidencia);
				$('[id = "telefonoM"]').val(res.Telefono);
				$('[id = "celularM"]').val(res.Celular);
				$('[id = "fnacimientoM"]').val(res.FechaNacimiento);
				$('[id = "epsM"]').val(res.IdEps);
				NProgress.done();
			}, 500);
		}
	});	
}

function listarInformacion(id)
{
	NProgress.start();
	$.ajax({
		url: 'persona/listarPersona',
		type: 'POST',
		dataType: 'JSON',
		data: {id: id},
		success:function(res)
		{
			if (res.Genero == 'H')
			{
				$('[id = "generoI"]').text('Hombre');
			}
			else
			{
				$('[id = "generoI"]').text('Mujer');
			}

			if (res.Celular != '')
			{
				$('[id = "celularI"]').text(res.Celular);
			}
			else
			{
				$('[id = "celularI"]').text('No dispone de telefono celular.');
			}
			$('[id = "nombreCI"]').text(res.Nombre + ' ' + res.Apellidos);
			$('[id = "documentoI"]').text(res.Documento);
			$('[id = "nombreI"]').text(res.Nombre + ' ' + res.Apellidos);
			$('[id = "correoI"').text(res.Correo);
			$('[id = "direccionI"').text(res.DireccionResidencia);
			$('[id = "fnacimientoI"]').text(res.FechaNacimiento);
			$('[id = "telefonoI"]').text(res.Telefono);
			$('[id = "epsI"]').text(res.NombreEps + ' - Telefono: ' + res.TelefonoEps);
			$('[id = "fechaI"]').text(res.FechaIngreso);
			
			$('#modalInformacion').modal('show');
			NProgress.done();
		}
	});	
}

function listarResponsables(id)
{
	NProgress.start();
	$.ajax({
		url: 'persona/listarResponsable',
		type: 'POST',
		dataType: 'JSON',
		data: {id: id},
		success:function(res)
		{
			$('[id = "nombrejugador"]').text(res.Nombre + ' ' + res.Apellidos);
			$('[id = "nombre"]').text(res.Nombre + ' ' + res.Apellidos);
			$('[id = "NombreJug"]').text(res.Nombre + ' ' + res.Apellidos);
			$('[id = "idjugadorR"]').val(res.IdPersonaRol);
			$('[id = "infojugador"]').val(res.Documento + ' - ' + res.Nombre + ' ' + res.Apellidos);

			$('#modalResponsable').modal('show');
			$('#tablaResponsable').DataTable();
			setTimeout(function()
			{
				$('#tablaResponsable').DataTable({ "ajax": "persona/cargarResponsables/" + res.IdPersonaRol, destroy: true });
			}, 1000);
			NProgress.done();
		}
	});	
}

function variarAdministrador(id)
{
	NProgress.start();
	$.ajax({
		url: 'persona/variarRol',
		type: 'POST',
		data: {id: id, rol: 1},
		success:function(res)
		{
			actualizar();
			if (res == 'ok')
			{
				NProgress.done();
				swal("Completado!", "Se ha (in)activado el rol para este usuario.", "success");
			}
			else
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha (in)activado el rol para este usuario.", "error");
			}
		}
	});

}

function variarInstructor(id)
{
	NProgress.start();
	$.ajax({
		url: 'persona/variarRol',
		type: 'POST',
		data: {id: id, rol: 2},
		success:function(res)
		{
			actualizar();
			if (res == 'ok')
			{
				NProgress.done();
				swal("Completado!", "Se ha (in)activado el rol para este usuario.", "success");
			}
			else
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha (in)activado el rol para este usuario.", "error");
			}
		}
	});

}

function variarJugador(id)
{
	NProgress.start();
	$.ajax({
		url: 'persona/variarRol',
		type: 'POST',
		data: {id: id, rol: 3},
		success:function(res)
		{
			actualizar();
			if (res == 'ok')
			{
				NProgress.done();
				swal("Completado!", "Se ha (in)activado el rol para este usuario.", "success");
			}
			else
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha (in)activado el rol para este usuario.", "error");
			}
		}
	});

}

function variarEstadoPersona(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado de este usuario?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}, function() {
		NProgress.start();
		$.ajax({
			url: "persona/variarEstadoPersona",
			type: "POST",
			data: { idpersona: id },
			success: function(res) 
			{
				actualizar();
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha cambiado el estado de dicho usuario.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha cambiado el estado de dicho usuario.", "error");
				}
			}
		});
	});
}

function administrarCuenta(id,tipo)
{
	NProgress.start();
	$('#formUsuario')[0].reset();
	$('#formClave')[0].reset();
	$.ajax({
		url: 'persona/listarCuenta',
		type: 'POST',
		dataType: 'JSON',
		data: {id: id, tipo: tipo},
		success:function(res)
		{
			// $('[id = "idusuarioU"]').val(res.IdLogin);
			// $('[id = "idusuarioC"]').val(res.IdLogin);
			// $('[id = "usuario"]').val(res.Usuario);
			// $('#modalCuenta').modal('show');
			alert(res);
			NProgress.done();
		}
	});	
}

$('#formUsuario').submit(function(event) {
	event.preventDefault();
	if ($('#formUsuario').validate().form())
	{
		NProgress.start();
		$.ajax({
			url: 'persona/modificarUsuario',
			type: 'POST',
			data: $('#formUsuario').serialize(),
			success:function(res)
			{
				actualizar();
				$('#modalCuenta').modal('hide');
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha modificado el nombre de usuario.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha modificado el nombre de usuario.", "error");
				}
			}
		});
	}
});

$('#formClave').submit(function(event) {
	event.preventDefault();
	if ($('#formClave').validate().form())
	{
		NProgress.start();
		$.ajax({
			url: 'persona/modificarClave',
			type: 'POST',
			data: $('#formClave').serialize(),
			success:function(res)
			{
				actualizar();
				$('#modalCuenta').modal('hide');
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha modificado la contraseña de dicho usuario.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha modificado la contraseña de dicho usuario.", "error");
				}
			}
		});
	}
});

$('#registro').submit(function(event) {
	event.preventDefault();

	if ($('#registro').validate().form())
	{
		NProgress.start();
		$.ajax({
			url: 'persona/nuevaPersona',
			type: 'POST',
			data: $('#registro').serialize(),
			success:function(res)
			{
				actualizar();
				$('#modalRegistro').modal('hide');
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha registrado la nueva persona.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No ha registrado la nueva persona.", "error");
				}
			}
		});		
	}
});

$('#editar').submit(function(event) {
	event.preventDefault();

	if ($('#editar').validate().form())
	{
		NProgress.start();
		$.ajax({
			url: 'persona/actualizarPersona',
			type: 'POST',
			data: $('#editar').serialize(),
			success:function(res)
			{
				actualizar();
				$('#modalRegistro').modal('hide');
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha modificado la persona.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha modificado la persona.", "error");
				}
			}
		});		
	}
});

$('#formResponsable').submit(function(event) {
	event.preventDefault();

	NProgress.start();
	$.ajax({
		url: 'persona/validarRJugador',
		type: 'POST',
		data: $('#formResponsable').serialize(),
		success:function(resV)
		{
			if (resV == 'ok')
			{
				$.ajax({
					url: 'persona/asignarResponsable',
					type: 'POST',
					data: $('#formResponsable').serialize(),
					success:function(res)
					{
						if (res == 'ok')
						{
							NProgress.done();
							$('#divNot').html('<div class="alert alert-success" role="alert"><strong>Todo ha salido bien!</string> Se ha asociado el responsable al jugador.</div>');
						}
						else
						{
							NProgress.done();
							$('#modalResponsable').modal('hide');
							sweetAlert("Oops...", "No se ha asociado el responsable.", "error");
						}
					}
				});
			}
			else if (resV == 'noMU')
			{
				NProgress.done();
				$('#divNot').html('<div class="alert alert-danger" role="alert"><strong>Ops...</strong> No puedes ser responsable de ti mismo.</div>');
			}
			else if (resV == 'noYA')
			{
				NProgress.done();
				$('#divNot').html('<div class="alert alert-danger" role="alert"><strong>Ops...</strong> Al parecer esta persona ya es tu responsable</div>');
			}
			else
			{
				NProgress.done();
				$('#modalResponsable').modal('hide');
				sweetAlert("Oops...", "Lamentamos esto, pero algo está fallando.", "error");
			}
		}
	});
	
});

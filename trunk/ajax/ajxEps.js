var tablaEA;

$(document).ready(function() {
	NProgress.start();
	tablaEA = $('#tablaEps').DataTable({ "ajax": "eps/cargarTablaEps" });
});

$(window).load(function() {
	NProgress.done();
});

function actualizarTablas() {
	tablaEA.ajax.reload(null, false);
}

function nuevaE()
{
	NProgress.start();
	$('#registro')[0].reset();
	NProgress.done();
	$('#modalRegistro').modal('show');
}

function cambiarE(id) {
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado de esta eps?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}, 
	function() 
	{
		NProgress.start();
		$.ajax({
			url: "eps/variaEstadoEps",
			type: "POST",
			data: { idE: id },
			success:function(res) 
			{
				actualizarTablas();
				if (res == 'ok')
				{
					NProgress.done();
					swal("Completado!", "Se ha cambiado el estado de esta eps.", "success");
				} 
				else 
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha cambiado el estado de esta eps.", "error");
				}
			}
		});
	});
}

function listarEps(id)
{
	NProgress.start();
	$('#editarE')[0].reset();
	$.ajax({
		url: 'eps/listarEps/' + id,
		type: 'GET',
		dataType: 'JSON',
		success:function(res)
		{
			$('[name = "ideps"]').val(res.IdEps);
			$('[name = "nombreeps"]').val(res.NombreEps);
			$('[name = "telefonoeps"]').val(res.Telefono);
			$('#modalEditar').modal('show');
			NProgress.done();
		}
	});
}

$('#editarE').submit(function(event) {
	event.preventDefault();

	NProgress.start();
	$.ajax({
		url: 'eps/actualizarEps',
		type: 'POST',
		data: $('#editarE').serialize(),
		success:function(res)
		{
			
			actualizarTablas();
			$('#modalEditar').modal('hide');

			if (res=='ok') 
			{
				NProgress.done();
				swal("Completado!", "Se ha modificado la información de la eps.", "success");
			}
			else
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha modificado la información de la eps.", "error");
			}
		}
	});

});

$('#registro').submit(function(event){
	event.preventDefault();
	if ($('#registro').validate().form() == true) 
	{
		NProgress.start();
		$.ajax({
			url: 'eps/guardarEps',
			type: 'POST',
			data: $('#registro').serialize(),
			success:function(res)
			{
				actualizarTablas();
				$('#modalRegistro').modal('hide');
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha registrado satisfactoriamente la eps.", "success");
				}
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha registrado la eps.", "error");
				}
			} 
		});
	}
});

var tablaAsistencia;
$(document).ready(function() {
	NProgress.start();
	tablaAsistencia = $('#tablaAsistencia').DataTable({ "ajax":"ejecucion/cargarTabla/" + $('#IdClase').val() });
}); 

$(window).load(function() {
	NProgress.done();
});

function actualizar()
{
	tablaAsistencia.ajax.reload(null,false);
}


function nuevaAsistencia()
{
	$('#modalAsistencia').modal('show');
	$.ajax({
		url: 'ejecucion/cargarJugadores/'+$('#IdClase').val(),
		type: 'GET',
		dataType: 'JSON',
	}).done(function(res) {
		$.each(res, function(index, val) {
			var estilo = '';
			var opcion = '';
			var titulo = '';
			if (val.DiasRestantes > 15) {
				estilo = 'list-group-item-success';
			} else if (val.DiasRestantes < 15 && val.DiasRestantes > 8) {
				estilo = 'list-group-item-warning';
			} else {
				estilo = 'list-group-item-danger';
				titulo = 'Cuenta con muy pocos dias restantes en el plan de clase.';
			}
			$('.jugadores_asig_clas').append('<li class="list-group-item '+estilo+'"><div class="input-group" '+titulo+'><span class="input-group-addon"><input type="checkbox" name="check_jugador" id="check_jugador_'+val.IdClasejugador+'" aria-label="..."></span><input type="text" readonly class="form-control" value="DNI '+val.Documento+' - '+val.Nombre+' '+val.Apellidos+'" style="background-color: white !important; color: #636E7B !important;" aria-label="..."></div></li>');
		});
	})
	.fail(function() {
		console.log("error");
	});
}

$('#formAsistencia').submit(function(event) {
	event.preventDefault();
	
	$.ajax({
		url: 'ejecucion/regitrarasistencia',
		type: 'POST',
		data: $('#formAsistencia').serialize(),
		success:function(res)
		{
			if (res != 'no')
			{
				location.href = 'ejecucion?ida=' + res;
			}
			else
			{
				alert('error');
			}
		}
	});
	
});

function variarEstadoAsistencia(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado de esta asistencia?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}).then(function() {
		NProgress.start();
		$.ajax({
			url: "ejecucion/variarEstadoAsistencia",
			type: "POST",
			data: { id: id },
			success: function(res) {
				actualizar();
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha cambiado el estado de dicha asistencia.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha cambiado el estado de dicha asistencia.", "error");
				}
			}
		});
	});
}
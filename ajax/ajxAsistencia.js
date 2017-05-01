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
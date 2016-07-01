var tabla;
$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaEtapa').DataTable({"ajax":"gesetapa/cargarTablaEtapa/" + $('#idEtapaActual').val()});

	$('#gEtapa').submit(function(event) {
		event.preventDefault();

		$.ajax({
			url: 'gesetapa/modificaretapa',
			type: 'POST',
			data: $('#gEtapa').serialize(),
			success:function(res)
			{
				if (res == 'raices') {
					sweetAlert("Oops...", "Al parecer ya tienes asociados jugadores a este torneo con la configuración anterior.", "error");
				} 
				else if (res == 'ok') {
					sweetAlert("Completado!", "Se ha cambiado el modificado la información de esta etapa.", "success");
				} 
				else
				{
					sweetAlert("Oops...", "No se ha cambiado el modificado la información de esta etapa.", "error");
				}
			}
		});

	});

});

$(window).load(function() {
	NProgress.done();
});

function actualizarTabla()
{
	tabla.ajax.reload(null, false);
}

function cambiarEstado(id)
{
	NProgress.start();
	$.ajax({
		url: 'gesetapa/cambiarEstado/' + id,
		type: 'GET',
		success:function(res)
		{
			actualizarTabla();
			if (res == 'ok')
			{
				NProgress.done();
				sweetAlert("Completado!", "Se ha modificado el estado de esta inscripción.", "success");
			} 
			else
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha modificado el estado de esta inscripción.", "error");
			}
		}
	});
	
}

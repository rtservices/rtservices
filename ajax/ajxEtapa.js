var tabla;
var IdEtapa;
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

	/*$('#gJugadorEtapa').submit(function(event) {
		event.preventDefault();

		$.ajax({
			url: 'gesetapa/modificaretapa',
			type: 'POST',
			data: $('#gJugadorEtapa').serialize(),
			success:function(res)
			{
				if (res == 'raices')
				{
					sweetAlert("Oops...", "Al parecer ya tienes asociados jugadores a este torneo con la configuración anterior.", "error");
				} 
				else if (res == 'ok')
				{
					sweetAlert("Completado!", "Se ha cambiado el modificado la información de esta etapa.", "success");
				} 
				else
				{
					sweetAlert("Oops...", "No se ha cambiado el modificado la información de esta etapa.", "error");
				}
			}
		});

	});*///La comente por que no entiendo que esta haciendo e interrunpe el asignar jugadores

});

$(window).load(function() {
	NProgress.done();
});

function actualizarTabla()
{
	tabla.ajax.reload(null, false);
}

//Funcion para agregar a un jugador a una etapa
$('#gJugadorEtapa').submit(function(event) {
	event.preventDefault();

	NProgress.start();
	$.ajax({
		url: 'gesetapa/addJugadorTorneo/',
		type: 'POST',
		data:$('#gJugadorEtapa').serialize(),
		success:function(res){
			actualizarTabla()
			if(res == 'no')
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha asignado el jugador a la clase.", "error");
			} 
			else if (res == 'yaEsta')
			{
				NProgress.done();
				sweetAlert("Oops...", "Al parecer el jugador ya esta asignado a la clase.", "error");
			}
			else
			{
				NProgress.done();
				sweetAlert("Perfecto!", "Se ha asignado el jugador a la clase.", "success");
			}
		}

	});

});

function cambiarEstado(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado de esta inscripción?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}).then(function() {
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
    });
}
//Funcion que elimina a un jugador de la base de datos
function eliminarInscripcionJugador(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas eliminar esta inscripción?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}).then(function() {
	NProgress.start();
	    $.ajax({
		    url: 'torneo/eliminarInscripcionJugador',
		    type: 'POST',
		    data: {id: id},
		    success:function(res)
		    {
		    	actualizarTabla()
		    	$('#tablaInscritos').DataTable({ "ajax" : "torneo/listarInscritosEtapa/" + IdEtapa, destroy: true});
		    	if (res == 'ok') 
		    	{
		    		NProgress.done();
		    		swal("Completado!", "Se ha eliminado el jugador de esta etapa.", "success");
		    	} 
		    	else
		    	{
		    		NProgress.done();
		    		sweetAlert("Oops...", "No se ha eliminado el jugador de esta etapa.", "error");
		    	}
		    }
	    });	
    });
}

var tablaTorneo;
var IdEtapa;

$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaTorneo').DataTable({ "ajax": "torneo/cargarTabla" });
});

$(window).load(function() {
	NProgress.done();
});

function actualizar()
{
	tablaTorneo.ajax.reload(null, false);
}

function listarEtapa(id,etapa)
{
	NProgress.start();
	$('#tablaInscritos').DataTable().clear().draw();
	$.ajax({
		url: 'torneo/listarEtapa',
		type: 'POST',
		dataType: 'JSON',
		data: {id: id, etapa: etapa},
		success:function(res)
		{
			IdEtapa = res.IdEtapa;
			NProgress.done();
			location.href = "gesetapa?idetapa=" + IdEtapa;
		}
	});
}

function eliminarInscripcionJugador(id)
{
	NProgress.start();
	$.ajax({
		url: 'torneo/eliminarInscripcionJugador',
		type: 'POST',
		data: {id: id},
		success:function(res)
		{
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
}


function variarEstadoTorneo(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado de este torneo?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}, function() {
		NProgress.start();
		$.ajax({
			url: "torneo/variarEstadoTorneo",
			type: "POST",
			data: { id: id },
			success: function(res) {
				actualizar();
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha cambiado el estado de torneo.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha cambiado el estado de torneo.", "error");
				}
			}
		});
	});
}

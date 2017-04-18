var tabla;
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
	tabla.ajax.reload(null, false);
}


function nuevoTorneo()
{
	NProgress.start();
	$('#registro')[0].reset();
	NProgress.done();
	$('#modalRegistro').modal('show');
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

$('#registroR').submit(function(event) {
	event.preventDefault();
	if ($('#registroR').validate().form()) 
	{
		NProgress.start();
		$.ajax({
			url: 'torneo/crearTorneo',
			type: 'POST',
			data:$('#registroR').serialize(),
			success:function(res){
				actualizar();
				$('#modalRegistro').modal('hide');
				if(res=='ok')
				{
					NProgress.done();
					swal("Completado!", "Se ha registrado el torneo.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha registrado el torneo.", "error");
				}
			}

		});
	}
});


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
	}).then(function() {
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

function editarTorneo(id)
{
	NProgress.start();
	$('#editarT')[0].reset();
	$.ajax({
		url: "torneo/listarTorneo/" + id,
		type: "GET",
		dataType: "JSON",
		success:function(res){
			actualizar();
			$('[name = "idtorneoE"]').val(res.IdTorneo);
			$('[name = "torneoE"]').val(res.NombreTorneo);
			$('[name = "fechainicioE"]').val(res.FechaInicio);
			$('[name = "fechafinalE"]').val(res.FechaFinal);
			NProgress.done();
			$('#modalEditar').modal('show');
		}
	});
}

$('#editarT').submit(function(event) {
	event.preventDefault();
	if ($('#editarT').validate().form()) 
	{
		NProgress.done();
	
		$.ajax({
			url: 'torneo/guardarTorneo/',
			type: 'POST',
			data: $('#editarT').serialize(),
			success:function(res){
				actualizar();
				$('#modalEditar').modal('hide');
				if (res=='ok')
				{
					NProgress.done();
					swal("Completado!", "Se ha modificado el torneo.", "success");
				} 
				else 
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha modificado el torneo.", "error");
				}
			}
		});
	}
});



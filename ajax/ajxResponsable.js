var tabla;

$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaJugadorResponsable').DataTable({ "ajax": "responsables/cargarTabla/" + $('#idPersona').val() });
});

$(window).load(function() {
	NProgress.done();
});

function recargar()
{
	tabla.ajax.reload(null,false);
}

function editarresJug(id)
{
	$('#modalEditarResponsable').modal('show');
	$('#loadingRJ').show();
	$('#listoRJ').hide();

	NProgress.start();
	$.ajax({
		url: 'responsables/listResponsable',
		type: 'POST',
		dataType: 'JSON',
		data: {iIdResponsableJugador: id},
		success:function(res)
		{
			$('[id = "eiIdResponsableJugador"]').val(res.IdResponsableJugador);
			$('[id = "ePersona"]').val('DNI: ' + res.Documento + ' - ' + res.Nombre + ' ' + res.Apellidos);
			$('[id = "eParentesco"]').val(res.Parentesco);

			setTimeout(function() {
				$('#loadingRJ').hide();
				$('#listoRJ').show();
			}, 2000);
			NProgress.done();
		}
	});
}

function variarEstadoResponsable(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado de este responsable?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
	}).then(function() {
		NProgress.start();
		$.ajax({
			url: "responsables/variarResponsable",
			type: "POST",
			data: { iIdResponsableJugador: id },
			success: function(res) 
			{
				recargar();
				if (res == 'ok') 
				{
					swal("Completado!", "Se ha cambiado el estado de dicho responsable.", "success");
				} 
				else
				{
					sweetAlert("Oops...", "No se ha cambiado el estado de dicho responsable.", "error");
				}
				NProgress.done();
			}
		});
	});
}

$('#gResponsablesJugador').submit(function(event) {
	event.preventDefault();
	NProgress.start();

	$.ajax({
		url: 'responsables/asignarResponsable',
		type: 'POST',
		data: $(this).serialize(),
		success:function(res)
		{
			if (res == 'ok')
			{
				sweetAlert("Completado!", "Se ha asignado el responsable.", "success");
			} 
			else
			{
				sweetAlert("Oops...", "No se ha asignado el responsable.", "error");
			}
			recargar();
			NProgress.done();
		}
	});
	
});

$('#formEditarResponsable').submit(function(event) {
	event.preventDefault();

	NProgress.start();

	$.ajax({
		url: 'responsables/editarResponsable',
		type: 'POST',
		data: $(this).serialize(),
		success:function(res)
		{
			recargar();
			$('#modalEditarResponsable').modal('hide');
			if (res == 'ok')
			{
				sweetAlert("Completado!", "Se ha editado el responsable.", "success");
			} 
			else
			{
				sweetAlert("Oops...", "No se ha editado el responsable.", "error");
			}
			NProgress.done();
		}
	});
});

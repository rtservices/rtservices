var tabla;

$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaPlanClase').DataTable({"ajax":"planclase/cargarTabla/" + $('#idJugador').val() });
});

$(window).load(function() {
	NProgress.done();
});

function actualizar()
{
	tabla.ajax.reload(null,false);
}

function eliminarPC (idpc)
{
	NProgress.start();
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas eliminar este plan de clases?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, elimínalo!",
	}).then(function() {
		$.ajax({
			url: 'planclase/eliminarPC',
			type: 'POST',
			data: {idpc: idpc},
			success: function(res) 
			{
				actualizar();
				if (res == 'ok') 
				{
					swal("Completado!", "Se ha eliminado el plan de clase.", "success");
				} 
				else
				{
					sweetAlert("Oops...", "No se ha eliminado el plan de clase.", "error");
				}
			}
		});
	});
	NProgress.done();
}

$('#gPClase').submit(function(event){
	event.preventDefault();

	NProgress.start();
	$.ajax({
		url: 'planclase/addPlanClaseJugador',
		type: 'POST',
		data:$('#gPClase').serialize(),
		success:function(res){
			
			actualizar();
			if(res == 'no')
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha asignado el plan de clase a la persona.", "error");
			}
			else if(res == 'cvacio')
			{
				NProgress.done();
				sweetAlert("Oops...", "Debes seleccionar al menos un plan de clase para asignarlo a una persona.", "error");
			}
			else
			{
				NProgress.done();
				sweetAlert("Perfecto!", "Se ha asignado el plan de clase a la persona.", "success");
			}
		}

	});
});
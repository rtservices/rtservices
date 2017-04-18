var tablaMc;
var tabla
$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaMaterial').DataTable({"ajax":"material/cargarTabla"});
});

$(document).ready(function() {
	NProgress.start();
	var idClase = $('#claseR').val();
	tablaMc = $('#tablaMateriaClase').DataTable({"ajax":"materialclase/cargarTabla/" + idClase});
});

$(window).load(function() {
	NProgress.done();
});

function actualizar()
{
	tabla.ajax.reload(null,false);
}

function actualizarMc()
{
	tablaMc.ajax.reload(null,false);
}
function nuevaC()
{
	NProgress.start();
	$('#registro')[0].reset();
	NProgress.done();
	$('#registroC').modal('show');
}

function nuevaMc()
{
	NProgress.start();
	$('#editarMc')[0].reset();
	NProgress.done();
	$('#modalMc').modal('show');
}



function variarEstadoMaterial(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado del material?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}).then(function() {
		NProgress.start();
		$.ajax({
			url: "material/variarEstadoMaterial",
			type: "POST",
			data: { idmaterial: id },
			success: function(res) {
				actualizar();
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha cambiado el estado de este material.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha cambiado el estado de este material.", "error");
				}
			}
		});
	});
}

function variarEstadoMaterialClase(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado del material asigana a esta clase?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}).then(function() {
		NProgress.start();
		$.ajax({
			url: "materialclase/variarEstadoMaterialClases",
			type: "POST",
			data: { id: id },
			success: function(res) {
				actualizarMc();
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha cambiado el estado de este material asignado as esta clase.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha cambiado el estado de este material asignado as esta clase.", "error");
				}
			}
		});
	});
}


$('#registro').submit(function(event) {
	event.preventDefault();
	if ($('#registro').validate().form()) 
	{
		NProgress.start();
		$.ajax({
			url: 'material/registrarMaterial',
			type: 'POST',
			data:$('#registro').serialize(),
			success:function(res){
				actualizar();
				$('#registroC').modal('hide');
				if(res=='ok')
				{
					NProgress.done();
					swal("Completado!", "Se ha registrado el material.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha registrado el material.", "error");
				}
			}

		});
	}
});
// registro material clase
$('#registroMc').submit(function(event) {
	event.preventDefault();
	if ($('#registroMc').validate().form()) 
	{
		NProgress.start();
		$.ajax({
			url: 'materialclase/registrarMaterialClase',
			type: 'POST',
			data:$('#registroMc').serialize(),
			success:function(res){
				actualizarMc()
				$('#modalRegistroMc').modal('hide');
				if(res=='error')
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha asignado el material a la clase.", "error");
				} 
				else if (res == 'yaEsta')
				{
					NProgress.done();
					sweetAlert("Oops...", "Este material ya esta asignado a esta clase.", "error");
				}

				else
				{
					NProgress.done();
					swal("Completado!", "Se ha asignado el material a la clase.", "success");
				}
			}

		});
	}
});

function editarMaterial(id)
{
	NProgress.start();
	$('#editar')[0].reset();
	$.ajax({
		url: "material/listarMaterial/" + id,
		type: "GET",
		dataType: "JSON",
		success:function(res){
			actualizar();
			$('[name = "idmaterial"]').val(res.IdMaterial);
			$('[name = "material"]').val(res.DescripcionMaterial);
			NProgress.done();
			$('#editarC').modal('show');
		}
	});
}

function editarMaterialClase(id)
{
	NProgress.start();
	$('#editarMc')[0].reset();
	$.ajax({
		url: "materialclase/listarMaterialClase/" + id,
		type: "GET",
		dataType: "JSON",
		success:function(res){
			actualizar();
			$('[name = "idMaterialClase"]').val(res.IdMaterialClase);
			$('[name = "cantidadE"]').val(res.Cantidad);
			$('[name = "materialE"]').val(res.IdMaterial);
			NProgress.done();
			$('#modalMc').modal('show');
		}
	});
}



$('#editar').submit(function(event) {
	event.preventDefault();
	if ($('#editar').validate().form()) 
	{
		NProgress.done();
		$.ajax({
			url: 'material/guardarMaterial/',
			type: 'POST',
			data: $('#editar').serialize(),
			success:function(res){
				actualizar();
				$('#editarC').modal('hide');
				if (res=='ok')
				{
					NProgress.done();
					swal("Completado!", "Se ha modificado el material.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha modificado el material.", "error");
				}
			}
		});
	}
});

$('#editarMc').submit(function(event) {
	event.preventDefault();
	if ($('#editarMc').validate().form()) 
	{
		NProgress.done();
		$.ajax({
			url: 'materialclase/modificarMaterialClase/',
			type: 'POST',
			data: $('#editarMc').serialize(),
			success:function(res){
				actualizarMc();
				$('#modalMc').modal('hide');
				if (res=='ok')
				{
					NProgress.done();
					swal("Completado!", "Se ha modificado el material asignado a esta clase.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha modificado el material asignado a esta clase .", "error");
				}
			}
		});
	}
});

function eliminarMaterialClase(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas eliminar este material asinado a esta clase?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}).then(function() {
	NProgress.start();
	    $.ajax({
		    url: 'materialclase/eliminarMaterialClase',
		    type: 'POST',
		    data: {id: id},
		    success:function(res)
		    {

		    	if (res == 'ok') 
		    	{
		    		NProgress.done();
		    		swal("Completado!", "Se ha quitado es material de esta clase.", "success");
		    	} 
		    	else
		    	{
		    		NProgress.done();
		    		sweetAlert("Oops...", "No se ha quitado es material de esta clase.", "error");
		    	}
		    	actualizarMc();
		    }
	    });	
    });
}


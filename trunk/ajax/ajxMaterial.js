var tabla;
$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaMaterial').DataTable({"ajax":"material/cargarTabla"});
});

$(window).load(function() {
	NProgress.done();
});

function actualizar()
{
	tabla.ajax.reload(null,false);
}

function nuevaC()
{
	NProgress.start();
	$('#registro')[0].reset();
	NProgress.done();
	$('#registroC').modal('show');
}

function variarEstadoMaterial(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado de este Material?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}, function() {
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


var tabla;
$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaCategoria').DataTable({"ajax":"categoria/cargarTabla"})
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

function variarEstadoCategoria(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas cambiar el estado de esta categoría?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}, function() {
		NProgress.start();
		$.ajax({
			url: "categoria/variarEstadoCategoria",
			type: "POST",
			data: { idcategoria: id },
			success: function(res) {
				actualizar();
				if (res == 'ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha cambiado el estado de dicha categoría.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha cambiado el estado de dicha categoría.", "error");
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
			url: 'categoria/registrarCategoria',
			type: 'POST',
			data:$('#registro').serialize(),
			success:function(res){
				actualizar();
				$('#registroC').modal('hide');
				if(res=='ok')
				{
					NProgress.done();
					swal("Completado!", "Se ha  registrado  la categoría.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha  registrado de la categoría.", "error");
				}
			}

		});
	}
});

function editarCategoria(id)
{
	NProgress.start();
	$('#editar')[0].reset();
	$.ajax({
		url: "categoria/listarCategoria/" + id,
		type: "GET",
		dataType: "JSON",
		success:function(res){
			NProgress.done();
			actualizar();
			$('[name = "idcategoria"]').val(res.IdCategoria);
			$('[name = "categoria"]').val(res.NombreCategoria);
			$('#editarC').modal('show');
		}
	});
}

$('#editar').submit(function(event) {
	event.preventDefault();

	if ($('#editar').validate().form()) 
	{
		NProgress.start();
		$.ajax({
			url: 'categoria/guardarCategoria/',
			type: 'POST',
			data: $('#editar').serialize(),
			success:function(res){
				actualizar();
				if (res=='ok') 
				{
					NProgress.done();
					swal("Completado!", "Se ha guardado el nombre de la categoría.", "success");
				} 
				else
				{
					NProgress.done();
					sweetAlert("Oops...", "No se ha guardado el nombre de la categoría.", "error");
				}
			}
		});
	}
});

var tabla;
var tablaRes;
$(document).ready(function() {
	NProgress.start();
	tabla = $('#tablaPartidos').DataTable({"ajax":"partidos/cargarTabla"});
});

$(document).ready(function() {
	NProgress.start();
	tablaRes = $('#tablaResultados').DataTable({"ajax":"resultados/cargarTabla"});
});

$(window).load(function() {
	NProgress.done();
});

function actualizarTabla()
{
	tabla.ajax.reload(null, false);
}

function actualizarTablaRes()
{
	tablaRes.ajax.reload(null, false);
}


function listarPartidos(id)
{
	NProgress.start();
    $.ajax({
    	url: 'partidos/listarPartidos',
		type: 'POST',
		dataType: 'JSON',
		data: {id: id},
    	success:function(res){
    		$('[id = "fecha"]').text(res.Horario);
    		$('[id = "lugar"]').text(res.Lugar);
    		$('[id = "etapa"]').text(res.NombreEtapa);
    		$('[id = "cuadro"]').text(res.NombreCuadro);
    		$('[id = "categoria"]').text(res.NombreCategoria);
    		$('[id = "jugador1"]').text(res.jugadoruno + ' ' + res.apeuno);
    		$('[id = "jugador2"]').text(res.jugadordos + ' ' + res.apedos);
    		$('[id = "idset1jug1"]').text(res.Set1Jug1);
    		$('[id = "idset2jug1"]').text(res.Set2Jug1);
    		$('[id = "idset1jug2"]').text(res.Set1Jug2);
    		$('[id = "idset2jug2"]').text(res.Set2Jug2);
    		$('[id = "idtiebreak"]').text(res.TieBreakJug1+ '/' + res.TieBreakJug2);
    			if (res.Set2Jug1+ res.Set1Jug1 > res.Set1Jug2+ res.Set2Jug2 || res.TieBreakJug1 > res.TieBreakJug2)
				{
					$('[id = "idganador"]').text(res.jugadoruno + ' ' + res.apeuno);
				}
				else 
				{
                    $('[id = "idganador"]').text(res.jugadordos + ' ' + res.apedos);
				}
    		$('#modalInformacion').modal('show');
	        NProgress.done();
    	}
    });
	
}

function eliminarPartido(id)
{
	swal({
		title: "¿Estas seguro?",
		text: "¿Realmente deseas eliminar este partido?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, cámbialo!",
		closeOnConfirm: false
	}).then(function() {
	NProgress.start();
	    $.ajax({
		    url: 'partidos/eliminarPartidos',
		    type: 'POST',
		    data: {id: id},
		    success:function(res)
		    {

		    	if (res == 'ok') 
		    	{
		    		NProgress.done();
		    		swal("Completado!", "Se ha eliminado este partido.", "success");
		    	} 
		    	else
		    	{
		    		NProgress.done();
		    		sweetAlert("Oops...", "No se ha eliminado este partido.", "error");
		    	}
		    	actualizarTabla();
		    }
	    });	
    });
}

$('#gpartidos').submit(function(event) {
	event.preventDefault();

	NProgress.start();
	$.ajax({
		url: 'partidos/editarPartidos',
		type: 'POST',
		data:$('#gpartidos').serialize(),
		success:function(res){
			if(res == 'no')
			{
				NProgress.done();
				sweetAlert("Oops...", "No se ha modificado la información de la clase.", "error");
			} 
			else
			{
				NProgress.done();
				sweetAlert("Perfecto!", "Se ha modificado la información de la clase.", "success");
			}
		}

	});

});

function cargarPartidos(id)
{
	NProgress.start();
	 $.ajax({
    	url: 'partidos/listarPartidos',
		type: 'POST',
		dataType: 'JSON',
		data: {id: id},
    	success:function(res){
    		$('[name = "idPartidoE"]').val(res.IdPartidotennis);
    		$('[name = "fechaE"]').val(res.Horario);
			$('[name = "lugarE"]').val(res.Lugar);
			$('[name = "etapaE"]').val(res.NombreEtapa);
			$('[name = "cuadroE"]').val(res.NombreCuadro);
			$('[name = "categoriaE"]').val(res.NombreCategoria);
			$('[name = "jugador1E"]').val(res.jugadoruno + ' ' + res.apeuno);
			$('[name = "jugador2E"]').val(res.jugadordos + ' ' + res.apedos);
			$('#modalEditar').modal('show');
			 NProgress.done();
    	}
    });
}




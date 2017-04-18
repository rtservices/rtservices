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
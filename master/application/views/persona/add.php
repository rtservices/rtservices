<script type="text/javascript" src="ajax/ajxPersona.js"></script>
<script>

	if($('#registro').length){

		$('#registro').validate({
			rules:{
				documento:{
					required:true,
					number:true,
					minlength:5,
					maxlength:15
				},
				genero:{
					required:true
				},
				nombre:{
					required:true,
					minlength:3,
					maxlength:35
				},
				apellidos:{
					required:true,
					minlength:3,
					maxlength:35
				},
				correo:{
					required:true,
					email: true
				},
				direccion:{
					required:true,
					minlength:5,
					maxlength:35
				},
				fnacimiento:{
					required: true,
					date: true
				},
				telefono:{
					number: true,
					minlength: 7,
					maxlength: 10
				},
				celular:{
					number: true,
					minlength: 10,
					maxlength: 12
				},
				eps:{
					required: true
				}
			},
			highlight:function(element) {
				$(element).parents('.form-group').addClass('has-error has-feedback');
			},
			unhighlight: function(element) {
				$(element).parents('.form-group').removeClass('has-error');
			}
		});
	}

	if($('#editar').length){

		if (!$('.no_editables').is(':hidden')) {

			$('#editar').validate({
				rules:{
					documentoM:{
						required:true,
						number:true,
						minlength:5,
						maxlength:15
					},
					generoM:{
						required:true
					},
					nombreM:{
						required:true,
						minlength:3,
						maxlength:35
					},
					apellidosM:{
						required:true,
						minlength:3,
						maxlength:35
					},
					correoM:{
						required:true,
						email: true
					},
					direccionM:{
						required:true,
						minlength:5,
						maxlength:35
					},
					fnacimientoM:{
						required: true,
						date: true
					},
					telefonoM:{
						number: true,
						minlength: 7,
						maxlength: 10
					},
					celularM:{
						number: true,
						minlength: 10,
						maxlength: 12
					},
					epsM:{
						required: true
					}
				},
				highlight:function(element) {
					$(element).parents('.form-group').addClass('has-error has-feedback');
				},
				unhighlight: function(element) {
					$(element).parents('.form-group').removeClass('has-error');
				}
			});
		} else {
			$('#editar').validate({
				rules:{
					correoM:{
						required:true,
						email: true
					}
				},
				highlight:function(element) {
					$(element).parents('.form-group').addClass('has-error has-feedback');
				},
				unhighlight: function(element) {
					$(element).parents('.form-group').removeClass('has-error');
				}
			});
		}
	}

	if($('#formClave').length){

		$('#formClave').validate({
			rules:{
				clave:{
					required: true,
					minlength:5,
					maxlength:30
				},
				repiteclave:{
					required:true,
					minlength:5,
					maxlength:30,
					equalTo:"#clave"
				}
			},
			highlight:function(element) {
				$(element).parents('.form-group').addClass('has-error has-feedback');
			},
			unhighlight: function(element) {
				$(element).parents('.form-group').removeClass('has-error');
			}
		});
	}

	if($('#formUsuario').length){

		$('#formUsuario').validate({
			rules:{
				usuario:{
					required: true,
					minlength:4,
					maxlength:40
				}
			},
			highlight:function(element) {
				$(element).parents('.form-group').addClass('has-error has-feedback');
			},
			unhighlight: function(element) {
				$(element).parents('.form-group').removeClass('has-error');
			}
		});
	}
</script>

</body>
</html>
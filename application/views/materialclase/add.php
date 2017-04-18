<script type="text/javascript" src="ajax/ajxMaterial.js"></script>

<script>

	if($('#registroMc').length)
	{
		$('#registroMc').validate({
			rules:{
				cantidadR:{
					required:true,
					number:true,
					minlength:1,
					maxlength:50
				},
				materialR:{
					required:true,
				},
			},
			highlight:function(element) {
				$(element).parents('.form-group').addClass('has-error has-feedback');
			},
			unhighlight: function(element) {
				$(element).parents('.form-group').removeClass('has-error');
			},
		});
	}

	if($('#editarMc').length)
	{
		$('#editarMc').validate({
			rules:{
				cantidadE:{
					required:true,
					number:true,
					minlength:1,
					maxlength:50
				},
				materialE:{
					required:true,
				},
			},
			highlight:function(element) {
				$(element).parents('.form-group').addClass('has-error has-feedback');
			},
			unhighlight: function(element) {
				$(element).parents('.form-group').removeClass('has-error');
			},
		});
	}
</script>

</body>
</html>
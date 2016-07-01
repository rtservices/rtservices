<script type="text/javascript" src="ajax/ajxCategoria.js"></script>
<script>

	if($('#registro').length)
	{
		$('#registro').validate({
			rules:{
				categoriaR:{
					required:true,
					minlength:4,
					maxlength:15
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

	if($('#editar').length)
	{
		$('#editar').validate({
			rules:{
				categoria:{
					required:true,
					minlength:4,
					maxlength:15
				},
			},
			highlight:function(element) {
				$(element).parents('.form-group').addClass('has-error has-feedback');
			},
			unhighlight: function(element) {
				$(element).parents('.form-group').removeClass('has-error');
			},
			submitHandler: function() {
				alert("submitted!");
			}
		});
	}
</script>

</body>
</html>
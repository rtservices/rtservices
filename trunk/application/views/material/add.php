<script type="text/javascript" src="ajax/ajxMaterial.js"></script>
<script>

	if($('#registro').length)
	{
		$('#registro').validate({
			rules:{
				materialR:{
					required:true,
					minlength:4,
					maxlength:40
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
				material:{
					required:true,
					minlength:4,
					maxlength:40
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
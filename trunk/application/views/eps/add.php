<script type="text/javascript" src="ajax/ajxEps.js"></script>
<script>
	if ($('#registro').length) 
	{
		$('#registro').validate({
			rules:{
				nombreepsR:{
					required:true,
					minlength: 3,
					maxlength: 40
				},
				telefonoepsR:{
					required:true,
					number:true,
					minlength: 7,
					maxlength: 15
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
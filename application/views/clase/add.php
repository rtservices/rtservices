<script type="text/javascript" src="ajax/ajxClase.js"></script>
<script type="text/javascript">
	$('.clockpicker').clockpicker({
		align: 'right',
		donetext: 'Listo',
		placement: 'bottom',
		autoclose: true,
		'default': '16:30'
	});
</script>

<script>

	if($('#registroC').length)
	{
		$('#registroC').validate({
			rules:{
				nombreClaseR:{
					required:true,
					minlength:1,
					maxlength:50
				},
				diaClaseR:{
					required:true,
				},
				horaInicioR:{
					required:true,
				},
				horaFinR:{
					required:true,
				},
				instructorClaseR:{
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
<script type="text/javascript" src="ajax/ajxClaseG.js"></script>
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

	if($('#gClaseE').length)
	{
		$('#gClaseE').validate({
			rules:{
				nombreClase:{
					required:true,
					minlength:1,
					maxlength:50
				},
				diaClase:{
					required:true,
				},
				horaInicio:{
					required:true,
				},
				horaFin:{
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
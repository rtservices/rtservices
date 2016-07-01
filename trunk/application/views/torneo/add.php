<script src="ajax/ajxTorneo.js"></script>
<script>
	$('#editor').group({
		init: testData,
		save: function(state) {
			$('#cuadrosGenerados').empty().group({
				init: state
			})
		}
	})
</script>

</body>
</html>
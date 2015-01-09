<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	</head>
	<body>
		<p>Click the button to display a random number between 1 and 100.</p>
		<button onclick="llamada()">Crypt</button>
		<p id="results"></p>
		<script>
			function llamada() {
				var sol = "1";
				var ran = "9b8619251a19057cff70779273e95aa6";
				var cur = '1';
				$.ajax({
				  	type: "POST",
					url: "http://descargamagica.cl/CLIENTES/Test/descargaok.php",
					data: { solic: ran, lang: sol, curso:  cur},
					success: function(data) {
						$('#results').html(data);
					}
				});
				//$("#results").html(res + ' # ' + solicitud);
			}
		</script>
	</body>
</html>
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
				var sol = "2a38a4a9316c49e5a833517c45d31070";
				var ran = "665s90I9jI775c759116s9HH31Ti80K3";
				$.ajax({
				  	type: "POST",
					url: "ajax.php",
					data: { random: ran, solicitud: sol },
					success: function(data) {
						$('#results').html(data);
					}
				});
				//$("#results").html(res + ' # ' + solicitud);
			}
		</script>
	</body>
</html>
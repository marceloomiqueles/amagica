// Funcion que genera un ASCII en base a la randomizacion de 32 bytes

function encrypt() {
    var valor = Math.floor((Math.random() * 2) + 1);
    var dec;
    var res = "";
    for (i = 0; i < 32; i++) {
	    if (Math.floor((Math.random() * 2) + 0)) {
	    	dec = Math.floor((Math.random() * 10) + 48);
	    } else {
	    	if (Math.floor((Math.random() * 2) + 0)) {
	    		dec = Math.floor((Math.random() * 26) + 65);
	    	} else {
	    		dec = Math.floor((Math.random() * 26) + 97);
	    	}
	    }				    
	    res += String.fromCharCode(dec);
	}
	return res;
}


// La Solicitud Ajax simulada
// random: Valor que creas como cliente (Necesario).
// solicitud: Valor que te entregue al momento de hacer la descarga

function primera_llamada(solicitud) {
	var res = encrypt();
	// c4ca4238a0b923820dcc509a6f75849b solicitud que puedes usar
	return $.ajax({
	  	type: "POST",
		url: "ajax.php",
		data: { random: res, solicitud: solicitud },
		success: function(data) {
			return data;
		}
	});
}
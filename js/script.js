$(document).ready(function(){

 //    $("#region-box").change(function(){
 //        cargaProvincia($("#region-box").val());
 //    });

	// $("#provincia-box").change(function() {
	// 	cargaComuna($("#provincia-box").val());
	// });
    
});

function cargaComuna() {
	var comuna = $("#provincia-box").val();
    $.ajax({
	    type: "POST",
	    url: "../extra/carga_comuna_por_provincia.php",
	    data: { id: comuna}
	    }).done(function(datos){
	        $("#comuna-box").html(datos);
    });
}

function cargaProvincia() {
	var provincia = $("#region-box").val();
	$.ajax({
  	type: "POST",
	url: "../extra/carga_provincia_por_region.php",
	data: { id: provincia}
	}).done(function(datos) {
		$("#provincia-box").html(datos);
		cargaComuna($("#provincia-box").val());
	});
}

function cargaCursosPorColegio() {
	var provincia = $("#colegio-box").val();
	$.ajax({
  	type: "POST",
	url: "../extra/carga_cursos_por_colegio.php",
	data: { id: provincia}
	}).done(function(datos) {
		$("#provincia-box").html(datos);
		cargaComuna($("#curso-box").val());
	});
}

function justNumbers(e) {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
    	return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function strToUpper(key) { 
    return key.toUpperCase();
}
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
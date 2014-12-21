<?php 
// extract data from the post
extract($_POST);

// set POST variables
$url = 'http://www.fibradigital.cl/lolla-tab/recibe_datos.php';
$fields = array(
    'persona'=>urlencode($curso),
    'tipo'=>urlencode($n_solicitud),
    'nombre'=>urlencode(md5($n_solicitud . md5($hexakey))),
    'apellido'=>urlencode($fecha_creacion),
    'correo'=>urlencode($fecha_fin),
    'sexo'=>urlencode($fecha_fin),
    'edad'=>urlencode($lang),
    'ciudad'=>urlencode($fecha_fin),
);

// url-ify the data for the POST
foreach($fields as $key=>$value) {
	$fields_string .= $key . '=' . $value . '&'; 
}
rtrim($fields_string,'&');

// open connection
$ch = curl_init();

// set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

// execute post
$result = curl_exec($ch);

// get info post
$info = curl_getinfo($ch);

// close connection
curl_close($ch);
?>

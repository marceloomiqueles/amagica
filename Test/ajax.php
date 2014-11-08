<?php
require("../include/cliente.class.php");
$cliente = new Cliente;

function pasa_hexa($random) {
    $hexakey = "";
    for ($i = 0; $i < strlen($random); $i++) {
        $hexakey = $hexakey . dechex(ord($random[$i]));
    }
    return $hexakey;
}

if (isset($_POST["random"]) && isset($_POST["solicitud"])) {
	if ($consulta = $cliente->consulta_solicitud_token($_POST["solicitud"])) {
        if ($consulta->num_rows > 0) {
            $row = $consulta->fetch_array(MYSQLI_ASSOC);
            $n_solicitud = $row["n_solicitud"];
            $fecha_creacion = $row["fecha_creacion"];
            $fecha_fin = $row["fecha_fin"];
            if ($row["idioma"] == 1)
                $lang = "ES";
            elseif ($row["idioma"] == 2)
                $lang = "EN";
            $curso = $row["nivel"];
            $hexakey = "";
            $hexakey = pasa_hexa($_POST["random"]);
            if (strlen($hexakey) == 64) {
                $cliente->actualiza_random_licencia($_POST["random"], $_POST["solicitud"]);
                $cliente->actualiza_token_licencia(md5($n_solicitud . md5($hexakey)), $_POST["solicitud"]);
                echo $n_solicitud . "#" . md5($n_solicitud . md5($hexakey)) . "#" . $fecha_creacion . "#" . $fecha_fin . "#" . $lang . "#" . $curso;
                // Set POST variables
                $url = 'http://www.descargamagica.cl/acciones/modtoken.php';
                $fields = array(
                    'tipolicencia'=>urlencode($curso),
                    'licencia'=>urlencode($n_solicitud),
                    'token'=>urlencode(md5($n_solicitud . md5($hexakey))),
                    'fechainicio'=>urlencode($fecha_creacion),
                    'fechatermino'=>urlencode($fecha_fin),
                    'idioma'=>urlencode($lang)
                );
                // url-ify the data for the POST
                $fields_string = "";
                foreach($fields as $key=>$value) {
                    $fields_string .= $key . '=' . $value . '&'; 
                }
                rtrim($fields_string,'&');
                // Open connection
                $ch = curl_init();
                // Set the url, number of POST vars, POST data
                curl_setopt($ch,CURLOPT_URL,$url); 
                curl_setopt($ch, CURLOPT_FAILONERROR, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch,CURLOPT_POST,count($fields));
                curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
                // Execute post
                $result = curl_exec($ch);
                // Get info post
                $info = curl_getinfo($ch);
                // Close connection
                curl_close($ch);
                if (empty($result)) {
                    exit();
                }
                if (empty($info['http_code'])) {
                    exit();
                } else {
                    $curlok = $info['http_code'];
                }
            }
        }

    }
}
else {
	echo "Random o Solicitud vacios";
}
?>
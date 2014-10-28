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
                // echo $hexakey;
                $cliente->actualiza_random_licencia($_POST["random"], $_POST["solicitud"]);
                $cliente->actualiza_token_licencia(md5($n_solicitud . md5($hexakey)), $_POST["solicitud"]);
                echo $n_solicitud . "#" . md5($n_solicitud . md5($hexakey)) . "#" . $fecha_creacion . "#" . $fecha_fin . "#" . $lang . "#" . $curso;
                ?>
                <script type="text/javascript">
                    loadDESCARGA('http://www.descargamagica.cl/acciones/modtoken.php', '<?php echo $curso; ?>', '<?php echo $n_solicitud; ?>', '<?php echo md5($n_solicitud . md5($hexakey)); ?>', '<?php echo $fecha_creacion; ?>', '<?php echo $fecha_fin; ?>', '<?php echo $lang; ?>');
                    
                    function loadDESCARGA(php_file, tipolicencia, licencia, token, fechainicio, fechatermino, idioma) {
                        alert("Estamos generando su descarga. Por favor espere y no cierre la ventana hasta que se le indique que el proceso ha finalizado. Gracias"); //O colcale un gif animado de preload
                        var datastring= "tipolicencia="+tipolicencia+"&licencia="+licencia+"&token="+token+"&fechainicio="+fechainicio"&fechatermino="+fechatermino"&idioma="+idioma;
                        var urlfile = php_file + "?x=" + parseInt(Math.random() * 1000000);
                        var request =  get_XmlHttpx();
                        request.open("POST", urlfile , true);
                        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        request.setRequestHeader("Content-length", datastring.length);
                        request.send(datastring);
                        request.onreadystatechange = function() {
                            //alert(request.readyState);
                            if (request.readyState == 4) { //respuesta ok
                                //alert(request.responseText);
                            }
                        }
                    }

                    //Request multiplataforma
                    function get_XmlHttpx() {
                        var xmlHttp = null;
                        try{
                            // Opera 8.0+, Firefox, Safari
                            xmlHttp = new XMLHttpRequest();
                        } catch (e) {
                            // Internet Explorer Browsers
                            try{
                                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                            } catch (e) {
                                try{
                                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                                } catch (e) {
                                    // Something went wrong
                                    alert("AJAX no soportado");
                                    return false;
                                }
                            }
                        }
                        return xmlHttp;
                    }
                </script>
                <?php
            }
        }

    }
}
else {
	echo "Random o Solicitud vacios";
}
?>
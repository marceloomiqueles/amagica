<?php
require('cdb.php');

// Encrypt Function
function mc_encrypt($encrypt, $key) {
    $encrypt = serialize($encrypt);
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    $key = pack('H*', $key);
    $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
    $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
    $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
    return $encoded;
}

// Decrypt Function
function mc_decrypt($decrypt, $key) {
    $decrypt = explode('|', $decrypt);
    $decoded = base64_decode($decrypt[0]);
    $iv = base64_decode($decrypt[1]);
    if(strlen($iv)!==mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)){ return false; }
    $key = pack('H*', $key);
    $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
    $mac = substr($decrypted, -64);
    $decrypted = substr($decrypted, 0, -64);
    $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
    if($calcmac!==$mac){ return false; }
    $decrypted = unserialize($decrypted);
    return $decrypted;
}

if (isset($_POST["random"]) && isset($_POST["solicitud"])) {
	$qry = $mysqli->query("SELECT n_solicitud, DATE_FORMAT(fecha_creacion,'%Y%m%d') AS fecha_creacion FROM licencia WHERE n_solicitud = '" . $_POST["solicitud"] . "' AND token IS NULL AND random IS NULL LIMIT 1");
	while ($res = $qry->fetch_assoc()) {
		$hexakey = "";
		$random = $_POST["random"];
		for ($i = 0; $i < strlen($random); $i++) {
			$hexakey = $hexakey . dechex(ord($random[$i]));
		}

		if (strlen($hexakey) == 64) {
			// echo $hexakey;
			$mysqli->query("update licencia set random = '" . $_POST["random"] . "' where n_solicitud = '" . $_POST["solicitud"] . "'");
			$cadena = $res["n_solicitud"] . $res["fecha_creacion"] . md5($hexakey);
			define('ENCRYPTION_KEY', $hexakey);
			echo $encrypted_data = mc_encrypt($cadena, ENCRYPTION_KEY);
			$mysqli->query("update licencia set token = '" . $encrypted_data . "' where n_solicitud = '" . $_POST["solicitud"] . "'");
		}
		// echo 'Decrypted Data: ' . mc_decrypt($encrypted_data, ENCRYPTION_KEY) . '</br>';
	}
}
else {
	echo "ya existe, llame a su administrador";
}
?>
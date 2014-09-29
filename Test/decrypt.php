<?php
$valor = "i9iGuO7En3bhChG85dYjij+8ykwGG/eqi++FDFFsqlJ+iTUzp1BjqLp5xwoHhESDyKsWkIcZ8hMJx0wl7pVw0Rs1dmMWVy84OpdlfEGu2vCKbKkBMvkpCZIf56buVerVzi4PTRfuXG5ZVmJxI9lFljETOWRzwcIT09xTGSRiwClWr2/RNN7nNlDDxKkZWxFSmxfKDkhpk5/BD8w1TyPxbg==|f66fxEvDfVV4yLNHfmCd9d3KKcIpSM0HY1jqfSjxt4U=";
$key = "58613268333771344a47384277577a3038354639347030323279673030773035";


$hexakey = "";
$random = "Xa2h37q4JG8BwWz085F94p022yg00w05";
for ($i = 0; $i < strlen($random); $i++) {
    $hexakey = $hexakey . dechex(ord($random[$i]));
}

$resultado = mc_decrypt($valor, $key);
echo substr($resultado, 0, 32) . " " . substr($resultado, 32, 8) . " " . substr($resultado, 40, 32) . " " . md5($hexakey);
die();
// define('ENCRYPTION_KEY', "3861323330323439344a697035646e3570353067627a3830446a35644d6b4e32");
// Decrypt Function
function mc_decrypt($decrypt, $key){
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
?>
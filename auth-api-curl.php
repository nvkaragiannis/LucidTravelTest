<?php
function base64urlEncode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

 
function simpleHeaderHandler($ch, $header){
    global $headers;
 
    $len = strlen($header);
    $header = explode(':', $header, 2);
    if (count($header) < 2)
      return $len;
 
    $headers[trim($header[0])] = trim($header[1]);

    return $len;
}

$apiKey        = $_POST['apiKey'];//"FSp1t912z5aGmPVFa2RF90HkuybBLlk8djIv";
$secretKey     = $_POST['secretKey'];//"pWePybYykRi85hNKiQkHd8WPYCAPY21n0QdSfq_2J-ac";
$siteID        = "1126";

$echo           = array("siteID"=>$siteID);

$encodedApiKey = base64urlEncode($apiKey);
$signatureKey  = $encodedApiKey . "|" . $siteID;
$hash          = hash_hmac('sha256', $signatureKey, $secretKey, true);
$authToken     = $encodedApiKey . "." . base64urlEncode($hash);
$headers        = [];
$params			= $echo;

$url 			= "https://lucidtravel.us/auth-api.php";
$curl           = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => $url,
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json',
		'lucid-siteid:' .$siteID,
		'Authorization:' .$authToken
	),
	CURLOPT_POST => 1,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_POSTFIELDS => json_encode($params),
	CURLOPT_HEADERFUNCTION => 'simpleHeaderHandler'
));


//echo curl_exec($curl);
$result = curl_exec($curl);
$result = json_decode(curl_exec($curl), true);
echo '<pre>'; print_r($result); 
?>
    
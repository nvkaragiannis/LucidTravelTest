<?php
echo '<pre>'; print_r($_ENV);
    
/*$arr = [
'requestData' => json_encode($_REQUEST),
'getEnvData' => json_encode(getenv()),
'envData' => json_encode($_ENV),
'serverData' => json_encode($_SERVER),
'fileContent' => json_encode(file_get_contents('php://input'))
];*/
// $username = 'admin';
// $password = 'Secure@1234#';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://192.168.21.31/league_apps/api/league-apps-api.php");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $_ENV);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
// curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
// curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$data = curl_exec($curl);
echo "DATA - ".$data;
if (curl_errno($curl)) {
    echo 'Error:' . curl_error($curl);
}
curl_close($curl);
//return $data;

//echo '<pre>'; print_r($_ENV);
?>
    

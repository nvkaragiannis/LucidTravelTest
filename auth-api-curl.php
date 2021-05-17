<?php

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://www.lucidtravel.us/league_apps/api/league-apps-api.php");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $_POST);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($curl);
if (curl_errno($curl)) {
    echo 'Error:' . curl_error($curl);
}
curl_close($curl);
return $data;
?>
    

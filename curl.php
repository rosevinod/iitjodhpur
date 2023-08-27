<?php

$url = 'https://reqres.in/api/register';
$data = ["email"=> "eve.holt@reqres.in","password" => "pistol1"];

 
$json = json_encode($data);

$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'
));
 
$response = curl_exec($ch);
if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $response;
}
curl_close($ch);

/*
header("Content-Type:application/json");
$data = file_get_contents('php://input');
print $data;

*/
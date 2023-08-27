<?php

/*{
    "require": {
       "guzzlehttp/guzzle": "^7.0",
       "php": "^7.3||^8.0"
    }
 }
 
 composer install 
 copy paste vendor folder in project
 
 */
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

// // Create a client with a base URI
 $client = new GuzzleHttp\Client(['base_uri' => 'https://reqres.in/api/']);

// // Send a request to https://foo.com/api/test
// $response = $client->request('GET', 'users');

// echo '<pre>';print_r(json_decode($response->getBody(),true));echo '</pre>';

// Provide the body as a string.
$response = $client->request('POST', 'register', [
    'form_params' => ["email"=> "eve.holt@reqres.in",
    "password" => "pistol"]
]);


echo '<pre>';print_r(json_decode($response->getBody(),true));echo '</pre>';

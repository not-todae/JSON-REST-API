<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

  $options = [
    'json' => [
        "firstName" => "John" ,
        "maidenName" => "Johnson",
        "lastName" => "Doe"
       ]
   ]; 

$response = $client->post('users/add', $options);
$code = $response->getStatusCode();
$body = $response->getBody();
$decoded_response = json_decode($body);
echo "<pre>";
var_dump($decoded_response);
?>
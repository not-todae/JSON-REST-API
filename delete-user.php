<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$User_id = $_GET['user_id'] ?? null;

$response = $client->delete('Users/' . $User_id);
$code = $response->getStatusCode();
$body = $response->getBody();
$decoded_response = json_decode($body);
echo "<pre>";
var_dump($decoded_response);
?>
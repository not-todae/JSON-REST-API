<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$user_id = $_GET['user_id'] ?? null;

  
$options = [
  'json' => [
      "firstName" => "John" ,
      "maidenName" => "Johnson",
      "lastName" => "Doe"
     ]
 ]; 

$response = $client->put('Users/' . $user_id, $options);
$code = $response->getStatusCode();
$body = $response->getBody();
$decoded_response = json_decode($body);
echo "<pre>";
var_dump($decoded_response);

?>
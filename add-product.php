<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

  $options = [
    'json' => [
        "title" => "new product" ,
        "description" => "new product description"
       ]
   ]; 
;
$response = $client->post('products/add', $options);
$code = $response->getStatusCode();
$body = $response->getBody();
$decoded_response = json_decode($body);
echo "<pre>";
var_dump($decoded_response);
?>

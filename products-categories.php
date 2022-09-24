<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/products'
]);
$response = $client->get('https://dummyjson.com/products/categories');
$code = $response->getStatusCode();
$body = $response->getBody();
$categories = json_decode($body);
#var_dump($body)
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        thead{
            background: black;
            color: white;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-9"><h1>All Categories</h1></div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">Category</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $category){ ?>
                <tr>
                <td><?php echo $category ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>
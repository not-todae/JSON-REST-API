<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/products'
]);
$response = $client->get('https://dummyjson.com/products');
$code = $response->getStatusCode();
$body = $response->getBody();
$products = json_decode($body)->products;
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
    <title>All Products</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-9"><h1>All Products</h1></div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Brand</th>
                <th scope="col">Category</th>
                <th scope="col">Thumbnail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product){ ?>
                <tr>
                <th scope="row"><?php echo $product->id ?></th>
                <td><?php echo $product->title ?></td>
                <td><?php echo $product->description ?></td>
                <td><?php echo $product->price ?></td>
                <td><?php echo $product->brand ?></td>
                <td><?php echo $product->category ?></td>
                <td><img src="<?php echo $product->thumbnail ?>"></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>
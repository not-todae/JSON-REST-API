<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Product</title>
    <style>
               body{
        background-color:#eee;
        font-family: "Poppins", sans-serif;
        font-weight: 300;
       }
       .height{
        height: 100vh;
       }
       .search{
       position: relative;
       box-shadow: 0 0 40px rgba(51, 51, 51, .1);
         
       }
       .search input{
        height: 60px;
        text-indent: 25px;
        border: 2px solid #d6d4d4;
       }
       .search input:focus{
        box-shadow: none;
        border: 2px solid blue;


       }
       .search .fa-search{
        position: absolute;
        top: 20px;
        left: 16px;
       }
       .search button{
        position: absolute;
        top: 5px;
        right: 5px;
        height: 50px;
        width: 110px;
        background: blue;
       }
    </style>
</head>
<body>
    <form action="search-product.php" method="POST">
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="search">
            <i class="fa fa-search"></i>
            <input type="text" class="form-control" placeholder="Search a product" name=searchProduct>
            <button class="btn btn-primary" type="submit" id="search">Search</button>
            </div>
        </div>
        </div>
    </div>
    </form>
</body>
</html>
<?php
if (isset($_POST['searchProduct'])){

    $searchProduct = $_POST['searchProduct'];
    $response = $client->get('products/search?q=' . $searchProduct);
    $code = $response->getStatusCode();
    $body = $response->getBody();
    $products = json_decode($body, true);
    var_dump($products);
}
?>
<html>
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
                <?php foreach($products['products'] as $product){ ?>
                <tr>
                <th scope="row"><?php echo $product['id'] ?></th>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['description'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['brand'] ?></td>
                <td><?php echo $product['category'] ?></td>
                <td><img src="<?php echo $product['thumbnail'] ?>"></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</html>


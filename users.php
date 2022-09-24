<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/users'
]);
$response = $client->get('https://dummyjson.com/users');
$code = $response->getStatusCode();
$body = $response->getBody();
$users = json_decode($body)->users;
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
    <title>All Users</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-9"><h1>All Users</h1></div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Complete Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Blood Type</th>
                <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user){ ?>
                <tr>
                <th scope="row"><?php echo $user->id ?></th>
                <td><?php echo $user->firstName." ".$user->maidenName." ". $user->lastName?></td>
                <td><?php echo $user->age ?></td>
                <td><?php echo $user->gender ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->phone ?></td>
                <td><?php echo $user->bloodGroup ?></td>
                <td><img src="<?php echo $user->image ?>"></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>
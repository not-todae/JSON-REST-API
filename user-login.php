<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

if (isset($_POST['username'])) {
    if (isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            $response = $client->request('POST','https://dummyjson.com/auth/login',
            ['json'=>[
            'username' => $username, 
            'password' => $password
            ]
        ]); 
        $body = $response->getBody();
        $user_login = json_decode($body);
        echo '<div class="alert alert-success" role="alert">Token: ' . $user_login->token .'</div>'; } 

        catch(Exception $e){ 
            echo '<div class="alert alert-danger" role="alert"> Please check username or password</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert"> Account does not exist<div>';
    }
}
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <title>User Login</title>
        <style>
            .header{padding-left:1%;
            }
            .container {
            margin: 100px auto;
            max-width: 600px;
            background-color: white;
            padding: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>User Login </h1>
            </div>
            <form action="user-login.php" method="POST">
                <!-- Username input -->
                <div class="form-outline mb-1">
                    <input type="text" name="username" class="form-control" placeholder="Username" require="required"/>
                    <label class="form-label">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-1">
                    <input type="password" name="password" class="form-control" placeholder="Password" require="required" />
                    <label class="form-label">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            </form>
        </div>
    </body>
</html>

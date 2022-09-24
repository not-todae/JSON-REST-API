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
            <form>
                <!-- Email input -->
                <div class="form-outline mb-1">
                    <input type="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-1">
                    <input type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                    </div>
                </div>

                <!-- Submit button -->
                <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>
            </form>
        </div>
    </body>
</html>

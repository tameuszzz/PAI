<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameder - Login</title>
    <link rel="stylesheet" type="text/css" href="Public/css/login.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7a5a5490a9.js" crossorigin="anonymous"></script>

</head>

<body>
    <style type="text/css">
        body {
            background-image: url('Public/img/background.jpeg');
        }
    </style>

    <div class="container-fluid text-center logo">
        <i class="fas fa-dice"></i>
        <span class="logoName">
            gameder
        </span>
    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4 col-md-2 col-sm-0"></div>
            <div class="col-lg-8 col-md-10 col-sm-12" id="LogForm">
                <h1>Login</h1>
                <form action="?page=login" method="POST">
                    <span class="message" <?php if(isset($color)) echo "style='color:$color'"?>>
                        <?php
                            if(isset($messages)){
                                echo $messages;
                            }
                        ?>
                    </span>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-envelope"></i></div>
                            </div>
                            <input type="text" name="email" class="form-control" id="inlineFormInputGroup" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input type="password" name="password" class="form-control" id="inlineFormInputGroup" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <div class="remember">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit" name="login-submit" class="btn btn-primary">LOGIN</button>
                    <div class="register">
                        <a href="?page=registration">Haven't any account? Sign Up!</a>
                    </div>
                    <div class="bar"></div>
                    <div class="social-media">
                        or Connect with Social Media
                    </div>
                    <div class="row sm-icons">
                        <div class="circle"><a href=""><i class="fab fa-facebook-f"></i></a></div>
                        <div class="circle"><a href=""><i class="fab fa-twitter"></i></a></div>
                        <div class="circle"><a href=""><i class="fab fa-google-plus-g"></i></a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

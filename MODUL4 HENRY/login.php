<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .login {
            width: 400px;
            margin-top: 100px;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 0 25px #3d2173a1;
            transition: all ease 1s;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:#bce6eb;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">WAD Beauty</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>

            <div class="navbar-nav">
                <li class="nav-item">
                    <a href="login.php" class="nav-link active">Login</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link active">Register</a>
                </li>
            </div>

        </div>
    </nav>


    <div class="container">
        <?php
        include 'libs.php';
        $db = new database();
        session_start();

        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (isset($_POST['remember-me'])) {
                $db->login($email, $password, true);
            } else {
                $db->login($email, $password, false);
            }
        }

        
        if ($_COOKIE['saved'] == "1") {
            $savedUsername =  $_COOKIE['user-email'];
            $savedPassword = $_COOKIE['user-password'];
        } else {
            echo
                $savedUsername = "";
            $savedPassword = "";
        }
        ?>

    </div>

    <div class="container d-flex justify-content-center" style="height: 100%;">
        <div class=" login ">
            <div class="card w-100 h-100">
                <div class="card-body">

                    <form action="" method="post">

                        <h1 style="text-align: center;">Login</h1>
                        <hr>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="" value="<?= $savedUsername ?>" aria-describedby="emailHelpId" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" id="" value="<?= $savedPassword ?>" placeholder="">
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remember-me" id="" value="remember" checked>
                                Remember Me
                            </label>
                        </div>
                        <br><br>
                        <button type="submit" name="lojin" id="" class="btn btn-primary" btn-lg btn-block">Login</button>
                    </form>
                    <br>
                    <p style="text-align: center;">Belum Punya Akun ?? <a href="register.php">Registrasi</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
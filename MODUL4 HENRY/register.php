<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>

        html{
            background-color: cyan;
        }
        .login {
            width: 500px;
            margin-top: 100px;
            margin-bottom: 100px;
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
        <a class="navbar-brand" href="#">WAD Beauty</a>
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
        include('libs.php');
        $db = new database();

        if (isset($_POST['register'])) {
            $db->register(
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['pass-init'],
                $_POST['pass-conf']
            );
        }
        ?>

    </div>

    <div class="container d-flex justify-content-center" style="height: 100%;">
        <div class=" login ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <h1 style="text-align: center;">Registrasi</h1>
                        <hr>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" required class="form-control" name="name" id="" aria-describedby="emailHelpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" required class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">No Handphone</label>
                            <input type="number" required class="form-control" name="phone" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Kata Sandi</label>
                            <input type="password" required class="form-control" name="pass-init" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Konfirmasi Kata Sandi</label>
                            <input type="password" required class="form-control" name="pass-conf" id="" placeholder="">
                        </div>

                        <br><br>
                        <button type="submit" name="register" id="" class="btn btn-primary" btn-lg btn-block">Daftar</button>
                    </form>
                    <br>
                    <p style="text-align: center;">Sudah Punya Akun ?? <a href="login.php">Login</a></p>
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
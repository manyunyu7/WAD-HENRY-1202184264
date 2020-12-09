<!doctype html>
<html lang="en">
<?php session_start();
include 'libs.php';
$db = new database();
if (isset($_SESSION['logged'])) {
    # code...
} else {
    $db->movePage("login.php");
}
?>

<head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .box {
            width: 100%;
            margin-top: 100px;
            overflow: hidden;
            border-radius: 20px;
            /* box-shadow: 0 0 25px #3d2173a1; */
            transition: all ease 1s;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg <?= $db->getColor() ?>">
        <a class="navbar-brand" href="index.php">Restoran</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <div class="navbar-nav">
                <li class="nav nav-item">
                    <a class="" href="cart.php">
                        <i class="fa fa-cart-arrow-down fa-lg" aria-hidden="true"></i> </a>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    </a>
                </li>
                <li class="nav-item">
                    <p class="" href="#">Selamat Datang &nbsp;&nbsp; </a>
                </li>
                <li class=" nav nav-item dropdown ">
                    <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['user-name'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="profile.php"><button type="button" class="btn btn-block">Profile</button></a>
                        <div class="dropdown-divider"></div>
                        <form action="" method="post">
                            <a href="login.php"><button type="submit" name="logout" class="btn btn-block">Logout</button></a>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </li>
            </div>
        </div>
    </nav>
    

    <div class="container">
        <?php
        
        if (isset($_POST['update'])) {
            $db->update_profile($_POST['name'], $_POST['emailz'], $_POST['contact'], $_POST['password'], $_POST['repassword'], $_POST['color']);
        }
        ?>
    </div>


    <div class="container">
        <?php
        $show_data = true;
        if ($db->UserData() != null) {
            $show_data = true;
            $data = $db->UserData();
            foreach ($data as $key) {
                $u_name = $key['nama'];
                $u_email = $key['email'];
                $u_phone = $key['no_hp'];
                $u_pass = $key['password'];
            }
        } else {
            $show_data = false;
        }
        if (isset($_POST['delete_item'])) {
            $db->delete_data($_POST['item_id']);
        }
        ?>
    </div>

    <div class="container d-flex justify-content-center" style="height: 100%;">
        <div class="box">
            <div class="card w-100 h-100">
                <div class="card-body">

                    <form action="" class="form-horizontal" method="post">
                        <h1 style="text-align: center;">Profile</h1>

                        <div class="form-group row">
                            <label for="inputNama" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input name="emailz" type="text" value="<?= $u_email ?>" disabled class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputNama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="emailz" value="<?= $u_email ?>">
                                <input type="text" value="<?= $u_name ?>" class="form-control" id="inputNama" placeholder="Nama Anda" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelp" class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                                <input type="number" value=<?= $u_phone ?> class="form-control" id="inputTelp" name="contact">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Password" name="password" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Ulangi Password" name="repassword" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="">Warna Navbar</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="color" id="">
                                    <option value="navbar-dark bg-danger text-light">Merah</option>
                                    <option value=" navbar-dark bg-dark text-light">Hitam</option>
                                    <option value="navbar-dark bg-warning text-light">Kuning</option>
                                    <option value="navbar-dark bg-primary text-light">Biru</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <button type="submit" name="update" id="btn-submit" class="btn btn-primary btn-block">Submit</button>
                            <button type="empty" class="btn btn-light btn-block">Cancel</button>
                        </div>

                    </form>
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
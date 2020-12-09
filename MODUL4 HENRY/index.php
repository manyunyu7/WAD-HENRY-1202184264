<!doctype html>
<html lang="en">
<?php session_start();
include 'libs.php';
$db = new database();
$show = "";
if (isset($_SESSION['logged'])) {
    # code...
} else {
    $db->movePage("login.php");
}
?>

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=EB+Garamond&family=Nunito:wght@700&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        .header {
            font-family: 'Comfortaa', Arial, Helvetica, sans-serif;
            color: black;
            height: 170px;
        }

        .p-0 {
            padding-right: 0;
            padding-left: 0;
        }

        .content {
            font-family: 'EB Garamond', Arial, Helvetica, sans-serif;
            width: 400px;
            margin-top: 50px;
            margin-bottom: 50px;
            overflow: hidden;
            border-radius: 50px 50px 0px 0px;
            transition: all ease 1s;
        }

        img {
            object-fit: cover;
            height: 270px;
            display: block;
            position: relative;
            overflow: hidden;
            transition: all ease 1s;
        }
    </style>
    <!-- Bootstrap CSS -->
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
                            <button type="submit" name="logout" class="btn btn-block">Logout</button>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </li>
            </div>
        </div>
    </nav>


    <div class="container">
        <?php
        if (strpos($_SERVER['REQUEST_URI'], "in_") !== false) {
            $db->msgSuccess("Berhasil Login");
        }
        if (isset($_POST['add-product'])) {
            $db->addToCart($_POST['item_name'], $_POST['item_price']);
        }
        ?>
    </div>

    <div class="container <?php:$show?>">
        <div class="container content">
            <div class="row">
                <div class="col-sm-12 header">
                    <div style="width: 100%; text-align:center; padding:50px" class="">
                        <h1>Resto Family 4</h1>
                        <h4>Tersedia 3 Paket Makanan harga murah dan berkualitas</h4>
                    </div>
                </div>

                <!-- //PRODUCT 1 -->
                <div class="col-sm-4 p-0">
                    <div class="card text-left" style="height: 100%;">
                        <img class="card-img-top" src="https://ecs7.tokopedia.net/img/cache/700/product-1/2017/11/15/24558433/24558433_340ba4be-0809-4515-9281-2bca7be8c968_1200_1200.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Paket Murah Meriah</h4>
                            <p class="card-text">
                                <p>Lalapan, Sambel , Kangkung , Tahu dan Tempe dan Sayur Asem Untuk Porsi 4 Orang</p>
                            </p>
                            <hr>
                            <p>Rp. 30.000</p>
                        </div>
                        <div class="card-footer bg-transparent w-100">
                            <form action="" method="post">
                                <input type="hidden" name="item_name" value="Paket Murah Meriah">
                                <input type="hidden" name="item_price" value="30000">
                                <button type="submit" name="add-product" class="btn btn-primary btn-block">Tambahkan Ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PRODUCT 2 -->
                <div class="col-sm-4 p-0">
                    <div class="card text-left">
                        <img class="card-img-top" src="https://cdn-2.tstatic.net/pontianak/foto/bank/images/bakul-desa_20171108_143451.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Paket Serbu</h4>
                            <p class="card-text">
                                <p>Paket Nasi Liwet , Ayam Goreng atau Bakar , Tahu , Tempe , Lalapan , Sayur Asem , dan Es Teh Manis Seger.</p>
                            </p>
                            <hr>
                            <p>Rp. 120.000</p>
                        </div>
                        <div class="card-footer bg-transparent w-100">
                            <form action="" method="post">
                                <input type="hidden" name="item_name" value="Paket Serbu">
                                <input type="hidden" name="item_price" value="120000">
                                <button type="submit" name="add-product" class="btn btn-primary btn-block">Tambahkan Ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PRODUCT 3 -->
                <div class="col-sm-4 p-0">
                    <div class="card text-left" style="height: 100%;">
                        <img class="card-img-top" src="https://warungdulukala.com/wp-content/uploads/2018/09/TUMPENG-KUNING.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Paket Tumpeng</h4>
                            <p class="card-text">
                                <p>Nasi Tumpeng Komplet seperti di gambar, hingga 15 Porsi</p>
                            </p>
                            <hr>
                            <p>Rp. 200.000</p>
                        </div>
                        <div class="card-footer bg-transparent w-100">
                            <form action="" method="post">
                                <input type="hidden" name="item_name" value="Paket Tumpeng">
                                <input type="hidden" name="item_price" value="200000">
                                <button type="submit" name="add-product" class="btn btn-primary btn-block">Tambahkan Ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"></div>
        </div>


        <div class="container d-none">
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo $_SESSION['user-name'] . '<br>';
                echo $_SESSION['user-id'] . '<br>';
            }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
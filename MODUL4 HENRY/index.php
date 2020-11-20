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
            color: white;
            height: 170px;
            background: rgb(238, 174, 202);
            background: linear-gradient(90deg, rgba(238, 174, 202, 1) 0%, rgba(77, 160, 231, 1) 100%);
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
            box-shadow: 0 0 25px #0275d8;
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
        <a class="navbar-brand" href="#">WAD Beauty</a>
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
                        <h1>WAD Beauty</h1>
                        <h4>Tersedia Skincare dengan harga murah dan berkualitas</h4>
                    </div>
                </div>

                <!-- //PRODUCT 1 -->
                <div class="col-sm-4 p-0">
                    <div class="card text-left" style="height: 100%;">
                        <img class="card-img-top" src="https://ecs7.tokopedia.net/img/cache/700/VqbcmM/2020/8/7/41e997ac-69ec-4c5d-b515-8a327f848248.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">La Crème Lumière</h4>
                            <p class="card-text">
                                <p>An exquisite face cream that helps improve the essential qualities of beautiful skin: firmness, radiance and hydration</p>
                            </p>
                            <hr>
                            <p>Rp. 1.290.000</p>
                        </div>
                        <div class="card-footer bg-transparent w-100">
                            <form action="" method="post">
                                <input type="hidden" name="item_name" value="La Crème Lumière">
                                <input type="hidden" name="item_price" value="1290000">
                                <button type="submit" name="add-product" class="btn btn-primary btn-block">Tambahkan Ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PRODUCT 2 -->
                <div class="col-sm-4 p-0">
                    <div class="card text-left">
                        <img class="card-img-top" src="https://webimg.secondhandapp.com/1.1/56e1eb7e097f4b4168cac89a" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Caviar Liquid Lift</h4>
                            <p class="card-text">
                                <p>Facial serums, in all of their endlessly niche iterations, are their own special breed of product. There is a serum and a star ingredient for every skincare concern under the sun. But what if you just want one serum that covers all of your bases? It has to be lightweight enough to be layered underneath moisturizer, but potent enough to plump and firm to promote a more youthful-looking appearance. Well, I’m elated to report that I’ve found such a rarified gem in the ultra-luxurious, newly reimagined La Prairie Skin Caviar Liquid Lift.</p>
                            </p>
                            <hr>
                            <p>Rp. 2.290.000</p>
                        </div>
                        <div class="card-footer bg-transparent w-100">
                            <form action="" method="post">
                                <input type="hidden" name="item_name" value="Caviar Liquid Lift">
                                <input type="hidden" name="item_price" value="2290000">
                                <button type="submit" name="add-product" class="btn btn-primary btn-block">Tambahkan Ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PRODUCT 3 -->
                <div class="col-sm-4 p-0">
                    <div class="card text-left" style="height: 100%;">
                        <img class="card-img-top" src="https://vertigomag.co.uk/wp-content/uploads/2018/07/la-prairie-skin-caviar-luxe-cream.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Caviar Luxe Cream</h4>
                            <p class="card-text">
                                <p>The remastered Skin Caviar Luxe Cream is a true feast for the senses. It offers an exquisite experience, from the moment the cobalt blue jar is unveiled from its silver box, to the discovery of the modern</p>
                            </p>
                            <hr>
                            <p>Rp. 2.400.000</p>
                        </div>
                        <div class="card-footer bg-transparent w-100">
                            <form action="" method="post">
                                <input type="hidden" name="item_name" value="Caviar Luxe Cream">
                                <input type="hidden" name="item_price" value="2400000">
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
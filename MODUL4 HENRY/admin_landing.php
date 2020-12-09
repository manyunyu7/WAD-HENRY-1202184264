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
    <title>Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        body{
            font-family: Nunito;
        }
        .content {
            margin-top: 60px;
            margin-bottom: 60px;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg <?= $db->getColor() ?>">
        <a class="navbar-brand" href="admin_landing.php">Restoran</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <div class="navbar-nav">
                <li class="nav nav-item">
                    <a class="" href="admin_landing.php">
                        <i class="fa fa-cart-arrow-down fa-lg" aria-hidden="true"></i> </a>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    </a>
                </li>
                <li class="nav-item">
                    <p class="" href="#">Hallo Koki, &nbsp;&nbsp; </a>
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
        $show_data = true;
        if ($db->show_data_admin() != null) {
            $show_data = true;
            $data = $db->show_data_admin();
        } else {
            $show_data = false;
        }
        if (isset($_POST['delete_item'])) {
            $db->delete_data($_POST['item_id']);
        }

        if (isset($_POST['status_antri'])) {
            $db->change_status($_POST['item_id'], "Dalam Antrian Masak");
        }
        if (isset($_POST['status_masak'])) {
            $db->change_status($_POST['item_id'], "Sedang Dimasak");
        }
        if (isset($_POST['status_antar'])) {
            $db->change_status($_POST['item_id'], "Selesai");
        }
        if (isset($_POST['status_cancel'])) {
            $db->change_status($_POST['item_id'], "Dibatalkan");
        }



        ?>

    </div>

    <div class="container">
        <div style="width: 100%; text-align:center; padding:50px" class="">
            <h1>Menu Koki</h1>
            <h4>Update Status Pesanan berdasarkan status pesanan pelanggan</h4>
        </div>
    </div>

    <div class="container content">
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pesanan</th>
                    <th>Harga</th>
                    <th>Nama</th>
                    <th>Waktu Masuk</th>
                    <th>Status</th>
                    <th colspan="4">Ubah Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                if ($show_data) :
                    foreach ($data as $key) :
                ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $key['nama_barang'] ?></td>
                            <td>Rp.<?= number_format($key['harga']) ?></td>
                            <td><?= ($key['current_user_name']) ?></td>
                            <td><?= ($key['created_at']) ?></td>
                            <td><?= $key['status']  ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="item_id" value="<?= $key['id'] ?>">
                                    <input type="hidden" name="new_status" value="Dalam Antrian">
                                    <button type="submit" name="status_antri" class="btn btn-danger">
                                        Dalam Antrian
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="item_id" value="<?= $key['id'] ?>">
                                    <input type="hidden" name="new_status" value="Dalam Antrian">
                                    <button type="submit" name="status_masak" class="btn btn-primary">
                                        Sedang Dimasak
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="item_id" value="<?= $key['id'] ?>">
                                    <input type="hidden" name="new_status" value="Dalam Antrian">
                                    <button type="submit" name="status_antar" class="btn btn-success">
                                        Sedang Diantarkan
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="item_id" value="<?= $key['id'] ?>">
                                    <input type="hidden" name="new_status" value="Dibatalkan">
                                    <button type="submit" name="status_cancel" class="btn btn-dark">
                                        Pesanan Dibatalkan
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        $no++;
                        $total += $key['harga'];
                    endforeach;
                else : ?>
                    <td colspan="5">Tidak Ada Data</td>
                <?php
                endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
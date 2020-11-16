<!doctype html>
<html lang="en">

<head>
    <title>Detail</title>
    <!-- Required meta tags -->


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/style/styles.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="./assets/script.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .fax {
            color: orange;
            margin-right: 12px;
        }

        .img-poster {
            object-fit: scale-down;
            height: 300px;
            display: block;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 0 25px #3d2173a1;
            transition: all ease 1s;
        }

        .card-home {
            margin: 20px;
        }

        .modal {
            padding: 50px !important;
        }

        .modal .modal-dialog {
            width: 100%;
            max-width: none;
            height: 100%;
            margin: 0;
        }

        .modal .modal-content {
            height: 100%;
            border: 0;
            border-radius: 0;
        }

        .modal .modal-body {
            overflow-y: auto;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light text-light bg-primary">
        <a class="navbar-brand text-light" href="#">EAD Events</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse row" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto col-lg-12">
                <li class="nav-item col-lg-9">
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-light" href="home.php"> <button type="button" class="btn btn-primary">Home</button></a>
                </li>
                <li class="nav-item  text-light">

                    <a class="nav-link text-light" href="create_event.php"> <button type="button" class="btn btn-outline-light">Buat
                            Event</button></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php
        include './modules/connect.php';
        include './modules/create.php';
        include './modules/delete.php';
        include './modules/update.php';

        $event_id = $_GET['event_id'];
        $query = "SELECT * FROM event_table where id=$event_id;";
        $sql = mysqli_query($conn, $query);
        ?>

        <div class="row">
            <?php if ($row = mysqli_fetch_array($sql)) {  ?>
                <div class="col-md-12">
                    <div class="card card-home">
                        <img class="card-img-top img-poster" src="<?php echo $row['gambar'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h3><?php echo $row['name'] ?></h3>
                            <p class="card-text">
                                <p> <strong> Deskripsi : </strong></p>
                                <p><?php echo $row['deskripsi'] ?></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p> <strong> Informasi Event : </strong></p>
                                        <p><i class="fa fax fa-calendar"></i><?php echo $row['tanggal'] ?></p>
                                        <p><i class="fa fax fa-map-marker"></i><?php echo $row['tempat'] ?></p>
                                        <p><i class="fa fax fa-clock-o"></i><?php echo $row['mulai'] . "-" . $row['berakhir'] ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <strong> Benefit : </strong></p>

                                        <?php
                                        $fwv = json_decode($row['benefit']);
                                        $isBenefitEmpty = true;
                                        //if array benefit is not empty
                                        if (!empty($fwv)) {
                                            $isBenefitEmpty = false;
                                            echo '<ul>';
                                            echo '<li>' . implode('</li><li>', $fwv) . '</li>';
                                            echo '</ul>';
                                        } else {
                                            $isBenefitEmpty = true;
                                            //if array benefit is empty
                                            echo '<ul>';
                                            echo '<li>' . 'Tidak Ada Benefit.' . '</li>';
                                            echo '</ul>';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <p> <strong> Kategori Event : <?php echo $row['kategori'] ?> </strong></p>
                                <p> <strong> HTM : Rp. <?php echo $row['harga'] ?> </strong></p>

                        </div>

                        <form action="detail.php?event_id=<?php echo $row['id'] ?>" method="post">
                            <div class="card-footer bg-transparent">
                                <p style="text-align: center;">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                        Edit
                                    </button>
                                    <button type="submit" value="<?php echo $row['id'] ?>" name="deleteAgenda" class="btn btn-danger">Hapus</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Update Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container mx-auto my-5">
                                    <form action="detail.php?event_id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6 align-items-stretch">
                                                <div class="card h-100">
                                                    <div class="card-header bg-primary"></div>
                                                    <div class="card-body">

                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input required type="text" value="<?php echo $row['name'] ?>" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Deskripsi</label>
                                                            <textarea required class="form-control" name="desc" value="?>" id="" rows="3"><?php echo $row['deskripsi'] ?>
                                                            </textarea>
                                                        </div>

                                                        <div>
                                                            <label for="">Upload Gambar</label>
                                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="inputImg" class="custom-file-input" id="customFile">
                                                                <label class="custom-file-label" for="customFile">Choose file</label>

                                                            </div>
                                                        </div>

                                                        <div class="my-2">
                                          
                                                            <div class="">
                                                                <label class="col-md-6 form-check">
                                                                    <div class="row">
                                                                        <div class="form-check col-md-6">
                                                                            <input class="form-check-input" name="cat" value="Offline" type="radio" <?php echo ($row['kategori'] == 'Offline') ? 'checked' : '' ?>>
                                                                            <label class="form-check-label" for="gridRadios2">
                                                                                Offline
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check col-md-6">
                                                                            <input class="form-check-input" value="Online" type="radio" name="cat" <?php echo ($row['kategori'] == 'Online') ? 'checked' : '' ?>>
                                                                            <label class="form-check-label" for="gridRadios3">
                                                                                Online
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="card align-items-stretch">
                                                    <div class="card-header bg-danger"></div>
                                                    <div class="card-body">

                                                        <input type="hidden" name="id" value=<?php echo $row['id'] ?>>

                                                        <div class="form-group">
                                                            <label for="">Tanggal</label>
                                                            <input type="date" class="form-control" name="date" id="" value=<?php echo $row['tanggal'] ?> aria-describedby="helpId" placeholder="">
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="">Jam Mulai</label>
                                                                <input type="time" class="form-control" name="start" required value="<?php echo $row['mulai'] ?>" id="" aria-describedby="helpId" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Jam Selesai</label>
                                                                <input type="time" class="form-control" name="end" value="<?php echo $row['berakhir'] ?>" required id="" aria-describedby="helpId" placeholder="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Tempat</label>
                                                            <input type="text" value="<?php echo $row['tempat'] ?>" class="form-control" name="loc" id="" aria-describedby="helpId" placeholder="" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Harga</label>
                                                            <input type="number" class="form-control" value="<?php echo $row['harga'] ?>" name="price" id="" aria-describedby="helpId" placeholder="" required>
                                                        </div>

                                                        <?php
                                                        $arrayBenefit = null;
                                                        $snack = false;
                                                        $sertif = false;
                                                        $souvenir = false;

                                                        if ($isBenefitEmpty) {
                                                            $snack = false;
                                                        } else {
                                                            $arrayBenefit = json_decode($row['benefit']);
                                                            if (in_array("Snack", $arrayBenefit)) {
                                                                $snack = true;
                                                            }
                                                            if (in_array("Sertifikat", $arrayBenefit)) {
                                                                $sertif = true;
                                                            }
                                                            if (in_array("Souvenir", $arrayBenefit)) {
                                                                $souvenir = true;
                                                            }
                                                        }



                                                        ?>

                                                        <div class="form-group">
                                                            <label for="">Benefit</label>
                                                            <div class="form-check">
                                                                <div class="row col-md-10">

                                                                    <div class="col-md-4">
                                                                        <label class="form-check-label">
                                                                            <input <?php echo ($snack) ? 'checked' : ''; ?> type="checkbox" class="form-check-input" name="benefit[]" id="" value="Snack">
                                                                            Snack
                                                                        </label>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label class="form-check-label">
                                                                            <input <?php echo ($sertif) ? 'checked' : ''; ?> type="checkbox" class="form-check-input" name="benefit[]" id="" value="Sertifikat">
                                                                            Sertifikat
                                                                        </label>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label class="form-check-label">
                                                                            <input <?php echo ($souvenir) ? 'checked' : ''; ?> type="checkbox" class="form-check-input" name="benefit[]" id="" value="Souvenir">
                                                                            Souvenir
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" name="updateEvent" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>




    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
<!doctype html>
<html lang="en">
<!-- 
    Henry Augusta Harsono
    1202184264
    "dum spiro,spero" 
-->

<head>
    <title>Booking</title>

    <script src="./assets/js/script.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/styles/styles.css">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <nav>
        <ul class="nav justify-content-center bg-primary text-light">
            <li class="nav-item">
                <a class="nav-link" href="./booking.php">Booking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./home.php">Room</a>
            </li>
        </ul>
    </nav>

    <div class="main">
        <div class="row content">

            <div class="col-sm-6 kiri">
                <div class="p-5">
                    <form method="post" action="my_booking.php">
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputNama" placeholder="Nama Anda" name="name" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inDate" class="col-sm-3 col-form-label">Check-In</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="inputDate" placeholder="dd/mm/yyyy" name="inputDate" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDuration" class="col-sm-3 col-form-label">Duration</label>
                            <div class="col-sm-12">
                                <input required name="duration" placeholder="Duration" class="form-control" type="number" min="1" aria-describedby="days">
                                <small id="days" class="form-text text-muted">Day(s)</small>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12 col-form-label" for="sel1">Room Type</label>
                            <div class="col-sm-12">
                                <?php
                                if (empty($_GET['room'])) {
                                    echo '
                                <select name="roomList" class="form-control" id="roomList" onchange="change_image()">
                                    <option id="1" value="Standard">
                                        Standard</option>
                                    <option id="2" value="Superior">
                                        Superior</option>
                                    <option id="3" value="Luxury">
                                        Luxury</option>
                                </select>';
                                } else {
                                    $roomType = $_GET['room'];
                                    $stat = is_null($roomType);
                                    if ($stat != 1) {
                                        echo '
                                        
                                <input readonly name="roomList" type="text" class="form-control disabled"  id="roomList"  value="' . $roomType . '" required>';
                                    } else {
                                        echo '    <div class="col-sm-12">
                                <select name="roomList" class="form-control" id="roomList" onchange="change_image()">
                                    <option id="1" value="Standar">
                                        Standard</option>
                                    <option id="2" value="Superior">
                                        Superior</option>
                                    <option id="3" value="Luxury">
                                        Luxury</option>
                                </select>
                            </div>';
                                    }
                                }
                                ?>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 col-form-label" for="sel1">Add Service(s)</label>
                            <div class="col-sm-12">
                                <small id="days" class="form-text text-muted">$20 / Service)</small>
                                <input type="checkbox" name="services[]" value="Room Service"> Room Services <br>
                                <input type="checkbox" name="services[]" value="Breakfast"> Breakfast <br>
                                </fieldset>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 col-form-label">Phone Number :</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputPhone" placeholder="Nomor Telpon" name="inputPhone" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="submit" id="btn-submit" class="btn btn-primary btn-block">Book</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-sm-6 kanan px-2">
                <div class="container">
                    <div class="img-card">
                        <?php
                        if (empty($_GET['img'])) {
                            echo '<img class="img-fluid roomPreview prev" src="./assets/img/r-1.jpg" alt="Pr">';
                        } else {
                            echo '<img class="img-fluid roomPreview prev" src="./assets/img/' . $_GET['img'] . '.jpg" alt="">';
                        }
                        ?>
                    </div>

                </div>
            </div>
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
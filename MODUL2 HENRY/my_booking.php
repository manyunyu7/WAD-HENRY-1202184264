<!doctype html>
<html lang="en">
<!-- 
    Henry Augusta Harsono
    "dum spiro,spero" 
-->
<head>
    <title>My Booking</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .row {
            display: flex;

        }
    </style>
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

    <div>
        <div class="container-fluid d-flex justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking Number</th>
                        <th>Name</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Room Type</th>
                        <th>Phone Number</th>
                        <th>Service</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php
                        $roomType = $_POST['roomList'];
                        $duration = $_POST['duration'];
                        $roomPrice = 0;
                        $dateBook = date('d/m/Y', strtotime($_POST['inputDate']));
                        $dateCheckOut = date('d/m/Y', strtotime("+$duration days", strtotime($_POST['inputDate'])));
                        switch ($roomType) {
                            case 'Standard':
                                $roomPrice = 90;
                                break;
                            case 'Superior':
                                $roomPrice = 150;
                                break;
                            case 'Luxury':
                                $roomPrice = 200;
                                break;
                        }

                        $serviceFee = 0;
                        if (empty($_POST['services'])) {
                            $reservedServices = 0;
                        } else {
                            $reservedServices = $_POST['services'];
                            $serviceFee = count($reservedServices) * 20;
                        }

                        $totalPrice = ($duration * $roomPrice) + $serviceFee;


                        echo '
                    <td><strong>'  . rand() . '</strong></td>
                    <td>' . $_POST['name'] . '</td>
                    <td>' . $dateBook . '</td>
                    <td>' . $dateCheckOut . '</td>
                    <td>' . $roomType . '</td>
                    <td>' . $_POST['inputPhone'] . '</td> 
                    <td><ul>';
                        if ($reservedServices == 0) {
                            echo 'NO SERVICES'; # 
                        } else {
                            for ($i = 0; $i < count($reservedServices); $i++) {
                                echo '<li>' . $reservedServices[$i] . '</li>';
                            }
                        }

                        echo '</ul></td>
                    <td> $' . $totalPrice . '</td>
                    '
                        ?>
                    </tr>
                </tbody>
            </table>

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
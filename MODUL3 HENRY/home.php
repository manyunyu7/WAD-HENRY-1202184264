<!doctype html>
<html lang="en">

<head>
  <title>Home</title>
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
      object-fit: cover;
      height: 170px;
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

    $query = "SELECT * FROM event_tabel";
    $sql = mysqli_query($conn, $query);

    ?>

    <?php
    if (mysqli_num_rows($sql) == 0) { ?>
      <div class=" d-flex justify-content-center align-items-center">
        <h1 class="h-100" style="margin-top: 200px;">No Event Founds</h1>
      </div>
    <?php } ?>
    <div class="row">
      <?php while ($row = mysqli_fetch_array($sql)) {  ?>
        <div class="col-md-4">
          <div class="card card-home">
            <img class="card-img-top img-poster" src="<?php echo $row['gambar'] ?>" alt="<?php echo $row['gambar'] ?>">
            <div class="card-body">
              <h3><?php echo $row['name'] ?></h3>
              <p class="card-text">
                <p><i class="fa fax fa-calendar"></i><?php echo $row['tanggal'] ?></p>
                <p><i class="fa fax fa-map-marker"></i><?php echo $row['tempat'] ?></p>
                <p>Kategori Event : <?php echo $row['kategori'] ?></p>
            </div>
            <div class="card-footer bg-transparent ">
              <a href="detail.php?event_id=<?php echo $row['id'] ?>">
            
                <p style="text-align: end;"><button type="button" class="btn btn-primary">Lihat Detail</button></p>
              </a>
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
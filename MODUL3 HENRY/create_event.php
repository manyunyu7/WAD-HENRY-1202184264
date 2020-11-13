<!doctype html>
<html lang="en">

<head>
  <title>Create Event</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./assets/style/styles.css">

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="./assets/script.js"></script>

  <style>

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

  <div class="container mx-auto my-5">
    <?php
    include './modules/connect.php';
    include './modules/create.php';
    ?>

    <form action="home.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-6 align-items-stretch">
          <div class="card h-100">
            <div class="card-header bg-primary"></div>
            <div class="card-body">

              <div class="form-group">
                <label for="">Name</label>
                <input required type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
              </div>

              <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea required class="form-control" name="desc" id="" rows="3"></textarea>
              </div>

              <div>
                <label for="">Upload Gambar</label>
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="inputImg" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>

              <div class="my-2">
                <label for=""><strong>Kategori</strong></label>
                <div class="">
                  <label class="col-md-6 form-check">
                    <div class="row">
                      <div class="form-check col-md-6">
                        <input class="form-check-input" type="radio" name="cat" id="gridRadios2" value="Offline">
                        <label class="form-check-label" for="gridRadios2">
                          Offline
                        </label>
                      </div>
                      <div class="form-check col-md-6">
                        <input class="form-check-input" type="radio" name="cat" id="gridRadios3" value="Online">
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

              <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" name="date" id="" aria-describedby="helpId" placeholder="">
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="">Jam Mulai</label>
                  <input type="time" class="form-control" name="start" required value="19:00" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Jam Selesai</label>
                  <input type="time" class="form-control" name="end" value="20:00" required id="" aria-describedby="helpId" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="">Tempat</label>
                <input type="text" class="form-control" name="loc" id="" aria-describedby="helpId" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="">Harga</label>
                <input type="number" class="form-control" name="price" id="" aria-describedby="helpId" placeholder="" required>
              </div>

              <div class="form-group">
                <label for="">Benefit</label>
                <div class="form-check">
                  <div class="row col-md-10">
                    <div class="col-md-4">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="benefit[]" id="" value="Snack" checked>
                        Snack
                      </label>
                    </div>

                    <div class="col-md-4">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="benefit[]" id="" value="Sertifikat" checked>
                        Sertifikat
                      </label>
                    </div>

                    <div class="col-md-4">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="benefit[]" id="" value="Souvenir" checked>
                        Souvenir
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group  text-right">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
              </div>




            </div>
          </div>
        </div>
      </div>
    </form>

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
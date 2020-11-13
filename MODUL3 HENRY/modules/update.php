<?php
$nowDate = time();
if (isset($_POST['updateEvent'])) {
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $type = $_POST['cat'];
  $desc = $_POST['desc'];
  $start = $_POST['start'];
  $end = $_POST['end'];
  $date = $_POST['date'];
  $loc = $_POST['loc'];
  $price = $_POST['price'];
  $benefit = json_encode($_POST['benefit']);
  $id = $_POST['id'];


  $query = "";

  if (isset($fileIMG)) {
    $fileIMG = $_FILES['inputImg'];
    $fileIMGName = $_FILES['inputImg']['name'];
    $fileIMGType = $_FILES['inputImg']['type'];
    $fileIMGSize = $_FILES['inputImg']['size'];
    $fileIMGTempLoc = $_FILES['inputImg']['tmp_name'];
    $query = "UPDATE `event_table` SET 
    `name`='$name',
    `deskripsi`='$desc',
    `gambar`='$filePathLocal',
    `kategori`='$type',
    `tanggal`='$date',
    `mulai`='$start',
    `berakhir`='$end',
    `tempat`='$loc',
    `harga`=$price,
    `benefit`='$benefit' WHERE id=$id";
    $filePathLocal = "./assets/img/$nowDate-$name" . ".png";
    $saveLocal =  move_uploaded_file($fileIMGTempLoc, $filePathLocal);
  }else{
    //IF THE PATH IS NOT CHANGE
    $query = "UPDATE `event_table` SET 
    `name`='$name',
    `deskripsi`='$desc',
    `kategori`='$type',
    `tanggal`='$date',
    `mulai`='$start',
    `berakhir`='$end',
    `tempat`='$loc',
    `harga`=$price,
    `benefit`='$benefit' WHERE id = $id";
  }


  



  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo '<br>';
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Mengupdate Event!</strong> <a href="home.php">Check data event disini</a> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  } else {
    echo '<br>';
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal Mengupdate Event! Karena ' . $mysqli_error($conn) . '</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }

  // echo $name."--".$desc."--".$fileIMGName."\n";
  // echo "type : ".$type."\n";
  // echo "date : ".$date."\n";
  // echo "start : ".$start."\n";
  // echo "location : ".$loc."\n";
  // echo "price : ".$price."\n";
  // echo "benefit : ".json_encode($benefit)."\n";
  // echo "end : ".$end."\n";
} else {
  // do nothing
}

<?php
$nowDate = time();
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $decs = $_POST['desc'];
  $type = $_POST['cat'];
  $desc = $_POST['desc'];
  $start = $_POST['start'];
  $end = $_POST['end'];
  $date = $_POST['date'];
  $loc = $_POST['loc'];
  $price = $_POST['price'];
  $benefit = json_encode($_POST['benefit']);

  $fileIMG = $_FILES['inputImg'];
  $fileIMGName = $_FILES['inputImg']['name'];
  $fileIMGType = $_FILES['inputImg']['type'];
  $fileIMGSize = $_FILES['inputImg']['size'];
  $fileIMGTempLoc = $_FILES['inputImg']['tmp_name'];

  $filePathLocal = "./assets/img/$nowDate-$name" . ".png";
  $saveLocal =  move_uploaded_file($fileIMGTempLoc, $filePathLocal);


  $query = "INSERT INTO `event_table`
    (`name`, `deskripsi`, `gambar`,
     `kategori`, `tanggal`, `mulai`,
      `berakhir`, `tempat`, `harga`, `benefit`) 
    VALUES ('$name','$desc','$filePathLocal',
    '$type','$date','$start','$end','$loc',$price,'$benefit')";

  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo '<br>';
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Menambahkan Event!</strong> <a href="home.php">Check data event disini</a> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  } else {
    echo '<br>';
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal Menambah Event! Karena ' . $mysqli_error($conn) . '</strong>
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

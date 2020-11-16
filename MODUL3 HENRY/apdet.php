<?php

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
    if (isset($_FILES(nama file anda )) {
        $fileIMG = $_FILES['inputImg'];
        $fileIMGName = $_FILES['inputImg']['name'];
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
        $filePath = "$fileIMGName.png";
        $saveLocal =  move_uploaded_file($fileIMGTempLoc, $filePath);
    } 

    $sql = mysqli_query($conn, $query);
    if ($sql) {
        echo 'Berhasil Update';
    } else {
        echo 'Gagal Update Karena' . $mysqli_error($conn);
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

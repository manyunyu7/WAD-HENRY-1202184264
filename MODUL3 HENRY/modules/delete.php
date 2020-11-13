<?php
include 'connect.php';
if (isset($_POST['deleteAgenda'])) {
    deleteAgenda($_POST['deleteAgenda'],$conn);
}
function deleteAgenda($id,$conn){
   
    $query = "DELETE FROM event_table where id=$id"; 
    $sql = mysqli_query($conn,$query);
    if ($sql) {
        echo '<br>';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Menghapus Event</strong> <a href="home.php">Kembali ke Home</a> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else {
        echo '<br>';
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal Menghapus Event dengan ID '.$id.' Karena '.mysqli_error($conn).'</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
}
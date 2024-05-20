<?php

require "koneksi.php";

if( isset($_GET['id']) ){

    $id = $_GET['id'];


    $sql = "DELETE FROM payment WHERE id= '$id' ";
    $query = mysqli_query($conn, $sql);

    if( $query ){
         echo "<script>
    alert('payment berhasil di hapus');
    window.history.back();
     </script>";
    } else {
        echo "<script>
    alert('payment gagal di hapus');
     </script>";
    }

} else {
    die("akses dilarang...");
}

?>
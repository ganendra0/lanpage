<?php

require "koneksi.php";

if( isset($_GET['id']) ){

    $id = $_GET['id'];

    $sql = "DELETE FROM event WHERE id= '$id' ";
    $query = mysqli_query($conn, $sql);

    if( $query ){
        echo "<script>
    alert('event berhasil di hapus');
    window.location.href = 'data-event.php';
     </script>";
    } else {
        echo "<script>
    alert('event gagal di hapus');
     </script>";
    }

} else {
    die("akses dilarang...");
}

?>
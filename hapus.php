<?php

require "koneksi.php";

if( isset($_GET['id']) ){

    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE id= '$id' ";
    $query = mysqli_query($conn, $sql);

    if( $query ){
        echo "<script>
    alert('user berhasil di hapus');
    window.location.href = 'data.php';
     </script>";
    } else {
        echo "<script>
    alert('user gagal di hapus');
     </script>";
    }

} else {
    die("akses dilarang...");
}

?>
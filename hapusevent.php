<?php

session_start(); // Start session if you are using session elsewhere in your project

require "koneksi.php";

if(!isset($_SESSION['admin']) && !isset($_SESSION['seller']) ) {
    header("location: landing-page.php");
    exit;
}

if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']); // Sanitize input

    // Execute delete query
    $sql = "DELETE FROM event WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        if ($_SESSION['admin']) {
            echo "<script>
            alert('Data berhasil diperbarui.');
            window.history.back();
          </script>";
            exit;
           }
           elseif ($_SESSION['seller']) {
            echo "<script>
            alert('Data berhasil diperbarui.');
            window.location.href = 'myevent.php';
          </script>";
            exit;
           }
    } else {
        echo "<script>
            alert('Event gagal dihapus');
            window.history.back();
        </script>";
    }

    mysqli_close($conn); // Close the database connection

} else {
    echo "<script>
        alert('Akses dilarang');
        window.location.href = 'index.php';
    </script>";
    exit;
}

?>

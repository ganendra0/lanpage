<?php
session_start();

require 'koneksi.php';

if (!$_SESSION['seller'] && !$_SESSION['admin']) {
  header("Location: event.php");
  exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idseller = $_SESSION['iduser'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi = $_POST['lokasi'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];
    $targetDir = "../landing/gambar/";

    if (move_uploaded_file($temp, $targetDir . $gambar)) {
        $query = "INSERT INTO event (id, idseller, nama, deskripsi, tanggal, lokasi, jam, gambar, harga) 
                  VALUES (NULL, '$idseller', '$nama', '$deskripsi', '$tanggal', '$lokasi', '$jam', '$gambar', '$harga')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>
                  alert('Data berhasil ditambahkan.');
                  window.location.href = 'event.php';
                  </script>";
        } else {
            echo "<script>
                  alert('Terjadi kesalahan. Data gagal ditambahkan.');
                  window.location.href = 'addevent.php';
                  </script>";
        }
    } else {
        echo "<script>
              alert('Gagal mengunggah file gambar.');
              window.location.href = 'addevent.php';
              </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event Baru</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Red+Rose:wght@300&display=swap');

    h2{
        display: flex;
        justify-content: center;
        color: aliceblue;
    }

    body {    
        background-color: rgb(34, 33, 35);
        font-family: 'Poppins', sans-serif;
        padding-top: 100px;
      }

      form {
        margin-left: 15%;
        width: 70%;
        color: aliceblue;
        padding-bottom: 60px;
      }

      label {
        display: block;
        margin-top: 20px;


      }
      
      input[type="text"],
      input[type="date"],
      textarea,
      input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
      }


      input[type="submit"] {
        width: 30%;
        padding: 10px;
        margin-top: 20px;
        background-color: rgb(218, 167, 40);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
          }

      input[type="submit"]:hover {
        opacity: 50%;
      }

    </style>
</head>
<body>
    <h2>Add new event</h2>

    <form method="post" action="" enctype="multipart/form-data">
        Nama Event: <input type="text" name="nama"><br><br>
        Deskripsi: <textarea name="deskripsi"></textarea><br><br>
        Lokasi: <input type="text" name="lokasi"><br><br>
        Tanggal: <input type="date" name="tanggal"><br><br>
        Jam: <input type="time" name="jam"><br><br>
        Gambar: <input type="file" name="gambar"><br><br>
        Harga (masukkan hanya angka): <input type="text" name="harga" ><br><br>
        <input type="submit" value="Add Event">
    </form>
</body>
</html>

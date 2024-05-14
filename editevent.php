<?php
session_start();

require 'koneksi.php';

// Pastikan pengguna sudah login sebagai seller atau admin
if (!$_SESSION['seller'] && !$_SESSION['admin']) {
  header("Location: event.php");
  exit;
}

// Ambil id event dari URL
$id_event = $_GET['id'];

// Ambil detail event dari database berdasarkan id
$query = "SELECT * FROM event WHERE id = $id_event";
$result = mysqli_query($conn, $query);
$event = mysqli_fetch_assoc($result);

// Proses form jika ada pengiriman data melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim melalui form
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi = $_POST['lokasi'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];
    $targetDir = "../landing/gambar/";

    // Jika pengguna mengunggah gambar baru, simpan gambar baru
    if (!empty($gambar)) {
        if (move_uploaded_file($temp, $targetDir . $gambar)) {
            $query = "UPDATE event SET nama='$nama', deskripsi='$deskripsi', lokasi='$lokasi', tanggal='$tanggal', jam='$jam', gambar='$gambar', harga='$harga' WHERE id=$id_event";
        } else {
            echo "<script>alert('Gagal mengunggah file gambar.')</script>";
            exit;
        }
    } else {
        // Jika tidak ada gambar yang diunggah, simpan detail event tanpa perubahan gambar
        $query = "UPDATE event SET nama='$nama', deskripsi='$deskripsi', lokasi='$lokasi', tanggal='$tanggal', jam='$jam', harga='$harga' WHERE id=$id_event";
    }

    // Eksekusi query update
    if (mysqli_query($conn, $query)) {
        echo "<script> alert('Data berhasil diperbarui.') </script>";
        header("Location: data-event.php");
        exit;
    } else {
        echo "<script>alert('Terjadi kesalahan. Data gagal diperbarui.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        h2 {
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
    <h2>Edit Event</h2>

    <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id_event" value="<?php echo $event['id']; ?>">
        Nama Event: <input type="text" name="nama" value="<?php echo $event['nama']; ?>"><br><br>
        Deskripsi: <textarea name="deskripsi"><?php echo $event['deskripsi']; ?></textarea><br><br>
        Lokasi: <input type="text" name="lokasi" value="<?php echo $event['lokasi']; ?>"><br><br>
        Tanggal: <input type="date" name="tanggal" value="<?php echo $event['tanggal']; ?>"><br><br>
        Jam: <input type="time" name="jam" value="<?php echo $event['jam']; ?>"><br><br>
        Gambar: <input type="file" name="gambar"><br><br>
        Harga (masukkan hanya angka): <input type="text" name="harga" value="<?php echo $event['harga']; ?>"><br><br>
        <input type="submit" value="Update Event">
    </form>
</body>
</html>

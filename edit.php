<?php

require "koneksi.php";

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // buat query update
    $sql = "UPDATE user SET name='$nama', email='$email', password='$password', level='$level' WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if($query) {
        // jika berhasil, alihkan ke halaman data.php atau halaman lain yang diinginkan
        header('Location: data.php');
        exit; // pastikan untuk keluar dari skrip setelah mengalihkan pengguna
    } else {
        // jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }
}

// ambil ID dari query string
$id = $_GET['id'];

// buat query untuk mengambil data pengguna berdasarkan ID
$sql = "SELECT * FROM user WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($query);

// jika data yang akan di-update tidak ditemukan, tampilkan pesan
if(mysqli_num_rows($query) < 1) {
    echo "Data tidak ditemukan...";
    exit; // keluar dari skrip jika data tidak ditemukan
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Red+Rose:wght@300&display=swap');
body{
    background-color: rgb(34, 33, 35);
}


body {
        font-family: Arial, sans-serif;
        padding-top: 100px;

      }

      h2{
        text-align: center;
        color: white;
      }

      form {
        width: 300px;
        color: aliceblue;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 15px;
        box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
        padding-bottom: 60px;
      }

      label {
        display: block;
        margin-top: 20px;
      }
      input[type="text"],
      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
      }

      input[type="checkbox"] {
        margin-top: 10px;
      }

      button[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background-color: rgb(218, 167, 40);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      button[type="submit"]:hover {
        opacity: 50%;
      }

.all{
    position: absolute;
    margin-left: 35%;
}
    </style>

</head>
<body>

<h2>Edit Data Pengguna</h2>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

    <label for="name">Nama:</label>
    <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" required>

    <label for="level">Level:</label>
    <select name="level">
        <option value="user" <?php if($user['level'] == 'user') echo 'selected'; ?>>User</option>
        <option value="admin" <?php if($user['level'] == 'admin') echo 'selected'; ?>>Admin</option>
    </select>

    <button type="submit" name="simpan">save changes</button>
</form>

</body>
</html>

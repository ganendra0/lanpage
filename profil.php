<?php
session_start();

require 'koneksi.php';

$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    header("Location: index.php");
    exit;
}

$cari = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' ");
$row = mysqli_fetch_assoc($cari);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: rgb(34, 33, 35);
            color: #fff;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .profil-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .profil-container ul li {
            font-size: 18px;
        }

        .profil-container a.kembali {
            display: inline-block;
            padding: 10px 20px;
            background-color: rgb(218, 167, 40); 
            color: black; 
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }

        .profil-container a.kembali:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="profil-container">
        <h1>User Profil</h1>
        <ul>
            <li>ID User: <?php echo $_SESSION['iduser'] ?></li>
            <li>Username: <?php echo $row['name'] ?></li>
            <li>Email: <?php echo $email ?></li>
            <li>Password: <?php echo $row['password'] ?></li>
            <li>Level: <?php echo $row['level'] ?></li>
        </ul>
        <a class="kembali" href="landing-page.php">Kembali</a>
    </div>
</body>
</html>

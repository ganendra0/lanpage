
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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Red+Rose:wght@300&display=swap');
body{
    background-color: rgb(34, 33, 35);
}


body {
        font-family: Arial, sans-serif;
        padding-top: 10px;
        padding-left: 10px;

      }

h1{
    color: #fff;
}

      

.all{
    position: absolute;
    margin-left: 35%;
}

ul li{
    color: #fff;
}

a.kembali {
    display: inline-block;
    padding: 10px 20px;
    background-color: rgb(218, 167, 40); 
    color: black; 
    text-decoration: none;
    border-radius: 5px;
}
    </style>
</head>
<body>
<h1>User Profil</h1>

<ul> 
    <li> id number : <?php $cari = mysqli_query($conn, "SELECT id FROM user WHERE email = '$email' ");

if (mysqli_num_rows($cari) > 0) {
    while ($row = mysqli_fetch_assoc($cari)) {
        echo $row["id"];
        if ($row["id"]=="") {
            echo "unknown";
        }
    }
} 

?></li>

    <li>name : <?php $cari = mysqli_query($conn, "SELECT name FROM user WHERE email = '$email' ");

if (mysqli_num_rows($cari) > 0) {
    while ($row = mysqli_fetch_assoc($cari)) {
        echo $row["name"];
        if ($row["name"]=="") {
            echo "unknown";
        }
    }
} 

?></li>
    <li> email : <?php $cari = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email' ");

if (mysqli_num_rows($cari) > 0) {
    while ($row = mysqli_fetch_assoc($cari)) {
        echo $row["email"];
        if ($row["email"]=="") {
            echo "unknown";
        }
    }
} 

?></li>
    <li>password : <?php $cari = mysqli_query($conn, "SELECT password FROM user WHERE email = '$email' ");

if (mysqli_num_rows($cari) > 0) {
    while ($row = mysqli_fetch_assoc($cari)) {
        echo $row["password"];
        if ($row["password"]=="") {
            echo "unknown";
        }
    }
} 

?></li>
    <li>level : <?php $cari = mysqli_query($conn, "SELECT level FROM user WHERE email = '$email' ");

if (mysqli_num_rows($cari) > 0) {
    while ($row = mysqli_fetch_assoc($cari)) {
        echo $row["level"];
        if ($row["level"]=="") {
            echo "unknown";
        }
    }
} 

?></li>
 
</ul>  

<a class = 'kembali' href="admin.php">Kembali</a>


</body>
</html>
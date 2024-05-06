<?php
session_start();


require 'koneksi.php';

if(!isset($_SESSION['admin']) ) {
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tabel</title>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

body{
    font-family: 'Poppins', sans-serif;
}

        .navbar {
    background-color: #333;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
    width: 100%;
}

.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    justify-content: space-between;
}


.navbar li {
    float: left;
}

.navbar a {
    display: block;
    color: rgb(218, 167, 40);
    text-align: center;
    padding: 20px 16px;
    text-decoration: none;}

.navbar p{
    color: #ddd;
    float: right;
    margin-right: 50px;
    margin-top: 20px;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}


        table {
            border-collapse: collapse;
            width: 100%; 
            margin-right: 30px;
            margin-top: 30px;
            margin-bottom: 30px;


        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            border-color: #000;
            background-color: #fff;
            color: #000;
            max-width: 100px;

            

        }
        th{
            background-color: rgb(128, 127, 128);

        }

        body {
            background-color: rgb(34, 33, 35);
            color: #fff;

        }

    

a.add-user, a.kembali {
    display: inline-block;
    padding: 10px 20px;
    background-color: rgb(218, 167, 40); 
    color: black; 
    text-decoration: none;
    border-radius: 5px;
}


a.edit {
    display: inline-block;
    padding: 5px 10px;
    background-color: rgb(0, 99, 212); 
    color: white; 
    text-decoration: none;
    border-radius: 3px;
}

a.hapus {
    display: inline-block;
    padding: 5px 10px;
    background-color: rgb(235, 71, 76); 
    color: white; 
    text-decoration: none;
    border-radius: 3px;
}


        
    </style>
</head>
<body>

<nav class="navbar">
        <ul>
            <li><a href="data.php">User</a></li>
            <li><a href="data-event.php">Event</a></li>
            <li><a href="data-payment.php">Payment</a></li>
            </ul>
        
        </nav>

<h1>Data Tabel User</h1>
<a href="addevent.php" class = "add-user">add event</a>


<h1><br>Data Tabel Event</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Seller</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Jam</th>
        <th>Harga</th>
    </tr>
    <?php

$query = "SELECT 
e.id,
u.name AS seller,
e.nama,
e.deskripsi,
e.tanggal,
e.lokasi,
e.jam,
e.harga
FROM 
event AS e
JOIN 
user AS u ON e.idseller = u.id
";
$result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["seller"] . "</td>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["deskripsi"] . "</td>";
            echo "<td>" . $row["tanggal"] . "</td>";
            echo "<td>" . $row["lokasi"] . "</td>";
            echo "<td>" . $row["jam"] . "</td>";
            echo "<td>" . $row["harga"] . "</td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada data yang ditemukan</td></tr>";
    }

  
    ?>
</table>



<a class = 'kembali' href="landing-page.php">Kembali</a>

</body>
</html>

<?php
mysqli_close($conn);
?>

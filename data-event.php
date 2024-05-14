<?php
session_start();


require 'koneksi.php';

if(!isset($_SESSION['admin']) ) {
    header("location: index.php");
    exit;
}

include 'nav.php';


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

.nav {
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
    display: flex;   
    justify-content: center;
    margin-top: 70px;

}

.nav ul {
        background-color: #333;
        border-radius: 30px;
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-between;
    }

.nav a {
    display: block;
    color: rgb(218, 167, 40);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.nav a:hover {
    text-decoration: underline;
    border-radius: 30px;
}

.event{
    background-color: #ffe;
    border-radius: 30px;
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
    margin-top: 70px;

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

<div class='nav'>
        <ul>
            <div class='user'><li><a href='data.php'>user</a></li></div>
            <div class='event'><li><a href='data-event.php'>event</a></li></div>
            <div class='payment'><li><a href='data-payment.php'>payment</a></li></div>
        </ul>     
    </div>

<h1>Data Tabel Event</h1>
<a href="addevent.php" class = "add-user">add event</a>



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
        <th>Operation</th>
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
            echo "<td>";
            echo "<a class='edit'href='editevent.php?id=".$row['id']."'>Edit</a> | ";
            echo "<a class='hapus'href='hapusevent.php?id=".$row['id']."'>Hapus</a>";
            echo "</td>";


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

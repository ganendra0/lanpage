<?php

session_start();

require "koneksi.php";

$id = $_GET['id'];
$iduser = $_SESSION['iduser'];

$sql = "SELECT * FROM event WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$event = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Detail</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        * {
            margin: 0;
            padding: 10px;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: rgb(34, 33, 35);
        }

        h1 {
            color: aliceblue;
        }

        .pesanan {
            font-family: 'Poppins', sans-serif;
            border-radius: 30px;
            padding: 10px;
            background-color: gray;
            margin-right: 60%;
            margin-top: 5%;
        }

        .pesanan img {
            height: 100px;
            width: 100px;
            object-fit: cover;
            border: solid black;
            border-radius: 10px;
            float: right;
            margin-top: 1%;
            padding: 0;
        }

        .bayar {
            font-family: 'Poppins', sans-serif;
            border-radius: 30px;
            padding: 10px;
            background-color: gray;
            margin-right: 60%;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        input[type="submit"] {
            display: flex;
            background-color: rgb(218, 167, 40);
            color: black;
            text-decoration: none;
            border-radius: 10px;
            margin-top: 40px;
            font-family: 'Poppins', sans-serif;
            width: 70px;
            padding: 5px 10px;
        }

        input[type="submit"]:hover {
            opacity: 50%;
        }

        .bayar select {
            margin-left: 10px;
            margin-top: 10px;
            border-radius: 10px;
        }

        a {
            padding: 5px 10px;
            background-color: rgb(218, 167, 40);
            color: black;
            text-decoration: none;
            border-radius: 10px;
            width: 100px;
            margin-top: 30px;
            margin-left: 10px;
        }

    </style>
</head>
<body>

<h1>Order Detail</h1>

<div class="pesanan">
    <img src="gambar/<?php echo $event['gambar'] ?>">
    <h3><?php echo $event['nama'] ?></h3>
    <p>masa berlaku : <br><?php echo $event['tanggal'] ?></p>
</div>

<div class="bayar">
    <p>Jumlah tiket : <br> 1</p>
    <p>Harga tiket : <br> <?php echo $event['harga'] ?></p>
    <p>tax : <br> 2.000</p>
    <p>total : <br>
        <?php
        $harga = $event['harga'];
        $total = $harga + 2000;
        echo $total;
        ?>
    </p>
    <p>Kode tiket: <br>
        <?php
        $konfirmasi = mysqli_query($conn, "SELECT * FROM payment WHERE idc = '$id' AND uid = '$iduser' AND status = 1");
        if (mysqli_num_rows($konfirmasi) > 0) {
            $uniks = mysqli_fetch_assoc($konfirmasi);
            echo $uniks['unik'];
        } else {
            echo "pembayaran belum di confirm";
        }
        ?>
    </p>
</div>

<a href="myticket.php">back</a>

</body>
</html>

<?php

session_start();


require "koneksi.php";

$id = $_GET['id'];

$sql = "SELECT * FROM event WHERE id = '$id' ";
$query = mysqli_query($conn, $sql);
$event = mysqli_fetch_assoc($query);

$iduser = $_SESSION['iduser'];

$myevent = $event['idseller'];



?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            margin: 0;
            padding: 10px;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1.5;
            background-color: rgb(34, 33, 35);
        }

        

        h1{
            text-align: center;
            color: aliceblue;
        }


        main {
            padding: 20px;
            color: aliceblue;
        }

        section {
            margin-bottom: 20px;
        }

        .deskripsi {
            display: flex;
            flex-direction: column;
        }

        .gambar {
            margin-right: 20px;
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .gambar img {
            width: auto;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 700px;
            max-height: 300px;
        }

        .deskripsi h2 {
            margin-bottom: 10px;
        }

        .deskripsi p {
            text-align: justify;
            margin-right: 200px;
        }

        .detail ul {
            list-style: none;
            padding: 0;
        }

        .detail ul li {
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        a{
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

        <h1><?php echo $event['nama'] ?></h1>
    <main>
        <section class="deskripsi">
            <div class="gambar">
                <img src="gambar/<?php echo $event['gambar'] ?>" alt="">
            </div>
            <h2>Deskripsi</h2>
            <p><?php echo $event['deskripsi'] ?></p>
            <?php

    if ($myevent != $iduser && !$_SESSION['seller']) {
        echo '<a href="pay.php?id=' . $event["id"] . '">buy ticket</a>';
    }
        ?>
            
        </section>
        <section class="detail">
            <h2>Detail</h2>
            <ul>
                <li>Lokasi : <?php echo $event['lokasi'] ?></li>
                <li>Tanggal : <?php echo $event['tanggal'] ?></li>
                <li>Jam : <?php echo $event['jam'] ?></li>
                <li>Seller : <?php echo $event['seller'] ?></li>
                <li>Harga tiket : <?php echo $event['harga'] ?></li>
            </ul>
        </section>
        <a href="event.php">back</a>
    </main>        

</body>
</html>

<?php

session_start();


require "koneksi.php";

if(!isset($_SESSION['admin']) && !isset($_SESSION['seller']) ) {
    header("location: landing-page.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM event WHERE id = '$id' ";
$query = mysqli_query($conn, $sql);
$event = mysqli_fetch_assoc($query);

$iduser = $_SESSION['iduser'];

$myevent = $event['idseller'];

$sellerQuery = "SELECT * FROM user WHERE id = '$myevent'";
$sellerResult = mysqli_query($conn, $sellerQuery);
$seller = mysqli_fetch_assoc($sellerResult);




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

        a.confirm{
            padding: 5px 10px;
            background-color: rgb(10, 136, 68); 
            color: black; 
            text-decoration: none;
            border-radius: 10px;   
            width: 100px;  
            margin-top: 30px;  
            margin-left: 10px;  
        }

        a.hapus{
            padding: 5px 10px;
            background-color: rgb(235, 71, 76); 
            color: black; 
            text-decoration: none;
            border-radius: 10px;   
            width: 100px;  
            margin-top: 30px;  
            margin-left: 10px;  
        }

        a.edit{
            padding: 5px 10px;
            background-color: rgb(0, 108, 210); 
            color: black; 
            text-decoration: none;
            border-radius: 10px;   
            width: 100px;  
            margin-top: 30px;  
            margin-left: 10px;  
        }

        a.back{
            padding: 5px 10px;
            background-color: rgb(218, 167, 40); 
            color: black; 
            text-decoration: none;
            border-radius: 10px;   
            width: 100px;  
            margin-top: 0px;  
            float: right; 
            width: 60px;
        }

        .total{
            padding: 20px;
            border: solid white 2px;
            width: 300px;
            margin-bottom: 100px;
            margin-top: 30px;
            border-radius: 10px;

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
                <li>Seller : <?php echo $seller['name'] ?></li>
                <li>Harga tiket : <?php echo number_format($event['harga']) ?></li>
            </ul>
        </section>

        
    <h1>Data</h1>

        <table>
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Payment</th>
            <th>Email User</th>
        </tr>
        <?php

$query = "SELECT p.id, e.nama AS nama_content, p.total, p.payment, p.uid, u.email 
FROM payment AS p
INNER JOIN event AS e ON e.id = p.idc 
INNER JOIN user AS u ON u.id = p.uid
WHERE p.idc = $id AND p.status = 1";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . number_format($row["total"]) . "</td>";
                echo "<td>" . $row["payment"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";               
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data yang ditemukan</td></tr>";
        }


        ?>
    </table>

    <?php

    $totalevent = mysqli_query($conn, "SELECT SUM(total) AS total_pay FROM payment WHERE idc = $id AND status = 1");
    if ($totalevent) {
        $total = mysqli_fetch_assoc($totalevent);
        if ($total['total_pay'] !== NULL) {
            $pay = number_format($total['total_pay']);
        }
        else {
            $pay = "belum ada pembayaran";
        }
        
    }
    
    ?>

    <div class="total">
        <h3>Total pendapatan : <?php echo $pay; ?></h3>

    </div>

    <a class='edit' href='editevent.php?id=<?php echo $id;?>'>Edit event</a>
    <a class='hapus' href='hapusevent.php?id=<?php echo $id;?>'>Hapus event</a>


        <a class="back" href="myevent.php">back</a>
    </main>        

</body>
</html>

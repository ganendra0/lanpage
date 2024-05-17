<?php

session_start();

require 'koneksi.php';

if(!isset($_SESSION['login']) ) {
    header("location: index.php");
    exit;
}


if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

if (!$_SESSION['seller'] && !$_SESSION['admin']) {
    header("Location: event.php");
    exit;
  }

$idseller = $_SESSION['iduser'];
$query = "SELECT * FROM event WHERE idseller = '$idseller' ";
$result = mysqli_query($conn, $query);

include "nav.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suku</title>
    
    <style>


@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap');
body{
    background-color: rgb(34, 33, 35);
}

*{
    margin-left: 0;
    margin-top: 0;
    margin-right: 0;

}


.nav {
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
    display: flex;   
    justify-content: center;
    margin-top: 50px;
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

.mydata{
    background-color: #ffe;
    border-radius: 30px;
}



h1{
    color: white;
    font-family: 'Poppins', sans-serif;
    margin-left: 30px;
    margin-top: 55px;
    margin-bottom: 115px;


}

.card{
    border: solid gray;
    border-radius: 30px;
    background-color: gray;
    padding-left: 30px;    
    margin-right: 80px;
    margin-left: 30px;
    margin-top: 30px;
    position: relative;
    padding-top: 25px;
    padding-bottom: 50px;
    font-family: 'Poppins', sans-serif;
    position: relative;

}

.card img{
    height: 180px;
    width: 180px;
    position: relative;
    float: left;
    margin-top:20px;
    margin-right: 40px;
    object-fit: cover;
    margin-left: auto;
    border-radius: 20px;
}

.card a{
    display: inline-block;
    padding: 5px 10px;
    background-color: rgb(218, 167, 40); 
    color: black; 
    text-decoration: none;
    border-radius: 10px;
}

.card h2{
    padding-top: 30px;

}

.card p{
    margin-right: 60%;
    padding: 10px;

}
.add a{
    display: inline-block;
    padding: 5px 10px;
    background-color: rgb(218, 167, 40); 
    color: black; 
    text-decoration: none;
    border-radius: 10px;
    margin-left: 1050px;
    font-family: 'Poppins', sans-serif;

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

        .total{
            padding: 20px;
            border: solid white 2px;
            width: 300px;
            margin-bottom: 100px;
            margin-top: 30px;
            border-radius: 10px;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .isi{
            margin: 50px;
        }

    </style>
</head>
<body>



<?php
if ($_SESSION['seller']) {
    echo "<div class='nav'>
        <ul>
            <div class='event'><li><a href='event.php'>All event</a></li></div>
            <div class='myevent'><li><a href='myevent.php'>My event</a></li></div>
            <div class='mydata'><li><a href='mydata.php'>My data</a></li></div>
        </ul>     
    </div>";
}

elseif ($_SESSION['admin']) {
    echo "<div class='nav'>
        <ul>
            <div class='event'><li><a href='event.php'>All event</a></li></div>
            <div class='myticket'><li><a href='myticket.php'>My ticket</a></li></div>
            <div class='myevent'><li><a href='myevent.php'>My event</a></li></div>
        </ul>     
    </div>";
}

else{
    echo "<div class='navbarr'>
        <ul>
            <div class='event'><li><a href='event.php'>All event</a></li></div>
            <div class='myevent'><li><a href='myticket.php'>My ticket</a></li></div>
        </ul>     
    </div>";
}
?>

<div class="isi">

   <h1>unconfirmed</h1>

   <table>
    <tr>
        <th>ID</th>
        <th>Total</th>
        <th>Payment</th>
        <th>Email User</th>
        <th>Operation</th>
    </tr>
    <?php

    $iduser = $_SESSION['iduser'];

    $qidc = "SELECT id FROM event WHERE idseller = $iduser";
    $idevent = mysqli_query($conn, $qidc);

    if (mysqli_num_rows($idevent) > 0) {
        // Buat array untuk menyimpan ID acara
        $event_ids = [];
        while ($row = mysqli_fetch_assoc($idevent)) {
            $event_ids[] = $row['id'];
        }

        // Convert array of IDs to a comma-separated string
        $event_ids_result = implode(',', $event_ids);

        // Query pembayaran
        $query = "SELECT p.id, e.nama AS nama_content, p.total, p.payment, p.uid, u.email 
                  FROM payment AS p
                  INNER JOIN event AS e ON e.id = p.idc 
                  INNER JOIN user AS u ON u.id = p.uid
                  WHERE p.idc IN ($event_ids_result) AND p.status = 0";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . number_format($row["total"]) . "</td>";
                echo "<td>" . $row["payment"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>";
                echo "<a class='confirm' href='confirm.php?id=" . $row['id'] . "'>confirm</a> | ";
                echo "<a class='hapus' href='hapuspayment.php?id=" . $row['id'] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data yang ditemukan</td></tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Penjual ini tidak memiliki acara.</td></tr>";
    }

    ?>
</table>

<h1>Data</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Total</th>
        <th>Payment</th>
        <th>Email User</th>
        <th>Operation</th>
    </tr>
    <?php

    $iduser = $_SESSION['iduser'];

    $qidc = "SELECT id FROM event WHERE idseller = $iduser";
    $idevent = mysqli_query($conn, $qidc);

    if (mysqli_num_rows($idevent) > 0) {
        // Buat array untuk menyimpan ID acara
        $event_ids = [];
        while ($row = mysqli_fetch_assoc($idevent)) {
            $event_ids[] = $row['id'];
        }

        // Convert array of IDs to a comma-separated string
        $event_ids_result = implode(',', $event_ids);

        // Query pembayaran
        $query = "SELECT p.id, e.nama AS nama_content, p.total, p.payment, p.uid, u.email 
                  FROM payment AS p
                  INNER JOIN event AS e ON e.id = p.idc 
                  INNER JOIN user AS u ON u.id = p.uid
                  WHERE p.idc IN ($event_ids_result) AND p.status = 1";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . number_format($row["total"]) . "</td>";
                echo "<td>" . $row["payment"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>";
                echo "<a class='hapus' href='hapuspayment.php?id=" . $row['id'] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data yang ditemukan</td></tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Penjual ini tidak memiliki acara.</td></tr>";
    }

    ?>
</table>

<?php

// Inisialisasi variabel total
$pay = "belum ada pembayaran";

$iduser = $_SESSION['iduser'];
$qidc = "SELECT id FROM event WHERE idseller = $iduser";
$idevent = mysqli_query($conn, $qidc);

if (mysqli_num_rows($idevent) > 0) {
    // Buat array untuk menyimpan ID acara
    $event_ids = [];
    while ($row = mysqli_fetch_assoc($idevent)) {
        $event_ids[] = $row['id'];
    }

    // Convert array of IDs to a comma-separated string
    $event_ids_result = implode(',', $event_ids);

    // Query total pendapatan
    $totalevent = mysqli_query($conn, "SELECT SUM(total) AS total_pay FROM payment WHERE idc IN ($event_ids_result) AND status = 1");

    if ($totalevent) {
        $total = mysqli_fetch_assoc($totalevent);
        if ($total['total_pay'] !== NULL) {
            $pay = number_format($total['total_pay']);
        }
    }
}
?>

<div class="total">
    <h3>Total pendapatan : <?php echo $pay; ?></h3>
</div>


</div>


    


    

    




  
</body>
</html>
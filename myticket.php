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

if (isset($_SESSION['seller'])) {
    header("Location: index.php");
    exit;
}



$id = $_GET['id'];
$uid = $_SESSION['iduser'];


$query = "SELECT * FROM payment WHERE uid = '$uid'";
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

.navbarr {
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
    display: flex;   
    justify-content: center;
    margin-top: 50px;

}

.navbarr ul {
        background-color: #333;
        border-radius: 30px;
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-between;
    }

.navbarr a {
    display: block;
    color: rgb(218, 167, 40);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbarr a:hover {
    text-decoration: underline;
    border-radius: 30px;
}


.myticket{
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
    margin-bottom: 30px;
    margin-top: 30px;
    position: relative;
    padding-top: 25px;
    padding-bottom: 50px;
    font-family: 'Poppins', sans-serif;

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



    </style>
</head>
<body>





<?php 
if ($_SESSION['seller']) {
    echo "<div class='navs'>
        <ul>
            <div class='event'><li><a href='event.php'>All event</a></li></div>
            <div class='myevent'><li><a href='myevent.php'>My event</a></li></div>
        </ul>     
    </div>";
}

elseif ($_SESSION['admin']) {
    echo "<div class='nav'>
        <ul>
            <div class='event'><li><a href='event.php'>All event</a></li></div>
            <div class='myticket'><li><a href='myticket.php'>My ticket</a></li></div>
            <div class='myevent'><li><a href='myevent.php'>My event</a></li></div>
            <div class='mydata'><li><a href='mydata.php'>My data</a></li></div>
        </ul>     
    </div>";
}

else{
    echo "<div class='navbarr'>
        <ul>
            <div class='event'><li><a href='event.php'>All event</a></li></div>
            <div class='myticket'><li><a href='myticket.php'>My ticket</a></li></div>
        </ul>     
    </div>";
}
?>

   <h1>EVENT KEBUDAYAAN</h1>

   
   <?php
while ($baris = mysqli_fetch_assoc($result)) {
    $idc = $baris['idc'];
    $sql = "SELECT * FROM event WHERE id = '$idc'";
    $event_result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($event_result)) {
        echo '<div class="card">';
        echo '<img src="gambar/' . $row['gambar'] . '">';
        echo '<h2>' . $row['nama'] . '</h2>';
        echo '<hr size="3px" width="70%" align="left" color="black">';
        echo '<p>Location: ' . $row['lokasi'] . '</p>';
        echo '<p>Date: ' . $row['tanggal'] . '</p>';
        echo "<a class='detail' href='deticket.php?id=".$idc."'>detail ticket</a>";
        echo '</div>';
    }
}

mysqli_free_result($result);
mysqli_close($conn);
?>



  
</body>
</html>
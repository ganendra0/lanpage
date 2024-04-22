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

if (!$_SESSION['seller']) {
    header("Location: event.php");
    exit;
  }

$email = $_SESSION['email'];

$query = "SELECT * FROM event WHERE seller = '$email' ";
$result = mysqli_query($conn, $query);

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

.navbar {
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
    display: flex;   
    justify-content: center;
}

.navbar ul {
        background-color: #333;
        border-radius: 30px;
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-between;
    }

.navbar a {
    display: block;
    color: rgb(218, 167, 40);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar a:hover {
    text-decoration: underline;
    border-radius: 30px;
}

.myevent{
    background-color: #ffe;
    border-radius: 30px;
}



h1{
    color: white;
    font-family: 'Poppins', sans-serif;
    margin-left: 30px;
    margin-top: 55px;
    margin-bottom: 50px;


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
    padding-top: 15px;
    padding-bottom: 30px;
    font-family: 'Poppins', sans-serif;

}

.card img{
    height: 180px;
    width: 180px;
    position: relative;
    float: left;
    margin-top: 20px;
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

.card p{
    margin-right: 60%;

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

.back a{
    display:flex;
    padding: 5px 10px;
    background-color: rgb(218, 167, 40); 
    color: black; 
    text-decoration: none;
    border-radius: 10px;
    margin-top: 40px;      
    margin-left: 30px;  
    font-family: 'Poppins', sans-serif;
    width: 70px;
}


    </style>
</head>
<body>

<div class='back'> 
 <a href="landing-page.php">kembali</a>
</div>


<nav class="navbar">
        <ul>
            <div class='event'><li><a href="event.php">All event</a></li></div>
            <div class='myevent'><li><a href="myevent.php">My event</a></li></div>
        </ul>     
    </nav>

   <h1>EVENT KEBUDAYAAN</h1>

   <div class="add">
    <?php 
    if ($_SESSION['seller']) {
        echo "<a href='addevent.php'>add event</a>";
    }
    ?>
   </div>

   <?php
// Loop melalui setiap baris hasil query
while ($row = mysqli_fetch_assoc($result)) {
    // Tampilkan data event di dalam div dengan class "card"
    echo '<div class="card">';
    echo '<img src="gambar/' . $row['gambar'] . '">';
    echo '<h2>' . $row['nama'] . '</h2>'; // Nama event
    echo '<hr size="3px" width="70%" align="left" color="black">';
    echo '<p>Location: ' . $row['lokasi'] . '</p>'; // Lokasi event
    echo '<p>Date: ' . $row['tanggal'] . '</p>'; // Tanggal event
    echo "<a class='detail'href='desc.php?id=".$row['id']."'>view detail</a>";
    echo '</div>';
}

// Bebaskan hasil query
mysqli_free_result($result);

// Tutup koneksi database
mysqli_close($conn);
?>



  
</body>
</html>
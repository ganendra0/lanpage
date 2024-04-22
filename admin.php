<?php

session_start();

require 'koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}


// Periksa apakah pengguna sudah login (email tersimpan di sesi)
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    // Redirect ke halaman login jika pengguna belum login
    header("Location: index.php");
    exit;
}



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
    background-color: #333;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}

.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}


.navbar li {
    float: left;
}

.navbar a {
    display: block;
    color: rgb(218, 167, 40);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar p{
    color: #ddd;
    float: right;
    margin-right: 50px;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;
  border: none;
  outline: none;
  color: rgb(218, 167, 40);
  padding: 14px 16px;
  background-color: inherit;
  font-family: 'Poppins', sans-serif;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #333;
  color: rgb(218, 167, 40);
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;

}

.dropdown-content a {
  float: none;
  color: rgb(218, 167, 40);
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
  
}

.dropdown:hover .dropbtn {
    background-color: #ddd;
    color: black;
}

.username h2 {
    color: beige;
}


.head{
    height: 500px;
    width: 1250px;
   margin-left: 30px;
   margin-top: 20px;
}

.head img{
width: 98%;
height: 400px;
object-fit: cover;
object-position: 10% 40%;
border-radius:30px;  
align-content: center;
 position: relative;
 z-index: -1;
}

.tr h1{
    font-family: 'Cinzel', serif;
    text-align: center;
   position: absolute;
   padding-left: 17%;
   padding-right: 15%;
   padding-top: 130px;
   color: aliceblue;
   font-size: 50px;
}

.txt img{
    width: 530px;
    height: 180px;
    float: right;
    margin-bottom: 200px;
    position: relative;
    margin-top: 100px;
    margin-right: 50px;
}

.txt{
    display: flex;
}

.txt p{
    padding-left: 50px;
    padding-right: 100px;
    padding-top: 30px;
    font-size: larger;
    font-family: 'Poppins', sans-serif;
    color: white;
    font-size: 15px;
    position: relative;
    text-align: justify;
}

.event a{
    padding: 5px 10px;
    background-color: rgb(218, 167, 40); 
    color: black; 
    text-decoration: none;
    border-radius: 10px;
    margin-left: 50px;
    font-family: 'Poppins', sans-serif;
}

.suku{
    padding-left: 80px;
    padding-top: 50px;
    font-family: 'Poppins', sans-serif;
    color: rgb(218, 167, 40);
    font-size: 20px;
}

section{
    display: flex;
    margin-bottom:100px;
    margin-top: 0px;    
}

.jawa{
    width: 190px;
    height: 350px; 
    background: black; 
    margin-left: 50px;
    margin-top: 30px;
    margin-bottom: 50px;
    border-radius: 20px;
    position: relative;
    z-index: -2;
}



.jawa img{
    object-fit: cover;
    height: 350px;
    width: 190px;
    border-radius: 20px;
    position: relative;
    z-index: -1;
    opacity: 0.40;
    
}

.jawa h2{
    color: aliceblue;
    text-align: center;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    position: absolute;
    margin-left: 55px;
}


.sunda{
    width: 190px;
    height: 350px; 
    background: black; 
    margin-left: 50px;
    margin-top: 30px;
    margin-bottom: 50px;
    border-radius: 20px;
    position: relative;
    z-index: -2;
}



.sunda img{
    object-fit: cover;
    height: 350px;
    width: 190px;
    border-radius: 20px;
    position: relative;
    z-index: -1;
    opacity: 0.40;
}

.sunda h2{
    color: aliceblue;
    text-align: center;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    position: absolute;
    margin-left: 55px;
}

.betawi{
    width: 190px;
    height: 350px; 
    background: black; 
    margin-left: 50px;
    margin-top: 30px;
    margin-bottom: 50px;
    border-radius: 20px;
    position: relative;
    z-index: -2;
}

.betawi img{
    object-fit: cover;
    height: 350px;
    width: 190px;
    border-radius: 20px;
    position: relative;
    z-index: -1;
    opacity: 0.40;
}

.betawi h2{
    color: aliceblue;
    text-align: center;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    position: absolute;
    margin-left: 55px;
}

.madura{
    width: 190px;
    height: 350px; 
    background: black; 
    margin-left: 50px;
    margin-top: 30px;
    margin-bottom: 50px;
    border-radius: 20px;
    position: relative;
    z-index: -2;
}

.madura img{
    object-fit: cover;
    height: 350px;
    width: 190px;
    border-radius: 20px;
    position: relative;
    z-index: -1;
    opacity: 0.40;
}

.madura h2{
    color: aliceblue;
    text-align: center;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    position: absolute;
    margin-left: 55px;
}

.baduy{
    width: 190px;
    height: 350px; 
    background: black; 
    margin-left: 50px;
    margin-top: 30px;
    margin-bottom: 50px;
    border-radius: 20px;
    position: relative;
    z-index: -2;
}

.baduy img{
    object-fit: cover;
    height: 350px;
    width: 190px;
    border-radius: 20px;
    position: relative;
    z-index: -1;
    opacity: 0.40;
}

.baduy h2{
    color: aliceblue;
    text-align: center;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    position: absolute;
    margin-left: 55px;
}

.jawa:hover,
.sunda:hover,
.betawi:hover,
.madura:hover,
.baduy:hover {
  transform: scale(1.1); 
  opacity: 1; 
  z-index: 1; 
}

.jawa,
.sunda,
.betawi,
.madura,
.baduy {
  transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out, z-index 0.3s ease-in-out;
}

.jawa,
.sunda,
.betawi,
.madura,
.baduy {
  opacity: 0.40;
  z-index: 0; 
}


    </style>
</head>
<body>

    <nav class="navbar">
        <ul>
            <li class="dropdown">
  <a href="javascript:void(0)" class="dropbtn">Services</a>
  <ul class="dropdown-content">
    <li><a href="#">Profil</a></li>
    <li><a href="logout.php">Log-out </a></li>
 </ul>

            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="data.php">Data</a></li>

            
          <p>Halo,  <?php $cari = mysqli_query($conn, "SELECT name FROM user WHERE email = '$email' ");

if (mysqli_num_rows($cari) > 0) {
    while ($row = mysqli_fetch_assoc($cari)) {
        echo $row["name"];
    }
} else {
    echo "unknown";
}


?>
</p>

        </ul>
        
    </nav>

    <div class="tr">
         <h1>Keragaman Suku di Pulau Jawa</h1>
    </div>

    <div class="head">
        <img src="gng.jpg">
    </div>


    <div class="txt">
        <p> Pulau Jawa merupakan rumah bagi beragam suku yang kaya akan keberagaman budaya. Setiap
            suku memiliki warisan budaya yang unik, termasuk bahasa, adat istiadat, seni tradisional, dan
            kepercayaan yang melekat dalam kehidupan sehari-hari. Melalui perpaduan harmonis antara
            berbagai suku, Pulau Jawa menjadi tempat di mana keberagaman menjadi kekuatan utama dalam
            membentuk identitas budaya yang kaya dan berwarna.<br><br>Suku-suku yang mendiami Pulau Jawa menghidupi keberagaman budaya melalui tradisi, bahasa, seni, dan nilai-nilai yang menjadi warisan turun-temurun, memperkaya kehidupan sehari-hari serta memberikan warna yang khas dalam panorama budaya Indonesia. <br><br> Berikut adalah beberapa suku yang ada di pulau Jawa  
            </p>

            
        <img src="peta.png">

    

    </div>

           <div class='event'>
            <a href="event.php">event</a>
        </div>


    <div class="suku">
        <h2>Suku di Pulau Jawa</h2>
    </div>

  

    <section id="sukku">
        <div class="aj">
        <a href="sukujawa.php">
            <div class="jawa">
            <h2>Jawa</h2>
            <img src="jawa.jpeg">
        </div></a></div>

        <div class="as">
            <a href="sukusunda.php"><div class="sunda">
            <h2>Sunda</h2>
            <img src="sundaa.jpeg">
        </div></a></div>

    <div class="ab">
        <a href="sukubetawi.php">
            <div class="betawi">
            <h2>Betawi</h2>
            <img src="betawi.webp">
        </div>
    </a></div>
        
    <div class="am">
        <a href="sukumadura.php">
            <div class="madura">
            <h2>Madura</h2>
            <img src="madura.jpeg">
        </div></a></div>

        <div class="aba">
        <a href="sukubaduy.php">
            <div class="baduy">
            <h2>Baduy</h2>
            <img src="baduy.webp">
        </div></a></div>

    </section>

    
</body>
</html>
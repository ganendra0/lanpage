<?php

session_start();

require 'koneksi.php';

if(!isset($_SESSION['login']) ) {
    header("location: index.php");
    exit;
}


if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    header("Location: index.php");
    exit;
}

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

*{
    margin: 0px;
    padding: 0px;
}

body{
    background-color: rgb(34, 33, 35);
}




.username h2 {
    color: beige;
}


.head{
    height: 500px;
    width: 98%;
   margin-left: 30px;
   margin-top: 20px;
}

.head img{
width: 96%;
height: 400px;
object-fit: cover;
object-position: 10% 40%;
border-radius:30px;  
align-content: center;
 position: relative;
 z-index: -1;
}

.tr{
    position: absolute;
    padding-top: 130px;
    color: aliceblue;
    text-align: center;
    width: 100%; 
}

.tr h1{
    font-family: 'Cinzel', serif;
    font-size: 50px;

}

.tr h2{
    font-family: 'Cinzel', serif;
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

.tr a {
    display: block;
    padding: 5px 10px;
    background-color: rgb(218, 167, 40);
    color: black;
    text-decoration: none;
    border-radius: 10px;
    margin-left: auto; 
    margin-right: auto; 
    width: fit-content; 
    font-family: 'Poppins', sans-serif;
    margin-top: 3%;
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

footer {
    background: #111;
    color: #fff;
    padding: 20px;
    font-family: 'Poppins', sans-serif;

}

.a {
    width: 500px;
}

.b {
    width: 500px;
}

.foot{
    gap: 150px;
}

.footer-bottom{
    text-align: center;
}



    </style>
</head>
<body>

    

    <div class="tr">
        <h1>Halo,  
            <?php 
            $cari = mysqli_query($conn, "SELECT name FROM user WHERE email = '$email' ");

            if (mysqli_num_rows($cari) > 0) {
                while ($row = mysqli_fetch_assoc($cari)) {
                    echo $row["name"] ? $row["name"] : "unknown"; // Menggunakan operator ternary
                }
            } 
            ?>
        </h1>
         <h1>Mau nonton pertunjukan budaya?</h1>
            <a href="event.php">explore event</a>
    </div>

    <div class="head">
        <img src="gng.jpg">
    </div>

   


    <div class="txt">
        <p> Pulau Jawa merupakan rumah bagi beragam suku yang kaya akan keberagaman budaya. Setiap
            suku memiliki warisan budaya yang unik, termasuk bahasa, adat istiadat, seni tradisional, dan
            kepercayaan yang melekat dalam kehidupan sehari-hari. Melalui perpaduan harmonis antara
            berbagai suku, Pulau Jawa menjadi tempat di mana keberagaman menjadi kekuatan utama dalam
            membentuk identitas budaya yang kaya dan berwarna.<br><br>Temukan pengalaman yang mendalam dan beragam dengan menjelajahi berbagai acara budaya dari berbagai sudut Pulau Jawa dan sekitarnya. Mari kita jalin kembali hubungan dengan warisan nenek moyang kita melalui perjalanan budaya yang tak terlupakan. Segera temukan dan ikuti acara-acara inspiratif kami, dan hadirilah untuk merayakan keberagaman budaya yang membanggakan Indonesia.            </p>

            
        <img src="peta.png">
    

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

    <footer>
    <div class="mfooter">
        <section class="foot">
            <div class="a">
                <h3>about</h3>
                <p>Prof. Dr.-Ing. Ir. H. Bacharuddin Jusuf Habibie, FREng.[1] (25 Juni 1936 – 11 September 2019)[2][a] adalah Presiden Republik Indonesia yang ketiga. Sebelumnya, B.J. Habibie menjabat sebagai Wakil Presiden Republik Indonesia ke-7, menggantikan Try Sutrisno. B. J. Habibie menggantikan Soeharto yang mengundurkan diri dari jabatan presiden pada tanggal 21 Mei 1998.[3][4] Sebelum memasuki dunia politik, Habibie dikenal luas sebagai seorang profesor dan ilmuwan dalam teknologi aviasi internasional dan satu-satunya presiden Indonesia hingga saat ini yang berlatarbelakang teknokrat.

            </div>

            <div class="b">
                <h3>about</h3>
                <p>Prof. Dr.-Ing. Ir. H. Bacharuddin Jusuf Habibie, FREng.[1] (25 Juni 1936 – 11 September 2019)[2][a] adalah Presiden Republik Indonesia yang ketiga. Sebelumnya, B.J. Habibie menjabat sebagai Wakil Presiden Republik Indonesia ke-7, menggantikan Try Sutrisno. B. J. Habibie menggantikan Soeharto yang mengundurkan diri dari jabatan presiden pada tanggal 21 Mei 1998.[3][4] Sebelum memasuki dunia politik, Habibie dikenal luas sebagai seorang profesor dan ilmuwan dalam teknologi aviasi internasional dan satu-satunya presiden Indonesia hingga saat ini yang berlatarbelakang teknokrat.

            </div>
        </section>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Nama Situs Web Anda. All Rights Reserved.</p>
    </div>
</footer>


    
</body>
</html>
<?php 

session_start();

if(!isset($_SESSION['login']) ) {
    header("location: index.php");
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
@import url('https://fonts.googleapis.com/css2?family=Red+Rose:wght@300&display=swap');
body{
    background-color: rgb(34, 33, 35);
}


.head{
    height: 500px;
    width: 100%;
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
    position: absolute;
    padding-top: 130px;
    color: aliceblue;
    font-size: 50px;
    text-align: center;
    width: 100%; 
}

.judul{
    margin-left: 70px;
    color: rgb(218, 167, 40);
    font-family: 'Red Rose', serif;
    font-size: 40px;
}
   .para p{
    color: white;
    margin-left: 50px;
    margin-right: 200px;
    font-family: 'Poppins', sans-serif;
    text-align: justify;
   } 
   .para img{
    float: right;
    border-radius: 20px;
    margin-bottom: 200px;
    margin-right: 50px;
    margin-top: 100px;
   }
   .para{
    display: flex;
   }

   .back a{
    background-color: rgb(218, 167, 40);
    color: rgb(34, 33, 35);
    border-radius: 5px;
   font-family: 'Poppins', sans-serif;
    padding-left: 5px;
    padding-right: 5px;
    padding-top: 5px;
    padding-bottom: 5px;
    text-decoration: none;
    cursor: pointer;
   }

   .back a:hover{
    opacity: 0.45;
   }


   .back{
     margin-left: 500px;
    margin-right: 500px;
    margin-bottom: 100px;
   }
    
    </style>
</head>
<body>
    <div class="tr">
        <h1>Keragaman Suku di Pulau Jawa</h1>
   </div>

   <div class="head">
       <img src="gng.jpg">
   </div>

   <div class="judul">
    <p>Suku Sunda</p>
   </div>

   <div class="para">
    <p>Suku Sunda, dengan keberadaannya di wilayah Jawa Barat, menampilkan serangkaian ciri khas yang menarik dan unik dalam budaya Indonesia. Salah satu ciri paling mencolok adalah kesenian tradisional yang kaya, seperti tarian Jaipong yang enerjik dan alunan musik khas Sunda seperti gamelan Degung. Selain itu, kekayaan seni batik Sunda dengan motif-motif alam yang indah dan khas juga menjadi bagian tak terpisahkan dari identitas Sunda. Bahasa Sunda yang khas dengan aksara pegonnya juga menjadi ciri identitas yang kuat bagi suku ini. Suku Sunda juga dikenal akan keramahan dan kehangatan dalam berkomunikasi, serta menjunjung tinggi nilai-nilai kekeluargaan dan gotong royong. Kepercayaan pada kearifan lokal, seperti dalam upacara adat, seperti Seren Taun atau sesajen, juga menjadi bagian integral dari kehidupan sehari-hari masyarakat Sunda. Keberagaman kuliner dengan hidangan seperti nasi timbel, sambal, dan makanan tradisional lainnya juga menunjukkan kekayaan budaya suku Sunda. Dengan keunikan-keunikan ini, suku Sunda memperkaya dan memperindah keanekaragaman budaya Indonesia.</p>
    <img src="snd.jpeg" width="400px" height="200px">
</div>


   <div class="gmbr">
   
   </div>

   <div class="back">
    <a href="landing-page.php">Kembali ke halaman awal</a>
   </div>


    
</body>
</html>
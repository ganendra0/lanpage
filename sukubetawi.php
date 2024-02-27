
<?php 

session_start();

if(!isset($_SESSION['login']) ) {
    header("location: index.php");
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
@import url('https://fonts.googleapis.com/css2?family=Red+Rose:wght@300&display=swap');
body{
    background-color: rgb(34, 33, 35);
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
   padding-left: 15%;
   padding-right: 15%;
   padding-top: 130px;
   color: aliceblue;
   font-size: 50px;
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

   a{
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

   a:hover{
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
    <p>Suku Betawi</p>
   </div>

   <div class="para">
    <p>Suku Betawi, yang berasal dari Jakarta dan sekitarnya, memiliki ciri khas yang membedakannya dari kelompok etnis lain di Indonesia. Salah satu ciri paling mencolok adalah keberagaman budaya yang mencerminkan perpaduan antara berbagai elemen tradisional dan pengaruh dari berbagai suku yang tinggal di wilayah tersebut. Seni tari dan musik Betawi, seperti tarian Topeng Betawi dan gambang kromong, memperlihatkan kekayaan seni yang unik. Bahasa Betawi yang merupakan perpaduan bahasa Melayu dengan unsur-unsur lokal Jakarta juga menjadi ciri khas dalam komunikasi sehari-hari masyarakat Betawi. Kuliner Betawi, dengan hidangan seperti kerak telor, soto Betawi, dan dodol, juga menunjukkan identitas kulinernya yang khas. Keberagaman budaya ini tercermin dalam tradisi pernikahan, upacara adat, dan festivitas yang dirayakan oleh masyarakat Betawi, seperti perayaan Ondel-ondel. Suku Betawi juga terkenal dengan keramahan dan semangat kekeluargaan yang kuat, menciptakan atmosfer hangat dan ramah di tengah kesibukan kota metropolitan. Dengan ciri khasnya yang unik, suku Betawi menjadi bagian penting dari keberagaman budaya Indonesia.</p>
    <img src="skbtw.webp" width="400px" height="200px">
</div>


   <div class="gmbr">
   
   </div>

   <div class="back">
    <a href="landing-page.php">Kembali ke halaman awal</a>
   </div>


    
</body>
</html>
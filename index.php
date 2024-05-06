<?php
 session_start();

 if(isset($_SESSION['login']) ) {
     header("location: landing-page.php");
     exit;
 }
 require 'koneksi.php';
 
 if(isset($_POST['login'])){
     $email = $_POST['email'];
     $password = $_POST['password'];
 
     $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' " );
 
     if(mysqli_num_rows($result) === 1 ){
         $row = mysqli_fetch_assoc($result);
         if ($password == $row["password"]) {
             $_SESSION['login'] = true;
             $_SESSION['email'] = $email;
             $_SESSION['iduser'] = $row['id']; 

             $level = $row['level'];
             if ($level == 'admin') {
                 $_SESSION['admin'] = true;
             } elseif ($level == 'seller') {
                 $_SESSION['seller'] = true;
             } 
             header("location: landing-page.php");
             exit;
         } else {
             echo "<script>
             alert('Password salah');
             </script>";
         }
     } else {
         echo "<script>
         alert('Email belum terdaftar');
         </script>";
     }
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


body {
        font-family: Arial, sans-serif;
        background-color: rgb(34, 33, 35);
        margin-top: 100px;
      }

      form {
        width: 300px;
        color: aliceblue;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 15px;
        box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
        padding-bottom: 60px;
      }

      label {
        display: block;
        margin-top: 20px;
      }

      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
      }

      input[type="checkbox"] {
        margin-top: 10px;
      }

      button[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background-color: rgb(218, 167, 40);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      input[type="submit"]:hover {
        opacity: 50%;
      }

      .forgot-password {
        margin-top: 10px;
        color: #ddd;
        text-align: center;
      }


      .register-link {
        margin-top: 10px;
        color: #ddd;
        text-align: center;
      }

      .register-link a {
        color: rgb(218, 167, 40);
        text-decoration: none;
      }

      .register-link a:hover {
        text-decoration: underline;
      }

  

.all{
    position: absolute;
    margin-left: 35%;
}
    </style>
</head>
<body>
<div class="all">
    <div class="tr">
        <h1>         </h1>
   </div>

   <form action="" method="post">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>


    <button type="submit" name="login">Login</button>
  </form>

  <div class="register-link">
    <p>Don't have an account? <a href="register.php">Register</a></p>
  </div>

</div>





    
</body>
</html>
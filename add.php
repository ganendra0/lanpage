<?php 
session_start();
require 'koneksi.php';

if(!isset($_SESSION['admin'])) {
  header("location: landing-page.php");
  exit;
}

if (isset($_POST['register'])) {
  if (registrasi($_POST) > 0 ) {
    echo "<script>
    alert('user berhasil di tambahkan');
    window.location.href = 'data.php';
     </script>";
    

  }
  else{
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Red+Rose:wght@300&display=swap');
body{
    background-color: rgb(34, 33, 35);
}


body {
        font-family: Arial, sans-serif;
        padding-top: 100px;

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
      input[type="text"],
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

      input[type="submit"] {
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

.all{
    position: absolute;
    margin-left: 35%;
}
    </style>
</head>
<body>

<form action="" method="post">
    <label for="email">Name</label>
    <input type="text" id="name" name="name" required>


    <label for="email">Email ID</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <label for="passwordcf">Confirm Password</label>
    <input type="password" id="password2" name="password2" required>

    <label for="level">Level</label>
    <select name='level'>
		<option value='user'>user</option>
		<option value='admin'>admin</option>
	  </select>



    <input type="submit" name="register">
  </form>
        
</body>
</html>
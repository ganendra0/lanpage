<?php
require 'koneksi.php';



// Ambil email dari form login
$email = $_POST['email'];

// Tampilkan email yang diinput saat login
echo "Email: " . $email;



?>


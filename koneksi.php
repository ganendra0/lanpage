<?php
$server ="localhost";
$username = "root";
$password = "";
$database_name = "landing";

$conn = mysqli_connect ($server, $username, $password, $database_name);

function registrasi($data){
    global $conn;

    $email = $data['email'];
    $password = $data['password'];
    $password2 = $data['password2'];

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if ( mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('email sudah terdaftar')
        </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }

    mysqli_query($conn , "INSERT INTO user VALUES (NULL, '$email', '$password' )");

    return mysqli_affected_rows($conn);

}

?>
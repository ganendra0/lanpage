<?php

require 'koneksi.php';

// Lakukan query
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tabel</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            border-color: #fff;

        }

        body {
            background-color: rgb(34, 33, 35);
            color: #fff;

        }

        
    </style>
</head>
<body>

<h2>Data Tabel</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Level</th>
        <!-- Tambahkan kolom lain sesuai kebutuhan -->
    </tr>
    <?php
    // Tampilkan data dari hasil query
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>" . $row["level"] . "</td>";

            // Tambahkan kolom lain sesuai kebutuhan
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada data yang ditemukan</td></tr>";
    }

  
    ?>
</table>

<a class = 'kembali' href="admin.php">Kembali</a>

</body>
</html>

<?php
// Tutup koneksi database
mysqli_close($conn);
?>

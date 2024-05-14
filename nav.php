<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
            width: 100%;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between; 
            align-items: center; 
            padding: 10px 20px; 
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center; 
        }

        .navbar li {
            margin-right: 20px;
        }

        .navbar a {
            color: #ddd;
            text-decoration: none;
            padding: 15px 20px;
            transition: color 0.3s; 
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .navbar img {
            width: 130px;
            height: 50px;
            object-fit: cover;
            margin-left: 20px; 
        }

        .navbar p {
            color: #ddd;
            margin-right: 20px; 
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <ul>
        <li><a href="landing-page.php"><img src="aru.png" width="130px" height="80px" margin-top="5px" alt="Landing Page"></a></li>
            
        </ul>
       
        <ul>
            <li><a href="event.php">Event</a></li>
            <li><a href="profil.php">Profil</a></li>

            <?php 
            if ($_SESSION['admin']) {
                echo "<li><a href='data.php'>Data</a></li>";
            }
            ?>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>

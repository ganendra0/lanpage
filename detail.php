<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.event-details {
    display: flex;
    align-items: center;
}

.event-details img {
    width: 200px;
    height: 200px;
    border-radius: 10px;
    margin-right: 20px;
}

.event-info {
    flex-grow: 1;
}

.event-info h2 {
    margin-top: 0;
}

.event-info p {
    margin: 5px 0;
}

.buy-ticket {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.buy-ticket:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="event-details">
            <img src="gambar_event.jpg" alt="Event Image">
            <div class="event-info">
                <h2>Nama Event</h2>
                <p>Deskripsi Event</p>
                <p><strong>Tanggal:</strong> 10 Oktober 2024</p>
                <p><strong>Lokasi:</strong> Jalan Sumpah Pemuda</p>
                <a href="#" class="buy-ticket">Beli Tiket</a>
            </div>
        </div>
    </div>
</body>
</html>

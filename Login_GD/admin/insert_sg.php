<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_gudang = $_POST['id_gudang'];
    $nama_gudang = $_POST['nama_gudang'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $id_admin = $_POST['id_admin'];

    $insert_query = "INSERT INTO storage (id_gudang, nama_gudang, lokasi_gudang, id_admin) VALUES ('$id_gudang', '$nama_gudang', '$lokasi_gudang', '$id_admin')";

    if (mysqli_query($koneksi, $insert_query)) {
        echo "New storage data inserted successfully.";
        header("Location: storage.php"); 
        exit();
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Storage</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 80px;
        }
        .container{
            width: 400px;
            padding: 30px;
            border-radius: 8px;
            background-color: yellow;
            border: 1px solid black;
        }
        .container h2{
            margin-bottom: 25px;
            font-size: 24px;
            text-align: center;
        }
        .container input {
            width: calc(100% - 20px);
            padding: 12px 10px;
            margin: 10px 0;
            border: 1px solid #000000;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .container button {
            width: 100%;
            padding: 12px;
            margin: 20px 0;
            background-color: red;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 16px;
        }
        </style>
</head>
</head>
<body>
    <div class="container">
        <h2>Insert Storage</h2>
        <form method="POST" action="insert_sg.php">
            <label for="id_gudang">ID Gudang:</label>
            <input type="text" name="id_gudang" required><br>

            <label for="nama_gudang">Nama Gudang:</label>
            <input type="text" name="nama_gudang" required><br>

            <label for="lokasi_gudang">Lokasi Gudang:</label>
            <input type="text" name="lokasi_gudang" required><br>

            <label for="id_admin">ID Admin:</label>
            <input type="text" name="id_admin" required><br>

            <button type="submit" name="Insert">Tambah Data</button>
        </form>
    </div>
</body>
</html>

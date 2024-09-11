<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_vendor = $_POST['id_vendor'];
    $nama_vendor = $_POST['nama_vendor'];
    $kontak_vendor = $_POST['kontak_vendor'];
    $nama_barang = $_POST['nama_barang'];
    $id_admin = $_POST['id_admin'];

    $insert_query = "INSERT INTO vendor (id_vendor, nama_vendor, kontak_vendor, nama_barang, id_admin) VALUES ('$id_vendor', '$nama_vendor', '$kontak_vendor', '$nama_barang', '$id_admin')";

    if (mysqli_query($koneksi, $insert_query)) {
        echo "New vendor data inserted successfully.";
        header("Location: vendor.php"); 
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
            background-color: white;
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
        <form method="POST" action="insert_vendor.php">
            <label for="id_vendor">ID Vendor:</label>
            <input type="text" name="id_vendor" required><br>

            <label for="nama_vendor">Nama Vendor:</label>
            <input type="text" name="nama_vendor" required><br>

            <label for="kontak_vendor">Kontak Vendor:</label>
            <input type="text" name="kontak_vendor" required><br>

            <label for="nama_barang">Nama Barang:</label><br>
            <input type="text" id="nama_barang" name="nama_barang" required><br>

            <label for="id_admin">ID Admin:</label>
            <input type="text" name="id_admin" required><br>

            <button type="submit" name="Insert">Tambah Data</button>
        </form>
    </div>
</body>
</html>

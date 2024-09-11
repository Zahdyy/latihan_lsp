<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $no_seri = $_POST['no_seri'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $kuantitas_stok = $_POST['kuantitas_stok'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $harga = $_POST['harga'];
    $id_admin = $_POST['id_admin'];

    $sql = "INSERT INTO inventory (no_seri, nama_barang, jenis_barang, kuantitas_stok, lokasi_gudang, harga, id_admin) 
            VALUES ('$no_seri', '$nama_barang', '$jenis_barang', '$kuantitas_stok', '$lokasi_gudang', '$harga', '$id_admin')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
        header("Location: inventory.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Inventory</title>
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
            background-color: orange;
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
            background-color: black;
            border: none;
            color: #fff;
            border-radius: 5px;
            font-size: 16px;
        }
        </style>
</head>
<body>
    <div class="container">
    <h2>Insert Inventory</h2>
    <form method="post" action="insert_inven.php">
        <label for="no_seri">No Seri:</label><br>
        <input type="text" id="no_seri" name="no_seri" required><br>
        
        <label for="nama_barang">Nama Barang:</label><br>
        <input type="text" id="nama_barang" name="nama_barang" required><br>

        <label for="jenis_barang">Jenis Barang:</label><br>
        <input type="text" id="jenis_barang" name="jenis_barang" required><br>

        <label for="kuantitas_stok">Kuantitas Stok:</label><br>
        <input type="number" id="kuantitas_stok" name="kuantitas_stok" required><br>

        <label for="lokasi_gudang">Lokasi Gudang:</label><br>
        <input type="text" id="lokasi_gudang" name="lokasi_gudang" required><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" required><br>

        <label for="id_admin">ID Admin:</label><br>
        <input type="text" id="id_admin" name="id_admin" required>

        <button type="submit" name="Insert">Tambah Data</button>
    </form>
    </div>
</body>
</html>

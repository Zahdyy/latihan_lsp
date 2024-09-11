<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");

if (isset($_GET['no_seri'])) {
    $no_seri = $_GET['no_seri'];

    $sql = "SELECT * FROM inventory WHERE no_seri='$no_seri'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "No Seri tidak ditemukan.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_seri = $_POST['no_seri'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $kuantitas_stok = $_POST['kuantitas_stok'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $id_admin = $_POST['id_admin'];
    $harga = $_POST['harga'];

    $sql = "UPDATE inventory 
            SET nama_barang='$nama_barang', jenis_barang='$jenis_barang', kuantitas_stok='$kuantitas_stok', 
                lokasi_gudang='$lokasi_gudang', id_admin='$id_admin', harga='$harga' 
            WHERE no_seri='$no_seri'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil diupdate.";
        header("Location: inventory.php");
        exit();
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Inventory</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
    <h2>Update Data Inventory</h2>

    <form method="post" action="update_inven.php">
        <input type="hidden" name="no_seri" value="<?php echo $row['no_seri']; ?>">
        
        <label for="nama_barang">Nama Barang:</label><br>
        <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required><br>

        <label for="jenis_barang">Jenis Barang:</label><br>
        <input type="text" id="jenis_barang" name="jenis_barang" value="<?php echo $row['jenis_barang']; ?>" required><br>

        <label for="kuantitas_stok">Kuantitas Stok:</label><br>
        <input type="number" id="kuantitas_stok" name="kuantitas_stok" value="<?php echo $row['kuantitas_stok']; ?>" required><br>

        <label for="lokasi_gudang">Lokasi Gudang:</label><br>
        <input type="text" id="lokasi_gudang" name="lokasi_gudang" value="<?php echo $row['lokasi_gudang']; ?>" required><br>

        <label for="id_admin">ID Admin:</label><br>
        <input type="text" id="id_admin" name="id_admin" value="<?php echo $row['id_admin']; ?>" required><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required><br><br>

        <input type="submit" value="Update Data">
    </form>
    </div>
</body>
</html>

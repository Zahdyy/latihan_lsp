<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
    <h2>Inventory</h2>
    <a href="insert_inven.php">Tambah Data</a>
    <?php
    $inven ="SELECT no_seri,nama_barang,jenis_barang,kuantitas_stok,lokasi_gudang,id_admin,harga FROM inventory";
    $result = $koneksi->query($inven);

    echo '<table><tr><th>No Seri</th><th>Nama Barang</th><th>Jenis Barang</th><th>Kuantitas Stok</th><th>Lokasi Gudang</th><th>Harga</th><th>ID Admin</th><th>Action</th></tr>';
    if ($result-> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['no_seri'] . "</td>";
            echo "<td>" . $row['nama_barang'] . "</td>";
            echo "<td>" . $row['jenis_barang'] . "</td>";
            echo "<td>" . $row['kuantitas_stok'] . "</td>";
            echo "<td>" . $row['lokasi_gudang'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td>" . $row['id_admin'] . "</td>";
            echo "<a href='update_inven.php?no_seri=" . $row['no_seri'] . "'>Update</a> ";
            echo "<td><a href='delete_inven.php?no_seri=" . $row['no_seri'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
</body>
</html>
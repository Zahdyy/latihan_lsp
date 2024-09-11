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
    <h2>Vendor</h2>
    <a href="insert_vendor.php">Tambah Data</a>
    <?php
    $vendor ="SELECT id_vendor,nama_vendor,kontak_vendor,nama_barang,id_admin FROM vendor";
    $result = $koneksi->query($vendor);

    echo '<table><tr><th>ID Vendor</th><th>Nama Vendor</th><th>Kontak</th><th>Nama Barang</th><th>ID Admin</th><th>Action</th></tr>';
    if ($result-> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_vendor'] . "</td>";
            echo "<td>" . $row['nama_vendor'] . "</td>";
            echo "<td>" . $row['kontak_vendor'] . "</td>";
            echo "<td>" . $row['nama_barang'] . "</td>";
            echo "<td>" . $row['id_admin'] . "</td>";
            echo "<td><a href='delete_vendor.php?id_vendor=" . $row['id_vendor'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
    </div>
</body>
</html>
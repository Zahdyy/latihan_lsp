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
    <h2>Storage Unit</h2>
    <a href="insert_sg.php">Tambah Data</a>
    <?php
    $storage ="SELECT id_gudang,nama_gudang,lokasi_gudang,id_admin FROM storage";
    $result = $koneksi->query($storage);

    echo '<table><tr><th>ID Gudang</th><th>Nama Gudang</th><th>Lokasi Gudang</th><th>ID Admin</th><th>Action</th></tr>';
    if ($result-> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_gudang'] . "</td>";
            echo "<td>" . $row['nama_gudang'] . "</td>";
            echo "<td>" . $row['lokasi_gudang'] . "</td>";
            echo "<td>" . $row['id_admin'] . "</td>";
            echo "<td><a href='delete_sg.php?id_gudang=" . $row['id_gudang'] . "' onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
    </div>
</body>
</html>
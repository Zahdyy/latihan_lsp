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
    <?php
    $admin ="SELECT id_admin,nama_admin,kontak,email FROM admin";
    $result = $koneksi->query($admin);

    echo '<h2>Admin</h2>';
    echo '<table><tr><th>ID Admin</th><th>Nama Admin</th><th>Kontak</th><th>Email</th></tr>';
    if ($result-> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_admin'] . "</td>";
            echo "<td>" . $row['nama_admin'] . "</td>";
            echo "<td>" . $row['kontak'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            // echo "<td><a href='delete.php?id=" . $row['id_admin'] . "' onclick='return confirm</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
    </div>
</body>
</html>
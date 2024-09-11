<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");

if (isset($_GET['no_seri'])) {
    $no_seri = $_GET['no_seri'];

    $sql = "DELETE FROM inventory WHERE no_seri='$no_seri'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $koneksi->error;
    }

    header("Location: inventory.php");
    exit();
} else {
    echo "No Seri tidak ditemukan.";
}
?>
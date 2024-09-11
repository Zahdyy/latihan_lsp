<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");

if (isset($_GET['id_vendor'])) {
    $id_vendor = $_GET['id_vendor'];

    $delete_query = "DELETE FROM vendor WHERE id_vendor='$id_vendor'";

    if (mysqli_query($koneksi, $delete_query)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }

    header("Location: vendor.php");
    exit();
}
?>

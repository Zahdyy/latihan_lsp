<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");

if (isset($_GET['id_gudang'])) {
    $id_gudang = $_GET['id_gudang'];

    $delete_query = "DELETE FROM storage WHERE id_gudang='$id_gudang'";

    if (mysqli_query($koneksi, $delete_query)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }

    header("Location: storage.php");
    exit();
}
?>

<?php
include '../koneksi/koneksi.php';
if (isset($_POST['delete'])) {
    $kodemk = $_POST['deleteMk'];

    $query = mysqli_query($koneksi, "DELETE FROM matakuliah WHERE kodemk = '$kodemk'");

    if ($query) {
        $messagehapus = "sukses";
    } else {
        $messagehapus = "gagal";
    }

    header("Location: matakuliah.php?messagehapus=$messagehapus");
} else {
    header("Location: matakuliah.php?messagehapus=invalid");
}

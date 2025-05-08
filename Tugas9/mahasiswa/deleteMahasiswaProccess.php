<?php
include '../koneksi/koneksi.php';
if (isset($_POST['delete'])) {
    $npm = $_POST['deleteNpm'];

    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm = '$npm'");

    if ($query) {
        $messagehapus = "sukses";
    } else {
        $messagehapus = "gagal";
    }

    header("Location: mahasiswa.php?messagehapus=$messagehapus");
} else {
    header("Location: mahasiswa.php?messagehapus=invalid");
}

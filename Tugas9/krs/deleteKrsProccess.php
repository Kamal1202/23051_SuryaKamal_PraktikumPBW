<?php
include '../koneksi/koneksi.php';
if (isset($_POST['delete'])) {
    $id = $_POST['deleteKrs'];

    $query = mysqli_query($koneksi, "DELETE FROM krs WHERE id = '$id'");

    if ($query) {
        $messagehapus = "sukses";
    } else {
        $messagehapus = "gagal";
    }

    header("Location: krs.php?messagehapus=$messagehapus");
} else {
    header("Location: krs.php?messagehapus=invalid");
}

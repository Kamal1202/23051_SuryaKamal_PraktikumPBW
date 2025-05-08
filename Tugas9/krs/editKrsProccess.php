<?php
include '../koneksi/koneksi.php'; // Pastikan file koneksi sudah sesuai

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $npm = $_POST['npmMahasiswa'];
    $kodeMk = $_POST['kodeMatakuliah'];

    $query = mysqli_query($koneksi, "UPDATE krs SET npmMahasiswa='$npm', kodeMatakuliah='$kodeMk' WHERE id='$id'");

    if ($query) {
        $messageedit = "sukses";
    } else {
        $messageedit = "gagal";
    }
    header("Location: krs.php?messageedit=$messageedit");
} else {
    header("Location: krs.php?messageedit=invalid");
}
?>
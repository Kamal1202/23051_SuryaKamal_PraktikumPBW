<?php
include '../koneksi/koneksi.php'; // Pastikan file koneksi sudah sesuai

if (isset($_POST['update'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'");

    if ($query) {
        $messageedit = "sukses";
    } else {
        $messageedit = "gagal";
    }
    header("Location: mahasiswa.php?messageedit=$messageedit");
} else {
    header("Location: mahasiswa.php?messageedit=invalid");
}
?>

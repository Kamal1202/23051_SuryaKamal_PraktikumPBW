<?php
include '../koneksi/koneksi.php';
if (isset($_POST['insert'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES('$npm', '$nama','$jurusan','$alamat')");

    if ($query) {
        $messagetambah = "sukses";
    } else {
        $messagetambah = "gagal";
    }

    header("Location: mahasiswa.php?messagetambah=$messagetambah");
} else {
    header("Location: mahasiswa.php?messagetambah=invalid");
}

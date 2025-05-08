<?php
include '../koneksi/koneksi.php';
if (isset($_POST['insert'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];

    $query = mysqli_query($koneksi, "INSERT INTO matakuliah VALUES('$kodemk', '$nama','$sks')");

    if ($query) {
        $messagetambah = "sukses";
    } else {
        $messagetambah = "gagal";
    }

    header("Location: matakuliah.php?messagetambah=$messagetambah");
} else {
    header("Location: matakuliah.php?messagetambah=invalid");
}
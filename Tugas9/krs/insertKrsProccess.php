<?php
include '../koneksi/koneksi.php';
if (isset($_POST['insert'])) {
    $npm = $_POST['npmMahasiswa'];
    $kodemk = $_POST['kodeMatakuliah'];

    $query = mysqli_query($koneksi, "INSERT INTO krs (npmMahasiswa, kodeMatakuliah) VALUES('$npm', '$kodemk')");

    if ($query) {
        $messagetambah = "sukses";
    } else {
        $messagetambah = "gagal";
    }

    header("Location: krs.php?messagetambah=$messagetambah");
} else {
    header("Location: krs.php?messagetambah=invalid");
}

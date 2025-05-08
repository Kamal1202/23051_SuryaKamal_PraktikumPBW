<?php
include '../koneksi/koneksi.php'; // Pastikan file koneksi sudah sesuai

if (isset($_POST['update'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];

    $query = mysqli_query($koneksi, "UPDATE matakuliah SET nama='$nama', sks='$sks' WHERE kodemk='$kodemk'");

    if ($query) {
        $messageedit = "sukses";
    } else {
        $messageedit = "gagal";
    }
    header("Location: matakuliah.php?messageedit=$messageedit");
} else {
    header("Location: matakuliah.php?messageedit=invalid");
}
?>

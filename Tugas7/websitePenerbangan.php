<?php
$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

// Urutkan nama bandara
ksort($bandara_asal);
ksort($bandara_tujuan);

$hasil = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $asal = $_POST["asal"];
    $tujuan = $_POST["tujuan"];
    $harga = (int) $_POST["harga"];
    $tanggal = $_POST["tanggal"];

    $pajak_asal = $bandara_asal[$asal];
    $pajak_tujuan = $bandara_tujuan[$tujuan];
    $pajak = $pajak_asal + $pajak_tujuan;
    $total = $harga + $pajak;

    $hasil = [
        "tanggal" => $tanggal,
        "nama" => $nama,
        "asal" => $asal,
        "tujuan" => $tujuan,
        "harga" => $harga,
        "pajak_asal" => $pajak_asal,
        "pajak_tujuan" => $pajak_tujuan,
        "pajak_total" => $pajak,
        "total" => $total
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Rute Penerbangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Rute Penerbangan</h2>
        <form method="POST" class="form-box">
            <label for="nama">Nama Maskapai:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="asal">Bandara Asal:</label>
            <select name="asal" id="asal" required>
                <?php foreach ($bandara_asal as $nama_bandara => $pajak_asal): ?>
                    <option value="<?= $nama_bandara ?>"><?= $nama_bandara ?></option>
                <?php endforeach; ?>
            </select>

            <label for="tujuan">Bandara Tujuan:</label>
            <select name="tujuan" id="tujuan" required>
                <?php foreach ($bandara_tujuan as $nama_bandara => $pajak_tujuan): ?>
                    <option value="<?= $nama_bandara ?>"><?= $nama_bandara ?></option>
                <?php endforeach; ?>
            </select>

            <label for="harga">Harga Tiket:</label>
            <input type="number" name="harga" id="harga" required>

            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <button type="submit">Daftar</button>
        </form>

        <?php if (!empty($hasil)): ?>
            <div class="result-box">
                <h3>Data Penerbangan</h3>
                <p><strong>Tanggal:</strong> <?= $hasil["tanggal"] ?></p>
                <p><strong>Nama Maskapai:</strong> <?= $hasil["nama"] ?></p>
                <p><strong>Asal Penerbangan:</strong> <?= $hasil["asal"] ?></p>
                <p><strong>Tujuan Penerbangan:</strong> <?= $hasil["tujuan"] ?></p>
                <p><strong>Harga Tiket:</strong> Rp<?= number_format($hasil["harga"], 0, ',', '.') ?></p>

                <h4>Detail Pajak:</h4>
                <p>Pajak Bandara Asal (<?= $hasil["asal"] ?>): Rp<?= number_format($hasil["pajak_asal"], 0, ',', '.') ?></p>
                <p>Pajak Bandara Tujuan (<?= $hasil["tujuan"] ?>): Rp<?= number_format($hasil["pajak_tujuan"], 0, ',', '.') ?></p>
                <p><strong>Total Pajak:</strong> Rp<?= number_format($hasil["pajak_total"], 0, ',', '.') ?></p>

                <p><strong>Total Harga Tiket:</strong> Rp<?= number_format($hasil["total"], 0, ',', '.') ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
include '../koneksi/koneksi.php';

// Ambil data untuk dropdown form input
$mahasiswa = $koneksi->query("SELECT npm, nama FROM mahasiswa");
$matakuliah = $koneksi->query("SELECT kodemk, nama FROM matakuliah");

// Ambil data KRS untuk ditampilkan di tabel
$queryKrs = "
    SELECT 
        k.id,
        k.npmMahasiswa AS npm,
        k.kodeMatakuliah AS kodemk,
        m.nama AS namaMahasiswa,
        mk.nama AS namaMk,
        mk.sks
    FROM krs k
    JOIN mahasiswa m ON k.npmMahasiswa = m.npm
    JOIN matakuliah mk ON k.kodeMatakuliah = mk.kodemk
";

$resultKrs = $koneksi->query($queryKrs);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Krs | E Camplusss</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
    }

    /* Navbar Styles */
    .navbar-container {
      background-color: #004080;
      padding: 12px 0;
    }

    .navbar .navbar-brand {
      color: #fff;
      font-weight: 600;
    }

    .navbar-nav .nav-link {
      color: #f0f0f0;
      margin-left: 20px;
      transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #ffd700;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <div class="navbar-container">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="../beranda.php">E Camplusss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../mahasiswa/mahasiswa.php">Mahasiswa</a></li>
            <li class="nav-item"><a class="nav-link" href="../matakuliah/matakuliah.php">Matakuliah</a></li>
            <li class="nav-item"><a class="nav-link" href="krs.php">KRS</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Content -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="mb-4 fw-semibold">Masukkan Data KRS</h2>
      <form method="POST" action="insertKrsProccess.php" class="mb-4">
        <div class="row mb-3">
          <div class="col-md-6 mb-2">
            <select name="npmMahasiswa" class="form-select" required>
              <option value="">-- Pilih Mahasiswa --</option>
              <?php while ($m = $mahasiswa->fetch_assoc()): ?>
                <option value="<?= $m['npm']; ?>"><?= $m['nama']; ?> (<?= $m['npm']; ?>)</option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="col-md-6 mb-2">
            <select name="kodeMatakuliah" class="form-select" required>
              <option value="">-- Pilih Mata Kuliah --</option>
              <?php while ($mk = $matakuliah->fetch_assoc()): ?>
                <option value="<?= $mk['kodemk']; ?>"><?= $mk['nama']; ?> (<?= $mk['kodemk']; ?>)</option>
              <?php endwhile; ?>
            </select>
          </div>
        </div>
        <button type="submit" name="insert" class="btn btn-primary">Tambah KRS</button>
      </form>

      <h2 class="mt-5 mb-3 fw-semibold">Data KRS</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-primary">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Mata Kuliah</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            while ($row = $resultKrs->fetch_assoc()): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['namaMahasiswa']); ?></td>
                <td><?= htmlspecialchars($row['namaMk']); ?></td>
                <td>
                  <span class="fw-semibold">
                    <span class="text-danger"><?= htmlspecialchars($row['namaMahasiswa']); ?> </span> Mengambil Mata Kuliah <span class="text-danger"><?= htmlspecialchars($row['namaMk']); ?></span> (<?= $row['sks']; ?> SKS)
                  </span>
                </td>
                <td>
                  <form method="POST" action="deleteKrsProccess.php" style="display: inline;">
                    <input type="hidden" name="deleteKrs" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                  <button type="button" onclick="showEditForm('<?= $row['id']; ?>', '<?= $row['npm']; ?>', '<?= $row['kodemk']; ?>')" class="btn btn-warning btn-sm text-white">Edit</button>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="editKrsFormLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="editKrsProccess.php">
            <div class="modal-header">
              <h5 class="modal-title" id="editKrsFormLabel">Edit Data KRS</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <!-- Hidden ID untuk referensi baris KRS yang diupdate -->
              <input type="hidden" id="editIdKrs" name="id">

              <div class="mb-3">
                <label for="editNpmMahasiswa" class="form-label">Mahasiswa</label>
                <select name="npmMahasiswa" id="editNpmMahasiswa" class="form-select" required>
                  <option value="">-- Pilih Mahasiswa --</option>
                  <?php
                  $mahasiswaReset = $koneksi->query("SELECT npm, nama FROM mahasiswa"); // Fetch ulang data mahasiswa
                  while ($m = $mahasiswaReset->fetch_assoc()):
                  ?>
                    <option value="<?= $m['npm']; ?>"><?= $m['nama']; ?> (<?= $m['npm']; ?>)</option>
                  <?php endwhile; ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="editKodeMatakuliah" class="form-label">Mata Kuliah</label>
                <select name="kodeMatakuliah" id="editKodeMatakuliah" class="form-select" required>
                  <option value="">-- Pilih Mata Kuliah --</option>
                  <?php
                  $matakuliahReset = $koneksi->query("SELECT kodemk, nama FROM matakuliah"); // Fetch ulang data matakuliah
                  while ($mk = $matakuliahReset->fetch_assoc()):
                  ?>
                    <option value="<?= $mk['kodemk']; ?>"><?= $mk['nama']; ?> (<?= $mk['kodemk']; ?>)</option>
                  <?php endwhile; ?>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" name="update" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>

  <?php if (isset($_GET['messagetambah'])): ?>
    <script>
      <?php if ($_GET['messagetambah'] == 'sukses'): ?>
        alert("✅ Data berhasil ditambahkan!");
      <?php elseif ($_GET['messagetambah'] == 'gagal'): ?>
        alert("❌ Data gagal ditambahkan.");
      <?php elseif ($_GET['messagetambah'] == 'invalid'): ?>
        alert("⚠️ Tombol insert tidak valid.");
      <?php endif; ?>
    </script>
  <?php endif; ?>

  <?php if (isset($_GET['messagehapus'])): ?>
    <script>
      <?php if ($_GET['messagehapus'] == 'sukses'): ?>
        alert("✅ Data berhasil dihapus!");
      <?php elseif ($_GET['messagehapus'] == 'gagal'): ?>
        alert("❌ Data gagal dihapus.");
      <?php elseif ($_GET['messagehapus'] == 'invalid'): ?>
        alert("⚠️ Tombol delete tidak valid.");
      <?php endif; ?>
    </script>
  <?php endif; ?>

  <?php if (isset($_GET['messageedit'])): ?>
    <script>
      <?php if ($_GET['messageedit'] == 'sukses'): ?>
        alert("✅ Data berhasil diedit!");
      <?php elseif ($_GET['messageedit'] == 'gagal'): ?>
        alert("❌ Data gagal diedit.");
      <?php elseif ($_GET['messageedit'] == 'invalid'): ?>
        alert("⚠️ Tombol edit tidak valid.");
      <?php endif; ?>
    </script>
  <?php endif; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function showEditForm(id, npm, kodemk) {
      document.getElementById('editIdKrs').value = id;
      document.getElementById('editNpmMahasiswa').value = npm;
      document.getElementById('editKodeMatakuliah').value = kodemk;
      
      const modal = new bootstrap.Modal(document.getElementById('editForm'));
      modal.show();
    }
  </script>

</body>

</html>
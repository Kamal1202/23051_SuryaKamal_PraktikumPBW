<?php
include '../koneksi/koneksi.php';

$query = "SELECT * FROM matakuliah";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mata Kuliah | E Camplusss</title>

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
            <li class="nav-item"><a class="nav-link" href="matakuliah.php">Matakuliah</a></li>
            <li class="nav-item"><a class="nav-link" href="../krs/krs.php">KRS</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Content -->
  <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 fw-semibold">Masukkan Data Mata Kuliah</h2>
            <form method="POST" action="insertMatakuliahProccess.php" class="mb-4">
                <div class="row mb-2">
                    <div class="col-md-4 mb-2">
                        <input type="text" name="kodemk" class="form-control" placeholder="Kode Mata Kuliah" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Mata Kuliah" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <input type="number" name="sks" class="form-control" placeholder="Jumlah SKS" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" name="insert" class="btn btn-primary">Insert</button>
                    </div>
                </div>
            </form>

            <h2 class="mt-5 mb-3 fw-semibold">Data Mata Kuliah</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Kode Mata Kuliah</th>
                            <th scope="col">Nama Mata Kuliah</th>
                            <th scope="col">Jumlah SKS</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['kodemk']); ?></td>
                                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                <td><?php echo htmlspecialchars($row['sks']); ?></td>
                                <td>
                                    <form method="POST" action="deleteMatakuliahProccess.php" style="display: inline;">
                                        <input type="hidden" name="deleteMk" value="<?php echo $row['kodemk']; ?>">
                                        <button type="submit" name="delete" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <button type="button" onclick="showEditForm('<?php echo $row['kodemk']; ?>', '<?php echo $row['nama']; ?>', '<?php echo $row['sks']; ?>')" class="btn btn-warning btn-sm text-white">Edit</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="editFormLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="editMatakuliahProccess.php">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editFormLabel">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Hanya satu ID editNpm -->
                            <input type="hidden" id="editKodemk" name="kodemk">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="editNama" name="nama" placeholder="Nama Mata Kuliah" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" id="editSks" name="sks" placeholder="Jumlah Sks" required>
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
        function showEditForm(kodemk, nama, sks) {
            document.getElementById('editKodemk').value = kodemk;
            document.getElementById('editNama').value = nama;
            document.getElementById('editSks').value = sks;

            const modal = new bootstrap.Modal(document.getElementById('editForm'));
            modal.show();
        }
    </script>
</body>
</html>
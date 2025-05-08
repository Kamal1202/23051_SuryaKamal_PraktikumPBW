<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beranda | E Camplusss</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f6f9;
    }

    /* Navbar Styles */
    .navbar-container {
      background-color: #004080; /* Warna biru solid */
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

    /* Hero Section */
    .hero-section {
      padding: 100px 20px;
      background: url('https://source.unsplash.com/1600x600/?education,campus') no-repeat center center;
      background-size: cover;
      color: #004080; /* Biru tua untuk teks */
      text-shadow: none;
      text-align: center;
    }

    .hero-section h2 {
      font-size: 40px;
      font-weight: 600;
      color: #004080;
    }

    .hero-section h4 {
      font-size: 24px;
      font-weight: 400;
      color: #004080;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar-container">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="beranda.php">E Camplusss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="mahasiswa/mahasiswa.php">Mahasiswa</a></li>
            <li class="nav-item"><a class="nav-link" href="matakuliah/matakuliah.php">Matakuliah</a></li>
            <li class="nav-item"><a class="nav-link" href="krs/krs.php">KRS</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Hero Section -->
  <div class="hero-section">
    <h2>Selamat Datang Di E Camplusss</h2>
    <h4>Unsyattt</h4>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

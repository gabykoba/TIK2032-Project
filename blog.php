<?php
include 'config.php'; // koneksi ke database

// Ambil semua artikel
$query = $pdo->query("SELECT id, judul, deskripsi, link FROM artikel ORDER BY id DESC");
$artikels = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog - Gaby</title>
  <link rel="stylesheet" href="style.css" />
  <script defer src="script.js"></script>
</head>
<body>
  <!-- Header -->
  <header>
    <div class="logo">Gabriella Koba | Portofolio</div>
    <nav>
      <a href="index.html">Home</a>
      <a href="gallery.html">Gallery</a>
      <a href="blog.php" class="active">Blog</a>
      <a href="contact.php">Contact</a>
    </nav>
  </header>

  <!-- Blog List -->
  <main>
    <section class="fade-in">
      <h2>Article</h2>

      <?php if (count($artikels) > 0): ?>
        <?php foreach ($artikels as $artikel): ?>
          <div class="card">
            <h3><?= htmlspecialchars($artikel['judul']) ?></h3>
            <p><?= htmlspecialchars($artikel['deskripsi']) ?></p>
            <a href="<?= htmlspecialchars($artikel['link']) ?>" class="button">Baca Selengkapnya</a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Belum ada artikel yang tersedia.</p>
      <?php endif; ?>
    </section>
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Gaby. All rights reserved.</p>
  </footer>
</body>
</html>

<?php
require 'koneksi.php';

$notif = false; // buat flag notifikasi

// Saat disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected = isset($_POST['tampil']) ? $_POST['tampil'] : [];

    // Reset tampil semua jadi 0
    $conn->query("UPDATE semua_game_admin SET tampil = 0");
    $conn->query("UPDATE semua_game SET tampil = 0");

    // Centang yang dipilih
    foreach ($selected as $id) {
        // Update tampil di admin
        $conn->query("UPDATE semua_game_admin SET tampil = 1 WHERE id = $id");

        // Ambil nama game dari admin
        $result = $conn->query("SELECT nama_game FROM semua_game_admin WHERE id = $id");
        if ($row = $result->fetch_assoc()) {
            $nama_game = $row['nama_game'];
            // Update tampil di user berdasarkan nama_game
            $conn->query("UPDATE semua_game SET tampil = 1 WHERE nama_game = '$nama_game'");
        }
    }

    $notif = true; // set notifikasi ON
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Filter Game Ditampilkan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-8 font-sans">

  <!-- Tombol Kembali -->
  <div class="mb-6 text-center">
    <a href="topupadmin.php" class="bg-gray-700 hover:bg-gray-800 px-6 py-3 rounded-xl font-bold text-white inline-block">🔙 Kembali ke Halaman Admin</a>
  </div>

  <!-- Notifikasi -->
  <?php if ($notif): ?>
    <div class="max-w-2xl mx-auto bg-green-600 text-white p-4 rounded-xl mb-6 text-center font-semibold shadow-lg">
      ✅ Perubahan berhasil disimpan!
    </div>
  <?php endif; ?>

  <h1 class="text-3xl font-bold mb-6 text-center">🎮 Pilih Game yang Ditampilkan</h1>

  <!-- Form Game -->
  <form method="POST">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
      <?php
      $games = $conn->query("SELECT * FROM semua_game_admin ORDER BY id ASC");
      while ($g = $games->fetch_assoc()):
      ?>
        <label class="bg-gray-800 p-4 rounded-xl shadow-md flex flex-col items-center">
          <img src="<?= htmlspecialchars($g['logo']) ?>" alt="<?= htmlspecialchars($g['nama_game']) ?>" class="w-24 h-24 rounded mb-3 object-cover shadow" />
          <span class="font-bold text-lg mb-2 text-center"><?= htmlspecialchars($g['nama_game']) ?></span>
          <input type="checkbox" name="tampil[]" value="<?= $g['id'] ?>" <?= $g['tampil'] ? 'checked' : '' ?> class="scale-150 accent-green-500">
        </label>
      <?php endwhile; ?>
    </div>

    <div class="text-center mt-8">
      <button type="submit" class="bg-green-600 hover:bg-green-700 px-6 py-3 rounded-xl font-bold text-white">💾 Simpan Perubahan</button>
    </div>
  </form>

</body>
</html>

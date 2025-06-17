<?php
$conn = new mysqli("localhost", "root", "", "kemaki_store");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil semua banner dari database
$result = $conn->query("SELECT * FROM banners ORDER BY uploaded_at DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Atur Banner - kemakiStore</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">

  <header class="bg-gray-800 p-4 flex justify-between items-center">
    <div class="flex items-center">
      <a href="topupadmin.php">
        <img src="../assets/logokemakistore.png" alt="kemakiStore Logo" class="h-14 w-auto" />
      </a>
    </div>
    <div class="flex items-center space-x-6">
      <a href="topupadmin.php" class="bg-yellow-400 px-5 py-2 rounded font-bold text-black hover:bg-yellow-500">⬅️ Kembali</a>
    </div>
  </header>

  <main class="max-w-3xl mx-auto mt-10 p-6 bg-gray-800 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">🎯 Upload Banner Baru</h1>
<?php if (isset($_GET['success'])): ?>
  <p class="text-green-400 font-semibold mb-4">✅ Banner berhasil diunggah!</p>
<?php elseif (isset($_GET['deleted'])): ?>
  <p class="text-red-400 font-semibold mb-4">🗑️ Banner berhasil dihapus!</p>
<?php elseif (isset($_GET['error'])): ?>
  <p class="text-red-400 font-semibold mb-4">❌ Gagal mengunggah banner.</p>
<?php endif; ?>

    <form action="upload_banner.php" method="POST" enctype="multipart/form-data">
      <label class="block mb-2 font-semibold">Pilih Gambar Banner:</label>
      <input type="file" name="banner" accept="image/*" required class="block w-full mb-4 p-2 rounded text-black">
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded font-bold">
        ⬆️ Upload Banner
      </button>
    </form>

    <!-- Tampilkan semua banner -->
    <div class="mt-10">
    <h2 class="text-xl font-semibold mb-2">🖼️ Daftar Banner:</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="bg-gray-700 p-4 rounded-lg">
            <img src="../assets/banners/<?= htmlspecialchars($row['filename']) ?>" class="rounded-md max-h-48 w-full object-contain mb-2">
            <p class="text-sm text-gray-300 mb-2">Diunggah: <?= $row['uploaded_at'] ?></p>

            <!-- Tombol Ganti -->
            <form action="edit_banner.php" method="POST" enctype="multipart/form-data" class="mb-2">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="file" name="new_banner" required accept="image/*" class="block w-full text-sm mb-2 text-black p-1 rounded">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-1 px-3 rounded">✏️ Ganti Banner</button>
            </form>

            <!-- Tombol Hapus -->
            <form action="hapus_banner.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus banner ini?')">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="filename" value="<?= $row['filename'] ?>">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">🗑️ Hapus</button>
            </form>
        </div>
        <?php endwhile; ?>
    </div>
    </div>
  </main>
</body>
</html>

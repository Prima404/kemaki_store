<?php
require 'koneksi.php';

// === PROSES UPLOAD BANNER BARU ===
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["banner"])) {
    $target_dir = "../assets/banners/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true); // Buat folder jika belum ada
    }

    $filename = basename($_FILES["banner"]["name"]);
    $target_file = $target_dir . $filename;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ["jpg", "jpeg", "png", "gif", "webp"];

    if (!in_array($imageFileType, $allowed_types)) {
        header("Location: atur_banner.php?error=format");
        exit();
    }

    if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO banners (filename) VALUES (?)");
        $stmt->bind_param("s", $filename);
        $stmt->execute();
        $stmt->close();
        header("Location: atur_banner.php?success=1");
        exit;
    } else {
        header("Location: atur_banner.php?error=1");
        exit;
    }
}

// === PROSES GANTI BANNER ===
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["new_banner"])) {
    $id = $_POST['id'];

    $result = $conn->query("SELECT filename FROM banners WHERE id = $id");
    $old = $result->fetch_assoc();
    $old_file = $old['filename'];

    $target_dir = "../assets/banners/";
    $new_name = basename($_FILES["new_banner"]["name"]);
    $target_file = $target_dir . $new_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ["jpg", "jpeg", "png", "gif", "webp"];

    if (!in_array($imageFileType, $allowed_types)) {
        header("Location: atur_banner.php?error=format");
        exit();
    }

    if (move_uploaded_file($_FILES["new_banner"]["tmp_name"], $target_file)) {
        if (file_exists($target_dir . $old_file)) {
            unlink($target_dir . $old_file);
        }

        $stmt = $conn->prepare("UPDATE banners SET filename = ?, uploaded_at = NOW() WHERE id = ?");
        $stmt->bind_param("si", $new_name, $id);
        $stmt->execute();
        $stmt->close();

        header("Location: atur_banner.php?success=edit");
        exit();
    } else {
        header("Location: atur_banner.php?error=upload");
        exit();
    }
}

// === PROSES HAPUS BANNER ===
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['filename']) && !isset($_FILES["banner"]) && !isset($_FILES["new_banner"])) {
    $id = $_POST['id'];
    $filename = $_POST['filename'];
    $filepath = "../assets/banners/" . $filename;

    $stmt = $conn->prepare("DELETE FROM banners WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    if (file_exists($filepath)) {
        unlink($filepath);
    }

    header("Location: atur_banner.php?deleted=1");
    exit();
}

// === TAMPILAN HTML + AMBIL DATA ===
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

    <form action="atur_banner.php" method="POST" enctype="multipart/form-data">
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
            <form action="atur_banner.php" method="POST" enctype="multipart/form-data" class="mb-2">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="file" name="new_banner" required accept="image/*" class="block w-full text-sm mb-2 text-black p-1 rounded">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-1 px-3 rounded">✏️ Ganti Banner</button>
            </form>

            <!-- Tombol Hapus -->
            <form action="atur_banner.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus banner ini?')">
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

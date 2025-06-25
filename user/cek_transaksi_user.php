<?php
require 'koneksi.php';

$sql = "SELECT * FROM transaksi ORDER BY waktu DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cek Transaksi | kemakiStore</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

  <!-- Header -->
  <header class="p-4 bg-gray-800 flex justify-between items-center">
    <div class="flex items-center">
      <a href="topupuser.php">
      <img src="../assets/logokemakistore.png" alt="kemakiStore Logo" class="h-14 w-auto" />
      </a>
    </div>
  </header>

  <!-- Pencarian -->
  <section class="p-6 max-w-4xl mx-auto">
    <div class="flex flex-col md:flex-row gap-4 items-center mb-2">
      <input type="text" id="searchInput" class="w-full p-3 rounded text-black" placeholder="Cari invoice atau nama game...">
      <button onclick="filterTransaksi()" class="bg-yellow-400 px-5 py-2 rounded font-bold text-black hover:bg-yellow-500">🔍 Cek Transaksi</button>
    </div>
  </section>

  <!-- Daftar Transaksi -->
  <section class="max-w-6xl mx-auto px-4">
    <h2 class="text-lg font-semibold mb-2"></h2>
    <div class="overflow-x-auto">
      <table class="w-full bg-gray-800 rounded shadow text-sm">
        <thead class="bg-gray-700 text-yellow-400 text-left">
          <tr>
            <th class="p-3">INVOICE</th>
            <th class="p-3">PRODUK</th>
            <th class="p-3">JUMLAH</th>
            <th class="p-3">HARGA</th>
            <th class="p-3">METODE</th>
            <th class="p-3">WAKTU</th>
            <th class="p-3">STATUS</th>
          </tr>
        </thead>
        <tbody id="transaksiTable">
          <?php while ($row = $result->fetch_assoc()): ?>
          <tr class="border-t border-gray-600 hover:bg-gray-700">
            <td class="p-3"><?= htmlspecialchars($row['id']) ?></td>
            <td class="p-3"><?= htmlspecialchars($row['nama_game']) ?></td>
            <td class="p-3"><?= htmlspecialchars($row['jumlah']) ?></td>
            <td class="p-3">Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td class="p-3"><?= htmlspecialchars($row['metode_pembayaran']) ?></td>
            <td class="p-3"><?= htmlspecialchars($row['waktu']) ?></td>
            <td class="p-3">
              <span class="<?= $row['status'] == 'PENDING' ? 'bg-yellow-400 text-black' : 'bg-green-500 text-black' ?> px-2 py-1 text-xs rounded">
                <?= htmlspecialchars($row['status']) ?>
              </span>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </section>

  <script>
  function filterTransaksi() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const rows = document.querySelectorAll("#transaksiTable tr");
    rows.forEach(row => {
      const text = row.innerText.toLowerCase();
      row.style.display = text.includes(input) ? "" : "none";
    });
  }
  </script>

</body>
</html>

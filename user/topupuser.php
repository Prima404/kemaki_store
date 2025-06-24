<?php
$conn = new mysqli("localhost", "root", "", "kemaki_store");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil banner
$result = $conn->query("SELECT filename FROM banners ORDER BY uploaded_at DESC");
$banners = [];
while ($row = $result->fetch_assoc()) {
    $banners[] = $row['filename'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TopUp Game | kemakiStore</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">

  <!-- Navbar -->
  <header class="bg-gray-800 p-4 flex justify-between items-center">
    <div class="flex items-center">
      <a href="../admin/admin.html">
        <img src="../assets/logokemakistore.png" alt="kemakiStore Logo" class="h-14 w-auto" />
      </a>
    </div>
    <div class="flex items-center space-x-6">
      <a href="cek_transaksi_user.php" class="bg-yellow-400 px-5 py-2 rounded font-bold text-black hover:bg-yellow-500">🔍 Cek Transaksi</a>
    </div>
  </header>

  <!-- Hero Banner Slider -->
  <section class="relative w-full px-4 md:px-12 py-6">
    <div class="overflow-hidden rounded-xl shadow-xl">
      <div id="slider" class="flex w-fit transition-transform duration-700 ease-in-out">
        <?php
        if (count($banners) > 0) {
          echo '<img src="../assets/banners/' . end($banners) . '" class="w-screen max-h-[500px] h-auto object-contain flex-shrink-0 rounded-xl shadow-lg" />';
        }
        foreach ($banners as $file) {
          echo '<img src="../assets/banners/' . $file . '" class="w-screen max-h-[500px] h-auto object-contain flex-shrink-0 rounded-xl shadow-lg" />';
        }
        if (count($banners) > 0) {
          echo '<img src="../assets/banners/' . $banners[0] . '" class="w-screen max-h-[500px] h-auto object-contain flex-shrink-0 rounded-xl shadow-lg" />';
        }
        ?>
      </div>
    </div>

    <button onclick="prevSlide()" class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full shadow">&#10094;</button>
    <button onclick="nextSlide()" class="absolute top-1/2 right-6 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full shadow">&#10095;</button>
  </section>

  <!-- Section Title -->
  <div class="text-center text-3xl font-bold mb-6 mt-6">
    LET'S TOP UP THE GAME
  </div>

  <!-- Game List -->
  <main class="px-6 py-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
      <?php
      $games = $conn->query("SELECT * FROM semua_game WHERE tampil = 1");
      while ($game = $games->fetch_assoc()):
      ?>
      <div>
        <a href="<?= htmlspecialchars($game['link_update']) ?>" class="hover:text-yellow-400">
          <img src="<?= htmlspecialchars($game['logo']) ?>" alt="<?= htmlspecialchars($game['nama_game']) ?>" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4"><?= htmlspecialchars($game['nama_game']) ?></span>
        </a>
      </div>
      <?php endwhile; ?>
    </div>
  </main>

  <footer class="bg-gray-800 p-4 text-center text-sm mt-8">
    &copy; 2025 kemakiStore. All rights reserved.
  </footer>

  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById("slider");
    const slides = slider.children;
    const totalSlides = slides.length;
    const realSlides = totalSlides - 2;
    let index = 1;
    let isAnimating = false;

    function updateSlider(animate = true) {
      if (!animate) {
        slider.classList.remove("transition-transform", "duration-700", "ease-in-out");
      } else {
        slider.classList.add("transition-transform", "duration-700", "ease-in-out");
      }
      slider.style.transform = `translateX(-${index * 100}vw)`;
    }

    function nextSlide() {
      if (isAnimating) return;
      isAnimating = true;
      index++;
      updateSlider();
      if (index === totalSlides - 1) {
        setTimeout(() => {
          slider.classList.remove("transition-transform", "duration-700", "ease-in-out");
          index = 1;
          updateSlider(false);
          isAnimating = false;
        }, 700);
      } else {
        setTimeout(() => isAnimating = false, 700);
      }
    }

    function prevSlide() {
      if (isAnimating) return;
      isAnimating = true;
      index--;
      updateSlider();
      if (index === 0) {
        setTimeout(() => {
          slider.classList.remove("transition-transform", "duration-700", "ease-in-out");
          index = realSlides;
          updateSlider(false);
          isAnimating = false;
        }, 700);
      } else {
        setTimeout(() => isAnimating = false, 700);
      }
    }

    window.nextSlide = nextSlide;
    window.prevSlide = prevSlide;
    setInterval(() => {
      nextSlide();
    }, 5000);
    updateSlider(false);
  });
  </script>

</body>
</html>

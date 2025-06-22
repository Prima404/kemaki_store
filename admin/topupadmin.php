<?php
$conn = new mysqli("localhost", "root", "", "kemaki_store");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil banner terbaru dari database
$result = $conn->query("SELECT * FROM banners ORDER BY uploaded_at DESC LIMIT 5");
$banners = [];
while ($row = $result->fetch_assoc()) {
    $banners[] = $row['filename'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin | kemakiStore</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">

  <!-- Navbar -->
  <header class="bg-gray-800 p-4 flex justify-between items-center">
    <div class="flex items-center">
      <a href="topupadmin.php">
      <img src="../assets/logokemakistore.png" alt="kemakiStore Logo" class="h-14 w-auto" />
      </a>
    </div>
    <div class="flex items-center space-x-6">
      <a href="atur_banner.php" class="bg-blue-500 px-5 py-2 rounded font-bold text-white hover:bg-blue-600">🎯 Atur Banner</a>
      <a href="cek_transaksi.php" class="bg-yellow-400 px-5 py-2 rounded font-bold text-black hover:bg-yellow-500">🔍 Cek Transaksi</a>
      <a href="../user/topupuser.php" class="bg-red-600 px-5 py-2 rounded font-bold text-white hover:bg-red-700">🚪 Logout</a>
    </div>
  </header>

  <!-- Hero Banner Slider -->
  <section class="relative w-full px-4 md:px-12 py-6">
    <div class="overflow-hidden rounded-xl shadow-xl">
      <div id="slider" class="flex w-fit transition-transform duration-700 ease-in-out">

        <!-- Duplikat terakhir -->
        <?php if (count($banners) > 0): ?>
          <img src="../assets/banners/<?= htmlspecialchars(end($banners)) ?>" alt="Banner Clone Last"
            class="w-screen max-h-[500px] h-auto object-contain flex-shrink-0 rounded-xl shadow-lg" />
        <?php endif; ?>

        <!-- Banner Asli -->
        <?php foreach ($banners as $filename): ?>
          <img src="../assets/banners/<?= htmlspecialchars($filename) ?>" alt="Banner"
            class="w-screen max-h-[500px] h-auto object-contain flex-shrink-0 rounded-xl shadow-lg" />
        <?php endforeach; ?>

        <!-- Duplikat pertama -->
        <?php if (count($banners) > 0): ?>
          <img src="../assets/banners/<?= htmlspecialchars($banners[0]) ?>" alt="Banner Clone First"
            class="w-screen max-h-[500px] h-auto object-contain flex-shrink-0 rounded-xl shadow-lg" />
        <?php endif; ?>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <button onclick="prevSlide()"
      class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full shadow">
      &#10094;
    </button>
    <button onclick="nextSlide()"
      class="absolute top-1/2 right-6 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full shadow">
      &#10095;
    </button>
  </section>

  <!-- Section Title -->
  <div class="text-center text-3xl font-bold mb-6 mt-6">
    LET'S MAKE MONEY
  </div>

  <!-- Main Content (sisa konten tetap) -->
  <main class="px-6 py-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
      <div>
        <a href="updatemlbb.html" class="hover:text-yellow-400">
          <img src="../assets/logoML.png" alt="MLBB" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Mobile Legends: Bang Bang</span>
        </a>
      </div>
      <div>
        <a href="updatepubgm.html" class="hover:text-yellow-400">
          <img src="../assets/logoPUBG.png" alt="PUBG" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">PUBG Mobile</span>
        </a>
      </div>
      <div>
        <a href="updatefreefire.html" class="hover:text-yellow-400">
          <img src="../assets/logoEPEP.png" alt="Free Fire" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">FreeFire</span>
        </a>
      </div>
      <div>
        <a href="updatefreefire.html" class="hover:text-yellow-400">
          <img src="../assets/logoGenshinImpact.png" alt="Genshin Impact" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Genshin Impact</span>
        </a>
      </div>
      <div>
        <a href="updatefreefire.html" class="hover:text-yellow-400">
          <img src="../assets/logoCODM.jpg" alt="Call Of Duty Mobile" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Call Of Duty Mobile</span>
        </a>
      </div>
      <div>
        <a href="updatefreefire.html" class="hover:text-yellow-400">
          <img src="../assets/logohok.jpg" alt="Honor Of Kings" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Honor Of Kings</span>
        </a>
      </div>
      <div>
        <a href="updatefreefire.html" class="hover:text-yellow-400">
          <img src="../assets/logolol.jpg" alt="League Of Legends Wild Rift" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">League Of Legends Wild Rift</span>
        </a>
      </div>
      <div>
        <a href="updatefreefire.html" class="hover:text-yellow-400">
          <img src="../assets/aovlogo.jpg" alt="Arena Of Vallor" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Arena Of Vallor</span>
        </a>
      </div>
      <div>
        <a href="updatefreefire.html" class="hover:text-yellow-400">
          <img src="../assets/mcgglogo.png" alt="Magic Chess GO GO" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Magic Chess GO GO</span>
        </a>
      </div>
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

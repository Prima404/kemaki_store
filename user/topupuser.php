<!DOCTYPE html>
<html lang="en">
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
        $conn = new mysqli("localhost", "root", "", "kemaki_store");
        $result = $conn->query("SELECT filename FROM banners ORDER BY uploaded_at DESC");

        $banners = [];
        while ($row = $result->fetch_assoc()) {
          $banners[] = $row['filename'];
        }

        // Duplikat terakhir untuk efek loop slider
        if (count($banners) > 0) {
          echo '<img src="../assets/banners/' . $banners[count($banners) - 1] . '" class="w-screen max-h-[500px] h-auto object-contain flex-shrink-0 rounded-xl shadow-lg" />';
        }

        // Banner asli
        foreach ($banners as $file) {
          echo '<img src="../assets/banners/' . $file . '" class="w-screen max-h-[500px] h-auto object-contain flex-shrink-0 rounded-xl shadow-lg" />';
        }

        // Duplikat pertama
        if (count($banners) > 0) {
          echo '<img src="../assets/banners/' . $banners[0] . '" class="w-screen max-h-[500px] h-auto object-contain flex-shrink-0 rounded-xl shadow-lg" />';
        }
        ?>
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
    LET'S TOP UP THE GAME
  </div>

  <!-- Main Content -->
  <main class="px-6 py-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
      
      <!-- Mobile Legends -->
      <div>
        <a href="mlbb.html" class="hover:text-yellow-400">
          <img src="../assets/logoML.png" alt="MLBB" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Mobile Legends: Bang Bang</span>
        </a>
      </div>

      <!-- PUBG -->
      <div>
        <a href="pubgm.html" class="hover:text-yellow-400">
          <img src="../assets/logoPUBG.png" alt="PUBG" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">PUBG Mobile</span>
        </a>
      </div>

      <!-- Free Fire -->
      <div>
        <a href="freefire.html" class="hover:text-yellow-400">
          <img src="../assets/logoEPEP.png" alt="Free Fire" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">FreeFire</span>
        </a>
      </div>

      <!-- Genshin Impact -->
      <div>
        <a href="genshinimpact.html" class="hover:text-yellow-400">
          <img src="../assets/logoGenshinImpact.png" alt="Genshin Impact" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Genshin Impact</span>
        </a>
      </div>

      <!-- CODM -->
      <div>
        <a href="codm.html" class="hover:text-yellow-400">
          <img src="../assets/logoCODM.jpg" alt="Call of Duty Mobile" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Call of Duty Mobile</span>
        </a>
      </div>

      <!-- HOK -->
      <div>
        <a href="hok.html" class="hover:text-yellow-400">
          <img src="../assets/logohok.jpg" alt="Honor Of Kings" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Honor Of Kings</span>
        </a>
      </div>

      <!-- LOL -->
      <div>
        <a href="lol.html" class="hover:text-yellow-400">
          <img src="../assets/logolol.jpg" alt="League Of Legends Wild Rift" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">League Of Legends Wild Rift</span>
        </a>
      </div>

      <!-- AOV -->
      <div>
        <a href="aov.html" class="hover:text-yellow-400">
          <img src="../assets/aovlogo.jpg" alt="Arena Of Vallor" class="w-40 h-40 mx-auto rounded-xl shadow-lg" />
          <span class="text-2xl font-bold block mt-4">Arena Of Vallor</span>
        </a>
      </div>

      <!-- MCGG -->
      <div>
        <a href="mcgg.html" class="hover:text-yellow-400">
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
    const realSlides = totalSlides - 2; // karena ada clone awal dan akhir
    let index = 1; // mulai dari slide ke-1 (index 1)
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

    // Public
    window.nextSlide = nextSlide;
    window.prevSlide = prevSlide;

    // Auto-slide
    setInterval(() => {
      nextSlide();
    }, 5000);

    // Init
    updateSlider(false);
  });
</script>

</body>
</html>
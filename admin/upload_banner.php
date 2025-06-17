<?php
$conn = new mysqli("localhost", "root", "", "kemaki_store");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

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
} else {
    header("Location: atur_banner.php?error=1");
}

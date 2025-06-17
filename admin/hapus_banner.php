<?php
$conn = new mysqli("localhost", "root", "", "kemaki_store");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $filename = $_POST['filename'];
    $filepath = "../assets/banners/" . $filename;

    // Hapus dari database
    $stmt = $conn->prepare("DELETE FROM banners WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

  // Setelah berhasil menghapus file dan data dari database
header("Location: atur_banner.php?deleted=1");
exit;

}
?>

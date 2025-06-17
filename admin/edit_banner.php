<?php
$conn = new mysqli("localhost", "root", "", "kemaki_store");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
        // Hapus file lama
        if (file_exists($target_dir . $old_file)) {
            unlink($target_dir . $old_file);
        }

        // Update DB
        $stmt = $conn->prepare("UPDATE banners SET filename = ?, uploaded_at = NOW() WHERE id = ?");
        $stmt->bind_param("si", $new_name, $id);
        $stmt->execute();
        $stmt->close();

        header("Location: atur_banner.php?success=edit");
    } else {
        header("Location: atur_banner.php?error=upload");
    }
}
?>

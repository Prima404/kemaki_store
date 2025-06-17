<?php
$conn = new mysqli("localhost", "root", "", "kemaki_store");
$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
if ($conn->query($sql)) {
    echo "Admin berhasil ditambahkan.";
} else {
    echo "Gagal menambahkan admin: " . $conn->error;
}
$conn->close();
?>

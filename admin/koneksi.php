<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "kemaki_store";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die(json_encode(['success' => false, 'message' => 'Koneksi ke database gagal']));
}
?>

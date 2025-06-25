<?php
require 'koneksi.php';

// Ambil data dari tabel
$sql = "SELECT jumlah_dm, harga FROM dm_pubg ORDER BY harga ASC";
$result = $conn->query($sql);

$denoms = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $denoms[] = [
            "name" => $row["jumlah_dm"],
            "price" => $row["harga"]
        ];
    }
}

// Output JSON
header('Content-Type: application/json');
echo json_encode($denoms);

$conn->close();
?>

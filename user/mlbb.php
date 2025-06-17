<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'kemaki_store';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel
$sql = "SELECT jumlah_dm, harga FROM dm_mlbb ORDER BY harga ASC";
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

<?php
require 'koneksi.php';

$trx_id     = $_POST['trx'];
$denom      = $_POST['denom'];
$price      = $_POST['price'];
$method     = $_POST['method'];
$user_id    = $_POST['user'];
$server_id  = $_POST['server'];
$nickname   = $_POST['nick'];
$wa_number  = $_POST['wa'];
$game       = $_POST['game'];
$waktu      = $_POST['time'];
$status     = "PENDING";

$sql = "INSERT INTO transaksi (
    id, nama_game, user_id, server_id, nickname, no_wa,
    jumlah, harga, metode_pembayaran, waktu, status
) VALUES (
    '$trx_id', '$game', '$user_id', '$server_id', '$nickname', '$wa_number',
    '$denom', '$price', '$method', '$waktu', '$status'
)";

if ($conn->query($sql) === TRUE) {
    header("Location: topupuser.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

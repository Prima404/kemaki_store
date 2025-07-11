<?php
header('Content-Type: application/json');

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT jumlah_dm, harga FROM dm_mcgg ORDER BY harga ASC";
    $result = $conn->query($sql);

    $denoms = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $denoms[] = [
                "label" => $row["jumlah_dm"],
                "price" => $row["harga"]
            ];
        }
    }

    echo json_encode($denoms);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hapus
    if (isset($_POST['hapus']) && $_POST['hapus'] == '1') {
        $label = $_POST['label'];
        if (empty($label)) {
            echo json_encode(['success' => false, 'message' => 'Label tidak ditemukan.']);
            exit;
        }

        $sql = "DELETE FROM dm_mcgg WHERE jumlah_dm = '$label'";
        $result = mysqli_query($conn, $sql);

        echo json_encode(['success' => $result ? true : false, 'message' => $result ? '' : 'Gagal menghapus data.']);
        exit;
    }

    // Tambah
    if (isset($_POST['aksi']) && $_POST['aksi'] === 'tambah') {
        $label_baru = $_POST['label_baru'];
        $harga = $_POST['harga'];

        if (empty($label_baru) || !is_numeric($harga)) {
            echo json_encode(['success' => false, 'message' => 'Data tidak valid untuk tambah.']);
            exit;
        }

        $sql = "INSERT INTO dm_mcgg (jumlah_dm, harga) VALUES ('$label_baru', '$harga')";
        $result = mysqli_query($conn, $sql);

        echo json_encode(['success' => $result ? true : false, 'message' => $result ? '' : 'Gagal menambahkan ke database.']);
        exit;
    }

    // Update
    $label_lama = $_POST['label_lama'] ?? '';
    $label_baru = $_POST['label_baru'] ?? '';
    $harga = $_POST['harga'] ?? '';

    if (empty($label_lama) || empty($label_baru) || !is_numeric($harga)) {
        echo json_encode(['success' => false, 'message' => 'Data tidak valid untuk update.']);
        exit;
    }

    $sql = "UPDATE dm_mcgg SET jumlah_dm = '$label_baru', harga = '$harga' WHERE jumlah_dm = '$label_lama'";
    $result = mysqli_query($conn, $sql);

    echo json_encode(['success' => $result ? true : false, 'message' => $result ? '' : 'Gagal update ke database.']);
    exit;
}

mysqli_close($conn);
?>

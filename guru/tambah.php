<?php
include '../db.php';
include 'guru.php';

$db = new Database();
$conn = $db->getConnection();
$guru = new Guru($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_guru = $_POST['nama_guru'];
    if (!empty($nama_guru)) {
        if ($guru->create($nama_guru)) {
            header("Location: index.php");
        } else {
            echo "Gagal menambah data!";
        }
    } else {
        echo "Nama guru tidak boleh kosong!";
    }
}
?>

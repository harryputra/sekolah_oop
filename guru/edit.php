<?php
include '../db.php';
include 'guru.php';

$db = new Database();
$conn = $db->getConnection();
$guru = new Guru($conn);

$id_guru = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_guru = $_POST['nama_guru'];
    if (!empty($nama_guru)) {
        if ($guru->update($id_guru, $nama_guru)) {
            header("Location: index.php");
        } else {
            echo "Gagal memperbarui data!";
        }
    } else {
        echo "Nama guru tidak boleh kosong!";
    }
}
?>

<?php
include '../db.php';
include 'kelas.php';

$db = new Database();
$conn = $db->getConnection();
$kelas = new Kelas($conn);

$id_kelas = $_GET['id'];

if ($kelas->delete($id_kelas)) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data!";
}
?>

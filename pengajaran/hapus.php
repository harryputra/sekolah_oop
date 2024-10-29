<?php
include '../db.php';
include 'pengajaran.php';

$db = new Database();
$conn = $db->getConnection();
$pengajaran = new Pengajaran($conn);

$id = $_GET['id'];

if ($pengajaran->delete($id)) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data!";
}
?>

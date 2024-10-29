<?php
include '../db.php';
include 'guru.php';

$db = new Database();
$conn = $db->getConnection();
$guru = new Guru($conn);

$id_guru = $_GET['id'];

if ($guru->delete($id_guru)) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data!";
}
?>

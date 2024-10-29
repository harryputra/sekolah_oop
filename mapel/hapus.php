<?php
include '../db.php';
include 'mapel.php';

$db = new Database();
$conn = $db->getConnection();
$mapel = new Mapel($conn);

$id_mapel = $_GET['id'];

if ($mapel->delete($id_mapel)) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data!";
}
?>

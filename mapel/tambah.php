<?php
include '../db.php';
include 'mapel.php';

$db = new Database();
$conn = $db->getConnection();
$mapel = new Mapel($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_mapel = $_POST['nama_mapel'];
    if (!empty($nama_mapel)) {
        if ($mapel->create($nama_mapel)) {
            header("Location: index.php");
        } else {
            $error_message = "Gagal menambah data!";
        }
    } else {
        $error_message = "Nama mata pelajaran tidak boleh kosong!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Pelajaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="center-align">Tambah Mata Pelajaran</h1>
        <?php if (isset($error_message)): ?>
            <div class="red-text"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="tambah.php">
            <div class="input-field">
                <input type="text" name="nama_mapel" id="nama_mapel" required>
                <label for="nama_mapel">Nama Mata Pelajaran</label>
            </div>
            <button type="submit" class="btn waves-effect waves-light">Simpan</button>
        </form>
        <br>
        <a href="index.php" class="btn red waves-effect waves-light">Kembali ke Daftar Mata Pelajaran</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

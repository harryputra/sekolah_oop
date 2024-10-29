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
            $error_message = "Gagal menambah data!";
        }
    } else {
        $error_message = "Nama guru tidak boleh kosong!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Guru</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="center-align">Tambah Guru</h1>
        <?php if (isset($error_message)): ?>
            <div class="red-text"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="tambah.php">
            <div class="input-field">
                <input type="text" name="nama_guru" id="nama_guru" required>
                <label for="nama_guru">Nama Guru</label>
            </div>
            <button type="submit" class="btn waves-effect waves-light">Simpan</button>
        </form>
        <br>
        <a href="index.php" class="btn red waves-effect waves-light">Kembali ke Daftar Guru</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

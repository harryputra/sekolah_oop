<?php
include '../db.php';
include 'kelas.php';

$db = new Database();
$conn = $db->getConnection();
$kelas = new Kelas($conn);

$id_kelas = $_GET['id'];
$data_kelas = $kelas->getById($id_kelas);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kelas = $_POST['nama_kelas'];
    if (!empty($nama_kelas)) {
        if ($kelas->update($id_kelas, $nama_kelas)) {
            header("Location: index.php");
        } else {
            $error_message = "Gagal memperbarui data!";
        }
    } else {
        $error_message = "Nama kelas tidak boleh kosong!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kelas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="center-align">Edit Kelas</h1>
        <?php if (isset($error_message)): ?>
            <div class="red-text"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="edit.php?id=<?php echo $id_kelas; ?>">
            <div class="input-field">
                <input type="text" name="nama_kelas" id="nama_kelas" value="<?php echo $data_kelas['nama_kelas']; ?>" required>
                <label for="nama_kelas" class="active">Nama Kelas</label>
            </div>
            <button type="submit" class="btn waves-effect waves-light">Simpan</button>
        </form>
        <br>
        <a href="index.php" class="btn red waves-effect waves-light">Kembali ke Daftar Kelas</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

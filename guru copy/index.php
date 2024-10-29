<?php
// tanpa modal
include '../db.php';
include 'guru.php';

$db = new Database();
$conn = $db->getConnection();
$guru = new Guru($conn);

$gurus = $guru->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Guru</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="center-align">Daftar Guru</h1>
        <a href="tambah.php" class="btn waves-effect waves-light">Tambah Guru</a>
        <a href="../index.php" class="btn red waves-effect waves-light">Kembali ke Halaman Utama</a>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>ID Guru</th>
                    <th>Nama Guru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gurus as $guru): ?>
                <tr>
                    <td><?php echo $guru['id_guru']; ?></td>
                    <td><?php echo $guru['nama_guru']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $guru['id_guru']; ?>" class="btn-small waves-effect waves-light">Edit</a>
                        <a href="hapus.php?id=<?php echo $guru['id_guru']; ?>" class="btn-small red waves-effect waves-light" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

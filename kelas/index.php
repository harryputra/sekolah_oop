<?php
include '../db.php';
include 'kelas.php';

$db = new Database();
$conn = $db->getConnection();
$kelas = new Kelas($conn);

$kelas_list = $kelas->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kelas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="center-align">Daftar Kelas</h1>
        <a href="tambah.php" class="btn waves-effect waves-light">Tambah Kelas</a>
        <a href="../index.php" class="btn red waves-effect waves-light">Kembali ke Halaman Utama</a>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>ID Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kelas_list as $kelas): ?>
                <tr>
                    <td><?php echo $kelas['id_kelas']; ?></td>
                    <td><?php echo $kelas['nama_kelas']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $kelas['id_kelas']; ?>" class="btn-small waves-effect waves-light">Edit</a>
                        <a href="hapus.php?id=<?php echo $kelas['id_kelas']; ?>" class="btn-small red waves-effect waves-light" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

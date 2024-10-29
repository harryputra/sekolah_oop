<?php
include '../db.php';
include 'mapel.php';

$db = new Database();
$conn = $db->getConnection();
$mapel = new Mapel($conn);

$mapels = $mapel->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mata Pelajaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="center-align">Daftar Mata Pelajaran</h1>
        <a href="tambah.php" class="btn waves-effect waves-light">Tambah Mapel</a>
        <a href="../index.php" class="btn red waves-effect waves-light">Kembali ke Halaman Utama</a>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>ID Mapel</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mapels as $mapel): ?>
                <tr>
                    <td><?php echo $mapel['id_mapel']; ?></td>
                    <td><?php echo $mapel['nama_mapel']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $mapel['id_mapel']; ?>" class="btn-small waves-effect waves-light">Edit</a>
                        <a href="hapus.php?id=<?php echo $mapel['id_mapel']; ?>" class="btn-small red waves-effect waves-light" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

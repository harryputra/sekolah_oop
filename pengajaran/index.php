<?php
include '../db.php';
include 'pengajaran.php';

$db = new Database();
$conn = $db->getConnection();
$pengajaran = new Pengajaran($conn);

$pengajaran_list = $pengajaran->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengajaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3 class="center-align">Daftar Pengajaran</h3>
        <a href="tambah.php" class="btn waves-effect waves-light">Tambah Pengajaran</a>
        <a href="../index.php" class="btn red waves-effect waves-light">Kembali ke Halaman Utama</a>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pengajaran_list as $data): ?>
                <tr>
                    <td><?php echo $data['nama_guru']; ?></td>
                    <td><?php echo $data['nama_mapel']; ?></td>
                    <td><?php echo $data['nama_kelas']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn-small waves-effect waves-light">Edit</a>
                        <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn-small red waves-effect waves-light" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

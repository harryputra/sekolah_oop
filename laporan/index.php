<?php
include '../db.php';

$db = new Database();
$conn = $db->getConnection();

$query = "
    SELECT guru.nama_guru, mapel.nama_mapel, kelas.nama_kelas 
    FROM guru 
    JOIN guru_mapel ON guru.id_guru = guru_mapel.id_guru
    JOIN mapel ON guru_mapel.id_mapel = mapel.id_mapel
    JOIN kelas ON guru.id_guru = kelas.id_guru
";
$result = $conn->query($query);
$pengajaran = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengajaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="center-align">Laporan Pengajaran</h1>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pengajaran as $data): ?>
                <tr>
                    <td><?php echo $data['nama_guru']; ?></td>
                    <td><?php echo $data['nama_mapel']; ?></td>
                    <td><?php echo $data['nama_kelas']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <a href="../index.php" class="btn red waves-effect waves-light">Kembali ke Halaman Utama</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

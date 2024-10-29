<?php
include '../db.php';
include 'pengajaran.php';

$db = new Database();
$conn = $db->getConnection();
$pengajaran = new Pengajaran($conn);

$id_pengajaran = $_GET['id'];
$data_pengajaran = $pengajaran->getById($id_pengajaran);

// Mengambil daftar guru, mapel, dan kelas melalui class Pengajaran
$gurus = $pengajaran->getAllGuru();
$mapels = $pengajaran->getAllMapel();
$kelass = $pengajaran->getAllKelas();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_guru = $_POST['id_guru'];
    $id_mapel = $_POST['id_mapel'];
    $id_kelas = $_POST['id_kelas'];
    if (!empty($id_guru) && !empty($id_mapel) && !empty($id_kelas)) {
        if ($pengajaran->update($id_pengajaran, $id_guru, $id_mapel, $id_kelas)) {
            header("Location: index.php");
        } else {
            $error_message = "Gagal memperbarui data!";
        }
    } else {
        $error_message = "Semua kolom harus diisi!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengajaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
            max-width: 600px;
        }

        .input-field label {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="center-align">Edit Pengajaran</h3>
        <?php if (isset($error_message)): ?>
            <div class="red-text center-align"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="edit.php?id=<?php echo $id_pengajaran; ?>">
            <!-- Dropdown untuk Guru -->
            <div class="input-field">
                <label for="id_guru">Guru Pengajar</label>
                <select name="id_guru" required>
                    <option value="" disabled>Pilih Guru</option>
                    <?php foreach ($gurus as $guru): ?>
                        <option value="<?php echo $guru['id_guru']; ?>" <?php echo ($guru['id_guru'] == $data_pengajaran['id_guru']) ? 'selected' : ''; ?>>
                            <?php echo $guru['nama_guru']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Dropdown untuk Mata Pelajaran -->
            <div class="input-field">
                <label for="id_mapel">Mata Pelajaran</label>
                <select name="id_mapel" required>
                    <option value="" disabled>Pilih Mata Pelajaran</option>
                    <?php foreach ($mapels as $mapel): ?>
                        <option value="<?php echo $mapel['id_mapel']; ?>" <?php echo ($mapel['id_mapel'] == $data_pengajaran['id_mapel']) ? 'selected' : ''; ?>>
                            <?php echo $mapel['nama_mapel']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Dropdown untuk Kelas -->
            <div class="input-field">
                <label for="id_kelas">Kelas</label>
                <select name="id_kelas" required>
                    <option value="" disabled>Pilih Kelas</option>
                    <?php foreach ($kelass as $kelas): ?>
                        <option value="<?php echo $kelas['id_kelas']; ?>" <?php echo ($kelas['id_kelas'] == $data_pengajaran['id_kelas']) ? 'selected' : ''; ?>>
                            <?php echo $kelas['nama_kelas']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Tombol Simpan -->
            <div class="center-align">
                <button type="submit" class="btn blue waves-effect waves-light">Simpan</button>
                <a href="index.php" class="btn red waves-effect waves-light">Kembali</a>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
        });
    </script>
</body>
</html>

<?php
// dengan modal
include '../db.php';
include 'guru.php';

$db = new Database();
$conn = $db->getConnection();
$guru = new Guru($conn);

// Mendapatkan data guru
$gurus = $guru->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Guru dengan Modal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h3 class="center-align">Daftar Guru</h3>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal-tambah">Tambah Guru</a>
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
                        <a class="waves-effect waves-light btn-small modal-trigger" href="#modal-edit-<?php echo $guru['id_guru']; ?>">Edit</a>
                        <a href="hapus.php?id=<?php echo $guru['id_guru']; ?>" class="btn-small red waves-effect waves-light" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>

                <!-- Modal untuk Edit Data Guru -->
                <div id="modal-edit-<?php echo $guru['id_guru']; ?>" class="modal">
                    <div class="modal-content">
                        <h4>Edit Guru</h4>
                        <form method="POST" action="edit.php?id=<?php echo $guru['id_guru']; ?>">
                            <div class="input-field">
                                <input type="text" name="nama_guru" id="nama_guru-<?php echo $guru['id_guru']; ?>" value="<?php echo $guru['nama_guru']; ?>" required>
                                <label for="nama_guru-<?php echo $guru['id_guru']; ?>" class="active">Nama Guru</label>
                            </div>
                            <button type="submit" class="btn blue waves-effect waves-light">Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
                    </div>
                </div>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal untuk Tambah Data Guru -->
    <div id="modal-tambah" class="modal">
        <div class="modal-content">
            <h4>Tambah Guru</h4>
            <form method="POST" action="tambah.php">
                <div class="input-field">
                    <input type="text" name="nama_guru" id="nama_guru" required>
                    <label for="nama_guru">Nama Guru</label>
                </div>
                <button type="submit" class="btn blue waves-effect waves-light">Simpan</button>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
        </div>
    </div>

    <!-- Materialize CSS & JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modals = document.querySelectorAll('.modal');
            M.Modal.init(modals);
        });
    </script>

</body>
</html>

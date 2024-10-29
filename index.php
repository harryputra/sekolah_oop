<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Sekolah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .menu-card {
            transition: transform 0.3s ease;
        }
        .menu-card:hover {
            transform: scale(1.05);
        }
        .menu-container {
            margin-top: 50px;
        }
        .center-icons {
            font-size: 48px;
            color: #42a5f5;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="#" class="brand-logo center">Manajemen Sekolah</a>
        </div>
    </nav>

    <div class="container menu-container">
        <div class="row">

            <!-- Menu Guru -->
            <div class="col s12 m4">
                <div class="card menu-card">
                    <div class="card-content center">
                        <i class="material-icons center-icons">person</i>
                        <span class="card-title">Manajemen Guru</span>
                        <p>Kelola data guru di sekolah</p>
                    </div>
                    <div class="card-action center">
                        <a href="guru/index.php" class="btn blue waves-effect waves-light">Kelola Guru</a>
                    </div>
                </div>
            </div>

            <!-- Menu Kelas -->
            <div class="col s12 m4">
                <div class="card menu-card">
                    <div class="card-content center">
                        <i class="material-icons center-icons">class</i>
                        <span class="card-title">Manajemen Kelas</span>
                        <p>Kelola data kelas di sekolah</p>
                    </div>
                    <div class="card-action center">
                        <a href="kelas/index.php" class="btn blue waves-effect waves-light">Kelola Kelas</a>
                    </div>
                </div>
            </div>

            <!-- Menu Mata Pelajaran -->
            <div class="col s12 m4">
                <div class="card menu-card">
                    <div class="card-content center">
                        <i class="material-icons center-icons">book</i>
                        <span class="card-title">Manajemen Mata Pelajaran</span>
                        <p>Kelola data mata pelajaran</p>
                    </div>
                    <div class="card-action center">
                        <a href="mapel/index.php" class="btn blue waves-effect waves-light">Kelola Mapel</a>
                    </div>
                </div>
            </div>

            <!-- Menu Relasi Pengajaran -->
            <div class="col s12 m4 offset-m4">
                <div class="card menu-card">
                    <div class="card-content center">
                        <i class="material-icons center-icons">assignment</i>
                        <span class="card-title">Pengajaran</span>
                        <p>Kelola relasi siapa mengajar apa di kelas mana</p>
                    </div>
                    <div class="card-action center">
                        <a href="pengajaran/index.php" class="btn blue waves-effect waves-light">Kelola Pengajaran</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

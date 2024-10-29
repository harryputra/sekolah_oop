<?php
class Pengajaran {
    private $conn;
    private $table = 'guru_mapel_kelas'; // Nama tabel relasi pengajaran

    public function __construct($db) {
        $this->conn = $db;
    }

    // Mendapatkan semua data pengajaran (relasi guru, mapel, dan kelas)
    public function getAll() {
        $query = "SELECT guru_mapel_kelas.id, guru.nama_guru, mapel.nama_mapel, kelas.nama_kelas 
                  FROM " . $this->table . " 
                  JOIN guru ON guru_mapel_kelas.id_guru = guru.id_guru
                  JOIN mapel ON guru_mapel_kelas.id_mapel = mapel.id_mapel
                  JOIN kelas ON guru_mapel_kelas.id_kelas = kelas.id_kelas";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Mendapatkan semua guru
    public function getAllGuru() {
        $query = "SELECT * FROM guru";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Mendapatkan semua mata pelajaran (mapel)
    public function getAllMapel() {
        $query = "SELECT * FROM mapel";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Mendapatkan semua kelas
    public function getAllKelas() {
        $query = "SELECT * FROM kelas";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Menambah data pengajaran
    public function create($id_guru, $id_mapel, $id_kelas) {
        $query = "INSERT INTO " . $this->table . " (id_guru, id_mapel, id_kelas) 
                  VALUES ($id_guru, $id_mapel, $id_kelas)";
        return $this->conn->query($query);
    }

    // Mendapatkan data pengajaran berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = $id";
        return $this->conn->query($query)->fetch_assoc();
    }

    // Memperbarui data pengajaran
    public function update($id, $id_guru, $id_mapel, $id_kelas) {
        $query = "UPDATE " . $this->table . " 
                  SET id_guru = $id_guru, id_mapel = $id_mapel, id_kelas = $id_kelas 
                  WHERE id = $id";
        return $this->conn->query($query);
    }

    // Menghapus data pengajaran
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = $id";
        return $this->conn->query($query);
    }
}
?>

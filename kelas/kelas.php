<?php
class Kelas {
    private $conn;
    private $table = 'kelas'; // Nama tabel

    public function __construct($db) {
        $this->conn = $db;
    }

    // Mendapatkan semua kelas
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Menambah kelas
    public function create($nama_kelas) {
        $query = "INSERT INTO " . $this->table . " (nama_kelas) VALUES ('$nama_kelas')";
        return $this->conn->query($query);
    }

    // Mendapatkan kelas berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_kelas = $id";
        return $this->conn->query($query)->fetch_assoc();
    }

    // Memperbarui kelas
    public function update($id, $nama_kelas) {
        $query = "UPDATE " . $this->table . " SET nama_kelas = '$nama_kelas' WHERE id_kelas = $id";
        return $this->conn->query($query);
    }

    // Menghapus kelas
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_kelas = $id";
        return $this->conn->query($query);
    }
}
?>

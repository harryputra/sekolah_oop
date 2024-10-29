<?php
class Guru {
    private $conn;
    private $table = 'guru';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Mendapatkan semua guru
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Menambah guru baru
    public function create($nama_guru) {
        $query = "INSERT INTO " . $this->table . " (nama_guru) VALUES ('$nama_guru')";
        return $this->conn->query($query);
    }

    // Mendapatkan data guru berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_guru = $id";
        return $this->conn->query($query)->fetch_assoc();
    }

    // Memperbarui data guru
    public function update($id, $nama_guru) {
        $query = "UPDATE " . $this->table . " SET nama_guru = '$nama_guru' WHERE id_guru = $id";
        return $this->conn->query($query);
    }

    // Menghapus guru
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_guru = $id";
        return $this->conn->query($query);
    }
}
?>
